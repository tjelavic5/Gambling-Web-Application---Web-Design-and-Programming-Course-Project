<main>  
    <script src="javascript/registracija.js"></script>
    <h1 class="naslov">Registracija</h1>

    <form class="formaPrijavaiRegistracija" action="skripta_registracija.php" method="POST">
        <label for="korisnickoIme">Korisničko ime: </label>
        <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder="min 4, max 18, mogu biti slova i brojke" required="required"/>

        <label for="ime">Ime: </label>
        <input name="ime" id="ime" type="text" placeholder="min 2 znaka, mogu biti slova, max 20 znakova, ne smije biti Boris" required="required"/>
        <label for="prezime">Prezime: </label>
        <input name="prezime" id="prezime" type="text" placeholder="ne smije biti jednako imenu" required="required"/>

        <label for="email">Email: </label>
        <input name="email" id="email" type="email" placeholder="tjelavic@foi.hr" required="required"/>

        <label for="lozinka">Lozinka: </label>
        <input name="lozinka" id="lozinka" type="password" placeholder="min 5 znakova, min 1 slovo i min 1 broj, max 20 znakova" required="required"/>


        <label for="lozinkaPonovljena">Ponovi lozinku: </label>
        <input name="lozinkaPonovljena" id="lozinkaPonovljena" type="password" placeholder="lozinka" required="required"/>

        <input type="checkbox" id="uvjeti" name="uvjeti" value="true">
        <label for="uvjeti"> Prihvaćam uvjete korištenja</label><br>

        <button name="registracija" id="registracija" type="submit" value="registracija">Registriraj se</button>
    </form>
</main>