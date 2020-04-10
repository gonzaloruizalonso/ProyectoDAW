<?php 
 
//Funcion que devuelve datos de todos los platos
  function getDatosPlato($conn) {
  	$platos = [];
  	$sql = "select cod_plato,nombre,precio from platos";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$platos[] = $row;
  	}
  	return $platos;
  }
 ?>