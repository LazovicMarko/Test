<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Izmena proizvodjaca</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Izmena proizvodjaca</h1>
<?php
//Povezivanje sa serverom baze podataka
require ('baza_parametri.php');

//Normalizacija ulaznih podataka
$ID = (int) @$_REQUEST['ID'];

//Ucitavanje podataka iz baze
$upit = "SELECT * FROM Proizvodjac where ID=$ID";
$rezultat = mysqli_query($bp, $upit);

//Provera gresaka i da li postoji trazeni zapis

if(!$rezultat){
    die(mysqli_error($bp));
}
if(mysqli_num_rows($rezultat) != 1){
    die('Ne mostoji proizvodjac sa tim ID-jem!');
}
// Prebacivanje rezultata u objekat 'Proizvodjac'
$Proizvodjac = mysqli_fetch_object($rezultat);
?>
    <form action="proizvodjac_izmena_db.php" method="post">
    ID: <input type="text" name="ID" value="<?php echo $Proizvodjac->ID; ?>" readonly />
    <br />
    Назив: <input type="text" name="Naziv" value="<?php echo $Proizvodjac->Naziv; ?>" />
    <hr />
    <button type="submit">Измена</button>
    </form>
</body>
</html>>