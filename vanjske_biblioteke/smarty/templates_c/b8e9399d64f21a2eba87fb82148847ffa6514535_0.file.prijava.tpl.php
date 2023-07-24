<?php
/* Smarty version 4.1.0, created on 2022-05-31 17:30:50
  from '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629634aa603995_38135602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8e9399d64f21a2eba87fb82148847ffa6514535' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/prijava.tpl',
      1 => 1654011046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629634aa603995_38135602 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">
    <title>Prijava</title>
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
                <h1 class="stranica-naziv">Prijava</h1>
            </a>
        </div>
    </div>
    <br>
    <div>
        <nav id="navigacija">
            <ul>
                <li><a href="../index.php">Početna</a></li>
                <li><a href="registracija.php">Registracija</a></li>
                <?php if ((isset($_SESSION['korisnik']))) {?>
                    <?php if ($_SESSION['korisnik']['uloga'] == 'KORISNIK') {?>
                        <li><a href="../popis.php">Popis</a></li>
                        <li><a href="obrazac.php">Obrazac</a></li>
                    <?php } elseif ($_SESSION['korisnik']['uloga'] == 'MODERATOR') {?>
                        <li><a href="../popis.php">Popis</a></li>
                        <li><a href="obrazac.php">Obrazac</a></li>
                        <li><a href="../multimedija.php">Multimedija</a></li>
                    <?php } elseif ($_SESSION['korisnik']['uloga'] == 'ADMINISTRATOR') {?>
                        <li><a href="../popis.php">Popis</a></li>
                        <li><a href="obrazac.php">Obrazac</a></li>
                        <li><a href="../multimedija.php">Multimedija</a></li>
                    <?php }?>
                    <li><a href="prijava.php?odjavi=DA">Odjava</a></li>
                <?php } else { ?>
                    <li><a href="prijava.php">Prijava</a></li>
                <?php }?>
                <li><a href="../plan.html">Plan</a></li>
                <li><a href="../testBrzine.html">Test brzine</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="sadrzaj">
    <div >
        <p class="greske"></p>
    </div>
    <div>
        <form id="forma-prijava" class="forma" method="post">
            <div class="form-item">
                <label for="korisnicko_ime">Korisničko ime:</label>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" maxlength="25" value="<?php echo $_smarty_tpl->tpl_vars['cookie_korisnicko']->value;?>
">
            </div>
            <div class="form-item">
                <label for="lozinka">Lozinka:</label>
                <input type="password" id="lozinka" name="lozinka" maxlength="50">
            </div>
            <div class="form-item">
                <h3>Zapamti me?</h3>

                <label for="zapamti_ne">Ne</label>
                <input type="radio" id="zapamti_ne" name="zapamti_me" value="NE" checked>

                <br>

                <label for="zapamti_da">Da</label>
                <input type="radio" id="zapamti_da" name="zapamti_me" value="DA">

            </div>
            <div class="submit-form">
                <input type="submit" value="Pošalji" class="submit">
                <br>
                <a href="../index.php" class="link">Zaboravljena lozinka?</a>
            </div>
        </form>

        <div>
            <h5>Administrator</h5>
            <p>Korisničko ime: admin</p>
            <p>Lozinka: 123</p>
        </div>

        <div>
            <h5>Moderator</h5>
            <p>Korisničko ime: moderator</p>
            <p>Lozinka: 123</p>
        </div>

        <div>
            <h5>Obični korisnik</h5>
            <p>Korisničko ime: korisnik</p>
            <p>Lozinka: 123</p>
        </div>

    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function(){
            $('#forma-prijava').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();

                $.ajax({
                    url: 'prijava.php',
                    type: 'post',
                    dataType: 'xml',
                    data: {
                        'korisnicko_ime' : $('#korisnicko_ime').val(),
                        'lozinka' : $('#lozinka').val(),
                        'zapamti_me' : $('#zapamti_da').prop('checked') ? 'DA' : 'NE',
                    },
                    success: function(result){
                        if(result.getElementsByTagName("status")[0].textContent == 'error') {
                            $('.greske').html(result.getElementsByTagName("poruka")[0].textContent);
                        }
                        if(result.getElementsByTagName("status")[0].textContent == 'success') {
                            window.location.href = '../popis.php';
                        }
                    }
                });
            });

        });
    <?php echo '</script'; ?>
>
</div>

<footer>
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/obrasci/prijava.php" target="_blank">
            <img alt="validacija-html" src="../materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/obrasci/prijava.php" target="_blank">
            <img alt="validacija-css" src="../materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>
</html><?php }
}
