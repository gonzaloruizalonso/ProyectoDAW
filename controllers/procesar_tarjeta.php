<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Greatfood</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css.css" />
    <script type="text/javascript" src="../js.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">GreatFood</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1">Platos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../controllers/contacto.php" tabindex="-1">Contacto</a>
                </li>
                <li class="nav-item ">
                    <?php
                    session_start();
                    require_once("../db/db.php");
                    if (isset($_SESSION['dni'])) {
                    ?>
                        <a class="nav-link " href="../controllers/area_personal.php" tabindex="-1">
                            Area personal
                        </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="../controllers/logout.php" tabindex="-1">
                        Logout
                    </a>
                </li>
            <?php

                    } else {
            ?>
                <a class="nav-link " href="../controllers/login.php" tabindex="-1">
                    Login
                </a>
                </li>


            <?php
                    }
					include "apiRedsys.php";  
					$miObj = new RedsysAPI;

					// Valores de entrada que no hemos cmbiado para ningun ejemplo
					$name = 'GreatFood';
					
					$fuc="999008881";
					$terminal="1";
					$moneda="978";
					$trans="0";
					$url="http://www.daw.com/controllers/procesar_carrito.php";
					$urlOKKO="http://www.daw.com/controllers/procesar_carrito.php";
					$id=time();
					$amount="145";	
					
					// Se Rellenan los campos
					$miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
					$miObj->setParameter("DS_MERCHANT_ORDER",$id);
					$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
					$miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
					$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
					$miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
					$miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
					$miObj->setParameter("DS_MERCHANT_MERCHANTNAME",$name); 
					$miObj->setParameter("DS_MERCHANT_URLOK",$urlOKKO);
					$miObj->setParameter("DS_MERCHANT_URLKO",$urlOKKO);

					//Datos de configuración
					$version="HMAC_SHA256_V1";
					$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
					// Se generan los parámetros de la petición
					$request = "";
					$params = $miObj->createMerchantParameters();
					$signature = $miObj->createMerchantSignature($kc);
            ?>
            </ul>
        </div>
    </nav>
    <div id="bienvenida" class="center block">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Método de Pago</h4>


				<!--<form action="procesar_carrito.php" method="POST">-->
				<form id="realizarPago" action="https://sis-i.redsys.es:25443/sis/realizarPago" method="post" target="_self">
                    <hr>

                    <!--<h6>Número de Tarjeta</h6>
                    <input  name="numTarjeta" pattern="[0-9]{16}" required>
                    <hr>
					<h6>Fecha Caducidad:</h6><hr> 
					   <input type="month" <?php 
						   $date_format = 'Y-m';            
						   $tomorrow = time() + (1 * 24 * 60 * 60);
						   echo "min=\"".gmdate($date_format, $tomorrow)."\"";
						?> name="fecha" required><hr> 
                    <h6>CVV</h6>
                    <input type="number" name="cvv" pattern="(\d{3})" required>
                    <hr>
                    <input type="submit" value="Confirmar" name="confirmar" class="btn btn-warning ">-->
					<input type="hidden" name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                    <input type="hidden" name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                    <input type="hidden" name='Ds_Signature' value='<?php echo $signature; ?>'> 
                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitPayment" value="PAGO SEGURO CON TARJETA" />
                </form>

            </div>

            </form>

        </div>
    </div>


    <?php
	//var_dump($_POST);
    if (isset($_POST["confirmar"])) {
		
        header("location:procesar_carrito.php");
    }
    ?>
    </div>
</body>

</html>