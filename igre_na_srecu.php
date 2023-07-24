<?php

require 'osnovno.php';

if(!(isset($_SESSION["uloga"]) && $_SESSION["uloga"] < 3)){
    header("Location: index.php");
    exit();
}

if (isset($_POST["dodajIgru"])) {
    $nazivIgre = $_POST["nazivIgre"];
    $brojIzvlacenja = $_POST["brojIzvlacenja"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->insertIgra($nazivIgre, $brojIzvlacenja);
    $veza->zatvoriDB();
}

//ako kliknuto na gumb Uredi
if(isset($_POST["urediIgru"])){
    $smarty->assign("urediIgru",$_POST["urediIgru"]);
    $smarty->assign("urediNaziv",$_POST["urediNaziv"]);
    $smarty->assign("urediId",$_POST["urediId"]);
    $smarty->assign("urediBroj",$_POST["urediBroj"]);
}

//ako kliknuto na gumb Dodaj fond
if(isset($_POST["dodavanjeFonda"])){
    $smarty->assign("dodavanjeFonda",$_POST["dodavanjeFonda"]);
    $smarty->assign("urediNaziv",$_POST["urediNaziv"]);
    $smarty->assign("urediId",$_POST["urediId"]);
}

//ako kliknuto na Spremi promjene
if (isset($_POST["azurirajIgru"])) {
    $urediId = $_POST["urediId"];
    $nazivIgre = $_POST["nazivIgre"];
    $brojIzvlacenja = $_POST["brojIzvlacenja"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->updateIgra($urediId, $nazivIgre, $brojIzvlacenja);
    $veza->zatvoriDB();
}

//ako kliknuto na Dodaj
if (isset($_POST["dodajFond"])) {
    $urediId = $_POST["urediId"];
    $brojPogodaka = $_POST["brojPogodaka"];
    $iznos = $_POST["iznos"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->insertFond($urediId, $brojPogodaka, $iznos);
    $veza->zatvoriDB();
}

//dohvacanje igara
$veza = new Baza();
$veza->spojiDB();
$upit = "SELECT * FROM igra;";
$rezultat = $veza->selectDB($upit);
$igre = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($igre, $red);
}
$upit = "SELECT * FROM fond_dobitaka ORDER BY broj_pogodenih_brojeva ASC;";
$rezultat = $veza->selectDB($upit);
$fondovi = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($fondovi, $red);
}
$veza->zatvoriDB();
$smarty->assign("igre", $igre);
$smarty->assign("fondovi", $fondovi);

$smarty->display('zaglavlje.tpl');
$smarty->display('igre_na_srecu.tpl');
$smarty->display('podnozje.tpl');