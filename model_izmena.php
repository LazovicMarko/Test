<!DOCTYPE html>
<html>
    <head>
        <title>Izmena modela</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Izmena modela</h1> 
        <?php
        // Povezivanje sa serverom baze podataka
        require ('baza_parametri.php');
        
        // Normalizacija ulaznih podataka
        $ID = (int) @$_REQUEST['ID'];

        // Ucitavanje podataka iz baze podataka
        $upit = "select * from Model where ID=$ID";
        $rezultat = mysqli_query($bp, $upit);

        // Provera da li je bilo gresaka i da li postoji trazeni zapis
        if (!$rezultat){
            die(mysqli_error($bp));
        }
        if (mysqli_num_rows($rezultat) != 1){
            die('Не постоји модел са задатим ID параметром.');
        }
        // Prebacivanje podatak iz baze u php objekat
        $Model = mysqli_fetch_object($rezultat);
        ?>
        <form action="model_izmena_db.php" method="post">
            ID: <input type="text" name="ID" value="<?php echo $Model->ID; ?>" readonly />
            <br />
            Proizvodjac:
            <select name="Proizvodjac_ID">
            <?php
            // Povezivanje sa bazom
            require ('baza_parametri.php');
            
            // Ucitavanj podatak iz abaze
            $upit = "select * from Proizvodjac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat){
                die(mysqli_error($bp));
            }
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
                if ($Model->Proizvodjac_ID == $red->ID){
                    echo "<option value='{$red->ID}' selected>{$red->Naziv}</option>\n";
                }else{
                    echo "<option value='{$red->ID}'>{$red->Naziv}</option>\n";
                }
            }
            ?>
            </select>
            <br />
            Naziv: <input type="text" name="Naziv" value="<?php echo $Model->Naziv; ?>" />
            <br />
            Godina: <input type="text" name="Godina" value="<?php echo $Model->Godina; ?>" />
            <br />
            Cena: <input type="text" name="Cena" value="<?php echo $Model->Cena; ?>" />
            <hr />
            <button type="submit">Izmena</button>
        </form>
    </body>
</html>