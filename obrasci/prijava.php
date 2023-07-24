<?php
session_start();
include '../baza.class.php';
include '../vanjske_biblioteke/smarty/libs/Smarty.class.php';

$baza = new Baza();
$baza->spojiDB();

if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
if(isset($_GET['odjava'])) {
    unset($_SESSION['korisnik']);
    session_destroy();
    header('Location: prijava.php');
    exit;
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $zapamti_me = isset($_POST['zapamti_me']) ? 'Y' : 'N';

    $sql = 'SELECT * FROM DZ4_korisnik WHERE korisnicko_ime = "' . $korisnicko_ime . '"';
    $res = $baza->selectDB($sql);
    if (!empty($res) && $res->num_rows == 1) {
        $korisnik = $res->fetch_assoc();
        if ($korisnik['broj_prijava'] >= 5) {
            header("Content-type: text/xml;charset=utf-8");
            $return = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
            $return .= '<return>';
            $return .= '<status>error</status>';
            $return .= '<poruka>Korisnički račun je blokiran</poruka>';
            $return .= '</return>';
            echo $return;
            exit;
        } else {
            if ($korisnik['lozinka'] != $lozinka) {
                $sql = 'UPDATE DZ4_korisnik SET broj_prijava = broj_prijava + 1 WHERE korisnicko_ime = "' . $korisnicko_ime . '"';
                $baza->updateDB($sql);
                header("Content-type: text/xml;charset=utf-8");
                $return = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
                $return .= '<return>';
                $return .= '<status>error</status>';
                $return .= '<poruka>Lozinka nije ispravna. Pokušajte ponovo! Broj preostalih pokušaja je ' . (5 - $korisnik['broj_prijava'] - 1) . '</poruka>';
                $return .= '</return>';
                echo $return;
                exit;

            } else {
                $sql = 'UPDATE DZ4_korisnik SET broj_prijava = 0 WHERE korisnicko_ime = "' . $korisnicko_ime . '"';
                $baza->updateDB($sql);
                $korisnik['broj_prijava'] = 0;
                $_SESSION['korisnik'] = $korisnik;

                if ($zapamti_me == 'Y' && strpos($korisnik['kolacici'], 'ZAPAMTI_ME') !== false) {
                    setcookie('korisnicko_ime', $korisnik['korisnicko_ime'], 600 * 60 * 60 * 60);
                }

                header("Content-type: text/xml;charset=utf-8");
                $return = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
                $return .= '<return>';
                $return .= '<status>success</status>';
                $return .= '</return>';
                echo $return;
                exit;
            }
        }
    } else {
        header("Content-type: text/xml;charset=utf-8");
        $return = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
        $return .= '<return>';
        $return .= '<status>error</status>';
        $return .= '<poruka>Ne postoji korisnik s tim korisničim imenom</poruka>';
        $return .= '</return>';
        echo $return;
        exit;
    }
}

$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../vanjske_biblioteke/smarty/templates_c/');
$smarty->setCacheDir('../vanjske_biblioteke/smarty/cache/');
$smarty->setConfigDir('../vanjske_biblioteke/smarty/configs/');

$smarty->assign('cookie_korisnicko', isset($_COOKIE['korisnicko_ime']) ? $_COOKIE['korisnicko_ime'] : '');

$smarty->display('prijava.tpl');