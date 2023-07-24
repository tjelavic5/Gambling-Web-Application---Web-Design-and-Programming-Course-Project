<!DOCTYPE html>
<html>
    <head>
        <title>Početna stranica</title>
        <meta charset="UTF-8">
        <meta name="author" content="Tea Jelavić">
        <meta name="date" content="06.06.2022">
        <meta name="fakultet" content="FOI">
        <meta name="kolegij" content="WebDiP">
        <meta name="zadatak" content="Projekt">
        <meta name="opis" content="Igre na sreću">
        <link href="Dizajn/CSS/main.css" type="text/css" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    
    
    <body>
         <nav>
            <a href='index.php'>Početna stranica</a>
            {if isset($smarty.session.uloga) && $smarty.session.uloga == 1}
                <a href='administracija.php'>Administracija</a>
                <a href='igre_na_srecu.php'>Igre na sreću</a>
            {/if}
            {if !isset($smarty.session.uloga)}
                <a href='prijava.php'>Prijava</a>
                <a href='registracija.php'>Registracija</a>
            {/if}
            {if isset($smarty.session.uloga) && $smarty.session.uloga <= 2}
                <a href='rezultati.php'>Rezultati</a>
            {/if}
            <a href='galerija.php'>Galerija</a>
            {if isset($smarty.session.uloga)}
                <a href='moji_listici.php'>Moji listići</a>
                <a href='statistika.php'>Statistika</a>
                <a href='odjava.php'>Odjava</a>
            {/if}
        </nav>
        
