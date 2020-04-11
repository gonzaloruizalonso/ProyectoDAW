<?php
	session_start();
	require("../db/db.php");
	require("../models/listaPlatos.php");

    $_SESSION['platos']=getPlatos($conn);
	//var_dump($_SESSION['platos']);
    //Llamada a la vista
	//header("location:../views/platos.php");
	

		require_once("../views/platos.php");

	
	
	//var_dump($_POST);
?>