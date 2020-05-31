<?php
session_start();
error_reporting(0);


require("../db/db.php");
require("../models/comprobarDNI.php");
require("../models/registro.php");
require("../recursos/correo/enviarCorreo.php");

$dnireal=comprobarDNI($conn);



if ($dnireal==null) {
	$nombre=$_POST["nombre"];
	$dni=$_POST["dni"];
	$correo_electronico=$_POST["mail"];
	$mensaje=$nombre.', su registro se ha completado correctamente, gracias por usar GreatFood. Puedes iniciar sesion utilizando su DNI '.$dni.' y su contraseña.';
	procesar($conn);
	enviarCorreo($correo_electronico,'Registro completado en GreatFood',$mensaje,$nombre);
	$_SESSION['falloregistro']="no";	
	echo "<script type=\"text/javascript\">location.href='login.php';
			</script>";
	//header("location:./login.php");
}else {
	$_SESSION['falloregistro']="registro";
	//var_dump($_SESSION['falloregistro']);
	require("./registro.php");
}
//require("../views/visualizarDatos.php");


?>
