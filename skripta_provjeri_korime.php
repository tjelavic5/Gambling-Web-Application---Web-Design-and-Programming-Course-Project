<?php

require './osnovno.php';

$baza = new Baza();
$baza->spojiDB();
if (isset($_GET['korime'])) {
    $korime = $_GET['korime'];
    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
    $rez = $baza->selectDB($sql);
    $rez_array = mysqli_fetch_array($rez);
    
    $return;
    if (!empty($rez_array)) {
        $return = "no";
    }
    if (empty($rez_array)) {
        $return = "ok";
    }
    
    echo json_encode($return);
}
$baza->zatvoriDB();