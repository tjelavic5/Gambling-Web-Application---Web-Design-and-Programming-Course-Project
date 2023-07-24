<?php
/* Smarty version 4.1.0, created on 2022-06-21 09:45:36
  from '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/igra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62b177204c9342_53974298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60e91fa488d1d9a736306916578d8ddb1b8d56ad' => 
    array (
      0 => '/var/www/webdip.barka.foi.hr/2021_projekti/WebDiP2021x045/templates/igra.tpl',
      1 => 1655797522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b177204c9342_53974298 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
<h1><b><?php echo $_smarty_tpl->tpl_vars['naziv_igre']->value;?>
</b> - nova igra</h1>

<div id="generatorDiv" style="display:none;">
    <form method="post">
        <table>
            <tr>
                <td><label for="pocetniBroj">Početni broj:</label></td>
                <td><input name="pocetniBroj" type="number" size="20"/></td>
            </tr>
            <tr>
                <td><label for="zavrsniBroj">Završni broj:</label></td>
                <td><input name="zavrsniBroj" type="number" size="20"/></td>
            </tr>
            <tr>
                <td><label for="brojeva">Brojeva:</label></td>
                <td><input name="brojeva" type="number" size="20"/></td>
            </tr>
        </table>
        <input name="generiraj" type="submit" value="Generiraj"/>
    </form>
    <button onclick="zatvoriGenerator()">Odustani</button>
</div>

<?php echo '<script'; ?>
>
    function otvoriGenerator() {
        var forma = document.getElementById("generatorDiv");
        forma.style.display = "block";
        var bt = document.getElementById("otvoriGeneratorBt");
        bt.style.display = "none";
    }
    function zatvoriGenerator(){
        var forma = document.getElementById("generatorDiv");
        forma.style.display = "none";
        var bt = document.getElementById("otvoriGeneratorBt");
        bt.style.display = "block";
        return true;
    }
<?php echo '</script'; ?>
>
<button onclick="otvoriGenerator()" id="otvoriGeneratorBt">Generiraj brojeve</button>

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
                        <?php if ((isset($_smarty_tpl->tpl_vars['randomBrojevi']->value)) && in_array($_smarty_tpl->tpl_vars['broj']->value,$_smarty_tpl->tpl_vars['randomBrojevi']->value)) {?>checked="checked"<?php }?>
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
            <td><input name="telefon" type="tel" size="20"/></td>
        </tr>
        <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input name="email" type="email" size="20"/></td>
        </tr>
        <tr>
            <td><label for="adresa">Adresa:</label></td>
            <td><input name="adresa" type="text" size="20"/></td>
        </tr>
        <tr>
            <td><label for="slika">Slika listića:</label></td>
            <td><input name="slika" type="file" size="20"/></td>
        </tr>
    </table>
    <input name="dodajListic" type="submit" value="Dodaj"/>
</form>

<?php echo '<script'; ?>
>
    var limit = <?php echo $_smarty_tpl->tpl_vars['broj_izvlacenja']->value;?>
;
        $('input.single-checkbox').on('change', function(evt) {
           if($(this).siblings(':checked').length >= limit) {
               this.checked = false;
           }
        });
<?php echo '</script'; ?>
>

</main>
<?php }
}
