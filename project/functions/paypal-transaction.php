<?php
include "database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	$sessionLost = false;
} else {
	$sessionLost = true;
}
$_SESSION["transactionID"] = "Unknown";
$_SESSION["paypalAccount"] = "Unknown";
if (isset($_POST["txn_id"])) {
	if ((strcmp($_POST["payment_status"], "Completed") == 0) && (strlen($_POST["txn_id"]) == 17)) {
		$customerID = intval($_POST["custom"]);
		$_SESSION["transactionID"] = $_POST["txn_id"];
		if (isset($_POST["payer_email"])) {
			$_SESSION["paypalAccount"] = $_POST["payer_email"];
		}
	}
} else if (isset($_GET["tx"])) {
	if ((strcmp($_GET["st"], "Completed") == 0) && (strlen($_GET["tx"]) == 17)) {
		$customerID = intval($_GET["cm"]);
		$_SESSION["transactionID"] = $_GET["tx"];
	}
} else {
	header("location:../error");
	exit();
}
if ($sessionLost) {
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		$customerID = $_SESSION["customerID"] = intval($row["customerID"]);
		$_SESSION["email"] = $row["email"];
		$_SESSION["firstName"] = $row["firstName"];
		$_SESSION["lastName"] = $row["lastName"];
		$_SESSION["address"] = $row["address"];
		$_SESSION["city"] = $row["city"];
		$_SESSION["zip"] = $row["zip"];
		$_SESSION["country"] = $row["country"];
		$_SESSION["phone"] = $row["phone"];
		$_SESSION["paymentType"] = "paypal";
		$_SESSION["deliveryType"] = "express";
	} else {
		exit("Critical error");
	}
} else {
	$customerID = intval($_SESSION["customerID"]);
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
	$sqlQuery = "DELETE FROM `carts`
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	if ($runQuery) {
		unset($_SESSION["coupon"]);
		header("location:../order-placed");
		exit();
	}
}
exit("Critical error");
?>