<?php
/* Smarty version 4.1.0, created on 2022-05-31 14:43:28
  from 'C:\xampp\htdocs\zadaca_04\templates\registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62960d70497279_14090644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7b28902f6450313d452b09411783e3b91e01969' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\registracija.tpl',
      1 => 1654001001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62960d70497279_14090644 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">
    <title>Registracija</title>
    <link rel="stylesheet" href="../css/tjelavic.css">

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"><?php echo '</script'; ?>
>
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
                <h1 class="stranica-naziv">Registracija</h1>
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
                <li><a href="obrazac.php">Obrazac</a></li>
                <li><a href="../multimedija.php">Multimedija</a></li>
                <li><a href="../popis.php">Popis</a></li>

                <?php if ((isset($_SESSION['korisnik']))) {?>
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
    <div>
        <form id="forma-registracija" class="forma" method="get">
            <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit')) {?>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['id'];?>
">

            <?php }?>
            <div class="form-item">
                <label for="ime_prezime">Ime i prezime:</label>
                <input type="text" id="ime_prezime" name="ime_prezime" autofocus class="readonly"
                    <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] != 'ADMINISTRATOR') {?>
                        readonly
                    <?php }?>

                    <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit')) {?>
                        value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['ime'];?>
"
                    <?php }?>

                >
            </div>
            <div class="form-item">
                <label for="godina_rodenja">Godina rođenja:</label>
                <input type="text" id="godina_rodenja" name="godina_rodenja" placeholder="dd.mm.gggg" class="readonly"
                        <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] != 'ADMINISTRATOR') {?>
                            readonly
                        <?php }?>
                        <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit')) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['datum_rodenja'];?>
"
                        <?php }?>
                >
            </div>
            <div class="form-item">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="ldap@foi.hr" class="readonly"
                        <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] != 'ADMINISTRATOR') {?>
                            readonly
                        <?php }?>
                        <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit')) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['email'];?>
"
                        <?php }?>
                >
            </div>
            <div class="form-item">
                <label for="korisnicko_ime"
                <?php if ($_smarty_tpl->tpl_vars['korisnicko_ime_postoji']->value === true) {?>
                    class="korisnicko_ime_postoji"
                <?php } elseif ($_smarty_tpl->tpl_vars['korisnicko_ime_postoji']->value === false) {?>
                    class="korisnicko_ime_ne_postoji"
                <?php }?>
                >Korisničko ime:</label>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" maxlength="25"
                    <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] == 'ADMINISTRATOR') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['korisnicko_ime'];?>
"
                    <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['korisnicko_ime_postoji']->value === true) {?>
                            class="korisnicko_ime_postoji"
                        <?php } elseif ($_smarty_tpl->tpl_vars['korisnicko_ime_postoji']->value === false) {?>
                            class="korisnicko_ime_ne_postoji"
                        <?php }?>
                >

            </div>
            <div class="form-item">
                <label for="lozinka">Lozinka:</label>
                <input type="password" id="lozinka" name="lozinka" maxlength="50"
                        <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] == 'ADMINISTRATOR') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['lozinka'];?>
"
                        <?php }?>>
            </div>
            <div class="form-item">
                <label for="potvrda_lozinke">Potvrda lozinke:</label>
                <input type="password" id="potvrda_lozinke" name="potvrda_lozinke" maxlength="50" class="readonly">
            </div>
            <div class="form-item">
                <h3>Dozvole korištenja kolačića</h3>

                <label for="kolacici_uvjeti">Uvjeti korištenja</label>
                <input type="checkbox" id="kolacici_uvjeti" name="kolacici[]" value="UVJETI_KORISTENJA" class="readonly">

                <br>

                <label for="kolacici_zapamti">Zapamti me</label>
                <input type="checkbox" id="kolacici_zapamti" name="kolacici[]" value="ZAPAMTI_ME" class="readonly">

                <br>

                <label for="kolacici_podaci">Popuni podatke</label>
                <input type="checkbox" id="kolacici_podaci" name="kolacici[]" value="POPUNI_PODATKE" class="readonly">
                <br>

                <label for="kolacici_redoslijed">Redoslijed prikazivanja</label>
                <input type="checkbox" id="kolacici_redoslijed" name="kolacici[]" value="REDOSLIJED_PRIKAZIVANJA" class="readonly">

            </div>
        </form>
        <div class="submit-form">
            <input type="submit" form="forma-registracija" class="submit" value="Pošalji">
        </div>
    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function(){
            <?php if (($_smarty_tpl->tpl_vars['metoda']->value == 'edit') && $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['uloga'] != 'ADMINISTRATOR') {?>
                $('#korisnicko_ime, #lozinka').on('focusout', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    $.ajax({
                        url: 'registracija.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            'korisnicko_ime' : $('#korisnicko_ime').val(),
                            'lozinka' : $('#lozinka').val(),
                            'id' : <?php echo $_smarty_tpl->tpl_vars['korisnik_editiranje']->value['id'];?>

                        },
                        success: function(result){
                            if(result.status == 'success') {

                                $('.readonly').prop('readonly', false);
                            } else {
                                $('.readonly').prop('readonly', true);
                            }
                        }
                    });
                });
            <?php }?>
        });
    <?php echo '</script'; ?>
>
</div>

<footer>
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_01/tjelavic/obrasci/registracija.php" target="_blank">
            <img alt="validacija-html" src="../materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_01/tjelavic/obrasci/registracija.php" target="_blank">
            <img alt="validacija-css" src="../materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>
</html><?php }
}
