
<?php
    function pripojenieDoDatabazy($server, $meno, $heslo, $nazov) {
        global $pripojenie;
        $pripojenie = mysqli_connect($server, $meno, $heslo, $nazov);
    }


?>