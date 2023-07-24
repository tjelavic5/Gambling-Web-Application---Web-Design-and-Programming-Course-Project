<?php
/* Smarty version 4.1.0, created on 2022-06-13 17:27:25
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62a7575d6c1291_88639715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a4230597b88306cfdd8becd411981de4b165bde' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/registracija.tpl',
      1 => 1655133545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a7575d6c1291_88639715 (Smarty_Internal_Template $_smarty_tpl) {
?><main>  
    <?php echo '<script'; ?>
 src="javascript/registracija.js"><?php echo '</script'; ?>
>
    <h1 class="naslov">Registracija</h1>

    <form class="formaPrijavaiRegistracija" action="skripta_registracija.php" method="POST">
        <label for="korisnickoIme">Korisničko ime: </label>
        <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder="min 4, max 18, mogu biti slova i brojke" required="required"/>

        <label for="ime">Ime: </label>
        <input name="ime" id="ime" type="text" placeholder="min 2 znaka, mogu biti slova, max 20 znakova, ne smije biti Boris" required="required"/>
        <label for="prezime">Prezime: </label>
        <input name="prezime" id="prezime" type="text" placeholder="ne smije biti jednako imenu" required="required"/>

        <label for="email">Email: </label>
        <input name="email" id="email" type="email" placeholder="tjelavic@foi.hr" required="required"/>

        <label for="lozinka">Lozinka: </label>
        <input name="lozinka" id="lozinka" type="password" placeholder="min 5 znakova, min 1 slovo i min 1 broj, max 20 znakova" required="required"/>


        <label for="lozinkaPonovljena">Ponovi lozinku: </label>
        <input name="lozinkaPonovljena" id="lozinkaPonovljena" type="password" placeholder="lozinka" required="required"/>

        <input type="checkbox" id="uvjeti" name="uvjeti" value="true">
        <label for="uvjeti"> Prihvaćam uvjete korištenja</label><br>

        <button name="registracija" id="registracija" type="submit" value="registracija">Registriraj se</button>
    </form>
</main><?php }
}
