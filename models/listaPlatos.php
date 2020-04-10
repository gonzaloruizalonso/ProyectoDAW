<?php
  //Funcion que devuelve todos los platos
  function getPlatos($conn) {
  	$platos = [];
  	$sql = "select * from platos";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$platos[] = $row;
  	}
  	return $platos;
  }

?>