<?php 
		
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'src\Exception.php';
		require 'src\PHPMailer.php';
		require 'src\SMTP.php';

	//function enviarCorreo($nombredestinatario,$correodestinatario,$titulo,$contenido){

		$mail = new PHPMailer(TRUE);
		try {

		   $mail->setFrom('contacto.greatfood@gmail.com', 'GreatFood');
		   //$mail->addAddress($correodestinatario, $nombredestinatario);
		   //$mail->Subject = $titulo;
		   //$mail->Body = $contenido;
		   
		   $mail->addAddress('galmus94@gmail.com', 'David');
		   $mail->Subject = 'Titulo';
		   $mail->Body = 'Envio Correo';
		   
		   /* SMTP parameters. */
		   
		   /* Tells PHPMailer to use SMTP. */
		   $mail->isSMTP();
		   
		   /* SMTP server address. */
		   $mail->Host = 'smtp.gmail.com';

		   /* Use SMTP authentication. */
		   $mail->SMTPAuth = TRUE;
		   
		   /* Set the encryption system. */
		   $mail->SMTPSecure = 'tls';
		   
		   /* SMTP authentication username. */
		   $mail->Username = 'contacto.greatfood@gmail.com';
		   
		   /* SMTP authentication password. */
		   $mail->Password = 'comidarara';
		   
		   /* Set the SMTP port. */
		   $mail->Port = 587;
		   
		   /* Finally send the mail. */
		   $mail->send();
		}
		catch (Exception $e)
		{
		   echo $e->errorMessage();
		}
		catch (\Exception $e)
		{
		   echo $e->getMessage();
		}
	//}
 ?>