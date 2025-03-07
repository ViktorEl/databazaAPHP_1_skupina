<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <h2>Vypis z db</h2>

    <form action="vypis.php" method="get">
        <input type="submit" name="tlacidlo" value="Vypíš">
    </form>

    <?php
        if(isset($_GET["tlacidlo"])) {
            $server = "localhost";
            $meno = "root";
            $heslo = "vertrigo";
            $nazov_db = "restauracia";
            
            $pripojenie = mysqli_connect($server, $meno, $heslo, $nazov_db);

            $dotaz = "SELECT * FROM hodnotenie";

            $vysledok = mysqli_query($pripojenie, $dotaz);

            echo "id prostredie jedlo chutovka hodnotenie";
            echo "<br>";
            while($riadok = mysqli_fetch_assoc($vysledok)) {
                echo $riadok["id"]." ".$riadok["prostredie"]." ".$riadok["jedlo"]." ".$riadok["chutovka"]." ".$riadok["hodnotenie"];
                echo "<br>";
            
            }





        }






    ?>


    
</body>
</html>