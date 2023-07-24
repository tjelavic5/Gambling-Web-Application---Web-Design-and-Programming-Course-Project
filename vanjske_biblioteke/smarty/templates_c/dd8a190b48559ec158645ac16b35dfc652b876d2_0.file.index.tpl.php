<?php
/* Smarty version 4.1.0, created on 2022-06-20 21:08:54
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b0c5c6215e47_51406530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd8a190b48559ec158645ac16b35dfc652b876d2' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/index.tpl',
      1 => 1655752130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b0c5c6215e47_51406530 (Smarty_Internal_Template $_smarty_tpl) {
?>
<main>  
    <h1 class="naslov">Početna stranica</h1>

    <p class="naslov">Dobrodošli na stranicu za igre na sreću!</p>

    <?php if ((isset($_SESSION['uloga']))) {?>
    <p>
        <br>
        <?php if ($_SESSION['uloga'] == 1) {?>
            <button onclick="dodavanjeLutrije()" id="dodajLutrijuGumb">Dodaj lutriju</button>
            <div id="novaLutrijaDiv" style="display:none;">
                <form method="post" onsubmit="return zatvoriDodavanje()">
                    <table>
                        <tr>
                            <td><label for="nazivLutrije">Naziv lutrije:</label></td>
                            <td><input name="nazivLutrije" type="text" size="20" maxlength="30"</td>
                        </tr>
                        <tr>
                            <td><label for="moderatori[]">Moderatori:</label></td>
                            <td><select name="moderatori[]" multiple="multiple">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moderatori']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['p']->value['korisnik_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['p']->value["korisnicko_ime"];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select></td>
                        </tr>
                    </table>
                    <input name="dodajLutriju" type="submit" value="Dodaj"/>
                </form>
            </div>
            <?php echo '<script'; ?>
>
                function dodavanjeLutrije() {
                    var forma = document.getElementById("novaLutrijaDiv");
                    forma.style.display = "block";
                    var bt = document.getElementById("dodajLutrijuGumb");
                    bt.style.display = "none";
                }
                function zatvoriDodavanje(){
                    var forma = document.getElementById("novaLutrijaDiv");
                    forma.style.display = "none";
                    var bt = document.getElementById("dodajLutrijuGumb");
                    bt.style.display = "block";
                    return true;
                }
            <?php echo '</script'; ?>
>
        <?php }?>
        <br>
        <h1>Odaberite željenu lutriju:</h1>
        <br>
        <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lutrije']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <tr>
                    <td><a href='lutrija.php?lutrija_id=<?php echo $_smarty_tpl->tpl_vars['p']->value['lutrija_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['p']->value['naziv_lutrije'];?>
</a></td>
                    <?php if ($_SESSION['uloga'] == 1) {?>
                        <td><form action='index.php' method='post'>
                            <input type='submit' name='urediLutriju' value='Uredi'/>
                            <input type='hidden' name='urediId' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['lutrija_id'];?>
'/>
                            <input type='hidden' name='urediNaziv' value='<?php echo $_smarty_tpl->tpl_vars['p']->value['naziv_lutrije'];?>
'/></form>
                        </td>
                    <?php }?>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>

            <?php if ((isset($_smarty_tpl->tpl_vars['urediLutriju']->value))) {?>
            <div id="uredjivanjeLutrije" style="display: 'block'">
                <form method="post" action="index.php">
                    <table>
                        <tr>
                            <td><label for="nazivLutrije">Naziv lutrije:</label></td>
                            <td><input name="nazivLutrije" type="text" size="20" maxlength="30" id="nazivLutrije" value="<?php echo $_smarty_tpl->tpl_vars['urediNaziv']->value;?>
"/></td>
                        </tr>
                        <tr>
                            <td><label for="moderatori[]">Moderatori:</label></td>
                            <td><select name="moderatori[]" multiple="multiple">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moderatori']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['p']->value['korisnik_id'];?>
' <?php if (in_array($_smarty_tpl->tpl_vars['p']->value['korisnik_id'],$_smarty_tpl->tpl_vars['moderatoriLutrije']->value)) {?>
                                                                            selected='selected'<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['p']->value["korisnicko_ime"];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select></td>
                        </tr>
                    </table>
                    <input name="urediId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['urediId']->value;?>
"/>
                    <input name="azurirajLutriju" type="submit" value="Spremi promjene"/>
                </form>
                <br><br>
            </div>
        <?php }?>
    </p>

<?php }?>




    <a class="naslov" href='dokumentacija.html'>Dokumentacija</a>
    <br>
    <a class="naslov" href='o_autoru.html'>O autoru</a>
</main>

   <?php }
}
