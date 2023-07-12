<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$productID = $_POST["productID"];
$newPrice = $_POST["newPrice"];
$oldPrice = $_POST["oldPrice"];
$quantity = 1;
$ipAddress = getenv("REMOTE_ADDR");
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	$customerID = $_SESSION["customerID"];
	$sqlQuery = "SELECT *
	FROM `carts`
	WHERE `productID` = '$productID' AND `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 0) {
		$sqlQuery = "INSERT INTO `carts` (`productID`, `customerID`, `quantity`, `ipAddress`)
		VALUES ('$productID', '$customerID', '$quantity', '$ipAddress')";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
			FROM `carts`
			WHERE `customerID` = '$customerID'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
			$outputMsg = "quick-add-to-cart-success";
		}
	} else {
		$numCartItems = 0;
		$outputMsg = "already-in-cart";
	}
} else {
	$sqlQuery = "SELECT *
	FROM `carts`
	WHERE `productID` = '$productID' AND `customerID` = 0 AND `ipAddress` = '$ipAddress'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 0) {
		$sqlQuery = "INSERT INTO `carts` (`productID`, `customerID`, `quantity`, `ipAddress`)
		VALUES ('$productID', '0', '$quantity', '$ipAddress')";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
			FROM `carts`
			WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
			$outputMsg = "quick-add-to-cart-success";
		}
	} else {
		$numCartItems = 0;
		$outputMsg = "already-in-cart";
	}
}
if ((strcmp($outputMsg, "quick-add-to-cart-success") == 0) || (strcmp($outputMsg, "already-in-cart") == 0)) {
	if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
		$response = array(
			'outputMsg' => $outputMsg,
			'formattedProductID' => sprintf("%06d", $productID),
			'formattedNewPrice' => '€' . number_format($newPrice * $_SESSION["MURtoEUR"]),
			'formattedOldPrice' => '€' . number_format($oldPrice * $_SESSION["MURtoEUR"]),
			'numCartItems' => $numCartItems
		);
	} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
		$response = array(
			'outputMsg' => $outputMsg,
			'formattedProductID' => sprintf("%06d", $productID),
			'formattedNewPrice' => '$' . number_format($newPrice * $_SESSION["MURtoUSD"]),
			'formattedOldPrice' => '$' . number_format($oldPrice * $_SESSION["MURtoUSD"]),
			'numCartItems' => $numCartItems
		);
	} else {
		$response = array(
			'outputMsg' => $outputMsg,
			'formattedProductID' => sprintf("%06d", $productID),
			'formattedNewPrice' => 'Rs ' . number_format($newPrice),
			'formattedOldPrice' => 'Rs ' . number_format($oldPrice),
			'numCartItems' => $numCartItems
		);
	}
	echo json_encode($response);
}
?>