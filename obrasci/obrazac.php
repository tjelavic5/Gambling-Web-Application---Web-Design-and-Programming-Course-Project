<?php
session_start();
include '../baza.class.php';
include '../vanjske_biblioteke/smarty/libs/Smarty.class.php';

$baza = new Baza();
$baza->spojiDB();

if (!isset($_SESSION['korisnik'])) {
    header('Location: prijava.php');
    exit;
}

$redoslijed_greska = false;
$kategorija_greska = false;
$opis_greska = false;
$ucestalost_greska = false;
$boja_greska = false;
$stranica_greska = false;
$naziv_greska = false;
$vrijeme_greska = false;
$poruke = [];

$korisnik = $_SESSION['korisnik'];

if (isset($_GET['naziv'])) {
    $sql = "SELECT * FROM DZ4_obrazac WHERE naziv LIKE '%".$_GET['naziv']."%'";
    $res = $baza->selectDB($sql);
    if ($res->num_rows > 0) {
        echo json_encode(['status' => 'error', 'poruka' => 'Datoteka već postoji']);
        exit;
    } else {
        echo json_encode(['status' => 'success', 'poruka' => 'Sve u redu']);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kategorija = $_POST['kategorija'];
    $opis = $_POST['opis'];
    $ucestalost = $_POST['ucestalost'];
    $redoslijed = $_POST['redoslijed'];
    $boja = $_POST['boja'];
    $stranica = $_POST['url'];

    if (empty($redoslijed) || $redoslijed == -1) {
        $poruke[] = 'Redoslijed mora biti odabran';
        $redoslijed_greska = true;
    } else {
        if (strpos($korisnik['kolacici'], 'REDOSLIJED') !== false) {
            setcookie('redoslijed', $redoslijed, 600 * 60 * 60 * 60);
        }
    }

    $ext = '';
    if(isset($_FILES['naziv'])) {
        if($_FILES['naziv']['size'] > 1048576) {
            $poruke[] = 'Datoteka je prevelika';
            $naziv_greska = true;
        } else {
            $allowed = array('pdf', 'png', 'jpg', 'mp3', 'mp4');
            $filename = $_FILES['naziv']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $poruke[] = 'Datoteka nije ispravnog formata';
                $naziv_greska = true;
            }
        }
    } else {
        $poruke[] = 'Datoteka nije uploadana';
        $naziv_greska = true;
    }

    if (empty($opis)) {
        $poruke[] = 'Opis mora biti unesen';
        $opis_greska = true;
    }

    if (empty($kategorija)) {
        $poruke[] = 'Kategorija mora biti unesena';
        $kategorija_greska = true;
    }


    if (empty($stranica)) {
        $poruke[] = 'Stranica mora biti unesena';
        $stranica_greska = true;
    }

    if (empty($poruke)) {
        $folder = '../materijali/';
        $uploadfile = $folder . basename($_FILES['naziv']['name']);

        if (!move_uploaded_file($_FILES['naziv']['tmp_name'], $uploadfile)) {
            $poruke[] = 'Datoteka se nije uploadala';
            $naziv_greska = true;
        }
        $putanja = '/var/www/WebDiP/2021/zadaca_04/tjelavic/materijali/' . basename($_FILES['naziv']['name']);
        $sql = "INSERT INTO DZ4_obrazac (redoslijed, naziv, kategorija, opis, ucestalost, boja, stranica, ekstenzija) VALUES ('".$redoslijed."','".$putanja."','".$kategorija."','".$opis."','".$ucestalost."','".$boja."', '".$stranica."', '".$ext."')";
        $baza->updateDB($sql);
    }


}

$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../vanjske_biblioteke/smarty/templates_c/');
$smarty->setCacheDir('../vanjske_biblioteke/smarty/cache/');
$smarty->setConfigDir('../vanjske_biblioteke/smarty/configs/');

$smarty->assign('poruke', $poruke);
$smarty->assign('redoslijed_greska', $redoslijed_greska);
$smarty->assign('naziv_greska', $naziv_greska);
$smarty->assign('kategorija_greska', $kategorija_greska);
$smarty->assign('opis_greska', $opis_greska);
$smarty->assign('ucestalost_greska', $ucestalost_greska);
$smarty->assign('boja_greska', $boja_greska);
$smarty->assign('stranica_greska', $stranica_greska);
$smarty->assign('redoslijed', isset($_COOKIE['redoslijed']) ? $_COOKIE['redoslijed'] : '');

$smarty->display('obrazac.tpl');