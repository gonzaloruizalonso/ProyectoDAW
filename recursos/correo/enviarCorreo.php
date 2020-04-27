<?php 
		
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'src/Exception.php';
	require 'src/PHPMailer.php';
	require 'src/SMTP.php';

	function enviarCorreo($hacia,$titulo,$contenido,$nombre){

		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->SMTPDebug = 2; 
		$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$mail->Port = 587; // TLS only
		$mail->SMTPSecure = 'tls'; // ssl is depracated
		$mail->SMTPAuth = true;
		$mail->Username = 'contacto.greatfood@gmail.com';
		$mail->Password = 'comidarara';
		$mail->setFrom('contacto.greatfood@gmail.com', 'GreatFood');
		$mail->addAddress($hacia, $nombre);
		$mail->Subject = $titulo;
		$mail->msgHTML($contenido); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->AltBody = 'HTML no soportado';
		// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

		if(!$mail->send()){
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}else{
		    echo "Message sent!";
		}

	}
 ?>