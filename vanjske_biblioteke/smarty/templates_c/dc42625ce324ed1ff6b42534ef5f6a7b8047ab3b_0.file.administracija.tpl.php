<?php
/* Smarty version 4.1.0, created on 2022-06-13 21:30:48
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/administracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62a79068a25715_16302386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc42625ce324ed1ff6b42534ef5f6a7b8047ab3b' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/administracija.tpl',
      1 => 1655148643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a79068a25715_16302386 (Smarty_Internal_Template $_smarty_tpl) {
?>
<main>  
    <?php echo '<script'; ?>
 src="javascript/administracija.js"><?php echo '</script'; ?>
>
    <h1 class="naslov">Administracija</h1>

    <p>Odaberite mod:</p>
    <input type="radio" id="odblokiranje" name="mod" value="O">
    <label for="odblokiranje">Odblokiranje</label><br>
    <input type="radio" id="blokiranje" name="mod" value="B">
    <label for="blokiranje">Blokiranje</label><br>
  

    <div id="tablicaKorisniciDiv">

        <table id="tablicaKorisnici">
            <thead>
                <tr>
                    <th><a  style="cursor: pointer;">Korisničko ime</a></th>

                    <th><a  style="cursor: pointer;">Status</a></th>

                    <th><a  style="cursor: pointer;">Uloga</a></th>

                    <th><a  style="cursor: pointer;">Email</a></th>

                </tr>
            </thead>
            <tbody id="tbodyKorisnici">
            </tbody>
        </table>
    </div>
</main><?php }
}
