<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$validQuantity = "/^([1-9][0-9]{0,2})$/";
$productID = $_POST["productID"];
$quantity = $_POST["quantity"];
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if ($productID <= 0) {
	$numCartItems = 0;
	$outputMsg = '<h6 class="text-error">Critical error</h6>';
} else if ($_POST["updateCartType"] == "removeFromCart") {
	if (isset($_SESSION["customerID"])) {
		$customerID = $_SESSION["customerID"];
		$sqlQuery = "DELETE FROM `carts`
		WHERE `productID` = '$productID' AND `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
			FROM `carts`
			WHERE `customerID` = '$customerID'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
			$outputMsg = "remove-from-cart-success";
		} else {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Critical error</h6>';
		}
	} else {
		$ipAddress = getenv("REMOTE_ADDR");
		$sqlQuery = "DELETE FROM `carts`
		WHERE `productID` = '$productID' AND `customerID` = 0 AND `ipAddress` = '$ipAddress'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
			FROM `carts` WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
			$outputMsg = "remove-from-cart-success";
		} else {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Critical error</h6>';
		}
	}
} else if (!(preg_match($validQuantity, $quantity))) {
	$numCartItems = 0;
	$outputMsg = '<h6 class="text-error">Invalid quantity</h6>';
} else if ($_POST["updateCartType"] == "addToCart") {
	$quantity = mysqli_real_escape_string($connection, $quantity);
	if (isset($_SESSION["customerID"])) {
		$customerID = $_SESSION["customerID"];
		$sqlQuery = "SELECT *
		FROM `carts`
		WHERE `productID` = '$productID' AND `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount > 0) {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Already added to cart</h6>';
		} else {
			$ipAddress = getenv("REMOTE_ADDR");
			$sqlQuery = "INSERT INTO `carts` (`productID`, `customerID`, `quantity`, `ipAddress`)
			VALUES ('$productID', '$customerID', '$quantity', '$ipAddress')";
			$runQuery = mysqli_query($connection, $sqlQuery);
			if ($runQuery) {
				$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
				FROM `carts`
				WHERE `customerID` = '$customerID'";
				$runQuery = mysqli_query($connection, $sqlQuery);
				$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
				$outputMsg = "add-to-cart-success";
			} else {
				$numCartItems = 0;
				$outputMsg = '<h6 class="text-error">Critical error</h6>';
			}
		}
	} else {
		$ipAddress = getenv("REMOTE_ADDR");
		$sqlQuery = "SELECT *
		FROM `carts`
		WHERE `productID` = '$productID' AND `customerID` = 0 AND `ipAddress` = '$ipAddress'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount > 0) {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Already added to cart</h6>';
		} else {
			$sqlQuery = "INSERT INTO `carts` (`productID`, `customerID`, `quantity`, `ipAddress`)
			VALUES ('$productID', '0', '$quantity', '$ipAddress')";
			$runQuery = mysqli_query($connection, $sqlQuery);
			if ($runQuery) {
				$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
				FROM `carts`
				WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
				$runQuery = mysqli_query($connection, $sqlQuery);
				$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
				$outputMsg = "add-to-cart-success";
			} else {
				$numCartItems = 0;
				$outputMsg = '<h6 class="text-error">Critical error</h6>';
			}
		}
	}
} else if ($_POST["updateCartType"] == "updateCartQuantity") {
	$quantity = mysqli_real_escape_string($connection, $quantity);
	if (isset($_SESSION["customerID"])) {
		$customerID = $_SESSION["customerID"];
		$sqlQuery = "UPDATE `carts`
		SET `quantity` = '$quantity'
		WHERE `productID` = '$productID' AND `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-success">Quantity updated</h6>';
		} else {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Critical error</h6>';
		}
	} else {
		$ipAddress = getenv("REMOTE_ADDR");
		$sqlQuery = "UPDATE `carts`
		SET `quantity` = '$quantity'
		WHERE `productID` = '$productID' AND `customerID` = 0 AND `ipAddress` = '$ipAddress'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-success">Quantity updated</h6>';
		} else {
			$numCartItems = 0;
			$outputMsg = '<h6 class="text-error">Critical error</h6>';
		}
	}
}
$response = array(
	'outputMsg' => $outputMsg,
	'numCartItems' => $numCartItems
);
echo json_encode($response);
?>