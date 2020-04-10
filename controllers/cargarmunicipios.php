<?php
  header('Content-Type:text/xml');
  $cadenaXML='<municipios><municipio>Ajalvir</municipio><municipio>Chapinería</municipio><municipio>Leganés</municipio><municipio>Perales de Tajuña</municipio><municipio>Madrid</municipio><municipio>Talamanca de Jarama</municipio><municipio>Tres Cantos</municipio><municipio>Getafe</municipio><municipio>Villarejo de Salvanés</municipio></municipios>';
  $cadena2XML='<codigos><codigo>M001</codigo><codigo>M002</codigo><codigo>M003</codigo><codigo>M004</codigo><codigo>M005</codigo><codigo>M006</codigo><codigo>M007</codigo><codigo>M008</codigo><codigo>M009</codigo></codigos>';
  $final='<datos>'.$cadenaXML.$cadena2XML.'</datos>';
  echo $final;
?>
