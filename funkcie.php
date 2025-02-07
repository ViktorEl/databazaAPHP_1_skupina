
<?php
    function pripojenieDoDatabazy($server, $meno, $heslo, $nazov) {
        $pripojenie = mysqli_connect($server, $meno, $heslo, $nazov);
    }


?>