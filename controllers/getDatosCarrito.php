<?php
require_once("../db/db.php");
require("../models/getDatoCarrito.php");


$dplato=getDatosPlato($conn);

$final='<platos>';
for ($i=0; $i < sizeof($dplato); $i++) {
	$j=1+$i;
	$final=$final.'<p'.$j.'><codplato>'.$dplato[$i]['cod_plato'].'</codplato><nombre>'.$dplato[$i]['nombre'].'</nombre><precio>'.$dplato[$i]['precio'].'</precio></p'.$j.'>';
}
$final=$final.'</platos>';
header('Content-Type:text/xml');
echo $final;
?>
