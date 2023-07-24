<?php

include '../baza.class.php';

$veza = new Baza();
$veza->spojiDB();

$sql = "SELECT k.korisnicko_ime, k.lozinka, u.tip FROM korisnik k, tip_korisnika u WHERE k.tip_korisnika_id = u.tip_korisnika_id";
$rezultat = $veza->selectDB($sql);


$table = "<table>" .
        "<thead>" .
        "<tr>" .
        "<th><a>Korisncko ime</a></th>" .
        "<th><a>Lozinka</a></th>" .
        "<th><a>Uloga</a></th>" .
        "</tr>" .
        "</thead>";

echo $table;

if (!empty($rezultat)) {
    while ($row = mysqli_fetch_assoc($rezultat)) {
        //echo " <a style=\"color:red;\">korisnicko ime:</a>" .$row["korisnicko_ime"] . " <a style=\"color:red;\">lozinka:</a> " .$row["lozinka"]. "  <a style=\"color:red;\">uloga</a> ". $row["naziv"]. "<br>";
        echo "<tr>"
        . "<td>" . $row["korisnicko_ime"] . "</td>"
        . "<td>" . $row["lozinka"] . "</td>"
        . "<td>" . $row["tip"] . "</td>"
        . "</tr>";
    }
}

