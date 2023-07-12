<?php
include "database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	$customerID = $_SESSION["customerID"];
	$sqlQuery = "DELETE FROM `carts`
	WHERE `customerID` = '$customerID'";
} else {
	$ipAddress = getenv("REMOTE_ADDR");
	$sqlQuery = "DELETE FROM `carts`
	WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
}
$runQuery = mysqli_query($connection, $sqlQuery);
unset($_SESSION["coupon"]);
header("location:../cart");
?>