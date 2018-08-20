<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Dodavanje modela</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Dodavanje modela</h1>
<form action="model_dodvanje_db.php" method="post">
            Proizvodjac:
            <select name="Proizvodjac_ID">
            <?php
            // Povezivanje sa serverom baze podataka
            require ('baza_parametri.php');
            
            // Ucitavanje podata iz baze
            $upit = "select * from Proizvodjac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat){
                die(mysqli_error($bp));
            }
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
                echo "<option value='{$red->ID}'>{$red->Naziv}</option>\n";
            }
            ?>
            </select>
            <br />
            naziv: <input type="text" name="Naziv" />
            <br />
            Godina: <input type="text" name="Godina" />
            <br />
            Cena: <input type="text" name="Cena" />
            <hr /> 
            <button type="submit">Dodavanje</button> 
        </form> 
    </body> 
</html>