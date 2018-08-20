<?php
//Povezivanje sa bazom podataka
require ('baza_parametri.php');

//Normalizacija ulaznih podataka
$Naziv   = mysqli_real_escape_string($bp, @$_POST['Naziv']);

//Upis novih zapisa u bazu podataka
$upit = "insert into Proizvodjac (Naziv) values ('$Naziv')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}

//Rskid vze sa bazom
mysqli_close($bp);
//Preusmeravanje na formular za unos
die(header("Location: proizvodjac_pregled.php"));