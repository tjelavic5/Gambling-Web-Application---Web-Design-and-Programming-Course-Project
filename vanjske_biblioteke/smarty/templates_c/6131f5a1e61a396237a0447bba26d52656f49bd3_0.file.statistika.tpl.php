<?php
/* Smarty version 4.1.0, created on 2022-06-21 20:54:03
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/statistika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b213cba95a04_27990665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6131f5a1e61a396237a0447bba26d52656f49bd3' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/statistika.tpl',
      1 => 1655837639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b213cba95a04_27990665 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
<h1 class="naslov">Statistika</h1>

<?php if ($_SESSION['uloga'] <= 2) {?>
    <h3>Najčešće izvučeni brojevi po igri</h3>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sveIgre']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
        <br>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['i']->value['naziv_igre'];?>
</b><br>
        <table>
            <tr>
                <th></th>
                <th>Broj</th>
                <th>Broj izvlačenja</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['brojevi']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['b']->value['naziv_igre'] == $_smarty_tpl->tpl_vars['i']->value['naziv_igre']) {?>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['b']->value['broj'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['b']->value['broj_ponavljanja'];?>
</td>
                    </tr>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<br><br><br>

<h3>Statistika dobitaka po igri</h3>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['igre']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
    <br>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['i']->value['naziv_igre'];?>
</b><br>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dobitni']->value, 'd');
$_smarty_tpl->tpl_vars['d']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['d']->value['naziv_igre'] == $_smarty_tpl->tpl_vars['i']->value['naziv_igre']) {?>
            &nbsp;&nbsp;&nbsp;&nbsp;Dobitni listići: <?php echo $_smarty_tpl->tpl_vars['d']->value['broj'];?>
<br>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nedobitni']->value, 'n');
$_smarty_tpl->tpl_vars['n']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['n']->value['naziv_igre'] == $_smarty_tpl->tpl_vars['i']->value['naziv_igre']) {?>
            &nbsp;&nbsp;&nbsp;&nbsp;Nedobitni listići: <?php echo $_smarty_tpl->tpl_vars['n']->value['broj'];?>
<br>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</main><?php }
}
