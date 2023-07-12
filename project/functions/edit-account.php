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
	$outputMsg = '<h6 class="text-error">Critical error</h6>';
	$response = array(
		'outputMsg' => $outputMsg,
		'firstName' => NULL,
		'email' => NULL,
		'currentName' => NULL,
		'currentAddress' => NULL,
		'currentPhone' => NULL
	);
	echo json_encode($response);
	exit();
}
$validAlphabetic = "/^[a-zA-Z ]+$/";
$validNumeric = "/^[0-9]+$/";
$customerID = $_SESSION["customerID"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$country = $_POST["country"];
$phone = $_POST["phone"];
if (empty($_SESSION["lastName"])) {
	$customerType = "company";
	$firstName = $_POST["comName"];
	$lastName = NULL;
} else {
	$customerType = "individual";
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
}
if (empty($firstName) || empty($address) || empty($city) || empty($zip) || empty($country) || empty($phone)) {
	$outputMsg = '<h6 class="text-error">All fields required</h6>';
} elseif (($customerType == "individual") && (empty($lastName))) {
	$outputMsg = '<h6 class="text-error">All fields required</h6>';
} elseif (($customerType == "individual") && (!(preg_match($validAlphabetic, $firstName)))) {
	$outputMsg = '<h6 class="text-error">Invalid first name</h6>';
} elseif (($customerType == "individual") && (!(preg_match($validAlphabetic, $lastName)))) {
	$outputMsg = '<h6 class="text-error">Invalid last name</h6>';
} elseif (($customerType == "company") && (!(preg_match($validAlphabetic, $firstName)))) {
	$outputMsg = '<h6 class="text-error">Invalid company name</h6>';
} elseif (!(preg_match($validNumeric, $zip))) {
	$outputMsg = '<h6 class="text-error">Invalid ZIP code</h6>';
} elseif (strlen($zip) !== 5) {
	$outputMsg = '<h6 class="text-error">ZIP code must have 5 digits</h6>';
} elseif (!(preg_match($validNumeric, $phone))) {
	$outputMsg = '<h6 class="text-error">Invalid phone</h6>';
} elseif (strlen($phone) !== 8) {
	$outputMsg = '<h6 class="text-error">Phone must have 8 digits</h6>';
} elseif ($phone[0] !== "5") {
	$outputMsg = '<h6 class="text-error">Phone must start with 5</h6>';
} elseif (!(isset($_POST["approveChanges"]))) {
	$outputMsg = '<h6 class="text-error">Tick the checkbox to approve these changes</h6>';
} else {
	$firstName = ucfirst(strtolower($firstName));
	$lastName = ucfirst(strtolower($lastName));
	$address = mysqli_real_escape_string($connection, ucwords(strtolower($address)));
	$city = mysqli_real_escape_string($connection, ucwords(strtolower($city)));
	$sqlQuery = "UPDATE `customers`
	SET `firstName` = '$firstName', `lastName` = '$lastName', `address` = '$address', `city` = '$city', `zip` = '$zip', `country` = '$country', `phone` = '$phone'
	WHERE `customerID` = '$customerID'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	if ($runQuery) {
		$sqlQuery = "SELECT *
		FROM `customers`
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$row = mysqli_fetch_assoc($runQuery);
		$_SESSION["firstName"] = $row["firstName"];
		$_SESSION["lastName"] = $row["lastName"];
		$_SESSION["address"] = $row["address"];
		$_SESSION["city"] = $row["city"];
		$_SESSION["zip"] = $row["zip"];
		$_SESSION["country"] = $row["country"];
		$_SESSION["phone"] = $row["phone"];
		$outputMsg = '<h6 class="text-success">Changes saved</h6>';
	} else {
		$outputMsg = '<h6 class="text-error">Critical error</h6>';
	}
}
$response = array(
	'outputMsg' => $outputMsg,
	'firstName' => $_SESSION["firstName"],
	'email' => $_SESSION["email"],
	'currentName' => $_SESSION["firstName"] . ' ' . $_SESSION["lastName"],
	'currentAddress' => $_SESSION["zip"] . ' ' . $_SESSION["address"] . ', ' . $_SESSION["city"] . ', ' . $_SESSION["country"],
	'currentPhone' => '+230 ' . substr($_SESSION["phone"], 0, 4) . ' ' . substr($_SESSION["phone"], 4, 4)
);
echo json_encode($response);
?>