<?php
function procesar($conn){
	
	$dni=$_POST["dni"];
	$nombre=$_POST["nombre"];
	$apellidos=$_POST["apellidos"];
	$direccion=$_POST["direccion"];
	$cp=$_POST["cp"];
	$municipio=$_POST["municipio"];
	$telefono=$_POST["telefono"];
	$fecha_nac=$_POST["fecha_nac"];
	$password=$_POST["password"];
		
		$sql="INSERT INTO clientes(dni,nombre,apellidos,direccion,codigo_postal,id_municipio,telefono,fecha_nacimiento) VALUES ('$dni','$nombre','$apellidos','$direccion',$cp,'$municipio','$telefono','$fecha_nac')";		
		
		if (mysqli_query($conn, $sql)) {
			
			$sql="INSERT INTO login(dni,password) VALUES ('$dni','$password')";		

			mysqli_query($conn, $sql);
			
			echo "Registro Completado";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		
}
		
?>