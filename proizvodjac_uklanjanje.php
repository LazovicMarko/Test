<?php

//Povezivanje sa bazom podataka
require ('baza_parametri.php');

//Normalizacija ulaznih podataka
$ID = (int) @$_REQUEST['ID'];

//Uklanjanje iz baze
$upit = "DELETE FROM Proizvodjac WHERE ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
//Preusmerivanje na pocetnu stranicu
die(header("Location: proizvodjac_pregled.php"));