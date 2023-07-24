<main>
<h1 class="naslov">Igre na sreću</h1>

<br>

{* DODAVANJE IGRE *}
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
<script>
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
</script>

<br><br><br>

{* ISPIS IGARA *}
<table>
    <tr>
        <th><b>Igra</b></th>
        <th><b>Broj izvlačenja</b></th>
        <th><b>Dobici</b></th>
        <th></th>
        <th></th>
    </tr>
    {foreach from=$igre item=p}
        <tr>
            <td>{$p['naziv']}</td>
            <td>{$p['broj_izvlacenja']}</td>
            <td>
                {foreach from=$fondovi item=f}
                    {if $p['igra_id'] == $f['igra_id']}
                        {$f['broj_pogodenih_brojeva']} - {$f['iznos']}kn
                        <br>
                    {/if}
                {/foreach}
            </td>
            {* GUMB ZA UREDJIVANJE *}
            <td><form method='post'>
                    <input type='submit' name='urediIgru' value='Uredi'/>
                    <input type='hidden' name='urediId' value='{$p['igra_id']}'/>
                    <input type='hidden' name='urediNaziv' value='{$p['naziv']}'/>
                    <input type='hidden' name='urediBroj' value='{$p['broj_izvlacenja']}'/>
                </form>
            </td>
            {* GUMB ZA DODAVANJE FONDA *}
            <td>
                <form method='post'>
                    <input type='submit' name='dodavanjeFonda' value='Dodaj fond'/>
                    <input type='hidden' name='urediId' value='{$p['igra_id']}'/>
                    <input type='hidden' name='urediNaziv' value='{$p['naziv']}'/>
                </form>
            </td>
        </tr>
    {/foreach}
</table>

<br><br>

{* UREDJIVANJE IGRE *}
{if isset($urediIgru)}
    <div>
        <form method="post">
            <table>
                <tr>
                    <td><label for="nazivIgre">Naziv igre:</label></td>
                    <td><input name="nazivIgre" type="text" size="20" maxlength="20" value="{$urediNaziv}"/></td>
                </tr>
                <tr>
                    <td><label for="brojIzvlacenja">Broj izvlačenja:</label></td>
                    <td><input name="brojIzvlacenja" type="number" size="20" maxlength="3" value="{$urediBroj}"/></td>
                </tr>
            </table>
            <input name="urediId" type="hidden" value="{$urediId}"/>
            <input name="azurirajIgru" type="submit" value="Spremi promjene"/>
        </form>
        <br><br>
    </div>
{/if}

<br>

{* DODAVANJE FONDA *}
{if isset($dodavanjeFonda)}
    <div>
        <h2>{$urediNaziv}</h2>
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
            <input name="urediId" type="hidden" value="{$urediId}"/>
            <input name="dodajFond" type="submit" value="Dodaj"/>
        </form>
        <br><br>
    </div>
{/if}

</main>

