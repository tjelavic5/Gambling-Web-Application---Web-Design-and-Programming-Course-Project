<?php

class Baza {

    const server = "localhost";
    const korisnik = "WebDiP2021x045";
    const lozinka = "admin_RqTY";
    const baza = "WebDiP2021x045";

    private $veza = null;
    private $greska = '';

    function spojiDB() {
        $this->veza = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);
        if ($this->veza->connect_errno) {
            echo "Neuspješno spajanje na bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        $this->veza->set_charset("utf8");
        if ($this->veza->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        return $this->veza;
    }

    function zatvoriDB() {
        $this->veza->close();
    }

    function selectDB($upit) {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        if (!$rezultat) {
            $rezultat = null;
        }
        return $rezultat;
    }

    function updateDB($upit, $skripta = '') {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        } else {
            if ($skripta != '') {
                header("Location: $skripta");
            }
        }

        return $rezultat;
    }

    function pogreskaDB() {
        if ($this->greska != '') {
            return true;
        } else {
            return false;
        }
    }
    
    function insertLutrija($nazivLutrije, $moderatori) {

        $upit = "INSERT INTO lutrija_2 (naziv_lutrije) VALUES ('{$nazivLutrije}');";
        $rezultat = $this->veza->query($upit);
        if ($rezultat != 1) {
            return false;
        }
        $lutrija_id = $this->veza->insert_id;
        foreach ($moderatori as $moderator) {
            $upit = "INSERT INTO moderator_lutrije (korisnik_id, lutrija_id) VALUES ('{$moderator}', '{$lutrija_id}');";
            $rezultat = $this->veza->query($upit);
        }
        return $rezultat;
    }
    
