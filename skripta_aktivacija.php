<?php

require 'osnovno.php';

$kod = $_GET['kod'];

if (!empty($kod)) {
    $baza = new Baza();
    $baza->spojiDB();

    $upit = "SELECT * FROM korisnik WHERE aktivacijski_kod = '{$kod}'";
    $rez = $baza->selectDB($upit);
    $rez_array = mysqli_fetch_array($rez, MYSQLI_ASSOC);

    $korime = $rez_array["korisnicko_ime"];
    $datum_reg = $rez_array["datum_registracije"];
    $vrijeme_reg = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $datum_reg)));
    $vrijeme_now = date('Y-m-d H:i:s');
    $a = new DateTime($vrijeme_reg);
    $b = new DateTime($vrijeme_now);
    $interval = $a->diff($b);

    $hours = $interval->h;
    $hours = $hours + ($interval->days * 24);
    if ($hours < 7 && !empty($rez)) {
        $upit = "UPDATE korisnik SET status = 'AKTIVIRAN' WHERE korisnicko_ime = '{$korime}'";
        $baza->updateDB($upit);
        $tekst = "Račun je aktiviran";
        $radnja = "Aktivacija";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
        $smarty->assign("poruka", "Aktiviran račun!");
    } else {
        $smarty->assign("poruka", "Račun nije aktiviran");
        $tekst = "Račun nije aktiviran, kod je istekao";
        $radnja = "Aktivacija";
        $upit = "-";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    }
} else {
    $tekst = "Račun nije aktiviran";
    $radnja = "Aktivacija";
    $upit = "-";
    $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    $smarty->assign("poruka", "Račun nije aktiviran");
}
$smarty->display("zaglavlje.tpl");
$smarty->display("aktivacija.tpl");

