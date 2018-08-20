<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pregled proizvodjaca</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Pregled proizvodjaca</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
            </tr>
        </thead>
        <?php
        require ('baza_parametri.php');

        $upit = "SELECT * FROM Proizvodjac";
        $rezultat = mysqli_query($bp, $upit);
        if(!$rezultat){
            die(mysqli_error($bp));
        }
            while($red = mysqli_fetch_object($rezultat))
            {
                echo "<tr>\n";
                echo " <td>{$red->ID}</td>\n";
                echo " <td>{$red->Naziv}</td>\n";
                echo " <td><a href='proizvodjac_izmena.php?ID={$red->ID}'>Измена</a></td>\n";
                echo " <td><a href='proizvodjac_uklanjanje.php?ID={$red->ID}'>Уклањање</a></td>\n";
                echo "</tr>\n";
            }
        
        
        ?>
    </table>   
    <hr />
        <a href="index.php">POcetna</a>
        <a href="proizvodjac_dodavanje.php">Dodavanje novog proizvodjaca</a> 
</body>
</html>