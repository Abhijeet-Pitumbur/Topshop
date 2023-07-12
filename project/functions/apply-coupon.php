<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$couponCode = $_POST["couponCode"];
if (isset($_SESSION["coupon"])) {
	echo '<h6 class="text-error">Coupon already applied</h6>';
} else if (empty($couponCode)) {
	echo '<h6 class="text-error">Coupon code required</h6>';
} else {
	$couponCode = mysqli_real_escape_string($connection, $couponCode);
	$sqlQuery = "SELECT *
	FROM `coupons`
	WHERE BINARY `code` = '$couponCode'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount == 1) {
		$row = mysqli_fetch_assoc($runQuery);
		ini_set('session.cookie_lifetime', 604800);
		ini_set('session.gc-maxlifetime', 604800);
		session_start();
		$_SESSION["coupon"] = intval($row["discountPercent"]);
		echo "apply-coupon-success";
	} else {
		echo '<h6 class="text-error">Invalid coupon code</h6>';
	}
}
?>