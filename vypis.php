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
            mysqli_set_charset($pripojenie, 'utf8');
            $dotaz = "SELECT * FROM hodnotenie";

            $vysledok = mysqli_query($pripojenie, $dotaz);

            echo "<table>";
            
            echo "<tr>
                    <th>id</th>
                    <th>prostredie</th>
                    <th>jedlo</th>
                    <th>chutovka</th>
                    <th>hodnotenie</th>
                </tr>";
            while($riadok = mysqli_fetch_assoc($vysledok)) {
                echo "<tr>";
                    echo "<td>".$riadok["id"]."</td>";
                    echo "<td>".$riadok["prostredie"]."</td>";
                    echo "<td>".$riadok["jedlo"]."</td>";
                    echo "<td>".$riadok["chutovka"]."</td>";
                    echo "<td>".$riadok["hodnotenie"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }











    ?>


    
</body>
</html>