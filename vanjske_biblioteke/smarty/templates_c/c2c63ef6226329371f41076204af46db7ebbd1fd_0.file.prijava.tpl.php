<?php
/* Smarty version 4.1.0, created on 2022-06-13 22:18:52
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62a79bac618f18_26040135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2c63ef6226329371f41076204af46db7ebbd1fd' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/prijava.tpl',
      1 => 1655147010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a79bac618f18_26040135 (Smarty_Internal_Template $_smarty_tpl) {
?><main>  
    <?php echo '<script'; ?>
 src="javascript/prijava.js"><?php echo '</script'; ?>
>
    <h1 class="naslov">Prijava</h1>

    <form class="formaPrijavaiRegistracija" action="skripta_prijava.php" method="POST">
        <?php if ((isset($_smarty_tpl->tpl_vars['zapamtiMe']->value))) {?>
            <label for="korisnickoIme">Korisničko ime: (zapamćeno) </label>
            <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder=" " value="<?php echo $_smarty_tpl->tpl_vars['zapamtiMe']->value;?>
" required="required"/>
        <?php }?>
        <?php if (!(isset($_smarty_tpl->tpl_vars['zapamtiMe']->value))) {?>
            <label for="korisnickoIme">Korisničko ime: </label>
            <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder=" " required="required"/>
        <?php }?>

        <label for="lozinka">Lozinka: </label>
        <input name="lozinka" id="lozinka" type="password" placeholder=" "/>

        <label for="zapamtiMe">Zapamti me</label>
        <input name="zapamtiMe" id="zapamtiMe" type="checkbox" value="1">

        <button name="prijava" type="submit" value="prijava">Prijavi se</button>

        <label for="zaboravljenaLozinka">Zaboravljena lozinka</label>
        <input name="zaboravljenaLozinka" id="zaboravljenaLozinka" type="checkbox" value="1">
    </form>
</main><?php }
}
