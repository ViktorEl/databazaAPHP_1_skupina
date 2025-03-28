<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registrácia</h2>

    <form action="registracia.php" method="post">
        <input type="email" name="mail" placeholder="Zadajte email" required> <br>
        <input type="password" name="heslo" placeholder="Zadajte heslo" required> <br>
        <input type="submit" name="tlacidlo" value="Registruj"> <br>
    </form>

    <?php
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["mail"]) && isset($_POST["heslo"])) {
                $db_server = "localhost";
                $db_login = "root";
                $db_heslo = "vertrigo";
                $db_nazov = "prihlasenie";

                $connection = mysqli_connect($db_server, $db_login, $db_heslo, $db_nazov);
                mysqli_set_charset($connection, "utf8");

                $mail = $_POST["mail"];
                $mail = mysqli_real_escape_string($connection, $mail);

                $sqlQuery = "SELECT * FROM udaje";
                $result = mysqli_query($connection, $sqlQuery);

                while($row = mysqli_fetch_assoc($result)) {
                    $kontrolaMail = $row["email"];
                    if($mail == $kontrolaMail) {
                        die("Chyba mail už existuje");
                    }
                }



                $heslo = $_POST["heslo"];
                $heslo = mysqli_real_escape_string($connection, $heslo);

                $hashHeslo = password_hash($heslo, PASSWORD_DEFAULT);

                $query = "INSERT INTO udaje (email, heslo) VALUES('$mail', '$hashHeslo')";
                $send = mysqli_query($connection, $query);
                if(!$send) {
                    die("Chyba odosielania");
                }
                else {
                    echo "Registracia prebehla uspesne";
                }


            }
        }




    ?>



    
</body>
</html>
