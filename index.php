<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Registrácia</h3>

    <form action="index.php" method="post">
        <input type="text" name="login" placeholder="Zadajte login" required> <br>
        <input type="password" name="heslo" placeholder="Zadajte heslo" required> <br>
        <input type="submit" name="tlacidlo" value="Prihlasiť sa">
    </form>

    <?php
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["login"]) && isset($_POST["heslo"])) {
                $db_server = "localhost";
                $db_meno = "root";
                $db_heslo = "vertrigo";
                $db_nazov = "udaje";

                $pripojenie = mysqli_connect($db_server, $db_meno, $db_heslo, $db_nazov);

                if($pripojenie) {
                    echo "ste pripojeny";
                }
                else {
                    die("chyba pripojenia");
                }
            }
        }





    ?>




</body>
</html>