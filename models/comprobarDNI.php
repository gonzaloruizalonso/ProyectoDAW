<?php
function comprobarDNI($conn) {
	
	//$resultado=true;
	
		$dni=$_POST['dni'];
		$sql="SELECT dni as d FROM login WHERE dni='$dni'";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$dnireal = $fila['d'];


		$conn=null;
		return $dnireal;
		
	//return $resultado;
}	
?>