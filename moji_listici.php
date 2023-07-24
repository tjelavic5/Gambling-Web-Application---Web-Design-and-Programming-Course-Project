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

//dohvacanje listica koji su u igri
$upit = "SELECT * FROM listic l LEFT JOIN kolo k ON l.kolo_id = k.kolo_id LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id " . 
        "LEFT JOIN igra i ON p.igra_id = i.igra_id WHERE korisnik_id = '{$korisnik_id}' AND l.status = 'NIJE_ODIGRAN';";
$rezultat = $veza->selectDB($upit);
$listiciUIgri = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($listiciUIgri, $red);
}
$smarty->assign("listiciUIgri",$listiciUIgri);

//dohvacanje svih brojeva
$upit = "SELECT * FROM broj;";
$rezultat = $veza->selectDB($upit);
$sviOdigraniBrojevi = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($sviOdigraniBrojevi, $red);
}
$smarty->assign("sviOdigraniBrojevi",$sviOdigraniBrojevi);

//dohvacanje svojih listica
$upit = "SELECT * FROM listic WHERE korisnik_id = '{$korisnik_id}';";
$rezultat = $veza->selectDB($upit);
$listici = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($listici, $red);
}
$smarty->assign("listici",$listici);

//dohvacanje odigranih listica
$upit = "SELECT i.naziv AS naziv_igre, i.igra_id as igra_id, k.naziv as naziv_kola, k.kolo_id as kolo_id, l.listic_id as listic_id, " . 
        "l.status as status, (SELECT COUNT(*) FROM broj b WHERE b.listic_id = l.listic_id AND b.broj IN " . 
        "(SELECT broj FROM dobitni_broj db WHERE db.kolo_id = k.kolo_id)) as broj_pogodaka, " . 
        "(SELECT f.iznos FROM fond_dobitaka f WHERE i.igra_id = f.igra_id AND f.broj_pogodenih_brojeva = broj_pogodaka) AS dobitak FROM kolo k " . 
        "INNER JOIN listic l ON k.kolo_id = l.kolo_id LEFT JOIN pridruzena_igra p ON p.pridruzena_igra_id = k.igra_id " . 
        "LEFT JOIN igra i ON p.igra_id = i.igra_id WHERE l.korisnik_id = '{$korisnik_id}' AND l.status <> 'NIJE_ODIGRAN' " . 
        "ORDER BY igra_id, kolo_id, listic_id";
$rezultat = $veza->selectDB($upit);
$odigraniListici = array();
while ($red = mysqli_fetch_array($rezultat)) {
    array_push($odigraniListici, $red);
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

$smarty->assign("odigraniListici",$odigraniListici);
$smarty->assign("igre",$igre);
$smarty->assign("kola",$kola);

$veza->zatvoriDB();


//ako kliknuto na uredjivanje
if(isset($_POST["urediListic"])){
    $urediListic = $_POST["urediListic"];
    $listicId = $_POST["listicId"];
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT * FROM listic WHERE listic_id = '{$listicId}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $smarty->assign("telefon", $red["telefon"]);
    $smarty->assign("email", $red["email"]);
    $smarty->assign("adresa", $red["adresa"]);
    $smarty->assign("listicId", $listicId);
    $upit = "SELECT * FROM broj WHERE listic_id = '{$listicId}';";
    $rezultat = $veza->selectDB($upit);
    $urediBrojevi = array();
    while ($red = mysqli_fetch_array($rezultat)) {
        array_push($urediBrojevi, $red["broj"]);
    }
    $smarty->assign("urediBrojevi", $urediBrojevi);
    $smarty->assign("urediListic", $urediListic);
    $veza->zatvoriDB();
}


//azuriranje listica
if(isset($_POST["azurirajListic"])){
    $listicId = $_POST["listicId"];
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $brojevi = array();
    foreach ($_POST["brojevi"] as $broj){
        array_push($brojevi, $broj);
    }
    
    $veza = new Baza();
    $veza->spojiDB();
    
    $veza->updateListic($listicId, $brojevi, $telefon, $email, $adresa);
    $veza->zatvoriDB();
    header("Location: ./moji_listici.php");
    exit();
}

//slanje zahtjeva za isplatu
if(isset($_POST["posaljiZahtjev"])){
    $listicId = $_POST["listicId"];
    $iznos = $_POST["iznos"];
    $veza = new Baza();
    $veza->spojiDB();
    
    $veza->posaljiZahtjev($listicId, $iznos);
    $veza->zatvoriDB();
}


$smarty->display('zaglavlje.tpl');
$smarty->display('moji_listici.tpl');
$smarty->display('podnozje.tpl');