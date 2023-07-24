<?php

class Dnevnik {

    private $nazivDatoteke = "izvorne_datoteke/dnevnik.log";

    public function setNazivDatoteke($nazivDatoteke): void {
        $this->nazivDatoteke = $nazivDatoteke;
    }

    /**
     * Funkcija za dodavanje u dnevnik!
     * @param type $tekst
     * @param type $baza - koristi bazu
     */
    public function spremiDnevnik($tekst, $upit, $radnja, $baza = false) {
        $veza = new Baza();
        $veza->spojiDB();
        if ($baza) {
            //TODO spremi u bazu
            $datum = date('Y-m-d H:i:s');
            $datum = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $datum)));
            $korisnik = $_SESSION["korisnik"];
            $upit_dnevnik = "INSERT INTO dnevnik (radnja,upit,datum_vrijeme,korisnik)"
                    . "VALUES ('$radnja','$upit','$datum' ,'$korisnik')";
            $veza->selectDB($upit_dnevnik);
        } else {
            $f = fopen($this->nazivDatoteke, "a+");
            fwrite($f, date("d.m.Y H:i:s") . " " . $tekst . "\n");
            fclose($f);
        }
        $veza->zatvoriDB();
    }

    public function citajDnevnik($baza = false) {
        if ($baza) {
            //TODO spremi u bazu
        } else {
            return file($this->nazivDatoteke);
        }
    }

}
