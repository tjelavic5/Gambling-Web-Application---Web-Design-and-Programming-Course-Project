<?php

require 'osnovno.php';

$dobro1 = false;
$smarty->display("zaglavlje.tpl");
if (isset($_POST['prijava'])) {
    $korime = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];
    $upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
    $baza = new Baza();
    $baza->spojiDB();
    $rez = $baza->selectDB($upit);
    $rez_array = mysqli_fetch_assoc($rez);
    $sol = $rez_array["sol"];
    $broj_pokusaja = $rez_array["broj_krivih_lozinki"];
    if (isset($_POST["zaboravljenaLozinka"])) {
        header("location: zaboravljena_lozinka.php");
    }
    if (!empty($rez)) {
        $dobro1 = true;
    }
    $lozinka_hash = hash('sha256', $sol . $lozinka);
    $zapamti_me = "";
    if (isset($_POST['zapamtiMe'])) {
        $zapamti_me = $_POST['zapamtiMe'];
        setcookie('korime', $korime, strtotime('+3 days'), "/", $_SERVER['SERVER_NAME']);
        fb($_COOKIE["korime"]);
        $tekst = "Spremanje kolačića";
        $radnja = "Prijava";
        $upit = "-";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    }
    fb($lozinka_hash);
    $upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}' AND lozinka_sha256 = '{$lozinka_hash}'";
    $rez = $baza->selectDB($upit);

    fb($upit);
    $rez_array = mysqli_fetch_assoc($rez);
    fb($rez_array);
    if (isset($rez_array["status"])) {

        $korime = $rez_array["korisnicko_ime"];
        $uloga = $rez_array["tip_korisnika_id"];
        if ($rez_array["status"] === 'AKTIVIRAN') {
            Sesija::kreirajKorisnika($korime, $uloga);
            echo "Uspješna prijava";
            fb("PRIJAVLJEN");
            $upit = "UPDATE korisnik SET broj_krivih_lozinki = 0 WHERE korisnicko_ime = '{$korime}'";
            $baza->updateDB($upit);
            $tekst = "Prijava korisnika";
            $radnja = "Prijava";

            $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
            header("location: index.php");
        } else {
            $tekst = "Prijava korisnika - korisnik je zaključan";
            $radnja = "Prijava";

            $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
            echo "Korisnik je zaključan";
        }
        //fb("PRIJAVA " . $_SESSION["uloga"]);
    } else {
        echo "Prijava nije uspjela";
        if ($dobro1) {

            $broj_pokusaja++;
            echo " Još " . (3 - $broj_pokusaja) . " pokušaja";
            if ($broj_pokusaja >= 3) {
                $upit = "UPDATE korisnik SET status = 'ZAKLJUCAN' WHERE korisnicko_ime = '{$korime}'";
                $baza->updateDB($upit);
                $tekst = "Prijava korisnika - korisnik je sada zaključan";
                $radnja = "Prijava";

                $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
            } else {
                $tekst = "Prijava korisnika - kriva lozinka";
                $radnja = "Prijava";

                $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
                $upit = "UPDATE korisnik SET broj_krivih_lozinki = {$broj_pokusaja} WHERE korisnicko_ime = '{$korime}'";
                $baza->updateDB($upit);
            }
        }
    }
}