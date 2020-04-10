<?php
session_start();

require("../db/db.php");

var_dump($_COOKIE);

foreach ($_COOKIE as $value=>$key) {
	//var_dump($key);
	//var_dump($value);
}
$cod_pedido=null;
$fechaActual=date()
$fechaActual=date()+1;
$dni=$_SESSION['dni'];

$sql="SELECT MAX(cod_pedido) as cod_pedido FROM pedidos";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$cod_pedido = $fila['cod_pedido']+1;
		$conn=null;


$sql="SELECT precio FROM platos where ";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$cod_pedido = $fila['cod_pedido']+1;
		$conn=null;



/*$sql="SELECT MAX(cod_detallepedido) as cod_detallepedido FROM detallepedido";
$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$cod_detallepedido = $fila['cod_detallepedido']+1;

var_dump($cod_detallepedido);
		$conn=null;*/


//$cod_plato=$_COOKIE;

?>
