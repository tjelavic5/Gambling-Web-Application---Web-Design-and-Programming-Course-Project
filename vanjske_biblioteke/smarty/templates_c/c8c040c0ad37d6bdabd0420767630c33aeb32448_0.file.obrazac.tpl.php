<?php
/* Smarty version 4.1.0, created on 2022-05-31 14:48:21
  from 'C:\xampp\htdocs\zadaca_04\templates\obrazac.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62960e958f0c06_48477424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8c040c0ad37d6bdabd0420767630c33aeb32448' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\obrazac.tpl',
      1 => 1654001001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62960e958f0c06_48477424 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"><?php echo '</script'; ?>
>

    <title>Obrazac</title>
    <link rel="stylesheet" href="../css/tjelavic.css">
    <style>
        #reset {
            background: black;
            color: white;
        }
    </style>
</head>
<body>
<header>
    <div>
        <div class="header-logo">
            <a href="#navigacija">
                <img alt="navigation" src="../materijali/navigation.png">
            </a>
        </div>

        <div class="header-logo">
            <a href="../index.php">
                <img alt="logo" src="../materijali/foi-logo.jpg" class="logo">
            </a>
        </div>
        <div class="header-tekst">
            <a href="#">
                <h1 class="stranica-naziv">Obrazac</h1>
            </a>
        </div>
    </div>
    <br>
    <div>
        <nav id="navigacija">
            <ul>
                <li><a href="../index.php">Početna</a></li>
                <li><a href="prijava.php">Prijava</a></li>
                <li><a href="registracija.php">Registracija</a></li>
                <li><a href="../multimedija.php">Multimedija</a></li>
                <li><a href="../popis.php">Popis</a></li>
                <?php if ((isset($_SESSION['korisnik']))) {?>
                    <?php if ($_SESSION['korisnik']['uloga'] != 'KORISNIK') {?>
                        <li><a href="../multimedija.php">Multimedija</a></li>
                    <?php }?>
                    <li><a href="prijava.php">Prijava</a></li>
                <?php } else { ?>
                    <li><a href="prijava.php?odjavi=DA">Odjava</a></li>
                <?php }?>
            </ul>
        </nav>
    </div>
</header>
<div id="sadrzaj">
    <div>

        <div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['poruke']->value, 'poruka');
$_smarty_tpl->tpl_vars['poruka']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['poruka']->value) {
$_smarty_tpl->tpl_vars['poruka']->do_else = false;
?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <form id="forma-obrazac" class="forma" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Osnovni podaci</legend>

                <div class="form-item">
                    <label for="redoslijed">Redoslijed prikaza </label>
                    <select name="redoslijed" id="redoslijed" <?php if ($_smarty_tpl->tpl_vars['redoslijed_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>
                        <option value="-1">Odaberi</option>
                        <option value="vodoravno" <?php if ($_smarty_tpl->tpl_vars['redoslijed']->value == 'vodoravno') {?>selected="selected"<?php }?>>Vodoravno</option>
                        <option value="okomito" <?php if ($_smarty_tpl->tpl_vars['redoslijed']->value == 'okomito') {?>selected="selected"<?php }?>>Okomito</option>
                    </select>
                </div>

                <div class="form-item">
                    <label for="id">ID:</label>
                    <input type="number" id="id" name="id" readonly value="1">
                </div>
                <div class="form-item">
                    <label for="naziv">Naziv:</label>
                    <input type="file" id="naziv" name="naziv" <?php if ($_smarty_tpl->tpl_vars['naziv_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>
                </div>
                <div class="form-item">
                    <label for="kategorija">Kategorija:</label>
                    <input list="kategorije" id="kategorija" name="kategorija" <?php if ($_smarty_tpl->tpl_vars['kategorija_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>

                    <datalist id="kategorije">
                        <option value="Ronjenje">
                        <option value="Skijanje">
                        <option value="Planinarenje">
                        <option value="Trčanje">
                        <option value="Teretana">
                    </datalist>
                </div>
                <div class="form-item">
                    <label for="opis">Opis:</label>
                    <textarea name="opis" id="opis" placeholder="Unesite opis..." <?php if ($_smarty_tpl->tpl_vars['opis_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>></textarea>
                </div>
            </fieldset>

            <fieldset>
                <legend>Dodatni podaci</legend>
                <div class="form-item">
                    <input type="hidden" id="sakriveni" name="sakriveni" value="1000000">
                </div>
                <div class="form-item">
                    <label for="ucestalost">Koliko često se rekreirate:</label>
                    <select name="ucestalost" id="ucestalost" <?php if ($_smarty_tpl->tpl_vars['ucestalost_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>
                        <option value="nista">Ništa</option>
                        <option value="mjesecno">Jednom mjesečno</option>
                        <option value="tjedno">Jednom tjedno</option>
                        <option value="dnevno">Svaki dan</option>
                    </select>
                </div>

                <div class="form-item">
                    <label for="boja">Najdraža boja:</label>
                    <input type="color" id="boja" name="boja" style="width: 30px" <?php if ($_smarty_tpl->tpl_vars['boja_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>
                </div>
                <div class="form-item">
                    <label for="url">Stranica:</label>
                    <input type="url" id="url" name="url" <?php if ($_smarty_tpl->tpl_vars['stranica_greska']->value) {?>class="korisnicko_ime_postoji"<?php }?>>
                </div>
                <div class="form-item">
                    <input type="reset" id="reset" name="reset">
                </div>
            </fieldset>
            <div class="submit-form">
                <input type="submit" value="Pošalji" class="submit">
            </div>
        </form>

        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function(){
                $("#naziv").on('change', function(){
                    $.ajax({
                        url: 'obrazac.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            'naziv' : $(this).val().split('\\').pop()
                        },
                        success: function(result){
                            if (result.status == 'error') {
                                alert('Naziv datoteke već postoji');
                            }
                        }
                    });
                    console.log();
                });
            });
        <?php echo '</script'; ?>
>

    </div>
</div>

<footer>
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_01/tjelavic/obrasci/obrazac.php" target="_blank">
            <img alt="validacija-html" src="../materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_01/tjelavic/obrasci/obrazac.php" target="_blank">
            <img alt="validacija-css" src="../materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>
</html><?php }
}
