<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$customerID = $_POST["customerID"];
$password = $_POST["password"];
$rePassword = $_POST["rePassword"];
if (empty($customerID)) {
	echo '<h6 class="text-error">Critical error</h6>';
} elseif ($password != $rePassword) {
	echo '<h6 class="text-error">Passwords do not match</h6>';
} elseif (strlen($password) < 8) {
	echo '<h6 class="text-error">Password must have at least 8 characters</h6>';
} else {
	$password = hash("sha256", $password);
	$code = hash("sha256", str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
	$sqlQuery = "UPDATE `customers`
	SET `password` = '$password', `code` = '$code'
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	if ($runQuery) {
		$row = mysqli_fetch_assoc($runQuery);
		ini_set('session.cookie_lifetime', 604800);
		ini_set('session.gc-maxlifetime', 604800);
		session_start();
		$_SESSION["reset"] = 1;
		$_SESSION["customerID"] = intval($row["customerID"]);
		$_SESSION["email"] = $row["email"];
		$_SESSION["firstName"] = $row["firstName"];
		echo "reset-password-success";
	} else {
		echo '<h6 class="text-error">Critical error</h6>';
	}
}
?>