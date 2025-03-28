<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Prosíme vás o vyplnenie dotaznika</h2>
    <form action="index2.php" method="post">
        <h3>Ohodnotte prostrestredie reštauracie od 1 do 3</h3>
        <input type="radio" name="prostredie" value="1" required><label>Výborne</label> <br>
        <input type="radio" name="prostredie" value="2" required><label>Dobré</label> <br>
        <input type="radio" name="prostredie" value="3" required><label>Zlé</label> <br>

        <h3>Ohodnotte chuť pripraveného jedla</h3>
        <input type="radio" name="jedlo" value="1" required><label>Výborne</label> <br>
        <input type="radio" name="jedlo" value="2" required><label>Dobré</label> <br>
        <input type="radio" name="jedlo" value="3" required><label>Zlé</label> <br>

        <h3>Napíšte oblúbene jedlo</h3>
        <input type="text" name="chutovka" placeholder="Napíšte oblubene jedlo" required><br>

        <h3>Celková spokojnosť reštauracie</h3>
        <input type="number" name="hodnotenie" placeholder="Zadajte celkovu spokojnost od 1 do 5" min="1" max="5" required><br>

        <input type="submit" name="tlacidlo" value="Odoslať">

    </form>

    <?php
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["prostredie"]) && isset($_POST["jedlo"]) && isset($_POST["chutovka"]) && isset($_POST["hodnotenie"])) {
                $db_server = "localhost";
                $db_meno = "root";
                $db_heslo = "vertrigo";
                $db_nazov = "restauracia";

                $pripojenie = mysqli_connect($db_server, $db_meno, $db_heslo, $db_nazov);
                mysqli_set_charset($pripojenie, "utf8");

                $prostredieValue = $_POST["prostredie"];
                if($prostredieValue == "1") {
                    $prostredie = "výborné";
                }
                elseif($prostredieValue == "2") {
                    $prostredie = "dobré";
                }
                else {
                    $prostredie = "zlé";
                }
         
                $jedloValue = $_POST["jedlo"];
                if($jedloValue == "1") {
                    $jedlo = "výborné";
                }
                elseif($jedloValue == "2") {
                    $jedlo = "dobré";
                }
                else {
                    $jedlo = "zlé";
                }

                $chutovka = $_POST["chutovka"];
                $hodnotenie = $_POST["hodnotenie"];
           
     

        $dotaz = "INSERT INTO hodnotenie (prostredie, jedlo, chutovka, hodnotenie)
        VALUES ('$prostredie', '$jedlo', '$chutovka', '$hodnotenie')";

        $odoslanie = mysqli_multi_query($pripojenie, $dotaz);

        if(!$odoslanie) {
            die("chyba odosielania".mysqli_error($pripojenie));
        }
        else {
            echo "Ďakujeme za vyplnenie dotaznika";
        }
    }
    }

    ?>



    
</body>
</html>