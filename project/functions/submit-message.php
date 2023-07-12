<?php
include "database.php";
if (empty($_POST)) {
	header("location:../error");
	exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../email/Exception.php";
require "../email/PHPMailer.php";
require "../email/SMTP.php";
$validAlphabetic = "/^[a-zA-Z ]+$/";
$name = ucwords(strtolower($_POST["name"]));
$email = $_POST["email"];
$message = filter_var($_POST["messageBox"], FILTER_SANITIZE_STRING);
if (empty($name) || empty($email) || empty($message)) {
	echo '<h6 class="text-error">All fields required</h6>';
} elseif (!(preg_match($validAlphabetic, $name))) {
	echo '<h6 class="text-error">Invalid name</h6>';
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
	echo '<h6 class="text-error">Invalid email</h6>';
} elseif (strlen($message) > 10000) {
	echo '<h6 class="text-error">Message too long</h6>';
} else {
	$hStyle = 'style="font-family: Arial, sans-serif; font-size: 21px; color: #000000;"';
	$pStyle = 'style="font-family: Arial, sans-serif; font-size: 14px; color: #000000;"';
	try {
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_ADDRESS;
		$mail->Password = EMAIL_PASSWORD;
		$mail->setFrom(EMAIL_ADDRESS, "Topshop");
		$mail->addAddress("pitumburabhijeet@gmail.com", "Abhijeet");
		$mail->SMTPOptions = [
			"ssl" => [
				"verify_peer" => false,
				"verify_peer_name" => false,
				"allow_self_signed" => true,
			],
		];
		$mail->isHTML(true);
		$mail->Subject = 'Message from ' . $name;
		$mail->Body = '<h3 ' . $hStyle . '>Name: ' . $name . ' <br> Email: ' . $email . ' </h3> <p ' . $pStyle . '>' . $message . '</p>';
		$mail->send();
		echo "submit-message-success";
	} catch (Exception $e) {
		echo '<h6 class="text-error">Critical error</h6>';
	}
}
?>