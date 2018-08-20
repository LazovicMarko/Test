<?php

// Povezivanje sa serverom baze podataka
require ('baza_parametri.php');

// Normalizacija ulaznih podataka
$ID = (int) @$_REQUEST['ID'];

// Uklanjanje podatka iz baze
$upit = "delete from Model where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
//Preusmeravanje na pocetnu stranicu 
die(header("Location: model_pregled.php"));