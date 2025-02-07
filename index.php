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
    include "funkcie.php";
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["login"]) && isset($_POST["heslo"])) {

            pripojenieDoDatabazy("localhost", "root", "vertrigo", "udaje");

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

    ?>




</body>
</html>