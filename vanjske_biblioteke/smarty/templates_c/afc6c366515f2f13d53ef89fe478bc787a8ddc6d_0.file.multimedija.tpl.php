<?php
/* Smarty version 4.1.0, created on 2022-05-31 17:31:40
  from '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/multimedija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629634dc11aa79_20487267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afc6c366515f2f13d53ef89fe478bc787a8ddc6d' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/multimedija.tpl',
      1 => 1654011045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629634dc11aa79_20487267 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">
    <title>Multimedija</title>
    <link rel="stylesheet" href="css/tjelavic.css">
</head>
<body>
<header class="noprint">
    <div>
        <div class="header-logo">
            <a href="#navigacija">
                <img alt="navigation" src="materijali/navigation.png">
            </a>
        </div>

        <div class="header-logo">
            <a href="index.php">
                <img alt="logo" src="materijali/foi-logo.jpg" class="logo">
            </a>
        </div>
        <div class="header-tekst">
            <a href="#">
                <h1 class="stranica-naziv">Multimedija</h1>
            </a>
        </div>
    </div>
    <br>
    <div>
        <nav id="navigacija">
            <ul>
                <li><a href="index.php">Početna</a></li>
                <li><a href="obrasci/registracija.php">Registracija</a></li>
                <?php if ((isset($_SESSION['korisnik']))) {?>
                    <?php if ($_SESSION['korisnik']['uloga'] == 'KORISNIK') {?>
                        <li><a href="popis.php">Popis</a></li>
                        <li><a href="obrasci/obrazac.php">Obrazac</a></li>
                    <?php } elseif ($_SESSION['korisnik']['uloga'] == 'MODERATOR') {?>
                        <li><a href="popis.php">Popis</a></li>
                        <li><a href="obrasci/obrazac.php">Obrazac</a></li>
                        <li><a href="multimedija.php">Multimedija</a></li>
                    <?php } elseif ($_SESSION['korisnik']['uloga'] == 'ADMINISTRATOR') {?>
                        <li><a href="popis.php">Popis</a></li>
                        <li><a href="obrasci/obrazac.php">Obrazac</a></li>
                        <li><a href="multimedija.php">Multimedija</a></li>
                    <?php }?>
                    <li><a href="obrasci/prijava.php?odjavi=DA">Odjava</a></li>
                <?php } else { ?>
                    <li><a href="obrasci/prijava.php">Prijava</a></li>
                <?php }?>
                <li><a href="plan.html">Plan</a></li>
                <li><a href="testBrzine.html">Test brzine</a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="sadrzaj">
    <form id="forma-multimedija" class="forma" method="get" action="http://barka.foi.hr/WebDiP/2021/materijali/zadace/ispis_forme.php">
        <div class="form-item">
            <label for="trazi">Traži:</label>
            <input type="search" id="trazi" name="trazi">
        </div>

        <div class="submit-form">
            <input type="submit" value="Pošalji" class="submit">
        </div>
    </form>

    <br>
    <br>

    <div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['popis']->value, 'ekstenzija', false, 'key');
$_smarty_tpl->tpl_vars['ekstenzija']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['ekstenzija']->value) {
$_smarty_tpl->tpl_vars['ekstenzija']->do_else = false;
?>
        <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</legend>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ekstenzija']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div class="multimedija-item">
                    <p <?php if ($_smarty_tpl->tpl_vars['item']->value['redoslijed'] == 'vodoravno') {?>class="vodoravno"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['naziv'];?>
</p>
                    <p <?php if ($_smarty_tpl->tpl_vars['item']->value['redoslijed'] == 'vodoravno') {?>class="vodoravno"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['kategorija'];?>
</p>
                    <p <?php if ($_smarty_tpl->tpl_vars['item']->value['redoslijed'] == 'vodoravno') {?>class="vodoravno"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['redoslijed'];?>
</p>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </fieldset>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<footer class="noprint">
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/multimedija.php" target="_blank">
            <img alt="validacija-html" src="materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/multimedija.php" target="_blank">
            <img alt="validacija-css" src="materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>

</html><?php }
}
