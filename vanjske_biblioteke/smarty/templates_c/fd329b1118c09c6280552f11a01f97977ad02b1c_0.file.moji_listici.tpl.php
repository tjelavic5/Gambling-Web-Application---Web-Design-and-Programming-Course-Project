<?php
/* Smarty version 4.1.0, created on 2022-06-21 17:26:38
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/moji_listici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b1e32e3a02f1_32865019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd329b1118c09c6280552f11a01f97977ad02b1c' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/moji_listici.tpl',
      1 => 1655825180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b1e32e3a02f1_32865019 (Smarty_Internal_Template $_smarty_tpl) {
?><main>

<h3>Listići u igri</h3>
<table>
    <tr>
        <th>Igra</th>
        <th>Telefon</th>
        <th>E-mail</th>
        <th>Adresa</th>
        <th>Slika listića</th>
        <th>Brojevi</th>
        <th></th>
    </tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listiciUIgri']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['telefon'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['email'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['adresa'];?>
</td>
        <td><figure><img src='<?php echo $_smarty_tpl->tpl_vars['p']->value['slika'];?>
' alt='<?php echo $_smarty_tpl->tpl_vars['p']->value['slika'];?>
' style="max-width:400px;width:100%;max-height:250px;height:100%;"></figure></td>
        <td>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviOdigraniBrojevi']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['p']->value['listic_id'] == $_smarty_tpl->tpl_vars['b']->value['listic_id']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['b']->value['broj'];?>
&nbsp;
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </td>
        <td><form method='post'>
                    <input type='submit' name='urediListic' value='Uredi'/>
                    <input type='hidden' name='listicId' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['listic_id'];?>
'/>
                </form></td>
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>

<?php if ((isset($_smarty_tpl->tpl_vars['urediListic']->value))) {?>
<form method="post" enctype='multipart/form-data'>
    <table>
        <tr>
            <td><label for="brojevi[]">Brojevi:</label></td>
            <td>
                <?php
$_smarty_tpl->tpl_vars['broj'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['broj']->step = 1;$_smarty_tpl->tpl_vars['broj']->total = (int) ceil(($_smarty_tpl->tpl_vars['broj']->step > 0 ? 50+1 - (1) : 1-(50)+1)/abs($_smarty_tpl->tpl_vars['broj']->step));
if ($_smarty_tpl->tpl_vars['broj']->total > 0) {
for ($_smarty_tpl->tpl_vars['broj']->value = 1, $_smarty_tpl->tpl_vars['broj']->iteration = 1;$_smarty_tpl->tpl_vars['broj']->iteration <= $_smarty_tpl->tpl_vars['broj']->total;$_smarty_tpl->tpl_vars['broj']->value += $_smarty_tpl->tpl_vars['broj']->step, $_smarty_tpl->tpl_vars['broj']->iteration++) {
$_smarty_tpl->tpl_vars['broj']->first = $_smarty_tpl->tpl_vars['broj']->iteration === 1;$_smarty_tpl->tpl_vars['broj']->last = $_smarty_tpl->tpl_vars['broj']->iteration === $_smarty_tpl->tpl_vars['broj']->total;?>
                    <input class="single-checkbox" type="checkbox" name="brojevi[]" value="<?php echo $_smarty_tpl->tpl_vars['broj']->value;?>
" 
                        <?php if ((isset($_smarty_tpl->tpl_vars['urediBrojevi']->value)) && in_array($_smarty_tpl->tpl_vars['broj']->value,$_smarty_tpl->tpl_vars['urediBrojevi']->value)) {?>checked="checked"<?php }?>
                        ><?php echo $_smarty_tpl->tpl_vars['broj']->value;?>

                    <?php if ($_smarty_tpl->tpl_vars['broj']->value%5 == 0) {?><br><?php }?>
                <?php }
}
?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><label for="telefon">Telefon:</label></td>
            <td><input name="telefon" type="tel" size="20" value="<?php echo $_smarty_tpl->tpl_vars['telefon']->value;?>
"/></td>
        </tr>
        <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input name="email" type="email" size="20" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"/></td>
        </tr>
        <tr>
            <td><label for="adresa">Adresa:</label></td>
            <td><input name="adresa" type="text" size="20" value="<?php echo $_smarty_tpl->tpl_vars['adresa']->value;?>
"/></td>
        </tr>
    </table>
    <input name="listicId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['listicId']->value;?>
"/>
    <input name="azurirajListic" type="submit" value="Spremi"/>
</form>
<?php }?>

<br><br>

<h3>Odigrani listići</h3>
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
                <th>Broj listića</th>
                <th>Status listića</th>
                <th>Broj pogodaka</th>
                <th>Dobitak</th>
                <th></th>
                
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['odigraniListici']->value, 'l');
$_smarty_tpl->tpl_vars['l']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['l']->value['kolo_id'] == $_smarty_tpl->tpl_vars['k']->value['kolo_id']) {?>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['listic_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['status'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['broj_pogodaka'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['dobitak'];?>
kn</td>
                        <?php if ($_smarty_tpl->tpl_vars['l']->value['status'] == 'DOBITAN') {?>
                            <td>
                                <form method="post">
                                    <input name="listicId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['listic_id'];?>
"/>
                                    <input name="iznos" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['dobitak'];?>
"/>
                                    <input name="posaljiZahtjev" type="submit" value="Posalji zahtjev za isplatu"/>
                                </form>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
        </foreach>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</main>
<?php }
}
