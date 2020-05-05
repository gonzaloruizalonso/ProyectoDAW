<?php
session_start();
error_reporting(0);
require("../db/db.php");
require("../models/procesar_carrito.php");
require("../recursos/correo/enviarCorreo.php");
require("../models/historial.php");

	

$fechaentrega=$_SESSION['fecha_entrega'];
$dni = $_SESSION['dni'];
$_SESSION['resultadocarrito']=procesarCarrito($conn,$fechaentrega,$dni);


	$array = mirar_historial($conn);

	$_SESSION['array1']=$array[0];
	$_SESSION['array2']=$array[1];

$nombre=$_SESSION["nombre"];
$dni=$_SESSION["dni"];
$correo_electronico=$_SESSION["correo"];
$repartidor=$_SESSION["resultadocarrito"];
$mensaje=$nombre.', su pedido se ha completado correctamente. '.$repartidor.', su pedido es: ';
$mensaje .='<html><body><table border="1">
                    <thead>
                        <tr>
                            <th>Numero de pedido</th>
                            <th>Fecha Pedido</th>
                            <th>Fecha de Entrega</th>
                            <th>Precio total</th>
                        </tr>
                    </thead>
                    <tbody>';

							$i=sizeof($_SESSION["array1"])-1;
                            
                      $mensaje .='<tr>
                      <th>' . $_SESSION['array1'][$i]['cod_pedido'] . '</th>
                      <td>' . $_SESSION['array1'][$i]['fecha_pedido'] . '</td>
                      <td>' . $_SESSION['array1'][$i]['fecha_entrega'] . '</td>
                      <td>' . $_SESSION['array1'][$i]['precio_total'] . '</td>
                  </tr>
                    
                  <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      
                  </tr>';
                      for ($j = 0; $j < sizeof($_SESSION['array2']); $j++) {
                          if ($_SESSION['array2'][$j]['cod_pedido'] == $_SESSION['array1'][$i]['cod_pedido']) {

                              $mensaje .='<tr>
                          <th>#</th>
                          <td>' . $_SESSION['array2'][$j]['nombre'] . '</td>
                          <td>' . $_SESSION['array2'][$j]['cantidad'] . '</td>
                          <td>' . $_SESSION['array2'][$j]['precio'] . '</td>
                          </tr>';
                          }
                      }
$mensaje .='</tbody></table></body></html>';                        


enviarCorreo($correo_electronico,'Pedido completado en GreatFood',$mensaje,$nombre);
$_SESSION['fallo']="no";	
echo "<script type=\"text/javascript\">location.href='../views/resultado_carrito.php';</script>";
//header("location:../views/resultado_carrito.php");
?>
