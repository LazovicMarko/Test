<?php

// Povezivanje sa serverom baze podataka
require ('baza_parametri.php');

// Normalizacija ulaznih podataka
$Proizvodjac_ID = (int) @$_POST['Proizvodjac_ID'];
$Naziv  = mysqli_real_escape_string($bp, @$_POST['Naziv']);
$Godina = mysqli_real_escape_string($bp, @$_POST['Godina']);
$Cena   = mysqli_real_escape_string($bp, @$_POST['Cena']);

// Unos novog zapisa u tabelu
$upit = "insert into Model (Proizvodjac_ID, Naziv, Godina, Cena) values ($Proizvodjac_ID, '$Naziv', '$Godina', '$Cena')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
	die(mysqli_error($bp));
}
// Raskid veze sa bazom podataka
mysqli_close($bp);

// Preusmeravanje na frmular za unos
die(header("Location: model_pregled.php"));