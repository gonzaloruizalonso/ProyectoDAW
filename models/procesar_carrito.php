<?php 
	//Funcion que procesa un carrito y devuelve el repartidor encargado
	  function procesarCarrito($conn,$fechaentrega,$dni) {
	  	//$fechaActual = date("Y-m-d H:m:s");
		date_default_timezone_set ('Europe/Madrid');
		$fechaActual = strftime("%Y-%m-%d %H:%M:%S");
		$sql = "SELECT MAX(cod_pedido) as cod_pedido FROM pedidos";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$cod_pedido = $fila['cod_pedido'] + 1;
		
		$total = 0;
	foreach ($_COOKIE as $key => $value) {

		if (is_numeric($key)) {
			$sql = "SELECT precio FROM platos where cod_plato=$key";
			$result = mysqli_query($conn, $sql);
			$fila = mysqli_fetch_assoc($result);
			$total += ($fila['precio'] * $value);
		}
	}
	$sql = "INSERT INTO pedidos (dni,cod_pedido,fecha_pedido,fecha_entrega,precio_total) VALUES ('$dni','$cod_pedido','$fechaActual','$fechaentrega',$total)";
	mysqli_query($conn, $sql);

	$sql = "SELECT MAX(cod_detallepedido) as cod_detallepedido FROM detallepedido";
	$result = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_assoc($result);
	$cod_detallepedido = $fila['cod_detallepedido'] + 1;
	echo "<script>console.log(".$cod_detallepedido.")</script>";


	foreach ($_COOKIE as $key => $value) {
		$cod_plato = $key;
		$cantidad = $value;
		if (is_numeric($key)) {
			$sql = "INSERT INTO detallepedido (cod_detallepedido,cod_pedido,cod_plato,cantidad) VALUES ('$cod_detallepedido','$cod_pedido','$cod_plato','$cantidad')";
				mysqli_query($conn, $sql);
				$cod_detallepedido++;
				echo "<script>console.log(".$cod_detallepedido.")</script>";
		}
	}

	$sql = "SELECT repartidores.nombre as n,repartidores.apellidos as a FROM clientes,municipios,repartidores WHERE clientes.dni='$dni' AND clientes.id_municipio=municipios.id_municipio AND municipios.id_repartidor_encargado=repartidores.id_repartidor";
	$result = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_assoc($result);

	$final="Su repartidor@ " . $fila['n'] . " " . $fila['a'] . " entregará su pedido el " . $fechaentrega;

	return $final;

  }
 ?>