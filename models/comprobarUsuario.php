<?php
function comprobarUsuario($conn) {
	
	$resultado=false;
	
		$dni=$_POST['dni'];
		$clave=$_POST['password'];
		$sql="SELECT password as p FROM login WHERE dni='$dni'";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$passwordReal = $fila['p'];

		if($clave==$passwordReal){
		$resultado=true;
		$_SESSION['dni']=$dni;
		$sql2="SELECT nombre as n,correo_electronico as correo FROM clientes WHERE dni='$dni'";
		$result = mysqli_query($conn, $sql2);
		$fila = mysqli_fetch_assoc($result);
		$nom = $fila['n'];
		$correo = $fila['correo'];
		$_SESSION['nombre']=$nom;
		$_SESSION['correo']=$correo;
		}
		
	return $resultado;
}	
?>