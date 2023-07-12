<?php
include "database.php";
if (empty($emailType)) {
	header("location:../error");
	exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "email/Exception.php";
require "email/PHPMailer.php";
require "email/SMTP.php";
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
	$mail->addAddress($email, $firstName);
	$mail->SMTPOptions = [
		"ssl" => [
			"verify_peer" => false,
			"verify_peer_name" => false,
			"allow_self_signed" => true,
		],
	];
	$mail->isHTML(true);
	switch ($emailType) {
		case 1:
			$mail->Subject = "Email Verification";
			$mail->Body = '<h3 ' . $hStyle . '>Welcome to Topshop, ' . $firstName . '! </h3> <p ' . $pStyle . '>Thank you for signing up! Just one more step before you can start using your account. Click the button below to <b>verify the email address belongs to you</b>. In case you did not request to sign up to Topshop, you can safely ignore this email. </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/functions/verify-email?customer=' . $customerID . '&code=' . $code . '">Verify Email</a>';
			break;
		case 2:
			$mail->Subject = "Order Placed";
			switch ($paymentType) {
				case "paypal":
					$mail->Body = '<h3 ' . $hStyle . '>Your order has been placed, ' . $firstName . '! </h3> <p ' . $pStyle . '>Your Order ID is <b>' . $orderID . '</b>. The PayPal&trade; transaction was successful. Your order should be delivered to you in <b>' . ($deliveryType == "express" ? "1 to 2" : "3 to 5") . ' days</b>. Thank you for shopping with Topshop! </p> <p ' . $pStyle . '><b>PayPal&trade; Account: ' . $paypalAccount . '<br>PayPal&trade; Transaction ID: ' . $transactionID . '</b></p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/orders">View Orders</a>';
					break;
				case "card":
					$mail->Body = '<h3 ' . $hStyle . '>Your order has been placed, ' . $firstName . '! </h3> <p ' . $pStyle . '>Your Order ID is <b>' . $orderID . '</b>. The credit card transaction was successful. Your order should be delivered to you in <b>' . ($deliveryType == "express" ? "1 to 2" : "3 to 5") . ' days</b>. Thank you for shopping with Topshop! </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/orders">View Orders</a>';
					break;
				case "cash":
					$mail->Body = '<h3 ' . $hStyle . '>Your order has been placed, ' . $firstName . '! </h3> <p ' . $pStyle . '>Your Order ID is <b>' . $orderID . '</b>. You will be required to <b>pay the delivery agent ' . $formattedTotalPrice . ' in cash</b> upon receipt of your order. Your order should be delivered to you in <b>' . ($deliveryType == "express" ? "1 to 2" : "3 to 5") . ' days</b>. Thank you for shopping with Topshop! </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/orders">View Orders</a>';
					break;
				case "bank":
					$mail->Body = '<h3 ' . $hStyle . '>Your order has been placed, ' . $firstName . '! </h3> <p ' . $pStyle . '>Your Order ID is <b>' . $orderID . '</b>. You are required to make an <b>Internet Banking transfer of ' . $formattedTotalPrice . '</b> to the bank account below <b>within 24 hours</b>. Once payment received, your order should be delivered to you in <b>' . ($deliveryType == "express" ? "1 to 2" : "3 to 5") . ' days</b>. Thank you for shopping with Topshop! </p> <p ' . $pStyle . '><b>Bank: Mauritius Commercial Bank<br>Beneficiary Name: Topshop Store<br>Account Number: 000172772990<br>Description: Order ID ' . $orderID . '</b></p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/orders">View Orders</a>';
					break;
				default:
					$mail->Body = '<h3 ' . $hStyle . '>Your order has been placed, ' . $firstName . '! </h3> <p ' . $pStyle . '>Your Order ID is <b>' . $orderID . '</b>. You are required to make an <b>MCB Juice&trade; transfer of ' . $formattedTotalPrice . '</b> to the bank account below <b>within 24 hours</b>. Once payment received, your order should be delivered to you in <b>' . ($deliveryType == "express" ? "1 to 2" : "3 to 5") . ' days</b>. Thank you for shopping with Topshop! </p> <p ' . $pStyle . '><b>Bank: Mauritius Commercial Bank<br>Beneficiary Name: Topshop Store<br>Account Number: 000172772990<br>Description: Order ID ' . $orderID . '</b></p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/orders">View Orders</a>';
			}
			break;
		case 3:
			$mail->Subject = "Password Reset";
			$mail->Body = '<h3 ' . $hStyle . '>Want to reset your password, ' . $firstName . '? </h3> <p ' . $pStyle . '>Click the button below to <b>reset your password</b>. The link expires after you use it. In case you did not request to reset your password, you can safely ignore this email. Please keep this email confidential. </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/functions/reset-password?customer=' . $customerID . '&code=' . $code . '">Reset Password</a>';
			break;
		case 4:
			$mail->Subject = "Password Changed";
			$mail->Body = '<h3 ' . $hStyle . '>Your password has been changed, ' . $firstName . '! </h3> <p ' . $pStyle . '>The password for your Topshop account was recently changed. <b>If you do not recognise this activity</b>, click the button below to try to sign in. <b>If you are not able to access your account</b>, click "<b>Forgot Password?</b>" on the <b>Sign In</b> page and follow the instructions there to reset your password. </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/authenticate">Sign In</a>';
			break;
		default:
			$mail->Subject = "Newsletter Subscription";
			$mail->Body = '<h3 ' . $hStyle . '>Thank you for subscribing to Topshop\'s newsletter! </h3> <p ' . $pStyle . '>You will be receiving the latest updates on <b>Topshop\'s new arrivals, flash sales and best selling products</b>. Happy shopping! </p> <a ' . $aStyle . ' href="' . WEBSITE_URL . '/">Visit Topshop</a>';
	}
	$mail->send();
} catch (Exception $e) {
	exit();
}
?>