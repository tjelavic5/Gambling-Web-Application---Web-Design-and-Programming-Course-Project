
<main>  
    <h1 class="naslov">Početna stranica</h1>

    <p class="naslov">Dobrodošli na stranicu za igre na sreću!</p>

    {if isset($smarty.session.uloga)}
    <p>
        <br>
        {if $smarty.session.uloga == 1}
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
                                    {foreach from=$moderatori item=p}
                                        <option value='{$p['korisnik_id']}'>{$p["korisnicko_ime"]}</option>
                                    {/foreach}
                                </select></td>
                        </tr>
                    </table>
                    <input name="dodajLutriju" type="submit" value="Dodaj"/>
                </form>
            </div>
            <script>
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
            </script>
        {/if}
        <br>
        <h1>Odaberite željenu lutriju:</h1>
        <br>
        <table>
            {foreach from=$lutrije item=p}
                <tr>
                    <td><a href='lutrija.php?lutrija_id={$p['lutrija_id']}'>{$p['naziv_lutrije']}</a></td>
                    {if $smarty.session.uloga == 1}
                        <td><form action='index.php' method='post'>
                            <input type='submit' name='urediLutriju' value='Uredi'/>
                            <input type='hidden' name='urediId' value='{$p['lutrija_id']}'/>
                            <input type='hidden' name='urediNaziv' value='{$p['naziv_lutrije']}'/></form>
                        </td>
                    {/if}
                </tr>
            {/foreach}
        </table>

            {if isset($urediLutriju)}
            <div id="uredjivanjeLutrije" style="display: 'block'">
                <form method="post" action="index.php">
                    <table>
                        <tr>
                            <td><label for="nazivLutrije">Naziv lutrije:</label></td>
                            <td><input name="nazivLutrije" type="text" size="20" maxlength="30" id="nazivLutrije" value="{$urediNaziv}"/></td>
                        </tr>
                        <tr>
                            <td><label for="moderatori[]">Moderatori:</label></td>
                            <td><select name="moderatori[]" multiple="multiple">
                                    {foreach from=$moderatori item=p}
                                        <option value='{$p['korisnik_id']}' {if in_array($p['korisnik_id'], $moderatoriLutrije)}
                                                                            selected='selected'{/if}>
                                        {$p["korisnicko_ime"]}</option>
                                    {/foreach}
                                </select></td>
                        </tr>
                    </table>
                    <input name="urediId" type="hidden" value="{$urediId}"/>
                    <input name="azurirajLutriju" type="submit" value="Spremi promjene"/>
                </form>
                <br><br>
            </div>
        {/if}
    </p>

{/if}




    <a class="naslov" href='dokumentacija.html'>Dokumentacija</a>
    <br>
    <a class="naslov" href='o_autoru.html'>O autoru</a>
</main>

   