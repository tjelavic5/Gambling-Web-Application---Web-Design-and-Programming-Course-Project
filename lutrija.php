<?php

require 'osnovno.php';

//ako nije registriran
if(!(isset($_SESSION["uloga"]))){
    header("Location: index.php");
    exit();
}

if (isset($_GET["lutrija_id"])) {
    $lutrija_id = $_GET["lutrija_id"];
    $veza = new Baza();
    $veza->spojiDB();
    
    //dohvaca naziv lutrije
    $upit = "SELECT naziv_lutrije FROM lutrija_2 WHERE lutrija_id = '{$lutrija_id}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $smarty->assign("naziv_lutrije",$red['naziv_lutrije']);
    $smarty->assign("lutrija_id",$lutrija_id);
    
    //dohvaca je li prijavljeni korisnik moderator te lutrije
    $upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $upit = "SELECT COUNT(*) FROM moderator_lutrije WHERE lutrija_id = '{$lutrija_id}' AND korisnik_id = '{$red["korisnik_id"]}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $smarty->assign("moderator_lutrije", $red[0]); //moderator_lutrije = 1 ako je korisnik moderator te lutrije
    
    //dohvaca moguce igre
    $upit = "SELECT * FROM igra;";
    $rezultat = $veza->selectDB($upit);
    $igre = array();
    while ($red = mysqli_fetch_array($rezultat)) {
        array_push($igre, $red);
    }
    $smarty->assign("igre",$igre);
    
    //dohvaca pridruzene igre
    $upit = "SELECT * FROM pridruzena_igra LEFT JOIN igra on pridruzena_igra.igra_id = igra.igra_id WHERE lutrija_id = '{$lutrija_id}'";
    $rezultat = $veza->selectDB($upit);
    $pridruzeneIgre = array();
    while ($red = mysqli_fetch_array($rezultat)) {
        array_push($pridruzeneIgre, $red);
    }
    $smarty->assign("pridruzeneIgre",$pridruzeneIgre);
    
    //dohvaca kola
    $upit = "SELECT * FROM kolo LEFT JOIN pridruzena_igra ON kolo.igra_id = pridruzena_igra.pridruzena_igra_id " . 
            "WHERE pridruzena_igra.lutrija_id = '{$lutrija_id}';";
    $rezultat = $veza->selectDB($upit);
    $kola = array();
    while ($red = mysqli_fetch_array($rezultat)) {
        array_push($kola, $red);
    }
    $smarty->assign("kola",$kola);
    
    $veza->zatvoriDB();
} else {
    header("Location: ./index.php");
    exit();
}

//ako kliknuto na gumb Dodaj
if(isset($_POST["dodavanjeIgre"])){
    $smarty->assign("dodavanjeIgre",$_POST["dodavanjeIgre"]);
    $smarty->assign("naziv",$_POST["naziv"]);
    $smarty->assign("igra_id",$_POST["igra_id"]);
}

