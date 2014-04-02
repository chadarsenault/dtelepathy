<?php
	if(isset($_POST)) {
		$fromAddress	= 	base64_encode("chad@chadarsenault.com");
		$domainName		=	base64_encode("Twine.cool");

		if(isset($_POST['email'])) {
			$email =base64_encode($_POST['email']);
		} else if(isset($_POST['email2'])) {
			$email = base64_encode($_POST['email2']);
		}

		//Send HTML and Plain-Text email to user
		//add From: header
		$headers = "From: ".base64_decode($fromAddress)."\r\n";

		//specify MIME version 1.0
		$headers .= "MIME-Version: 1.0\r\n";

		//unique boundary
		$boundary = uniqid("HTMLDEMO");

		//tell e-mail client this e-mail contains alternate versions
		$headers .= "Content-Type: multipart/alternative"."; boundary = $boundary\r\n\r\n";

		//message to people with clients who don't understand MIME
		$headers .= "This is a MIME encoded message.\r\n\r\n";

		//HTML version of message
		$headers .= "--$boundary\r\n"."Content-Type: text/html; charset=ISO-8859-1\r\n"."Content-Transfer-Encoding: base64\r\n\r\n";
		$headers .= chunk_split(base64_encode("<p style=\"font-family: Arial, Verdana, sans-serif; color: #666;\">Thank you for contacting ".base64_decode($domainName).".</p><p style=\"font-family: Arial, Verdana, sans-serif; color: #666;\">A member of our staff will respond shortly.</p><p style=\"font-family: Arial, Verdana, sans-serif; color: #666;\">If you feel you have received this e-mail in error, please contact us at <a style=\"color: #F90;\" href=\"".base64_decode($fromAddress)."\">".base64_decode($fromAddress)."</a>.</p><p style=\"font-family: Arial, Verdana, sans-serif; color: #666;\"><strong>-".base64_decode($domainName)."</strong></p><p>This message has been generated automatically.  Please do not reply.</p>"));



//////////////////////////////////////////////////////////////////////////////////////////////

		//Send HTML and Plain-Text email to M3AE
		//add From: header
		$headers2 = "From: ".base64_decode($email)."\r\n";

		//specify MIME version 1.0
		$headers2 .= "MIME-Version: 1.0\r\n";

		//unique boundary
		$boundary2 = uniqid("HTMLDEMO");

		//tell e-mail client this e-mail contains alternate versions
		$headers2 .= "Content-Type: multipart/alternative"."; boundary = $boundary2\r\n\r\n";

		//message to people with clients who don't understand MIME
		$headers2 .= "This is a MIME encoded message.\r\n\r\n";

		//HTML version of message
		$headers2 .= "--$boundary2\r\n"."Content-Type: text/html; charset=ISO-8859-1\r\n"."Content-Transfer-Encoding: base64\r\n\r\n";
		$headers2 .= chunk_split(base64_encode("<p style=\"font-family: Arial, Verdana, sans-serif; color #666;\">Email: ".base64_decode($email)));

	if(
		mail(base64_decode($email), "Thank you for contacting ".base64_decode($domainName), "", $headers2) &&
		mail(base64_decode($fromAddress), "A user has subscribed to ".base64_decode($domainName), "", $headers2)
	)	{
			echo "success";
		}
	}