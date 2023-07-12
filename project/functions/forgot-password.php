<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$email = $_POST["emailForgot"];
if (empty($email)) {
	echo '<h6 class="text-error">Email required</h6>';
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
	echo '<h6 class="text-error">Invalid email</h6>';
} else {
	$email = mysqli_real_escape_string($connection, $email);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `email` = '$email'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		ini_set('session.cookie_lifetime', 604800);
		ini_set('session.gc-maxlifetime', 604800);
		session_start();
		$_SESSION["reset"] = 1;
		$_SESSION["customerID"] = intval($row["customerID"]);
		$_SESSION["email"] = $row["email"];
		$_SESSION["firstName"] = $row["firstName"];
		$_SESSION["code"] = $row["code"];
		echo "forgot-password-success";
	} else {
		echo '<h6 class="text-error">Account does not exist, sign up first</h6>';
	}
}
?>