<main>
<h1><b>{$naziv_igre}</b> - nova igra</h1>

{* GENERATOR RANDOM BROJEVA *}
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

{* ZA PRIKAZ / SKRIVANJE GENERATORA *}
<script>
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
</script>
<button onclick="otvoriGenerator()" id="otvoriGeneratorBt">Generiraj brojeve</button>

{* FORMA ZA UNOS LISTIĆA *}
<form method="post" enctype='multipart/form-data'>
    <table>
        <tr>
            <td><label for="brojevi[]">Brojevi:</label></td>
            <td>
                {for $broj = 1 to 50}
                    <input class="single-checkbox" type="checkbox" name="brojevi[]" value="{$broj}" 
                        {if isset($randomBrojevi) && in_array($broj, $randomBrojevi)}checked="checked"{/if}
                        >{$broj}
                    {if $broj % 5 == 0}<br>{/if}
                {/for}
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

{* ZA LIMIT ODABRANIH BROJEVA *}
<script>
    var limit = {$broj_izvlacenja};
        $('input.single-checkbox').on('change', function(evt) {
           if($(this).siblings(':checked').length >= limit) {
               this.checked = false;
           }
        });
</script>

</main>
