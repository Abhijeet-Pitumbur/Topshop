<?php
include "database.php";
if (!(isset($_GET["customer"])) && (!(isset($_GET["code"])))) {
	header("location:../error");
} else {
	$code = mysqli_real_escape_string($connection, $_GET["code"]);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `code` = '$code'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		$customerID = hash("sha256", intval($row["customerID"]));
		if ($row["status"] == 'verified') {
			header("location:../index");
		} else if (hash_equals($customerID, strval($_GET["customer"]))) {
			$code = hash("sha256", str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
			ini_set('session.cookie_lifetime', 604800);
			ini_set('session.gc-maxlifetime', 604800);
			session_start();
			$customerID = $_SESSION["customerID"] = $row["customerID"];
			$sqlQuery = "UPDATE `customers`
			SET `status` = 'verified', `code` = '$code'
			WHERE `customerID` = '$customerID'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			if ($runQuery) {
				$_SESSION["email"] = $row["email"];
				$_SESSION["firstName"] = $row["firstName"];
				$_SESSION["lastName"] = $row["lastName"];
				$_SESSION["address"] = $row["address"];
				$_SESSION["city"] = $row["city"];
				$_SESSION["zip"] = $row["zip"];
				$_SESSION["country"] = $row["country"];
				$_SESSION["phone"] = $row["phone"];
				unset($_SESSION["inactive"]);
				unset($_SESSION["code"]);
				header("location:../email-verified");
			} else {
				header("location:../error");
			}
		} else {
			header("location:../error");
		}
	} else {
		header("location:../error");
	}
}
?>