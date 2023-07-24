<?php

require 'osnovno.php';
ob_start();

$smarty->display("zaglavlje.tpl");
if (isset($_POST['registracija'])) {
    $korime = $_POST['korisnickoIme'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];
    $lozinka_pon = $_POST['lozinkaPonovljena'];
    $uvjeti = $_POST['uvjeti'];
    ob_start();
    $greska = "ne prolazi validacija";
    //$greska = null;
    if (valdijacijaEmail($email) && valdijacijaKorime($korime) && valdijacijaIme($ime) && valdijacijaPrezime($prezime, $ime) && validacijaLozinka($lozinka) && validacijaPonovljenaLozinka($lozinka, $lozinka_pon)) {
        $greska = null;
        fb("prosla vbalidacija");
        $tekst = "Uspjele validacije";
        $radnja = "Registracija";
        $upit = "-";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    }
    if ($greska == null) {
        if ($uvjeti == "true") {
            setcookie('uvjeti_koristenja', $korime, time() + (86400 * 2), "/");
        }
        fb("greska null");
        $sol = generirajRandomString(20);
        $lozinka_hash = hash('sha256', $sol . $lozinka);
        $datum_reg = date('Y-m-d H:i:s');
        $datum_reg = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $datum_reg)));
        $aktivacijski_kod = generirajRandomString(50);
        $sql = "INSERT INTO `korisnik`(`ime`, `prezime`, `korisnicko_ime`, `email`, `tip_korisnika_id`, `lozinka`,`lozinka_sha256`,`sol`, `aktivacijski_kod`, `status`, `broj_krivih_lozinki`,`datum_registracije`) VALUES ("
                . "'{$ime}','{$prezime}','{$korime}','{$email}',3,'{$lozinka}','{$lozinka_hash}','{$sol}','{$aktivacijski_kod}','NOVI',0,'{$datum_reg}')";
        $baza = new Baza();
        $baza->spojiDB();
        $rez = $baza->updateDB($sql);

        $link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/skripta_aktivacija.php?kod=" . $aktivacijski_kod;
        $toEmail = $email;
        $subject = "Aktivacija racuna";
        $content = "Kliknite na link za aktivaciju:" . $link;
        $mailHeaders = "From: Admin\r\n";
        $tekst = "Registracija korisnika uspjela";
        $radnja = "Registracija";

        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
            $type = "success";
            fb($type);
            echo "Poslan je aktivacijski kod na email adresu " . $email;
            $tekst = "Registracija korisnika - poslan mail za aktivaciju";
            $radnja = "Registracija";

            $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
        } else {
            $tekst = "Registracija korisnika - slanje maila neuspješno";
            $radnja = "Registracija";

            $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
        }
    } else {
        $tekst = "Registracija korisnika - neuspješna";
        $radnja = "Registracija";

        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
        echo "Registracija neuspješna";
    }
}

$smarty->display("podnozje.tpl");

function valdijacijaKorime($korime) {
    $regex = "/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){2,18}[a-zA-Z0-9]$/";
    $regex_res = preg_match($regex, $korime);

    if (!$regex_res)
        return false;
    //echo "proso regex";
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
    $rez = $baza->selectDB($sql);
    $rez_array = mysqli_fetch_array($rez);
    $baza->zatvoriDB();
    if (!empty($rez_array)) {

        return false;
    }
    if (empty($rez_array)) {
        return true;
    }


    return false;
}

function valdijacijaIme($ime) {
    $regex = "/^\w+@\w+.\w{2,20}$/";
    $regex_res = preg_match($regex, $ime);
    $regex1 = "/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){0,20}[a-zA-Z0-9]$/";
    $regex_res1 = preg_match($regex1, $ime);
    if (!$regex_res && $regex_res1 && $ime != "Boris") {
        return true;
    }
    fb("ime");
    return false;
}

function valdijacijaPrezime($prezime, $ime) {
    $regex = "/^[a-z ,.'-]+$/i";
    $regex_res = preg_match($regex, $prezime);
    if ($regex_res && $prezime != $ime) {
        return true;
    }
    fb("prezime");
    return false;
}

function valdijacijaEmail($email) {
    $regex = "/^\w+@\w+.\w{1,10}$/";
    $regex_res = preg_match($regex, $email);
    if ($regex_res) {
        return true;
    }
    fb("mail");
    return false;
}

function validacijaLozinka($lozinka) {
    $regex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,20}$/";
    $regex_res = preg_match($regex, $lozinka);
    if ($regex_res) {
        return true;
    }
    fb("lozinka");
    return false;
}

function validacijaPonovljenaLozinka($lozinka, $ponovljena) {
    if ($lozinka === $ponovljena)
        return true;

    fb("Ponovljena lozinka");
    return false;
}

function generirajRandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
