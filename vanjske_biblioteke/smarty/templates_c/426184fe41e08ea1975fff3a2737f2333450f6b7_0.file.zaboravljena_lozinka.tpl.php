<?php
/* Smarty version 4.1.0, created on 2022-06-13 20:12:12
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/zaboravljena_lozinka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62a77dfc1cac61_84586672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '426184fe41e08ea1975fff3a2737f2333450f6b7' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/zaboravljena_lozinka.tpl',
      1 => 1655143929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a77dfc1cac61_84586672 (Smarty_Internal_Template $_smarty_tpl) {
?><main>  

    <h1 class="naslov">Prijava</h1>

    <!-- doli iza method stavi action="di oces da ih odvede" -->
    <form class="formaPrijavaiRegistracija" action="skripta_nova_lozinka.php" method="get">
        <label for="email">Email: </label>
        <input name="email" id="email" type="text" placeholder=" " required="required"/>

        <button name="Potvrdi" type="submit" value="Potvrdi">Potvrdi</button>


    </form>
</main><?php }
}
