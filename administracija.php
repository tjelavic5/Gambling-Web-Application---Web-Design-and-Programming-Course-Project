<?php

require './osnovno.php';

if(isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 1){
    $smarty->display("zaglavlje.tpl");
    $smarty->display("administracija.tpl");
    $smarty->display("podnozje.tpl");
}

