<?php
    require_once("../db/db.php");
    session_start();
    require_once("../models/historial.php");

    $array = mirar_historial($conn);

    $_SESSION['array1']=$array[0];
    $_SESSION['array2']=$array[1];
    require_once("../views/historial.php");
?>