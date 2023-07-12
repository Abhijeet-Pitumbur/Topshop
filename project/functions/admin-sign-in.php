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
	FROM `admins`
	WHERE `email` = '$email' AND `password` = '$password'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		ini_set('session.cookie_lifetime', 604800);
		ini_set('session.gc-maxlifetime', 604800);
		session_start();
		$_SESSION["adminID"] = intval($row["adminID"]);
		$_SESSION["adminEmail"] = $row["email"];
		$firstName = $_SESSION["adminName"] = $row["name"];
		echo "admin-sign-in-success";
	} else {
		$sqlQuery = "SELECT *
		FROM `admins`
		WHERE `email` = '$email'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$rowCount = mysqli_num_rows($runQuery);
		if ($rowCount > 0) {
			echo '<h6 class="text-error">Invalid password</h6>';
		} else {
			echo '<h6 class="text-error">Invalid account</h6>';
		}
	}
}
?>