<?php 

function comprobarPedidos($conn,$dni){
	
	$sql="select dni as p from pedidos where dni='$dni'";
	$result = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_assoc($result);
	$dni = $fila['p'];

	if ($dni==null) {
	$dni="123456fefef789023456789";
	}
	return $dni;


}

 ?>