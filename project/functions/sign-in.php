<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$email = $_POST["email"];
$password = $_POST["password"];
if (empty($email)) {
	echo '<h6 class="text-error">Email required</h6>';
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
	echo '<h6 class="text-error">Invalid email</h6>';
} else if (empty($password)) {
	echo '<h6 class="text-error">Password required</h6>';
} else {
	$email = mysqli_real_escape_string($connection, $email);
	$password = hash("sha256", $password);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `email` = '$email' AND `password` = '$password'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		ini_set('session.cookie_lifetime', 604800);
		ini_set('session.gc-maxlifetime', 604800);
		session_start();
		$customerID = $_SESSION["customerID"] = intval($row["customerID"]);
		$_SESSION["email"] = $row["email"];
		$_SESSION["firstName"] = $row["firstName"];
		$ipAddress = getenv("REMOTE_ADDR");
		$sqlQuery = "SELECT COUNT(*) AS `numGuestCartItems`
		FROM `carts`
		WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$numGuestCartItems = mysqli_fetch_assoc($runQuery)["numGuestCartItems"];
		if ($numGuestCartItems > 0) {
			$guestCart = true;
		} else {
			$guestCart = false;
		}
		if ($row["status"] == 'inactive') {
			$_SESSION["inactive"] = 1;
			$_SESSION["code"] = $row["code"];
			echo "inactive-sign-in-success";
		} else if ($guestCart) {
			$_SESSION["lastName"] = $row["lastName"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["city"] = $row["city"];
			$_SESSION["zip"] = $row["zip"];
			$_SESSION["country"] = $row["country"];
			$_SESSION["phone"] = $row["phone"];
			$sqlQuery = "UPDATE `carts`
			SET `customerID` = '$customerID'
			WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			if ($runQuery) {
				echo "checkout-sign-in-success";
			} else {
				echo '<h6 class="text-error">Critical error</h6>';
			}
		} else {
			$_SESSION["lastName"] = $row["lastName"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["city"] = $row["city"];
			$_SESSION["zip"] = $row["zip"];
			$_SESSION["country"] = $row["country"];
			$_SESSION["phone"] = $row["phone"];
			echo "sign-in-success";
		}
	} else {
		$sqlQuery = "SELECT *
		FROM `customers`
		WHERE `email` = '$email'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount > 0) {
			echo '<h6 class="text-error">Invalid password</h6>';
		} else {
			echo '<h6 class="text-error">Account does not exist, sign up first</h6>';
		}
	}
}
?>