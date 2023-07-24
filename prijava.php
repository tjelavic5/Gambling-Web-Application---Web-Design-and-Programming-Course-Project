<?php

require 'osnovno.php';

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    //header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    $tekst = "Protokol je redirectan na HTTPS";
    $radnja = "HTTPS redirect";
    $upit = "-";
    $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
    exit;
}

if(isset($_COOKIE["korime"])){
    $smarty->assign("zapamtiMe",$_COOKIE["korime"]);
    $tekst = "Učitan cookie kod prijave";
    $radnja = "Kolacic";
    $upit = "-";
    $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
}

$smarty->display('zaglavlje.tpl');
$smarty->display('prijava.tpl');
$smarty->display('podnozje.tpl');