    function updateLutrija($lutrijaId, $nazivLutrije, $moderatori) {

        $upit = "UPDATE lutrija_2 SET naziv_lutrije = '{$nazivLutrije}' WHERE lutrija_id = '{$lutrijaId}';";
        $rezultat = $this->veza->query($upit);
        if ($rezultat != 1) {
            return false;
        }

        $upit = "DELETE FROM moderator_lutrije WHERE lutrija_id = '{$lutrijaId}';";
        $rezultat = $this->veza->query($upit);

        foreach ($moderatori as $moderator) {
            $upit = "INSERT INTO moderator_lutrije (lutrija_id, korisnik_id) VALUES ('{$lutrijaId}', '{$moderator}');";
            $rezultat = $this->veza->query($upit);
        }
        return $rezultat;
    }
    
    
    function insertIgra($nazivIgre, $brojIzvlacenja) {

        $upit = "INSERT INTO igra (naziv, broj_izvlacenja) VALUES ('{$nazivIgre}', '{$brojIzvlacenja}');";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function updateIgra($igraId, $nazivIgre, $brojIzvlacenja) {

        $upit = "UPDATE igra SET naziv = '{$nazivIgre}', broj_izvlacenja = '{$brojIzvlacenja}' WHERE igra_id = '{$igraId}';";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function insertFond($igraId, $brojPogodaka, $iznos) {

        $upit = "INSERT INTO fond_dobitaka (igra_id, broj_pogodenih_brojeva, iznos) VALUES ('{$igraId}', '{$brojPogodaka}', '{$iznos}');";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    
    function pridruziIgru($lutrija_id, $igraId, $vrijemeOd, $vrijemeDo, $cijenaListica){
        
        $upit = "INSERT INTO pridruzena_igra (lutrija_id, igra_id, vrijeme_pocetka, vrijeme_zavrsetka, cijena_listica) VALUES " .
                "('{$lutrija_id}', '{$igraId}', '{$vrijemeOd}', '{$vrijemeDo}', '{$cijenaListica}');";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function updatePridruzenaIgra($pridruzenaIgraId, $vrijemeOd, $vrijemeDo, $cijenaListica){
        
        $upit = "UPDATE pridruzena_igra SET vrijeme_pocetka = '{$vrijemeOd}', vrijeme_zavrsetka = '{$vrijemeDo}', cijena_listica = '{$cijenaListica}'" . 
                " WHERE pridruzena_igra_id = '{$pridruzenaIgraId}';";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function dodajKolo($pridruzena_igra_id, $nazivKola, $vrijemeIsplate, $status){
        
        $upit = "INSERT INTO kolo (igra_id, naziv, vrijeme_isplate, status) VALUES " .
                "('{$pridruzena_igra_id}', '{$nazivKola}', '{$vrijemeIsplate}', '{$status}');";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function updateKolo($kolo_id, $naziv, $vrijeme_isplate, $status){
        
        $upit = "UPDATE kolo SET naziv = '{$naziv}', vrijeme_isplate = '{$vrijeme_isplate}', status = '{$status}'" . 
                " WHERE kolo_id = '{$kolo_id}';";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    
    function insertListic($brojevi, $telefon, $email, $adresa, $slika, $kolo_id, $korisnik_id){

        $upit = "INSERT INTO listic (telefon, email, adresa, slika, kolo_id, status, korisnik_id) VALUES ('{$telefon}', " . 
                "'{$email}', '{$adresa}', '{$slika}', '{$kolo_id}', 'NIJE_ODIGRAN', '{$korisnik_id}');";
        $rezultat = $this->veza->query($upit);
        if ($rezultat != 1) {
            return false;
        }
        $listic_id = $this->veza->insert_id;
        foreach ($brojevi as $broj) {
            $upit = "INSERT INTO broj (broj, listic_id) VALUES ('{$broj}', '{$listic_id}');";
            $rezultat = $this->veza->query($upit);
        }
        return $rezultat;
    }
    
    function updateListic($listicId, $brojevi, $telefon, $email, $adresa){
        
        $upit = "UPDATE listic SET telefon = '{$telefon}', email = '{$email}', adresa = '{$adresa}'" . 
                " WHERE listic_id = '{$listicId}';";
        $rezultat = $this->veza->query($upit);
        if ($rezultat != 1) {
            return false;
        }
        $listic_id = $this->veza->insert_id;
        $upit = "DELETE FROM broj WHERE listic_id = '{$listicId}';";
        $rezultat = $this->veza->query($upit);
        foreach ($brojevi as $broj) {
            $upit = "INSERT INTO broj (broj, listic_id) VALUES ('{$broj}', '{$listicId}');";
            $rezultat = $this->veza->query($upit);
        }
        return $rezultat;
    }
    
    
    function izvuciBrojeve($koloId, $brojevi){
        
        $upit = "UPDATE listic SET status = 'NIJE_DOBITAN' WHERE kolo_id = '{$koloId}';";
        $rezultat = $this->veza->query($upit);
        
        foreach ($brojevi as $broj) {
            $upit = "INSERT INTO dobitni_broj (kolo_id, broj) VALUES ('{$koloId}', '{$broj}');";
            $rezultat = $this->veza->query($upit);
            
            $upit = "UPDATE listic SET status = 'DOBITAN' WHERE listic.kolo_id = '{$koloId}' AND " . 
                    "listic.status = 'NIJE_DOBITAN' AND '{$broj}' IN " . 
                            "(SELECT broj FROM broj WHERE broj.listic_id = listic.listic_id);";
            $rezultat = $this->veza->query($upit);
        }
        
        return $rezultat;
    }
    
    
    function posaljiZahtjev($listicId, $iznos){
        
        $upit = "INSERT INTO zahtjev (listic_id, status, iznos) VALUES ('{$listicId}', 'NOVI', '{$iznos}');";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function potvrdiIsplatu($zahtjevId, $listicId){
        
        $upit = "UPDATE zahtjev SET status = 'ODOBREN' WHERE zahtjev_id = '{$zahtjevId}';";
        $rezultat = $this->veza->query($upit);
        if ($rezultat != 1) {
            return false;
        }
        $upit = "UPDATE listic SET status = 'ISPLACEN' WHERE listic_id = '{$listicId}';";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }
    
    function odbijIsplatu($zahtjevId){
        
        $upit = "UPDATE zahtjev SET status = 'ODBIJEN' WHERE zahtjev_id = '{$zahtjevId}';";
        $rezultat = $this->veza->query($upit);
        return $rezultat;
    }

}

?>