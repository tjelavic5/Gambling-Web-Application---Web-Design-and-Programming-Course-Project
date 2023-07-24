<?php
require 'osnovno.php';

Sesija::obrisiSesiju();

fb($_SESSION["uloga"]);
header('location: index.php');