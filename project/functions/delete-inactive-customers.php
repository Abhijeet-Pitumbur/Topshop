<?php
include "database.php";
$code = hash("sha256", EMAIL_PASSWORD);
if (!(isset($_GET["code"]))) {
	exit("Code required");
} else if (strcmp($_GET["code"], $code) !== 0) {
	exit("Invalid code");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../email/Exception.php";
require "../email/PHPMailer.php";
require "../email/SMTP.php";
try {
	$sqlQuery = "SELECT `customerID`, `firstName`, `lastName`, `email`
	FROM `customers`
	WHERE `status` = 'inactive'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount > 0) {
		$mailBody = "<table style='width: 100%'> <tr> <th style='text-align: left'>Customer ID</th> <th style='text-align: left'>First Name</th> <th style='text-align: left'>Last Name</th> <th style='text-align: left'>Email</th> </tr>";
		while ($row = mysqli_fetch_assoc($runQuery)) {
			$mailBody .= "<tr>";
			$mailBody .= '<td>' . $row['customerID'] . '</td>';
			$mailBody .= '<td>' . $row['firstName'] . '</td>';
			$mailBody .= '<td>' . $row['lastName'] . '</td>';
			$mailBody .= '<td>' . $row['email'] . '</td>';
			$mailBody .= "</tr>";
		}
		$mailBody .= "</table>";
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
		$mail->Subject = "Deleted Inactive Customers";
		$mail->Body = $mailBody;
		$sqlQuery = "DELETE FROM `customers`
		WHERE `status` = 'inactive'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$mail->send();
			exit("Inactive customers deleted");
		} else {
			exit("Error deleting inactive customers");
		}
	} else {
		exit("No inactive customers to delete");
	}
} catch (Exception $e) {
	exit("Error deleting inactive customers");
}
?>