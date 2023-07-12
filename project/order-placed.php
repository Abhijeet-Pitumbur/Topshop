<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["orderID"]))) {
	header("location:error");
	exit();
} else {
	$customerID = $_SESSION["customerID"];
	$email = $_SESSION["email"];
	$firstName = $_SESSION["firstName"];
	$orderID = $_SESSION["orderID"];
	$paymentType = $_SESSION["paymentType"];
	$deliveryType = $_SESSION["deliveryType"];
	$emailType = 2;
	unset($_SESSION["orderID"]);
	unset($_SESSION["paymentType"]);
	unset($_SESSION["deliveryType"]);
}
if ($paymentType == "paypal") {
	$transactionID = $_SESSION["transactionID"];
	$paypalAccount = $_SESSION["paypalAccount"];
	unset($_SESSION["transactionID"]);
	unset($_SESSION["paypalAccount"]);
} else if ($paymentType == "card") {
	$cardName = $_SESSION["cardName"];
	unset($_SESSION["cardName"]);
} else {
	$formattedTotalPrice = $_SESSION["formattedTotalPrice"];
	unset($_SESSION["formattedTotalPrice"]);
}
$title = "Order Placed";
$css = "checkout";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div id="confirm">
					<div class="icon success-animation svg add-bottom-15">
						<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
							<g fill="none" stroke="#8EC343" stroke-width="2">
								<circle cx="36" cy="36" r="35" id="tickCircle"></circle>
								<path d="M17.417,37.778l9.93,9.909l25.444-25.393" id="tickPath"></path>
							</g>
						</svg>
					</div>
					<h2>Order Placed</h2>
					<div class="main-title mb-4">
						<p>Your Order ID is <?php echo $orderID; ?></p>
					</div>
					<?php if ($paymentType == "paypal") { ?>
					<h6>The PayPal&trade; transaction was successful. Your order should be delivered to you in <?php echo (($deliveryType == "express") ? "1 to 2" : '3 to 5'); ?> days.</h6>
					<?php } else if ($paymentType == "card") { ?>
					<h6>The credit card transaction was successful. Your order should be delivered to you in <?php echo (($deliveryType == "express") ? "1 to 2" : '3 to 5'); ?> days.</h6>
					<?php } else if ($paymentType == "cash") { ?>
					<h6>You will be required to pay the delivery agent <?php echo $formattedTotalPrice; ?> in cash upon receipt of your order. Your order should be delivered to you in <?php echo (($deliveryType == "express") ? "1-2" : '3-5'); ?> days.</h6>
					<?php } else if ($paymentType == "bank") { ?>
					<h6>You are required to make an Internet Banking transfer of <?php echo $formattedTotalPrice; ?> to the bank account below within 24 hours. Once payment received, your order should be delivered to you in <?php echo (($deliveryType == "express") ? "1-2" : '3-5'); ?> days.</h6>
					<?php } else { ?>
					<h6>You are required to make an MCB Juice&trade; transfer of <?php echo $formattedTotalPrice; ?> to the bank account below within 24 hours. Once payment received, your order should be delivered to you in <?php echo (($deliveryType == "express") ? "1-2" : '3-5'); ?> days.</h6>
					<?php } ?>
					<?php if ($paymentType == "paypal") { ?>
					<div class="main-title mb-4">
						<p>PayPal&trade; Account: <?php echo $paypalAccount; ?><br>PayPal&trade; Transaction ID: <?php echo $transactionID; ?></p>
					</div>
					<?php } else if ($paymentType == "card") { ?>
					<div class="main-title mb-4">
						<p>Credit Card Holder: <?php echo $cardName; ?></p>
					</div>
					<?php } else if (($paymentType == "bank") || ($paymentType == "juice")) { ?>
					<div class="main-title mb-4">
						<p>Bank: Mauritius Commercial Bank<br>Beneficiary Name: Topshop Store<br>Account Number: 000172772990<br>Description: Order ID <?php echo $orderID; ?></p>
					</div>
					<?php } ?>
					<p>A confirmation email has been sent. Thank you for shopping with Topshop!</p>
					<div class="main-title mb-4">
						<p>
							<a class="btn-1" href="orders">View Orders</a>
							<a class="btn-1 gray" href="index">Back to Home Page</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<?php include "functions/send-email.php"; ?>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
</body>
</html>