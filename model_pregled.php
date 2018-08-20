<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pregled modela</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Pregled modela</h1>
<table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proizvodjac</th>
                    <th>Model</th>
                    <th>Godina</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <?php
            // Povezivanje sa bazom
            require ('baza_parametri.php');
            
            //Ucitavanje proizvodjaca u niz indeksovan vredoscu ID-a
            $Proizvodjaci = array();
            $rezultat = mysqli_query($bp, 'select * from Proizvodjac');
            if (!$rezultat){
                die(mysqli_error($bp));
            }
            while ($red = mysqli_fetch_object($rezultat)){
                $Proizvodjaci[$red->ID] = $red;
            }
            // Ucitavanje iz modela baze
            $upit = "select * from Model";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat){
                die(mysqli_error($bp));
            }
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
                echo "<tr>\n";
                echo " <td>{$red->ID}</td>\n";
                echo " <td>{$Proizvodjaci[$red->Proizvodjac_ID]->Naziv}</td>\n";
                echo " <td>{$red->Naziv}</td>\n";
                echo " <td>{$red->Godina}</td>\n";
                echo " <td>{$red->Cena}</td>\n";
                echo " <td><a href='model_izmena.php?ID={$red->ID}'>Izmena</a></td>\n";
                echo " <td><a href='model_uklanjanje_db.php?ID={$red->ID}'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>
        </table>
        <hr />
        <a href="index.php">Pocetna</a>
        <a href="model_dodavanje.php">Dodavanje novog modela</a>
    </body>
</html>