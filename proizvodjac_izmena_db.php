<?php
//Povezivanje sa serverom baze podataka
require ('baza_parametri.php');

//Normalizacija ulaznih podataka
$ID    = (int) @$_REQUEST['ID'];
$Naziv = mysqli_real_escape_string($bp, @$_POST['Naziv']);

//Izmena podataka u bazi
$upit = "update Proizvodjac set Naziv='$Naziv' where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
//Preusmeravanje na pocetnu strnicu
die(header("Location: proizvodjac_pregled.php"));
