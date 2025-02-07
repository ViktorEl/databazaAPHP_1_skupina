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


    <form action="index.php" method="POST">
        <input type="text" name="vymazMeno"> <br>
        <input type="submit" name="vymaz" value="vymaz" >
    </form>


    <?php
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["login"]) && isset($_POST["heslo"])) {
                $db_server = "localhost";
                $db_meno = "root";
                $db_heslo = "vertrigo";
                $db_nazov = "udaje";

                $pripojenie = mysqli_connect($db_server, $db_meno, $db_heslo, $db_nazov);

                $meno = $_POST["login"];
                $heslo = $_POST["heslo"];

                $dopyt = "INSERT INTO pouzivatelia (meno, heslo)
                            VALUES ('$meno', '$heslo')";

                $odoslanie = mysqli_query($pripojenie, $dopyt);

                if($odoslanie) {
                    echo "registracia prebehla uspesne";
                }
                else {
                    die("chyba neodoslali ste nic");
                }        
        }
    }

    if(isset($_POST["vymaz"])) {
        if(isset($_POST["vymazMeno"])) {
            $db_server = "localhost";
                $db_meno = "root";
                $db_heslo = "vertrigo";
                $db_nazov = "udaje";

                $pripojenie = mysqli_connect($db_server, $db_meno, $db_heslo, $db_nazov);

            $menoNaZmazanie = $_POST["vymazMeno"];
            $dopyt = "DELETE FROM pouzivatelia WHERE meno='$menoNaZmazanie'";

            $vymazanie = mysqli_query($pripojenie, $dopyt);

            if($vymazanie) {
                echo "meno zmazane";
            }
            else {
                die("chyba");
            }


        }
    }




    ?>




</body>
</html>