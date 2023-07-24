<main>

{* IZVLAČENJE KOLA *}
<h3>Izvuci dobitne brojeve</h3>
<form method="post">
    <table>
        <tr>
            <td><label for="kolo">Kolo:</label></td>
            <td><select name="kolo">
                    {foreach from=$kolaZaIzvlacenje item=p}
                        <option value='{$p['kolo_id']}'>{$p["naziv"]}</option>
                    {/foreach}
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

{* ZAHTJEVI ZA ISPLATU *}
<h3>Zahtjevi za isplatu</h3>
{foreach from=$igre item=i}
    <table>
        <tr>
            <td><b>{$i['naziv_igre']}</b></td>
        </tr>
    </table>
    {foreach from=$kola item=k}
        {if $k['igra_id'] == $i['igra_id']}
            <table>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><b>{$k['naziv_kola']}</b></td>
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
            {foreach from=$zahtjevi item=p}
                {if $p['kolo_id'] == $k['kolo_id']}
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>{$p['zahtjev_id']}</td>
                        <td>{$p['ime']}</td>
                        <td>{$p['prezime']}</td>
                        <td>{$p['vrijeme_isplate']}</td>
                        <td><b>{$p['iznos']}kn</b></td>
                        <td>{$p['status']}</td>
                        {if $p['status'] == 'NOVI'}
                            <td>
                                <form method="post">
                                    <input name="zahtjevId" type="hidden" value="{$p['zahtjev_id']}"/>
                                    <input name="listicId" type="hidden" value="{$p['listic_id']}"/>
                                    <input name="vrijemeIsplate" type="hidden" value="{$p['vrijeme_isplate']}"/>
                                    <input name="prihvatiZahtjev" type="submit" value="Prihvati"/>
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input name="zahtjevId" type="hidden" value="{$p['zahtjev_id']}"/>
                                    <input name="odbijZahtjev" type="submit" value="Odbij"/>
                                </form>
                            </td>
                        {/if}
                    </tr>
                {/if}
            {/foreach}
            </table>
        {/if}
    {/foreach}
{/foreach}

</main>