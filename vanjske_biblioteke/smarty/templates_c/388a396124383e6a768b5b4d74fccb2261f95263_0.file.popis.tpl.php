<?php
/* Smarty version 4.1.0, created on 2022-05-31 17:31:33
  from '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/popis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629634d5be9ae6_13305149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '388a396124383e6a768b5b4d74fccb2261f95263' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/popis.tpl',
      1 => 1654011046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629634d5be9ae6_13305149 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">
    <title>Popis</title>
    <link rel="stylesheet" href="css/tjelavic.css">
    <style>
        @media print {
            .noprint, .noprint *
            {
                display: none !important;
            }
        }
    </style>
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
                <h1 class="stranica-naziv">Popis</h1>
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
    <div>
        <form method="get">
            <select name="sort">
                <option value="id">ID</option>
                <option value="uloga">Uloga</option>
                <option value="broj_prijava">Status</option>
            </select>
            <select name="order">
                <option value="ASC">ASC</option>
                <option value="DESC">DESC</option>
            </select>
            <button>Sortiraj</button>
        </form>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Korisničko ime</th>
            <th>Uloga</th>
            <th>Broj neuspješnih prijava</th>
            <th>Status</th>
            <?php if ($_smarty_tpl->tpl_vars['uloga']->value == 'ADMINISTRATOR') {?>
                <th>Opcije</th>
            <?php }?>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['korisnici']->value, 'korisnik');
$_smarty_tpl->tpl_vars['korisnik']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['korisnik']->value) {
$_smarty_tpl->tpl_vars['korisnik']->do_else = false;
?>
            <tr>
                <td><a href="obrasci/registracija.php?id=<?php echo $_smarty_tpl->tpl_vars['korisnik']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['id'];?>
</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['ime'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['korisnicko_ime'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['uloga'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['broj_prijava'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['status'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['uloga']->value == 'ADMINISTRATOR') {?>
                    <td><a href="popis.php?obrisi=<?php echo $_smarty_tpl->tpl_vars['korisnik']->value['id'];?>
">Obriši</a></td>
                <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>

    </table>
    <table>
        <thead>
        <tr>
            <th>Korisnik</th>
            <th>Uloga</th>
            <th>Skripta</th>
            <th>Vrijeme</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dnevnik']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['korisnik'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['uloga'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['skripte'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['vremena'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>

    </table>
</div>

<footer class="noprint">
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/popis.php" target="_blank">
            <img alt="validacija-html" src="materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/popis.php" target="_blank">
            <img alt="validacija-css" src="materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>

</html><?php }
}
