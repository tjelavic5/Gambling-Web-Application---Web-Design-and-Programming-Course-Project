<main>  
    <script src="javascript/prijava.js"></script>
    <h1 class="naslov">Prijava</h1>

    <form class="formaPrijavaiRegistracija" action="skripta_prijava.php" method="POST">
        {if isset($zapamtiMe)}
            <label for="korisnickoIme">Korisničko ime: (zapamćeno) </label>
            <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder=" " value="{$zapamtiMe}" required="required"/>
        {/if}
        {if !isset($zapamtiMe)}
            <label for="korisnickoIme">Korisničko ime: </label>
            <input name="korisnickoIme" id="korisnickoIme" type="text" placeholder=" " required="required"/>
        {/if}

        <label for="lozinka">Lozinka: </label>
        <input name="lozinka" id="lozinka" type="password" placeholder=" "/>

        <label for="zapamtiMe">Zapamti me</label>
        <input name="zapamtiMe" id="zapamtiMe" type="checkbox" value="1">

        <button name="prijava" type="submit" value="prijava">Prijavi se</button>

        <label for="zaboravljenaLozinka">Zaboravljena lozinka</label>
        <input name="zaboravljenaLozinka" id="zaboravljenaLozinka" type="checkbox" value="1">
    </form>
</main>