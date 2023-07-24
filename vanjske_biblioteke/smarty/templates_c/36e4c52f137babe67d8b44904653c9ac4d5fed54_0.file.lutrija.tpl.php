<?php
/* Smarty version 4.1.0, created on 2022-06-20 21:04:40
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/lutrija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b0c4c81ea9b3_38767698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36e4c52f137babe67d8b44904653c9ac4d5fed54' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/lutrija.tpl',
      1 => 1655751872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b0c4c81ea9b3_38767698 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
<h1 class="naslov"><?php echo $_smarty_tpl->tpl_vars['naziv_lutrije']->value;?>
</h1>

<?php if ((isset($_smarty_tpl->tpl_vars['poruka']->value))) {?>
    <?php echo '<script'; ?>
>
        alert("Već postoji otvoreno kolo!");
    <?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['moderator_lutrije']->value == 1) {?>
        <table>
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
                    <form method='post'>
                        <input type='submit' name='dodavanjeIgre' value='Dodaj'/>
                        <input type='hidden' name='igra_id' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['igra_id'];?>
'/>
                        <input type='hidden' name='naziv' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
'/>
                    </form>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

        <?php if ((isset($_smarty_tpl->tpl_vars['dodavanjeIgre']->value))) {?>
        <h2><?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
</h2>
        <form method="post">
            <table>
                <tr>
                    <td><label for="vrijemeOd">Vrijeme početka:</label></td>
                    <td><input name="vrijemeOd" type="datetime-local" size="20"/></td>
                </tr>
                <tr>
                    <td><label for="vrijemeDo">Vrijeme završetka:</label></td>
                    <td><input name="vrijemeDo" type="datetime-local" size="20"/></td>
                </tr>
                <tr>
                    <td><label for="cijenaListica">Cijena listića:</label></td>
                    <td><input name="cijenaListica" type="number" size="20"/></td>
                </tr>
            </table>
            <input name="igraId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['igra_id']->value;?>
"/>
            <input name="dodajIgru" type="submit" value="Dodaj igru"/>
        </form>
    <?php }?>

    <br><br><h2>Pridružene igre</h2><br>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pridruzeneIgre']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
        <table>
            <tr>
                <th>Igra</th>
                <th>Vrijeme početka</th>
                <th>Vrijeme završetka</th>
                <th>Cijena listića</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_pocetka'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_zavrsetka'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['p']->value['cijena_listica'];?>
</td>
                                <td>
                    <form method='post'>
                        <input type='submit' name='urediIgru' value='Uredi igru'/>
                        <input type='hidden' name='pridruzena_igra_id' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['pridruzena_igra_id'];?>
'/>
                        <input type='hidden' name='naziv' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
'/>
                        <input type='hidden' name='vrijeme_pocetka' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_pocetka'];?>
'/>
                        <input type='hidden' name='vrijeme_zavrsetka' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['vrijeme_zavrsetka'];?>
'/>
                        <input type='hidden' name='cijena_listica' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['cijena_listica'];?>
'/>
                    </form>
                </td>
                                <td>
                    <form method='post'>
                        <input type='submit' name='dodavanjeKola' value='Dodaj kolo'/>
                        <input type='hidden' name='pridruzena_igra_id' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['pridruzena_igra_id'];?>
'/>
                    </form>
                </td>
            </tr>
        </table>

                <table>
            <tr>
                <th></th>
                <th>Kolo</th>
                <th>Vrijeme isplate</th>
                <th>Status</th>
                <th></th>
            </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kola']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['k']->value['igra_id'] == $_smarty_tpl->tpl_vars['p']->value['pridruzena_igra_id']) {?>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['k']->value['naziv'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['k']->value['vrijeme_isplate'];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['k']->value['status'] == 0) {?>OTVORENO
                        <?php } else { ?>ZATVORENO<?php }?></td>
                                        <td>
                        <form method='post'>
                            <input type='submit' name='uredjivanjeKola' value='Uredi igru'/>
                            <input type='hidden' name='kolo_id' value='<?php echo $_smarty_tpl->tpl_vars['k']->value['kolo_id'];?>
'/>
                            <input type='hidden' name='naziv' value='<?php echo $_smarty_tpl->tpl_vars['k']->value['naziv'];?>
'/>
                            <input type='hidden' name='vrijeme_isplate' value='<?php echo $_smarty_tpl->tpl_vars['k']->value['vrijeme_isplate'];?>
'/>
                            <input type='hidden' name='status' value='<?php echo $_smarty_tpl->tpl_vars['k']->value['status'];?>
'/>
                        </form>
                    </td>
                </tr>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <?php if ((isset($_smarty_tpl->tpl_vars['dodavanjeKola']->value))) {?>
        <div>
            <h3>Novo kolo</h3>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="nazivKola">Naziv kola:</label></td>
                        <td><input name="nazivKola" type="text" size="20"/></td>
                    </tr>
                    <tr>
                        <td><label for="vrijemeIsplate">Vrijeme isplate:</label></td>
                        <td><input name="vrijemeIsplate" type="datetime-local" size="20"/></td>
                    </tr>
                    <tr>
                        <td><label for="status">Status kola:</label></td>
                        <td><input name="status" type="radio" value="0"/><label>Otvoreno</label><br>
                            <input name="status" type="radio" value="1"/><label>Zatvoreno</label></td>
                    </tr>
                </table>
                <input name="pridruzena_igra_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['pridruzena_igra_id']->value;?>
"/>
                <input name="dodajKolo" type="submit" value="Dodaj"/>
            </form>
            <br><br>
        </div>
    <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['uredjivanjeKola']->value))) {?>
        <div>
            <h3>Uredi kolo</h3>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="nazivKola">Naziv kola:</label></td>
                        <td><input name="nazivKola" type="text" size="20" value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
"/></td>
                    </tr>
                    <tr>
                        <td><label for="vrijemeIsplate">Vrijeme isplate:</label></td>
                        <td><input name="vrijemeIsplate" type="datetime-local" size="20" value="<?php echo $_smarty_tpl->tpl_vars['vrijeme_isplate']->value;?>
"/></td>
                    </tr>
                    <tr>
                        <td><label for="status">Status kola:</label></td>
                        <td><input name="status" type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['status']->value == 0) {?> checked="checked"<?php }?>/><label>Otvoreno</label><br>
                            <input name="status" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value == 1) {?> checked="checked"<?php }?>/><label>Zatvoreno</label></td>
                    </tr>
                </table>
                <input name="kolo_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['kolo_id']->value;?>
"/>
                <input name="urediKolo" type="submit" value="Spremi"/>
            </form>
            <br><br>
        </div>
    <?php }?>

    
        <?php if ((isset($_smarty_tpl->tpl_vars['urediIgru']->value))) {?>
        <div>
            <h3><?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
</h3>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="vrijemeOd">Vrijeme početka:</label></td>
                        <td><input name="vrijemeOd" type="datetime-local" size="20" value="<?php echo $_smarty_tpl->tpl_vars['vrijeme_pocetka']->value;?>
"/></td>
                    </tr>
                    <tr>
                        <td><label for="vrijemeDo">Vrijeme završetka:</label></td>
                        <td><input name="vrijemeDo" type="datetime-local" size="20" value="<?php echo $_smarty_tpl->tpl_vars['vrijeme_zavrsetka']->value;?>
"/></td>
                    </tr>
                    <tr>
                        <td><label for="cijenaListica">Cijena listića:</label></td>
                        <td><input name="cijenaListica" type="number" size="20" value="<?php echo $_smarty_tpl->tpl_vars['cijena_listica']->value;?>
"/></td>
                    </tr>
                </table>
                <input name="pridruzena_igra_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['pridruzena_igra_id']->value;?>
"/>
                <input name="azurirajIgru" type="submit" value="Spremi promjene"/>
            </form>
            <br><br>
        </div>
    <?php }?>

<?php }?>

<br><br>

<h1>Odaberite igru koju želite odigrati</h1>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pridruzeneIgre']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
    <table>
        <tr>
            <td><a href="igra.php?igra_id=<?php echo $_smarty_tpl->tpl_vars['p']->value['pridruzena_igra_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['naziv'];?>
</a></td>
        </tr>
    </table>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</main>
<?php }
}
