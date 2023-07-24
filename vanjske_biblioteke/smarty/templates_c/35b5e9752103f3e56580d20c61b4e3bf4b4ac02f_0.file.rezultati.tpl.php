<?php
/* Smarty version 4.1.0, created on 2022-06-21 18:24:08
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/rezultati.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b1f0a8e47c67_81349971',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35b5e9752103f3e56580d20c61b4e3bf4b4ac02f' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/rezultati.tpl',
      1 => 1655828639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b1f0a8e47c67_81349971 (Smarty_Internal_Template $_smarty_tpl) {
?><main>

<h3>Izvuci dobitne brojeve</h3>
<form method="post">
    <table>
        <tr>
            <td><label for="kolo">Kolo:</label></td>
            <td><select name="kolo">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kolaZaIzvlacenje']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['p']->value['kolo_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['p']->value["naziv"];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select></td>
        </tr>
        <tr>
            <td><label for="pocetniBroj">Početni broj:</label></td>
            <td><input name="pocetniBroj" type="number" size="20"/></td>
        </tr>
        <tr>
            <td><label for="zavrsniBroj">Završni broj:</label></td>
            <td><input name="zavrsniBroj" type="number" size="20"/></td>
        </tr>
    </table>
    <input name="generiraj" type="submit" value="Izvuci"/>
</form>

<br><br><br>

<h3>Zahtjevi za isplatu</h3>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['igre']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
    <table>
        <tr>
            <td><b><?php echo $_smarty_tpl->tpl_vars['i']->value['naziv_igre'];?>
</b></td>
        </tr>
    </table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kola']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['k']->value['igra_id'] == $_smarty_tpl->tpl_vars['i']->value['igra_id']) {?>
            <table>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><b><?php echo $_smarty_tpl->tpl_vars['k']->value['naziv_kola'];?>
</b></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Broj zahtjeva</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Isplatiti do</th>
                    <th>Iznos</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zahtjevi']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['p']->value['kolo_id'] == $_smarty_tpl->tpl_vars['k']->value['kolo_id']) {?>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['zahtjev_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['ime'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['prezime'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_isplate'];?>
</td>
                        <td><b><?php echo $_smarty_tpl->tpl_vars['p']->value['iznos'];?>
kn</b></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['status'];?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['p']->value['status'] == 'NOVI') {?>
                            <td>
                                <form method="post">
                                    <input name="zahtjevId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['zahtjev_id'];?>
"/>
                                    <input name="listicId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['listic_id'];?>
"/>
                                    <input name="vrijemeIsplate" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_isplate'];?>
"/>
                                    <input name="prihvatiZahtjev" type="submit" value="Prihvati"/>
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input name="zahtjevId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['zahtjev_id'];?>
"/>
                                    <input name="odbijZahtjev" type="submit" value="Odbij"/>
                                </form>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</main><?php }
}
