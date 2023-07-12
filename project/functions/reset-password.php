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
		if (hash_equals($customerID, strval($_GET["customer"]))) {
			ini_set('session.cookie_lifetime', 604800);
			ini_set('session.gc-maxlifetime', 604800);
			session_start();
			$_SESSION["customerID"] = $row["customerID"];
			$_SESSION["reset"] = 1;
			header("location:../reset-password");
		} else {
			header("location:../error");
		}
	} else {
		header("location:../error");
	}
}
?>