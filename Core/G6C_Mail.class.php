<?php

class G6C_Mail {
	protected $_title;
	protected $_message;
	protected $_altMessage;
	protected $_to;
	protected $_mail;

	function __construct() {
		$this -> _mail = new PHPMailer(true);
		try {
			//Server settings
		    //$this -> _mail -> SMTPDebug = 2;                                 // Enable verbose debug output
		    $this -> _mail -> isSMTP();                                      // Set mailer to use SMTP
				$mail -> Charset='UTF-8';
		    $this -> _mail -> Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $this -> _mail -> SMTPAuth = true;                               // Enable SMTP authentication
		    $this -> _mail -> Username = 'wenxiao0015@gmail.com';                 // SMTP username
		    $this -> _mail -> Password = 'Wwx18095079066';                           // SMTP password
		    $this -> _mail -> SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $this -> _mail -> Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $this -> _mail -> setFrom('PESITech.G6C@DOMISEP.fr', 'PESITech');
		    //$this -> _mail -> addAddress('dridi.yassine.yd@gmail.com', 'Client');     // Add a recipient
		    //$this -> _mail -> addAddress('ellen@example.com');               // Name is optional
		    $this -> _mail -> addReplyTo('wenxiao0015@icloud.com', 'Service DOMISEP');
		    $this -> _mail -> addCC('Wenxiao0015@icloud.com');
		    //$this -> _mail -> addBCC('bcc@example.com');

		    //Content
		    $this -> _mail -> isHTML(true);                                  // Set email format to HTML
		} catch (Exception $e) {
			$error = new G6C_Error($this -> _mail -> ErrorInfo);
			$error -> saveLog();
		}
	}

	//Recipients
	function setTo($to = 'Wenxiao0015@icloud.com', $name = null) {
		if ($name == null) {
			$this -> _to[$to] = $to;
			$this -> _mail -> addAddress($to);
		} else {
			$this -> _to[$to] = $name;
			$this -> _mail -> addAddress($to, $name);
		}
	}

	//Attachments
	function addPieceJointe($filename, $optionalName = null) {
		if ($optionalName == null) {
			$this -> _mail -> addAttachment($filename);         // Add attachments
		} else {
			$this -> _mail -> addAttachment($filename, $optionalName);    // Optional name
		}

	}

	//Content
	function setTitle($title) {
		$this -> _title = $title;
		$this -> _mail -> Subject = "=?utf-8?B?" . base64_encode($title) . "?=";
	}

	function setBody($body) {
		$this -> _message = $body;
		$this -> _mail -> Body = $body;
	}

	function setAltBody($altbody) {
		$this -> _altMessage = $altbody;
		$this -> _mail -> AltBody = $altbody;
	}

	function send() {
		try {
			$this -> _mail->send();
			$error = new G6C_Error('Message has been sent');
			$error -> saveLog();
			return 1;
		} catch (Exception $e) {
			$error = new G6C_Error($this -> _mail -> ErrorInfo);
			$error -> saveLog();
			return 0;
		}
	}

	function easyRemplir() {
		$this -> setTo('wenxiao0015@icloud.com', 'Client');
		$this -> setTitle('Here is the subject');
		$this -> setBody('This is the HTML message body <b>in bold!</b>');
		$this -> setAltBody('This is the body in plain text for non-HTML mail clients');
	}

	// Get Function
	function getTitle() {
		return $this -> _title;
	}

	function getMessage() {
		return $this -> _message;
	}

	function getAltMessage() {
		return $this -> _altMessage;
	}

	function getTo() {
		return $this -> _to;
	}

}
?>
