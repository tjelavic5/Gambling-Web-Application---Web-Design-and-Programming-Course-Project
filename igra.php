<?php

require 'osnovno.php';

//ako nije registriran
if(!(isset($_SESSION["uloga"]))){
    header("Location: index.php");
    exit();
}

if (isset($_GET["igra_id"])) {
    $pridruzena_igra_id = $_GET["igra_id"];
    $veza = new Baza();
    $veza->spojiDB();
    
    //dohvaca naziv igre
    $upit = "SELECT * FROM pridruzena_igra LEFT JOIN igra ON pridruzena_igra.igra_id = igra.igra_id WHERE pridruzena_igra_id = '{$pridruzena_igra_id}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $smarty->assign("naziv_igre",$red['naziv']);
    $smarty->assign("broj_izvlacenja",$red['broj_izvlacenja']);
    $smarty->assign("pridruzena_igra_id",$pridruzena_igra_id);
} else {
    header("Location: ./index.php");
    exit();
}

//dodavanje listica
if(isset($_POST["dodajListic"])){
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $brojevi = array();
    foreach ($_POST["brojevi"] as $broj){
        array_push($brojevi, $broj);
    }
    $korisnik = $_SESSION["korisnik"];
    
    //dio za rad s datotekama
    $userfile = $_FILES['slika']['tmp_name'];
    $userfile_name = $_FILES['slika']['name'];
    $userfile_size = $_FILES['slika']['size'];
    $userfile_type = $_FILES['slika']['type'];
    $userfile_error = $_FILES['slika']['error'];
    if ($userfile_error > 0) {
        echo 'Problem: ';
        switch ($userfile_error) {
            case 1: echo 'Veličina veća od ' . ini_get('upload_max_filesize');
                break;
            case 2: echo 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
                break;
            case 3: echo 'Datoteka djelomično prenesena';
                break;
            case 4: echo 'Datoteka nije prenesena';
                break;
        }
        exit;
    }

    /*if (!file_exists("materijali/{$korisnik}")) {
        umask(0);
        mkdir("materijali/{$korisnik}", 0777, true);
    }*/
    $upfile = "materijali/" . $userfile_name;

    if (is_uploaded_file($userfile)) {
        if (!move_uploaded_file($userfile, $upfile)) {
            echo 'Problem: nije moguće prenijeti datoteku na odredište';
            exit;
        }
    } else {
        echo 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
        exit;
    }
    
    $veza = new Baza();
    $veza->spojiDB();
    
    //dohvacanje otvorenog kola
    $upit = "SELECT kolo_id FROM kolo where igra_id = '{$pridruzena_igra_id}' AND status = '0';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $kolo_id = $red[0];
    
    //dohvacanje korisnika
    $upit = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '{$korisnik}';";
    $rezultat = $veza->selectDB($upit);
    $red = mysqli_fetch_array($rezultat);
    $korisnik_id = $red[0];
    
    $veza->insertListic($brojevi, $telefon, $email, $adresa, $upfile, $kolo_id, $korisnik_id);
    $veza->zatvoriDB();
    header("Location: ./moji_listici.php");
    exit();
}

//generiranje random brojeva
if(isset($_POST["generiraj"])){
    $pocetniBroj = $_POST["pocetniBroj"];
    $zavrsniBroj = $_POST["zavrsniBroj"];
    $brojeva = $_POST["brojeva"];
    $randomBrojevi = array();
    for ($i = 0; $i < $brojeva; $i++){
        while(in_array($randomBroj = rand($pocetniBroj, $zavrsniBroj), $randomBrojevi)){
            
        }
        array_push($randomBrojevi, $randomBroj);
    }
    $smarty->assign("randomBrojevi", $randomBrojevi);
}


$smarty->display('zaglavlje.tpl');
$smarty->display('igra.tpl');
$smarty->display('podnozje.tpl');