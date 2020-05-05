<!DOCTYPE HTML>
<html>
<head>
<title>PRUEBA TPV</title>
</head>
<body style="text-align:center">
              
                              <?php
                if ($_POST['submitPayment']) {
                ?><h3>PASO.2) Confirmar y pagar en pasarela de pago:</h3>
                <p>Vas a realizar un pago de:</p>
                   <center><h1 style="color:RED"><?php echo $_POST['cantidad'] . "€"?></h1></center>
                <center><h3>Factura Nº: <?php echo $_POST['factura'];?></h3></center>
                <?php } else { ?>
                <h3>PASO.1) Introduce los datos y tipo de reserva:</h3>
                <?php }?>
               <!-- PASARELA DE PAGO -->
                <?php
                if ($_POST['submitPayment']) {
                    include "../recursos/tpv/apiRedsys.php";  
                    $miObj = new RedsysAPI;
                    $url_tpv = 'https://sis-t.redsys.es:25443/sis/realizarPago'; // PASARELA DE PRUEBAS
                    //$url_tpv = 'https://sis.redsys.es/sis/realizarPago'; // PASARELA DE PRODUCCIÓN
                    $version = "HMAC_SHA256_V1"; 
                    $clave = 'CLAVE'; //poner la clave SHA-256 facilitada por el banco
                    $name = 'GreatFood';
                    $code = 'CODIGO ';
                    $terminal='1';
                    $order=$_POST['factura'] . $_POST['tipodepago'];
                    $totalpedido=$_POST['cantidad'];
                    $amount=$totalpedido*100;
                    $currency = '978';
                    $consumerlng = '001';
                    $transactionType = '0';
                    $urlMerchant = 'http://www.raulprietofernandez.net/tpv/validacion.php'; // URL DEL COMERCIO CMS
                    $urlweb_ok = 'http://www.raulprietofernandez.net/tpv/ok.php'; // URL OK
                    $urlweb_ko = 'http://www.raulprietofernandez.net/tpv/no-ok.php'; // URL NOK
                    $concepto = $_POST['concepto'];

                    $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
                    $miObj->setParameter("DS_MERCHANT_CURRENCY",$currency);
                    $miObj->setParameter("DS_MERCHANT_ORDER",$order);
                    $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$code);
                    $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
                    $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$transactionType);
                    $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$urlMerchant);
                    $miObj->setParameter("DS_MERCHANT_URLOK",$urlweb_ok);      
                    $miObj->setParameter("DS_MERCHANT_URLKO",$urlweb_ko);
                    $miObj->setParameter("DS_MERCHANT_MERCHANTNAME",$name); 
                    $miObj->setParameter("DS_MERCHANT_CONSUMERLANGUAGE",$consumerlng); 
                    $miObj->setParameter("DS_MERCHANT_PRODUCTDESCRIPTION",$concepto); 
 


                    $params = $miObj->createMerchantParameters();
                    $signature = $miObj->createMerchantSignature($clave);
                    
                ?>
                
                    <form id="realizarPago" action="<?php echo $url_tpv; ?>" method="post" target="_self">
                        <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                        <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                        <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'> 
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitPayment" value="PAGO SEGURO CON TARJETA" />
                    </form>
                
                <?php } else { ?>
                    <p>Desde aquí puedes:</p>
                    <ul style="margin-left:55px">
                        <li>1.- Pagar la <strong>reserva</strong> del viaje</li>
                        <li>2.- Pagar la <strong>totalidad</strong> del viaje</li>
                        <li>3.- Pagar <strong>la parte que te quede por pagar</strong>.</li>
                    </ul>
                    </br></br>
                    <form class="form-amount" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="form-group">
                        <label for="tipodepago">Tipo de Pago</label>
                        <select id="tipodepago" name='tipodepago' class="form-control input-sm">
                            <option value="">SELECCIONA TIPO DE INGRESO</option>
                            <option value="-R">RESERVA DE VIAJE (200€)</option>
                            <option value="-C">PAGO COMPLETO DEL VIAJE</option>
                            <option value="-U">ÚLTIMO PAGO</option>
                        </select><br/>
                        
                        <label for="amount">Cantidad</label>
                        <input type="text" id="cantidad" name="cantidad" autocomplete="off" class="form-control" placeholder="Por ejemplo: 450">
                        <label for="amount">Nº Factura <span style="color:red;font-style:italic">(no el nº de reserva)</span></label>
                        <input type="text" id="factura" name="factura" autocomplete="off" maxlength="12" class="form-control" placeholder="Por ejemplo: 000000923 (todos los números)">
                        <label for="amount">Concepto</label>
                        <input type="text" id="concepto" name="concepto" autocomplete="off" maxlength="125" class="form-control" placeholder="Por ejemplo: Manuel Gonzalez Perez - Viaje Valthorens 2016">
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" name="submitPayment" type="submit" value="IR AL PASO 2">
                    </form>
                    
                <?php }?>

</body>
</html>