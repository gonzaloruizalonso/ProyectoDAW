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
		}
		
	return $resultado;
}	
?>