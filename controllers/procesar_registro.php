<?php
session_start();

require("../db/db.php");
require("../models/comprobarDNI.php");
require("../models/registro.php");

$dnireal=comprobarDNI($conn);


if ($dnireal==null) {
	procesar($conn);
	header("location:./login.php");
	$_SESSION['fallo']="no";	
}else {
	$_SESSION['fallo']="registro";
	header("location:./registro.php");
}
//require("../views/visualizarDatos.php");


?>
