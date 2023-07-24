<?php
/* Smarty version 4.1.0, created on 2022-06-20 10:37:39
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/igre_na_srecu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b031d3ce8ed3_31100616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78609e0a795be94a186771a8a209ad02337fe90b' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/igre_na_srecu.tpl',
      1 => 1655714253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b031d3ce8ed3_31100616 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
<h1 class="naslov">Igre na sreću</h1>

<br>

<button onclick="dodavanjeIgre()" id="dodajIgruGumb">Dodaj igru</button>
<div id="novaIgraDiv" style="display:none;">
    <form method="post" onsubmit="return zatvoriDodavanje()">
        <table>
            <tr>
                <td><label for="nazivIgre">Naziv igre:</label></td>
                <td><input name="nazivIgre" type="text" size="20" maxlength="20"/></td>
            </tr>
            <tr>
                <td><label for="brojIzvlacenja">Broj izvlačenja:</label></td>
                <td><input name="brojIzvlacenja" type="number" size="20" maxlength="3"/></td>
            </tr>
        </table>
        <input name="dodajIgru" type="submit" value="Dodaj"/>
    </form>
</div>
<?php echo '<script'; ?>
>
    function dodavanjeIgre() {
        var forma = document.getElementById("novaIgraDiv");
        forma.style.display = "block";
        var bt = document.getElementById("dodajIgruGumb");
        bt.style.display = "none";
    }
    function zatvoriDodavanje(){
        var forma = document.getElementById("novaIgraDiv");
        forma.style.display = "none";
        var bt = document.getElementById("dodajIgruGumb");
        bt.style.display = "block";
        return true;
    }
<?php echo '</script'; ?>
>

<br><br><br>

<table>
    <tr>
        <th><b>Igra</b></th>
        <th><b>Broj izvlačenja</b></th>
        <th><b>Dobici</b></th>
        <th></th>
        <th></th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['igre']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['broj_izvlacenja'];?>
</td>
            <td>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fondovi']->value, 'f');
$_smarty_tpl->tpl_vars['f']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['p']->value['igra_id'] == $_smarty_tpl->tpl_vars['f']->value['igra_id']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['f']->value['broj_pogodenih_brojeva'];?>
 - <?php echo $_smarty_tpl->tpl_vars['f']->value['iznos'];?>
kn
                        <br>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </td>
                        <td><form method='post'>
                    <input type='submit' name='urediIgru' value='Uredi'/>
                    <input type='hidden' name='urediId' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['igra_id'];?>
'/>
                    <input type='hidden' name='urediNaziv' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
'/>
                    <input type='hidden' name='urediBroj' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['broj_izvlacenja'];?>
'/>
                </form>
            </td>
                        <td>
                <form method='post'>
                    <input type='submit' name='dodavanjeFonda' value='Dodaj fond'/>
                    <input type='hidden' name='urediId' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['igra_id'];?>
'/>
                    <input type='hidden' name='urediNaziv' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
'/>
                </form>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>

<br><br>

<?php if ((isset($_smarty_tpl->tpl_vars['urediIgru']->value))) {?>
    <div>
        <form method="post">
            <table>
                <tr>
                    <td><label for="nazivIgre">Naziv igre:</label></td>
                    <td><input name="nazivIgre" type="text" size="20" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['urediNaziv']->value;?>
"/></td>
                </tr>
                <tr>
                    <td><label for="brojIzvlacenja">Broj izvlačenja:</label></td>
                    <td><input name="brojIzvlacenja" type="number" size="20" maxlength="3" value="<?php echo $_smarty_tpl->tpl_vars['urediBroj']->value;?>
"/></td>
                </tr>
            </table>
            <input name="urediId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urediId']->value;?>
"/>
            <input name="azurirajIgru" type="submit" value="Spremi promjene"/>
        </form>
        <br><br>
    </div>
<?php }?>

<br>

<?php if ((isset($_smarty_tpl->tpl_vars['dodavanjeFonda']->value))) {?>
    <div>
        <h2><?php echo $_smarty_tpl->tpl_vars['urediNaziv']->value;?>
</h2>
        <form method="post">
            <table>
                <tr>
                    <td><label for="brojPogodaka">Broj pogodaka:</label></td>
                    <td><input name="brojPogodaka" type="number" size="20" maxlength="3"/></td>
                </tr>
                <tr>
                    <td><label for="iznos">Iznos:</label></td>
                    <td><input name="iznos" type="number" size="20"/></td>
                </tr>
            </table>
            <input name="urediId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urediId']->value;?>
"/>
            <input name="dodajFond" type="submit" value="Dodaj"/>
        </form>
        <br><br>
    </div>
<?php }?>

</main>

<?php }
}
