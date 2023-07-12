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
$email = $_POST["emailNewsletter"];
if (empty($email)) {
	echo 'Email required';
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
	echo 'Invalid email';
} else {
	$hStyle = 'style="font-family: Arial, sans-serif; font-size: 21px; color: #000000;"';
	$pStyle = 'style="font-family: Arial, sans-serif; font-size: 14px; color: #000000;"';
	$aStyle = 'style="font-family: Arial, sans-serif; background-color: #004DDA; border: none; border-radius: 5px; color: #FFFFFF; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 15px; margin: 10px 0px; cursor: pointer;"';
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
		$mail->addAddress($email, $email);
		$mail->SMTPOptions = [
			"ssl" => [
				"verify_peer" => false,
				"verify_peer_name" => false,
				"allow_self_signed" => true,
			],
		];
		$mail->isHTML(true);
		$mail->Subject = "Newsletter Subscription";
		$mail->Body = '<h3 ' . $hStyle . '>Thank you for subscribing to Topshop\'s newsletter! </h3> <p ' . $pStyle . '>You will be receiving the latest updates on <b>Topshop\'s new arrivals, flash sales and best selling products</b>. Happy shopping! </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/">Visit Topshop</a>';
		$mail->send();
		$email = mysqli_real_escape_string($connection, $email);
		$sqlQuery = "SELECT *
		FROM `newsletters`
		WHERE `email` = '$email'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount == 0) {
			$sqlQuery = "INSERT INTO `newsletters` (`email`)
			VALUES ('$email')";
			$runQuery = mysqli_query($connection, $sqlQuery);
			echo "subscribe-newsletter-success";
		} else {
			echo "already-subscribed";
		}
	} catch (Exception $e) {
		echo 'Critical error';
	}
}
?>