<?php
session_start();
require("../db/db.php");
require("../models/procesar_carrito.php");
$fechaentrega=$_SESSION['fecha_entrega'];
$dni = $_SESSION['dni'];
$_SESSION['resultadocarrito']=procesarCarrito($conn,$fechaentrega,$dni);
header("location:../views/resultado_carrito.php");
?>
