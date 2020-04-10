<?php
session_start();

require("../db/db.php");
require("../models/comprobarUsuario.php");

if (comprobarUsuario($conn)) {
	header("location:../index.php");
	$_SESSION['fallo']="no";	
} else {
	$_SESSION['fallo']="login";
	header("location:./login.php");
}
//require("../views/visualizarDatos.php");


?>
