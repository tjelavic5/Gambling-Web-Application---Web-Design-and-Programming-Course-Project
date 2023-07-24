<main>
<h1 class="naslov">{$naziv_lutrije}</h1>

{* PRIKAZ POP-UP PORUKE *}
{if isset($poruka)}
    <script>
        alert("Već postoji otvoreno kolo!");
    </script>
{/if}

{* PRIKAZ ZA MODERATORA LUTRIJE *}
{if $moderator_lutrije == 1}
    {* ISPIS MOGUĆIH IGRI *}
    <table>
        {foreach from=$igre item=p}
            <tr>
                <td>{$p['naziv']}</td>
                <td>{$p['broj_izvlacenja']}</td>
                {* GUMB ZA PRIDRUŽIVANJE IGRE *}
                <td>
                    <form method='post'>
                        <input type='submit' name='dodavanjeIgre' value='Dodaj'/>
                        <input type='hidden' name='igra_id' value='{$p['igra_id']}'/>
                        <input type='hidden' name='naziv' value='{$p['naziv']}'/>
                    </form>
                </td>
            </tr>
        {/foreach}
    </table>

    {* PRIDRUŽIVANJE IGRE LUTRIJI *}
    {if isset($dodavanjeIgre)}
        <h2>{$naziv}</h2>
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
            <input name="igraId" type="hidden" value="{$igra_id}"/>
            <input name="dodajIgru" type="submit" value="Dodaj igru"/>
        </form>
    {/if}

    <br><br><h2>Pridružene igre</h2><br>
    {* PRIKAZ PRIDRUŽENIH IGRI *}
    {foreach from=$pridruzeneIgre item=p}
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
                <td>{$p['naziv']}</td>
                <td>{$p['vrijeme_pocetka']}</td>
                <td>{$p['vrijeme_zavrsetka']}</td>
                <td>{$p['cijena_listica']}</td>
                {* GUMB ZA UREĐIVANJE PRIDRUŽENE IGRE *}
                <td>
                    <form method='post'>
                        <input type='submit' name='urediIgru' value='Uredi igru'/>
                        <input type='hidden' name='pridruzena_igra_id' value='{$p['pridruzena_igra_id']}'/>
                        <input type='hidden' name='naziv' value='{$p['naziv']}'/>
                        <input type='hidden' name='vrijeme_pocetka' value='{$p['vrijeme_pocetka']}'/>
                        <input type='hidden' name='vrijeme_zavrsetka' value='{$p['vrijeme_zavrsetka']}'/>
                        <input type='hidden' name='cijena_listica' value='{$p['cijena_listica']}'/>
                    </form>
                </td>
                {* GUMB ZA DODAVANJE KOLA *}
                <td>
                    <form method='post'>
                        <input type='submit' name='dodavanjeKola' value='Dodaj kolo'/>
                        <input type='hidden' name='pridruzena_igra_id' value='{$p['pridruzena_igra_id']}'/>
                    </form>
                </td>
            </tr>
        </table>

        {* PRIKAZ KOLA *}
        <table>
            <tr>
                <th></th>
                <th>Kolo</th>
                <th>Vrijeme isplate</th>
                <th>Status</th>
                <th></th>
            </tr>
        {foreach from=$kola item=k}
            {if $k['igra_id'] == $p['pridruzena_igra_id']}
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>{$k['naziv']}</td>
                    <td>{$k['vrijeme_isplate']}</td>
                    <td>{if $k['status'] == 0}OTVORENO
                        {else}ZATVORENO{/if}</td>
                    {* GUMB ZA UREĐIVANJE KOLA *}
                    <td>
                        <form method='post'>
                            <input type='submit' name='uredjivanjeKola' value='Uredi igru'/>
                            <input type='hidden' name='kolo_id' value='{$k['kolo_id']}'/>
                            <input type='hidden' name='naziv' value='{$k['naziv']}'/>
                            <input type='hidden' name='vrijeme_isplate' value='{$k['vrijeme_isplate']}'/>
                            <input type='hidden' name='status' value='{$k['status']}'/>
                        </form>
                    </td>
                </tr>
            {/if}
        {/foreach}
        </table>
    {/foreach}

    {* DODAVANJE KOLA *}
    {if isset($dodavanjeKola)}
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
                <input name="pridruzena_igra_id" type="hidden" value="{$pridruzena_igra_id}"/>
                <input name="dodajKolo" type="submit" value="Dodaj"/>
            </form>
            <br><br>
        </div>
    {/if}

    {* UREĐIVANJE KOLA *}
    {if isset($uredjivanjeKola)}
        <div>
            <h3>Uredi kolo</h3>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="nazivKola">Naziv kola:</label></td>
                        <td><input name="nazivKola" type="text" size="20" value="{$naziv}"/></td>
                    </tr>
                    <tr>
                        <td><label for="vrijemeIsplate">Vrijeme isplate:</label></td>
                        <td><input name="vrijemeIsplate" type="datetime-local" size="20" value="{$vrijeme_isplate}"/></td>
                    </tr>
                    <tr>
                        <td><label for="status">Status kola:</label></td>
                        <td><input name="status" type="radio" value="0" {if $status == 0} checked="checked"{/if}/><label>Otvoreno</label><br>
                            <input name="status" type="radio" value="1" {if $status == 1} checked="checked"{/if}/><label>Zatvoreno</label></td>
                    </tr>
                </table>
                <input name="kolo_id" type="hidden" value="{$kolo_id}"/>
                <input name="urediKolo" type="submit" value="Spremi"/>
            </form>
            <br><br>
        </div>
    {/if}

    
    {* UREDJIVANJE IGRE *}
    {if isset($urediIgru)}
        <div>
            <h3>{$naziv}</h3>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="vrijemeOd">Vrijeme početka:</label></td>
                        <td><input name="vrijemeOd" type="datetime-local" size="20" value="{$vrijeme_pocetka}"/></td>
                    </tr>
                    <tr>
                        <td><label for="vrijemeDo">Vrijeme završetka:</label></td>
                        <td><input name="vrijemeDo" type="datetime-local" size="20" value="{$vrijeme_zavrsetka}"/></td>
                    </tr>
                    <tr>
                        <td><label for="cijenaListica">Cijena listića:</label></td>
                        <td><input name="cijenaListica" type="number" size="20" value="{$cijena_listica}"/></td>
                    </tr>
                </table>
                <input name="pridruzena_igra_id" type="hidden" value="{$pridruzena_igra_id}"/>
                <input name="azurirajIgru" type="submit" value="Spremi promjene"/>
            </form>
            <br><br>
        </div>
    {/if}

{/if}

<br><br>

{* PRIKAZ IGRI ZA REGISTRIRANOG KORISNIKA *}
<h1>Odaberite igru koju želite odigrati</h1>
{foreach from=$pridruzeneIgre item=p}
    <table>
        <tr>
            <td><a href="igra.php?igra_id={$p['pridruzena_igra_id']}">{$p['naziv']}</a></td>
        </tr>
    </table>
{/foreach}

</main>
