<main>

{* PRIKAZ LISTIĆA *}
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
{foreach from=$listiciUIgri item=p}
    <tr>
        <td>{$p['naziv']}</td>
        <td>{$p['telefon']}</td>
        <td>{$p['email']}</td>
        <td>{$p['adresa']}</td>
        <td><figure><img src='{$p['slika']}' alt='{$p['slika']}' style="max-width:400px;width:100%;max-height:250px;height:100%;"></figure></td>
        <td>
            {foreach from=$sviOdigraniBrojevi item=b}
                {if $p['listic_id'] == $b['listic_id']}
                    {$b['broj']}&nbsp;
                {/if}
            {/foreach}
        </td>
        <td><form method='post'>
                    <input type='submit' name='urediListic' value='Uredi'/>
                    <input type='hidden' name='listicId' value='{$p['listic_id']}'/>
                </form></td>
    </tr>
{/foreach}
</table>

{* FORMA ZA UREĐIVANJE LISTIĆA *}
{if isset($urediListic)}
<form method="post" enctype='multipart/form-data'>
    <table>
        <tr>
            <td><label for="brojevi[]">Brojevi:</label></td>
            <td>
                {for $broj = 1 to 50}
                    <input class="single-checkbox" type="checkbox" name="brojevi[]" value="{$broj}" 
                        {if isset($urediBrojevi) && in_array($broj, $urediBrojevi)}checked="checked"{/if}
                        >{$broj}
                    {if $broj % 5 == 0}<br>{/if}
                {/for}
            </td>
            <td></td>
        </tr>
        <tr>
            <td><label for="telefon">Telefon:</label></td>
            <td><input name="telefon" type="tel" size="20" value="{$telefon}"/></td>
        </tr>
        <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input name="email" type="email" size="20" value="{$email}"/></td>
        </tr>
        <tr>
            <td><label for="adresa">Adresa:</label></td>
            <td><input name="adresa" type="text" size="20" value="{$adresa}"/></td>
        </tr>
    </table>
    <input name="listicId" type="hidden" value="{$listicId}"/>
    <input name="azurirajListic" type="submit" value="Spremi"/>
</form>
{/if}

<br><br>

{* PRIKAZ ODIGRANIH LISTIĆA *}
<h3>Odigrani listići</h3>
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
                <th>Broj listića</th>
                <th>Status listića</th>
                <th>Broj pogodaka</th>
                <th>Dobitak</th>
                <th></th>
                
            </tr>
            {foreach from=$odigraniListici item=l}
                {if $l['kolo_id'] == $k['kolo_id']}
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>{$l['listic_id']}</td>
                        <td>{$l['status']}</td>
                        <td>{$l['broj_pogodaka']}</td>
                        <td>{$l['dobitak']}kn</td>
                        {if $l['status'] == 'DOBITAN'}
                            <td>
                                <form method="post">
                                    <input name="listicId" type="hidden" value="{$l['listic_id']}"/>
                                    <input name="iznos" type="hidden" value="{$l['dobitak']}"/>
                                    <input name="posaljiZahtjev" type="submit" value="Posalji zahtjev za isplatu"/>
                                </form>
                            </td>
                        {/if}
                    </tr>
                {/if}
            {/foreach}
        </table>
        </foreach>
        {/if}
    {/foreach}
{/foreach}

</main>
