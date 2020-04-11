<?php
$cod_pedido=null;
$fechaActual=date("Y-m-d H:m:s");
//$fechaEntrega = strtotime ( '+1 hour' , strtotime ( $fechaActual ) ) ;
//$fechaEntrega = date ( 'Y-m-d H:m:s' , $fechaEntrega );
$fechaEntrega=$_SESSION["fecha_entrega"];
$dni=$_SESSION['dni'];

$sql="SELECT MAX(cod_pedido) as cod_pedido FROM pedidos";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$cod_pedido = $fila['cod_pedido']+1;
$total=0;
foreach ($_COOKIE as $key=>$value) {
	
	if(is_numeric($key)) {
		$sql="SELECT precio FROM platos where cod_plato=$key";
			$result = mysqli_query($conn, $sql);
			$fila = mysqli_fetch_assoc($result);
			$total += ($fila['precio']*$value);
		
	}
}
$sql = "INSERT INTO pedidos (dni,cod_pedido,fecha_pedido,fecha_entrega,precio_total) VALUES ('$dni','$cod_pedido','$fechaActual','$fechaEntrega',$total)";
//$sql = "INSERT INTO pedidos (dni,cod_pedido,fecha_pedido,fecha_entrega,precio_total,cod_repartidor) VALUES ('$dni','$cod_pedido','$fechaActual','$fechaEntrega',$total,'$cod_repartidor')";
if (mysqli_query($conn, $sql)) {
		echo "Registro Completado";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


$sql="SELECT MAX(cod_detallepedido) as cod_detallepedido FROM detallepedido";
$result = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($result);
$cod_detallepedido = $fila['cod_detallepedido']+1;
$cod_pedido;
$cod_detallepedido;

foreach ($_COOKIE as $key=>$value) {
	
	$cod_plato=$key;
	$cantidad=$value;
	if(is_numeric($key)) {
		$sql = "INSERT INTO detallepedido (cod_detallepedido,cod_pedido,cod_plato,cantidad) VALUES ('$cod_detallepedido','$cod_pedido','$cod_plato','$cantidad')";
		if (mysqli_query($conn, $sql)) {
			echo "Registro Completado";
			$cod_detallepedido++;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
}
mysqli_close($conn);
?>
