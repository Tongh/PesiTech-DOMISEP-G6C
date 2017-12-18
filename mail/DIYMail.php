<?php 
	function sendMail($to, $title, $content) {
		//require_once("PHPMailer.php");
		//require_once("SMTP.php");

		use PHPMailer\PHPMailer\PHPMailer;

		$mail = new PHPMailer();

		$mail->SMTPDebug = 1; // juste tester

		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->Hostname = "PESITech.G6C.DOMISEP.fr";
		$mail->CharSet = 'UTF-8';
		$mail->FromName = "PESITech G6C";
		$mail->Username = 'wenxiao0015@gmail.com';
		$mail->Password = 'Wwx18095079066';
		$mail->From = "PESITech.@DOMISEP.fr";
		$mail->isHTML(true);
		$mail->addAddress($to, 'mail auto');
		//$mail->addAddress();
		$mail->Subject = $title;
		$mail->Body = $content;
		//$mail->addAttachment('path/to/doc.jpg', 'nameInMail.jpg');
		//$mail->addAttachment();
		$status = $mail->send();

		if ($status) {
			return true;
		} else {
			return false;
		}
	}
 ?>