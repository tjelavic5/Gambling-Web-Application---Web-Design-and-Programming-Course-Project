<?php
/* Smarty version 4.1.0, created on 2022-06-21 20:33:07
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b20ee3b15008_63949280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02c34ab1730241cacc829b4d322ad240ca956577' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/zaglavlje.tpl',
      1 => 1655836383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b20ee3b15008_63949280 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title>Početna stranica</title>
        <meta charset="UTF-8">
        <meta name="author" content="Tea Jelavić">
        <meta name="date" content="06.06.2022">
        <meta name="fakultet" content="FOI">
        <meta name="kolegij" content="WebDiP">
        <meta name="zadatak" content="Projekt">
        <meta name="opis" content="Igre na sreću">
        <link href="Dizajn/CSS/main.css" type="text/css" rel="stylesheet">
        
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    </head>
    
    
    <body>
         <nav>
            <a href='index.php'>Početna stranica</a>
            <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] == 1) {?>
                <a href='administracija.php'>Administracija</a>
                <a href='igre_na_srecu.php'>Igre na sreću</a>
            <?php }?>
            <?php if (!(isset($_SESSION['uloga']))) {?>
                <a href='prijava.php'>Prijava</a>
                <a href='registracija.php'>Registracija</a>
            <?php }?>
            <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2) {?>
                <a href='rezultati.php'>Rezultati</a>
            <?php }?>
            <a href='galerija.php'>Galerija</a>
            <?php if ((isset($_SESSION['uloga']))) {?>
                <a href='moji_listici.php'>Moji listići</a>
                <a href='statistika.php'>Statistika</a>
                <a href='odjava.php'>Odjava</a>
            <?php }?>
        </nav>
        
<?php }
}
