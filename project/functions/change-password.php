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
	exit('<h6 class="text-error">Critical error</h6>');
}
$customerID = $_SESSION["customerID"];
$password = $_POST["password"];
$newPassword = $_POST["newPassword"];
$rePassword = $_POST["rePassword"];
if (empty($password) || empty($newPassword) || empty($rePassword)) {
	echo '<h6 class="text-error">All fields required</h6>';
} else if ($newPassword != $rePassword) {
	echo '<h6 class="text-error">New passwords do not match</h6>';
} elseif (strlen($newPassword) < 8) {
	echo '<h6 class="text-error">New password must have at least 8 characters</h6>';
} elseif (!(isset($_POST["approveNewPassword"]))) {
	echo '<h6 class="text-error">Tick the checkbox to approve changing your password</h6>';
} else {
	$password = hash("sha256", $password);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `customerID` = '$customerID' AND `password` = '$password'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$password = hash("sha256", $newPassword);
		$code = hash("sha256", str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
		$sqlQuery = "UPDATE `customers`
		SET `password` = '$password', `code` = '$code'
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			echo '<h6 class="text-success">Password changed</h6>';
		} else {
			echo '<h6 class="text-error">Critical error</h6>';
		}
	} else {
		echo '<h6 class="text-error">Invalid current password</h6>';
	}
}
?>