<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["customerID"]))) {
	echo '<h6 class="text-error">Sign in or sign up first</h6>';
	exit();
}
$validAlphabetic = "/^[a-zA-Z ]+$/";
$validNumeric = "/^[0-9]+$/";
$validExpire = "/^(0[1-9]|1[0-2])\/[0-9]{2}$/";
$customerID = intval($_SESSION["customerID"]);
$formattedTotalPrice = $_POST["formattedTotalPrice"];
$paymentType = $_POST["paymentType"];
$deliveryType = $_POST["deliveryType"];
if ($paymentType == "paypal") {
	$_SESSION["paymentType"] = $paymentType;
	$_SESSION["deliveryType"] = $deliveryType;
	echo "paypal-checkout";
} else if ($paymentType == "card") {
	$cardName = $_POST["cardName"];
	$cardNumber = $_POST["cardNumber"];
	$cardExpire = $_POST["cardExpire"];
	$cardVerify = $_POST["cardVerify"];
	if (empty($cardName) || empty($cardNumber) || empty($cardExpire) || empty($cardVerify)) {
		echo '<h6 class="text-error">All credit card fields required</h6>';
	} elseif (!(preg_match($validAlphabetic, $cardName))) {
		echo '<h6 class="text-error">Invalid name on credit card</h6>';
	} elseif (!(preg_match($validNumeric, $cardNumber))) {
		echo '<h6 class="text-error">Invalid credit card number</h6>';
	} elseif (strlen($cardNumber) !== 16) {
		echo '<h6 class="text-error">Credit card number must have 16 digits</h6>';
	} elseif (!(preg_match($validExpire, $cardExpire))) {
		echo '<h6 class="text-error">Invalid credit card expiration</h6>';
	} elseif (!(preg_match($validNumeric, $cardVerify))) {
		echo '<h6 class="text-error">Invalid CVC</h6>';
	} elseif (strlen($cardVerify) !== 3) {
		echo '<h6 class="text-error">CVC must have 3 digits</h6>';
	} else {
		$sqlQuery = "SELECT `productID`, `quantity`
		FROM `carts`
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount > 0) {
			$i = 0;
			while ($results = mysqli_fetch_assoc($runQuery)) {
				$cartItems[$i] = $results;
				$i++;
			}
			$date = date("Y-m-d");
			$status = "Processing order";
			$sqlQuery = "INSERT INTO `orders` (`customerID`, `date`, `status`)
			VALUES ('$customerID', '$date', '$status')";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$orderID = mysqli_insert_id($connection);
			for ($i = 0; $i < count($cartItems); $i++) {
				$productID = $cartItems[$i]['productID'];
				$quantity = $cartItems[$i]['quantity'];
				$sqlQuery = "INSERT INTO `orderdetails` (`orderID`, `productID`, `quantity`)
				VALUES ('$orderID', '$productID', '$quantity')";
				$runQuery = mysqli_query($connection, $sqlQuery);
				$sqlQuery = "UPDATE `products`
				SET `stock` = `stock` - '$quantity', `unitsSold` = `unitsSold` + '$quantity'
				WHERE `productID` = '$productID'";
				$runQuery = mysqli_query($connection, $sqlQuery);
			}
			$_SESSION["orderID"] = sprintf("%06d", $orderID);
			$_SESSION["cardName"] = $cardName;
			$_SESSION["paymentType"] = $paymentType;
			$_SESSION["deliveryType"] = $deliveryType;
			$sqlQuery = "DELETE FROM `carts`
			WHERE `customerID` = '$customerID'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			unset($_SESSION["coupon"]);
			echo "card-checkout-success";
		} else {
			echo '<h6 class="text-error">Critical error</h6>';
		}
	}
} else {
	if ($paymentType == "cash") {
		$status = "Processing order";
	} else {
		$status = "Payment pending";
	}
	$sqlQuery = "SELECT `productID`, `quantity`
	FROM `carts`
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount > 0) {
		$i = 0;
		while ($results = mysqli_fetch_assoc($runQuery)) {
			$cartItems[$i] = $results;
			$i++;
		}
		$date = date("Y-m-d");
		$sqlQuery = "INSERT INTO `orders` (`customerID`, `date`, `status`)
		VALUES ('$customerID', '$date', '$status')";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$orderID = mysqli_insert_id($connection);
		for ($i = 0; $i < count($cartItems); $i++) {
			$productID = $cartItems[$i]['productID'];
			$quantity = $cartItems[$i]['quantity'];
			$sqlQuery = "INSERT INTO `orderdetails` (`orderID`, `productID`, `quantity`)
			VALUES ('$orderID', '$productID', '$quantity')";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$sqlQuery = "UPDATE `products`
			SET `stock` = `stock` - '$quantity', `unitsSold` = `unitsSold` + '$quantity'
			WHERE `productID` = '$productID'";
			$runQuery = mysqli_query($connection, $sqlQuery);
		}
		$_SESSION["orderID"] = sprintf("%06d", $orderID);
		$_SESSION["formattedTotalPrice"] = $formattedTotalPrice;
		$_SESSION["paymentType"] = $paymentType;
		$_SESSION["deliveryType"] = $deliveryType;
		$sqlQuery = "DELETE FROM `carts`
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		unset($_SESSION["coupon"]);
		echo "checkout-success";
	} else {
		echo '<h6 class="text-error">Critical error</h6>';
	}
}
?>