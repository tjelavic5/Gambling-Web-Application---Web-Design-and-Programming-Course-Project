<?php
require 'osnovno.php';

if(isset($_POST["urediLutriju"])){
    $smarty->assign("urediLutriju",$_POST["urediLutriju"]);
    $smarty->assign("urediNaziv",$_POST["urediNaziv"]);
    $smarty->assign("urediId",$_POST["urediId"]);
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT * FROM korisnik k, moderator_lutrije m WHERE m.korisnik_id = k.korisnik_id AND m.lutrija_id = '{$_POST["urediId"]}';";
    $rezultat = $veza->selectDB($upit);
    $moderatoriLutrije = [];
    while ($red = mysqli_fetch_array($rezultat)) {
        array_push($moderatoriLutrije, $red['korisnik_id']);
    }
    $veza->zatvoriDB();
    $smarty->assign("moderatoriLutrije",$moderatoriLutrije);
}

if (isset($_POST["dodajLutriju"])) {
    $nazivLutrije = $_POST["nazivLutrije"];
    $moderatori = [];
    if (isset($_POST["moderatori"])) {
        foreach ($_POST["moderatori"] as $moderator) {
            array_push($moderatori, $moderator);
        }
    }
    $veza = new Baza();
    $veza->spojiDB();
    $veza->insertLutrija($nazivLutrije, $moderatori);
    $veza->zatvoriDB();
}

if (isset($_POST["azurirajLutriju"])) {
    $urediId = $_POST["urediId"];
    $nazivLutrije = $_POST["nazivLutrije"];
    $moderatori = [];
    if (isset($_POST["moderatori"])) {
        foreach ($_POST["moderatori"] as $moderator) {
            array_push($moderatori, $moderator);
        }
    }
    $veza = new Baza();
    $veza->spojiDB();
    $veza->updateLutrija($urediId, $nazivLutrije, $moderatori);
    $veza->zatvoriDB();
}

$veza = new Baza();
$veza->spojiDB();
$upit = "SELECT * FROM lutrija_2;";
$rezultat = $veza->selectDB($upit);
$lutrije = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($lutrije, $red);
}
$upit = "SELECT * FROM korisnik WHERE tip_korisnika_id < 3;";
$rezultat = $veza->selectDB($upit);
$moderatori = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($moderatori, $red);
}
$veza->zatvoriDB();
$smarty->assign("lutrije",$lutrije);
$smarty->assign("moderatori",$moderatori);

$smarty->display('zaglavlje.tpl');
$smarty->display('index.tpl');
$smarty->display('podnozje.tpl');
