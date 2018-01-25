<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Tester s'il peut envoyer un mail ou pas!</h1>
	<?php

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'vendor/phpmailer/phpmailer/src/Exception.php';
		require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
		require 'vendor/phpmailer/phpmailer/src/SMTP.php';
		require 'vendor/autoload.php';

		$mail = new PHPMailer(true);

		try {
			
			//Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'wenxiao0015@gmail.com';                 // SMTP username
		    $mail->Password = 'Wwx18095079066';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('PESITech.G6C@DOMISEP.fr', 'PESITech');
		    $mail->addAddress('dridi.yassine.yd@gmail.com', 'Client');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    $mail->addReplyTo('wenxiao0015@gmail.com', 'Service DOMISEP');
		    $mail->addCC('Wenxiao0015@icloud.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
		
	?>
</body>
</html>