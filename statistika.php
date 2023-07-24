<?php

require 'osnovno.php';

//ako nije registriran
if(!(isset($_SESSION["uloga"]))){
    header("Location: index.php");
    exit();
}

//dohvacanje korisnika
$veza = new Baza();
$veza->spojiDB();
$upit = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}';";
$rezultat = $veza->selectDB($upit);
$red = mysqli_fetch_array($rezultat);
$korisnik_id = $red[0];

//dohvacanje dobitne statistike
$upit = "SELECT i.naziv AS naziv_igre, l.status, COUNT(l.listic_id) AS broj FROM listic l LEFT JOIN kolo k ON l.kolo_id = k.kolo_id " . 
        "LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id LEFT JOIN igra i ON p.igra_id = i.igra_id " . 
        "WHERE l.korisnik_id = '{$korisnik_id}' AND (l.status = 'DOBITAN' OR l.status = 'ISPLACEN') GROUP BY naziv_igre";
$rezultat = $veza->selectDB($upit);
$dobitni = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($dobitni, $red);
}
$smarty->assign("dobitni", $dobitni);

//dohvacanje nedobitne statistike
$upit = "SELECT i.naziv AS naziv_igre, l.status, COUNT(l.listic_id) AS broj FROM listic l LEFT JOIN kolo k ON l.kolo_id = k.kolo_id " . 
        "LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id LEFT JOIN igra i ON p.igra_id = i.igra_id " . 
        "WHERE l.korisnik_id = '{$korisnik_id}' AND l.status = 'NIJE_DOBITAN' GROUP BY naziv_igre";
$rezultat = $veza->selectDB($upit);
$nedobitni = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($nedobitni, $red);
}
$smarty->assign("nedobitni", $nedobitni);

//dohvacanje igara
$upit = "SELECT DISTINCT i.naziv AS naziv_igre FROM listic l LEFT JOIN kolo k ON l.kolo_id = k.kolo_id " . 
        "LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id LEFT JOIN igra i ON p.igra_id = i.igra_id " . 
        "WHERE l.korisnik_id = '{$korisnik_id}'";
$rezultat = $veza->selectDB($upit);
$igre = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($igre, $red);
}
$smarty->assign("igre", $igre);

//dohvacanje statistike za moderatora
$upit = "SELECT i.naziv AS naziv_igre, COUNT(d.dobitni_broj_id) AS broj_ponavljanja, d.broj FROM dobitni_broj d " . 
        "LEFT JOIN kolo k ON d.kolo_id = k.kolo_id LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id " . 
        "LEFT JOIN igra i ON p.igra_id = i.igra_id GROUP BY d.broj, naziv_igre ORDER BY broj_ponavljanja DESC";
$rezultat = $veza->selectDB($upit);
$brojevi = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($brojevi, $red);
}
$smarty->assign("brojevi", $brojevi);
$upit = "SELECT naziv AS naziv_igre FROM igra";
$rezultat = $veza->selectDB($upit);
$sveIgre = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($sveIgre, $red);
}
$smarty->assign("sveIgre", $sveIgre);

$veza->zatvoriDB();

$smarty->display('zaglavlje.tpl');
$smarty->display('statistika.tpl');
$smarty->display('podnozje.tpl');