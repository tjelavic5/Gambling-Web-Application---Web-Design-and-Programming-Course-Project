<?php

require './osnovno.php';

$sadrzaj = array(
    "podaci" => array(),
    "max_rezultata" => 0
);

if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 1) {
    $baza = new Baza();
    $baza->spojiDB();
    if (isset($_GET["id"]) && isset($_GET["mod"])) {
        $id = $_GET["id"];
        $mod = $_GET["mod"];
        $upit = "";
        if ($mod == "B") {
            $upit = "UPDATE korisnik SET status = 'ZAKLJUCAN' WHERE korisnik_id = '{$id}'";
        } else if ($mod == "O") {
            $upit = "UPDATE korisnik SET status = 'AKTIVIRAN' WHERE korisnik_id = '{$id}'";
        }
        $baza->updateDB($upit);
    }

    $upit = "SELECT * FROM korisnik k, tip_korisnika t WHERE k.tip_korisnika_id = t.tip_korisnika_id";
    $rez = $baza->selectDB($upit);

    if (!empty($rez)) {
        fb($rez);
        foreach ($rez as $kljuc => $vrijednost) {
            $sadrzaj["podaci"][] = $vrijednost;
        }
        $baza->zatvoriDB();
        echo json_encode($sadrzaj);
    } else {
        $tekst = "Nema rezultata";
        $radnja = "Dohvaćanje korisnika";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    }
}