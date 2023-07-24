<?php

require 'osnovno.php';

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $lozinka = generirajRandomString(8);

    $baza = new Baza();
    $baza->spojiDB();
    $upit = "SELECT * FROM korisnik WHERE email = '{$email}'";
    $rez = $baza->selectDB($upit);
    $rez_array = mysqli_fetch_assoc($rez);
    $sol = $rez_array["sol"];
    $lozinka_hash = hash('sha256', $sol . $lozinka);
    $upit = "UPDATE korisnik SET lozinka = '{$lozinka}', lozinka_sha256 = '{$lozinka_hash}' WHERE email = '{$email}'";
    $baza->updateDB($upit);
    $toEmail = $email;
    $subject = "Reset lozinke";
    $content = "Nopva lozinka:" . $lozinka;
    $mailHeaders = "From: Admin\r\n";
    if (mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
        $type = "success";
        fb($type);
        echo "Poslana je nova lozinka na email adresu " . $email;
        $tekst = "Poslana nova lozinka";
        $radnja = "Zaboravljena lozinka";
        $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    }
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
