<main>
<h1 class="naslov">Statistika</h1>

{* STATISTIKA MODERATORA *}
{if $smarty.session.uloga <= 2}
    <h3>Najčešće izvučeni brojevi po igri</h3>
    {foreach from=$sveIgre item=i}
        <br>&nbsp;&nbsp;<b>{$i['naziv_igre']}</b><br>
        <table>
            <tr>
                <th></th>
                <th>Broj</th>
                <th>Broj izvlačenja</th>
            </tr>
            {foreach from=$brojevi item=b}
                {if $b['naziv_igre'] == $i['naziv_igre']}
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>{$b['broj']}</td>
                        <td>{$b['broj_ponavljanja']}</td>
                    </tr>
                {/if}
            {/foreach}
        </table>
    {/foreach}
{/if}

<br><br><br>

{* STATISTIKA REGISTRIRANOG KORISNIKA *}
<h3>Statistika dobitaka po igri</h3>
{foreach from=$igre item=i}
    <br>&nbsp;&nbsp;<b>{$i['naziv_igre']}</b><br>
    {foreach from=$dobitni item=d}
        {if $d['naziv_igre'] == $i['naziv_igre']}
            &nbsp;&nbsp;&nbsp;&nbsp;Dobitni listići: {$d['broj']}<br>
        {/if}
    {/foreach}
    {foreach from=$nedobitni item=n}
        {if $n['naziv_igre'] == $i['naziv_igre']}
            &nbsp;&nbsp;&nbsp;&nbsp;Nedobitni listići: {$n['broj']}<br>
        {/if}
    {/foreach}
{/foreach}

</main>