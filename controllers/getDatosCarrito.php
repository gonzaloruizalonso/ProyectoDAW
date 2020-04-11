<?php
require_once("../db/db.php");
require("../models/getDatoCarrito.php");


$dplato=getDatosPlato($conn);

(object)$miObjeto = array('platos' => array());
for ($i=0; $i < sizeof($dplato); $i++) {
	$j=1+$i;

	array_push($miObjeto['platos'],array('codplato' => $dplato[$i]['cod_plato'], 'nombre' => $dplato[$i]['nombre'], 'precio' => $dplato[$i]['precio'] ));
	
}

$objetoJson=json_encode($miObjeto);

//Devolver datos
echo $objetoJson;
?>
