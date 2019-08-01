<?php

	// Mail settings
	$to = "comercial@lynxview.es, contacto@sistemaartemisa.com";
	$subject = "Sistema Artemisa contact form";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {

		$content  = "Name: "     . $_POST["name"]    . "\r\n";
		$content .= "Email: "    . $_POST["email"]   . "\r\n";
		$content .= "Phone: "    . $_POST["phone"]   . "\r\n";
		$content .= "City: "    . $_POST["city"]   . "\r\n";
		$content .= "Message: "  . "\r\n" . $_POST["message"];

		if (mail($to, $subject, $content, $_POST["email"])) {

			$result = array(
				"message" => "Gracias por contactar con Sistema Artemisa.",
				"sendstatus" => 1
			);

			echo json_encode($result);

		} else {

			$result = array(
				"message" => "Lo sentimos, algo no ha funcionado. Vuelve a intentarlo.",
				"sendstatus" => 0
			);

			echo json_encode($result);

		}

	}

?>