<?php

// Poveziavanje sa bazom
require ('baza_parametri.php');

// Normalizacija ulaznih podataka
$ID = (int) @$_POST['ID'];
$Proizvodjac_ID = (int) @$_POST['Proizvodjac_ID'];
$Naziv  = mysqli_real_escape_string($bp, @$_POST['Naziv']);
$Godina = mysqli_real_escape_string($bp, @$_POST['Godina']);
$Cena   = mysqli_real_escape_string($bp, @$_POST['Cena']);

// Izmena u bazi
$upit = "update Model set Proizvodjac_ID='$Proizvodjac_ID', Naziv='$Naziv', Godina='$Godina', Cena='$Cena' where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
// Preusmeravanje na pocetnu stranicu
die(header("Location: model_pregled.php"));