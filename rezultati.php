<?php
require 'osnovno.php';

if(!(isset($_SESSION["uloga"]) && $_SESSION["uloga"] < 3)){
    header("Location: index.php");
    exit();
}

//dohvat zatvorenih kola koja nisu izvucena
$veza = new Baza();
$veza->spojiDB();
$upit = "SELECT * FROM kolo WHERE status = '1' AND kolo_id NOT IN (SELECT kolo_id FROM dobitni_broj);";
$rezultat = $veza->selectDB($upit);
$kolaZaIzvlacenje = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($kolaZaIzvlacenje, $red);
}
$smarty->assign("kolaZaIzvlacenje",$kolaZaIzvlacenje);

//dohvat zahtjeva za isplatu
$upit = "SELECT z.zahtjev_id, ko.ime, ko.prezime, i.naziv AS naziv_igre, k.naziv AS naziv_kola, k.vrijeme_isplate, z.iznos, z.status, i.igra_id, " . 
        "k.kolo_id, l.listic_id FROM zahtjev z LEFT JOIN listic l ON z.listic_id = l.listic_id LEFT JOIN kolo k ON l.kolo_id = k.kolo_id " . 
        "LEFT JOIN korisnik ko ON l.korisnik_id = ko.korisnik_id LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id " . 
        "LEFT JOIN igra i ON p.igra_id = i.igra_id";
$rezultat = $veza->selectDB($upit);
$zahtjevi = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($zahtjevi, $red);
}
$upit2 = "SELECT DISTINCT naziv_igre, igra_id FROM ({$upit}) AS medjurezultat;";
$rezultat = $veza->selectDB($upit2);
$igre = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($igre, $red);
}
$upit2 = "SELECT DISTINCT naziv_kola, kolo_id, igra_id FROM ({$upit}) AS medjurezultat;";
$rezultat = $veza->selectDB($upit2);
$kola = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($kola, $red);
}
$smarty->assign("zahtjevi", $zahtjevi);
$smarty->assign("igre",$igre);
$smarty->assign("kola",$kola);

$veza->zatvoriDB();

//izvlacenje random brojeva
if(isset($_POST["generiraj"])){
    $pocetniBroj = $_POST["pocetniBroj"];
    $zavrsniBroj = $_POST["zavrsniBroj"];
    $koloId = $_POST["kolo"];
    
    //dohvacanje koliko brojeva je potrebno izvuci
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT i.broj_izvlacenja FROM kolo k LEFT JOIN pridruzena_igra p ON k.igra_id = p.pridruzena_igra_id " .
            "LEFT JOIN igra i ON p.igra_id = i.igra_id WHERE k.kolo_id = '{$koloId}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $brojIzvlacenja = $red[0];
    
    $randomBrojevi = array();
    for ($i = 0; $i < $brojIzvlacenja; $i++){
        while(in_array($randomBroj = rand($pocetniBroj, $zavrsniBroj), $randomBrojevi)){
            
        }
        array_push($randomBrojevi, $randomBroj);
    }
    $veza->izvuciBrojeve($koloId, $randomBrojevi);
    $veza->zatvoriDB();
    header("Location: ./rezultati.php");
}

//prihvacanje zahtjeva
if(isset($_POST["prihvatiZahtjev"])){
    $zahtjevId = $_POST["zahtjevId"];
    $listicId = $_POST["listicId"];
    $vrijemeIsplate = $_POST["vrijemeIsplate"];
    $veza = new Baza();
    $veza->spojiDB();
    
    $today = time();
    
    $expire_time = strtotime($vrijemeIsplate);
    if ($expire_time < $today) {
        echo"<script>alert('Prošlo je vrijeme isplate!')</script>";
    }
    else{
        $veza = new Baza();
        $veza->spojiDB();
        $veza->potvrdiIsplatu($zahtjevId, $listicId);
        header("Location: ./rezultati.php");
    }
    
    $veza->zatvoriDB();
}

//odbijanje zahtjeva
if(isset($_POST["odbijZahtjev"])){
    $zahtjevId = $_POST["zahtjevId"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->odbijIsplatu($zahtjevId);
    $veza->zatvoriDB();
    header("Location: ./rezultati.php");
}


$smarty->display('zaglavlje.tpl');
$smarty->display('rezultati.tpl');
$smarty->display('podnozje.tpl');