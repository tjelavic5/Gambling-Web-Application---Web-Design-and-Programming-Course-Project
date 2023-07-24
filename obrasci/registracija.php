
<?php

include '../baza.class.php';
include '../vanjske_biblioteke/smarty/libs/Smarty.class.php';

$baza = new Baza();
$baza->spojiDB();
$korisnicko_ime_postoji = null;
$ima_gresaka = false;
$poruke = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $sql = 'SELECT * FROM DZ4_korisnik WHERE id = "' . $id . '"';
    $res = $baza->selectDB($sql);
    $korisnik = $res->fetch_assoc();
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    if ($korisnik['korisnicko_ime'] != $korisnicko_ime || $korisnik['lozinka'] != $lozinka) {
        echo json_encode(['status' => 'error', 'poruka' => 'Netočni podaci']);
        exit;
    } else {
        echo json_encode(['status' => 'success', 'poruka' => 'Točni podaci']);
        exit;
    }
}

if (!empty($_GET) && isset($_GET['korisnicko_ime'])) {

    if (!isset($_GET['id'])) {

        $korisnicko_ime = $_GET['korisnicko_ime'];

        $sql = 'SELECT * FROM DZ4_korisnik WHERE korisnicko_ime = "' . $korisnicko_ime . '"';
        $res = $baza->selectDB($sql);

        if (!isset($_GET['id']) && $res->num_rows > 0) {
            $korisnicko_ime_postoji = true;
        } else {
            $korisnicko_ime_postoji = false;

        }
    }

    $datum_rodenja = $_GET['godina_rodenja'];
    $explode = explode('.', $datum_rodenja);
    if (count($explode) !== 3) {
        $poruke[] = 'Godina rođenja nije dobra';
        $ima_gresaka = true;
    } else {
        if (isset($explode[0])) {
            if (strlen($explode[0]) == 2) {
                if ($explode[0][0] >= 0 && $explode[0][0] < 4) {
                    if (strlen($explode[1]) == 2) {
                        if ($explode[1][0] >= 0 && $explode[1][0] < 2) {
                            $ima_gresaka = false;
                        } else {
                            $poruke[] = 'Prva znamenka mjeseca mora biti 0 ili 1';
                            $ima_gresaka = true;
                        }
                    } else {
                        $poruke[] = 'Mjesec rođenja nije dobar';
                        $ima_gresaka = true;
                    }
                } else {
                    $poruke[] = 'Prva znamenka dana mora biti između 0 i 3';
                    $ima_gresaka = true;
                }
            } else {
                $poruke[] = 'Dan rođenja nije dobar.';
                $ima_gresaka = true;
            }
        }
    }

    $kolacici = '';
    if (!isset($_GET['kolacici'])) {
        $ima_gresaka = true;
        $poruke[] = 'Mora biti barem jedna opcija korištenja kolačića.';
    } else {
        $kolacici = implode(',', $_GET['kolacici']);
    }

    $lozinka = $_GET['lozinka'];
    $korisnicko_ime = $_GET['korisnicko_ime'];
    $ime = $_GET['ime_prezime'];
    $email = $_GET['email'];
    $lozinka_hash = hash('sha256', $lozinka . 'tjelavic' . time());;
    $uloga = 'KORISNIK';
    $broj_prijava = 0;

    if (!$ima_gresaka) {
        $datum_rodenja = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        if (isset($_GET['id'])) {
            $sql = "UPDATE DZ4_korisnik SET ime = '".$ime."', datum_rodenja = '".$datum_rodenja."', email = '". $email . "' WHERE id = " . $_GET['id'];
            $baza->updateDB($sql);
            $poruke[] = 'Korisnik pod ID-om ' . $_GET['id'] . ' je uspješno ažuriran.';
        } else {
            $sql = "INSERT INTO DZ4_korisnik (ime, korisnicko_ime, lozinka, lozinka_hash, uloga, broj_prijava, datum_rodenja, kolacici) VALUES('".$ime."', '".$korisnicko_ime."', '".$lozinka."', '".$lozinka_hash."', '".$uloga."', '".$broj_prijava."', '".$datum_rodenja."', '".$kolacici."')";
            $baza->updateDB($sql);
        }
    }


}
$korisnik_editiranje = [];
if (isset($_GET['id'])) {
    $sql = 'SELECT * FROM DZ4_korisnik WHERE id = "' . $_GET['id'] . '"';
    $res = $baza->selectDB($sql);
    $korisnik_editiranje = $res->fetch_assoc();
    $korisnik_editiranje['datum_rodenja'] = date('d.m.Y', strtotime($korisnik_editiranje['datum_rodenja']));
}

$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../vanjske_biblioteke/smarty/templates_c/');
$smarty->setCacheDir('../vanjske_biblioteke/smarty/cache/');
$smarty->setConfigDir('../vanjske_biblioteke/smarty/configs/');


$smarty->assign('korisnik_editiranje', $korisnik_editiranje);
$smarty->assign('poruke', $poruke);
$smarty->assign('korisnicko_ime_postoji', $korisnicko_ime_postoji);
$smarty->assign('metoda', isset($_GET['id']) ? 'edit' : 'registracija');

$smarty->display('registracija.tpl');