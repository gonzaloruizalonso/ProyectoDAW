<?php
	session_start();

	require("../db/db.php");
	require("../models/comprobarUsuario.php");

	if (comprobarUsuario($conn)) {
		$_SESSION['fallo']="no";	
		header("location:../index.php");
	}else {
		$_SESSION['fallo']="login";
		header("location:./login.php");
	}
?>
