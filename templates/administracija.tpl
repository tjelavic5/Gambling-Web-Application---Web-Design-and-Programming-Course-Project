
<main>  
    <script src="javascript/administracija.js"></script>
    <h1 class="naslov">Administracija</h1>

    <p>Odaberite mod:</p>
    <input type="radio" id="odblokiranje" name="mod" value="O">
    <label for="odblokiranje">Odblokiranje</label><br>
    <input type="radio" id="blokiranje" name="mod" value="B">
    <label for="blokiranje">Blokiranje</label><br>
  

    <div id="tablicaKorisniciDiv">

        <table id="tablicaKorisnici">
            <thead>
                <tr>
                    <th><a  style="cursor: pointer;">Korisničko ime</a></th>

                    <th><a  style="cursor: pointer;">Status</a></th>

                    <th><a  style="cursor: pointer;">Uloga</a></th>

                    <th><a  style="cursor: pointer;">Email</a></th>

                </tr>
            </thead>
            <tbody id="tbodyKorisnici">
            </tbody>
        </table>
    </div>
</main>