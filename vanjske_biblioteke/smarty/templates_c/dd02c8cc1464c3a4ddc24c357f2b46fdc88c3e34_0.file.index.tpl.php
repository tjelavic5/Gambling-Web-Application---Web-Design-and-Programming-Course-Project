<?php
/* Smarty version 4.1.0, created on 2022-05-31 17:36:49
  from '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62963611d574d1_19936180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd02c8cc1464c3a4ddc24c357f2b46fdc88c3e34' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021/zadaca_04/tjelavic/templates/index.tpl',
      1 => 1654011045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62963611d574d1_19936180 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Tea Jelavić">
    <meta name="date" content="30.03.2022">
    <meta name="opis" content="Zadaća 1">
    <title>Početna</title>
    <link rel="stylesheet" href="css/tjelavic.css">
</head>
<body>
<header>
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
                <h1 class="stranica-naziv">Početna stranica</h1>
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
        <div class="blok-1">
            <div>
                <img alt="slider" src="materijali/ronjenje.jpeg">
                <img alt="slider" src="materijali/trcanje.jpeg">
                <img alt="slider" src="materijali/skijanje.jpeg">
                <img alt="slider" src="materijali/teretana.jpg">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="blok-2">
        <article>
            <h3>Discipline skijanja</h3>
            <p><i>30.03.2022. 20:00:00</i></p>
            <p>U ovom su članku opisane vrste disciplina u skijanju. Link do članka: <a href="https://petica.hr/aktivan-zivot/zanimljivih-crtica-skijanju/">https://petica.hr/aktivan-zivot/zanimljivih-crtica-skijanju/</a></p>
            <p>U skijanju se razlikuju alpske i nordijske discipline. Poznato je pet alpskih skijaških disciplina, a to su slalom, veleslalom, superveleslalom,
                spust i alpska kombinacija. U svim disciplinama sudjeluju i žene i muškarci. Jednostavnija podjela je na tehničke discipline, u koje se ubrajaju
                slalom i veleslalom, te brzinske discipline spust i superveleslalom. Prva alpska disciplina na programu OI za muškarce i žene bila je alpska
                kombinacija 1936. godine, a tek su kasnijih godina uvedeni spust, slalom, veleslalom i superveleslalom. Manje poznate alpske discipline su akrobatsko
                skijanje za žene i muškarce, slobodna vožnja po grbama i akrobatski skokovi. Nordijske discipline, koje su naziv dobile po području iz kojeg potječu,
                čine skijaško trčanje i skijaški skokovi.</p>
        </article>

        <article>
            <h3>Planinarenje</h3>
            <p><i>30.03.2022. 21:00:00</i></p>
            <p>U ovom je članku uvod o planinarenju. Link to članka: <a href="https://www.jutarnji.hr/like-putovanja/inspiracija/odlucili-ste-poceti-planinariti-odlicno-no-najprije-procitajte-ovaj-nas-mali-vodic-15041918">https://www.jutarnji.hr/like-putovanja/inspiracija/odlucili-ste-poceti-planinariti-odlicno-no-najprije-procitajte-ovaj-nas-mali-vodic-15041918</a></p>
            <p>Početkom 2020. godine, kad su bili zatvoreni šoping-centri, kafići i ostala mjesta na kojima Hrvati vole provoditi većinu slobodnog vremena,
                broj ljudi na sljemenskim stazama (a i na ostalim planinama u blizini velikih gradova, od Mosora, Učke, Papuka, Ivanščice...) vidno se povećao.
                Još su se više, doduše, povećali redovi za hranu i piće u planinarskim domovima do kojih se može doći autom, ali nema veze, svatko ima pravo na
                svoj komadić zelenila i prirode.</p>
        </article>

        <article>
            <h3>Ronjenje</h3>
            <p><i>30.03.2022. 21:00:00</i></p>
            <p>U ovom je članku se govori o ronjenju i snorkelingu. Link to članka: <a href="https://www.hervis.hr/store/blog/sve-o-ronjenju-i-snorkelingu">https://www.hervis.hr/store/blog/sve-o-ronjenju-i-snorkelingu</a></p>
            <p>Naša je Zemlja predivno mjesto u kojem svaki čovjek može pronaći barem jednu destinaciju daleko od gradske vreve, a na kojoj će osjetiti mir,
                čuti tišinu, u potpunosti se opustiti i napuniti baterije za nove radne ili privatne pobjede. I dok neki u potrazi za spokojem odlaze u planine
                ili se bave sportom na otvorenom, drugima je za odlazak u neku posve drugu dimenziju potrebna samo – maska za ronjenje.</p>
            <p>Napredak u tehnologiji omogućio je svim ljudima da zavire u predivan podvodni svijet. Šarenim se bojama i nevjerojatnim živim bićima možemo diviti roneći u uvalama, otvorenim morima, plićacima i dubinama, ali uz preduvjet da si osiguramo dovod zraka, bilo zadržavanjem daha ili uz pomoć aparata za disanje.</p>
        </article>
    </div>

    <div class="blok-3">

        <h1>O autoru</h1>
        <img alt="autor" class="autor-img" src="materijali/autor.jpg">
        <ul>
            <li>Ime: Tea</li>
            <li>Prezime: Jelavić</li>
            <li>E-mail: tjelavic@foi.hr</li>
            <li>Broj iksice: 0016142074</li>
            <li>Životopis: Tea Jelavić, studentica informatike na Foi-ju. 21 god iz Splita</li>
        </ul>
    </div>

</div>

<footer>
    <div class="footer-info">
        <p>&copy; 2022 Tea Jelavić</p>
    </div>
    <div class="footer-validacija">
        <a href="https://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/index.php" target="_blank">
            <img alt="validacija-html" src="materijali/HTML5.png">
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=https://barka.foi.hr/WebDiP/2021/zadaca_04/tjelavic/index.php" target="_blank">
            <img alt="validacija-css" src="materijali/CSS3.png">
        </a>
    </div>
</footer>
</body>

</html><?php }
}