//ako kliknuto na gumb Dodaj igru
if (isset($_POST["dodajIgru"])) {
    $vrijemeOd = $_POST["vrijemeOd"];
    $vrijemeDo = $_POST["vrijemeDo"];
    $cijenaListica = $_POST["cijenaListica"];
    $igraId = $_POST["igraId"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->pridruziIgru($lutrija_id, $igraId, $vrijemeOd, $vrijemeDo, $cijenaListica);
    $veza->zatvoriDB();
    header("Location: ./lutrija.php?lutrija_id={$lutrija_id}");
}

//ako kliknuto na gumb Uredi igru
if(isset($_POST["urediIgru"])){
    $smarty->assign("urediIgru",$_POST["urediIgru"]);
    $smarty->assign("pridruzena_igra_id",$_POST["pridruzena_igra_id"]);
    $smarty->assign("naziv",$_POST["naziv"]);
    //YYYY-MM-DDThh:mm
    $smarty->assign("vrijeme_pocetka",$_POST["vrijeme_pocetka"]);
    $smarty->assign("vrijeme_zavrsetka",$_POST["vrijeme_zavrsetka"]);
    $smarty->assign("cijena_listica",$_POST["cijena_listica"]);
}

//azuriranje pridruzene igre
if (isset($_POST["azurirajIgru"])) {
    $urediId = $_POST["pridruzena_igra_id"];
    $vrijemeOd = $_POST["vrijemeOd"];
    $vrijemeDo = $_POST["vrijemeDo"];
    $cijenaListica = $_POST["cijenaListica"];
    $veza = new Baza();
    $veza->spojiDB();
    $veza->updatePridruzenaIgra($urediId, $vrijemeOd, $vrijemeDo, $cijenaListica);
    $veza->zatvoriDB();
    header("Location: ./lutrija.php?lutrija_id={$lutrija_id}");
}

//ako kliknuto na gumb Dodaj kolo
if(isset($_POST["dodavanjeKola"])){
    $smarty->assign("dodavanjeKola",$_POST["dodavanjeKola"]);
    $smarty->assign("pridruzena_igra_id",$_POST["pridruzena_igra_id"]);
}

//dodavanje kola
if (isset($_POST["dodajKolo"])) {
    $nazivKola = $_POST["nazivKola"];
    $vrijemeIsplate = $_POST["vrijemeIsplate"];
    $status = $_POST["status"];
    $pridruzena_igra_id = $_POST["pridruzena_igra_id"];
    $veza = new Baza();
    $veza->spojiDB();
    
    //vidit jel vec otvoreno neko kolo ove igre
    if($status == "0"){
        $upit = "SELECT COUNT(*) FROM kolo WHERE status = 0 AND igra_id = '{$pridruzena_igra_id}';";
        $rezultat = $veza->selectDB($upit);
        $red = mysqli_fetch_array($rezultat);
    }
    if(!($status == "0" && $red[0] > 0)){
        $veza->dodajKolo($pridruzena_igra_id, $nazivKola, $vrijemeIsplate, $status);
        $veza->zatvoriDB();
        header("Location: ./lutrija.php?lutrija_id={$lutrija_id}");
    }
    else{
        $poruka = "Već postoji otvoreno kolo!";
        $smarty->assign("poruka",$poruka);
        $veza->zatvoriDB();
    }
}

//ako kliknuto na gumb Uredi kolo
if(isset($_POST["uredjivanjeKola"])){
    $smarty->assign("uredjivanjeKola",$_POST["uredjivanjeKola"]);
    $smarty->assign("kolo_id",$_POST["kolo_id"]);
    $smarty->assign("naziv",$_POST["naziv"]);
    $smarty->assign("vrijeme_isplate",$_POST["vrijeme_isplate"]);
    $smarty->assign("status",$_POST["status"]);
}

//azuriranje kola
if(isset($_POST["urediKolo"])){
    $kolo_id = $_POST["kolo_id"];
    $naziv = $_POST["nazivKola"];
    $vrijeme_isplate = $_POST["vrijemeIsplate"];
    $status = $_POST["status"];
    $veza = new Baza();
    $veza->spojiDB();
    
    //vidit jel vec otvoreno neko kolo ove lutrije
    if($status == "0"){
        $upit = "SELECT COUNT(*) FROM kolo WHERE status = 0 AND kolo_id <> '{$kolo_id}';";
        $rezultat = $veza->selectDB($upit);
        $red = mysqli_fetch_array($rezultat);
    }
    
    if(!($status == "0" && $red[0] > 0)){
        $veza->updateKolo($kolo_id, $naziv, $vrijeme_isplate, $status);
        $veza->zatvoriDB();
        header("Location: ./lutrija.php?lutrija_id={$lutrija_id}");
    }
    else{
        $poruka = "Već postoji otvoreno kolo!";
        $smarty->assign("poruka",$poruka);
        $veza->zatvoriDB();
    }
}

$smarty->display('zaglavlje.tpl');
$smarty->display('lutrija.tpl');
$smarty->display('podnozje.tpl');