<?php
if (empty($_POST)) {
	header("location:../error");
	exit();
}
include "database.php";
$validAlphabetic = "/^[a-zA-Z ]+$/";
$validNumeric = "/^[0-9]+$/";
$email = $_POST["newEmail"];
$password = $_POST["newPassword"];
$rePassword = $_POST["reNewPassword"];
$customerType = $_POST["customerType"];
if ($customerType == "individual") {
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];
	$phone = $_POST["phone"];
} else {
	$firstName = $_POST["comName"];
	$lastName = NULL;
	$address = $_POST["comAddress"];
	$city = $_POST["comCity"];
	$zip = $_POST["comZip"];
	$country = $_POST["comCountry"];
	$phone = $_POST["comPhone"];
}
if (empty($email) || empty($password) || empty($rePassword) || empty($firstName) || empty($address) || empty($city) || empty($zip) || empty($country) || empty($phone)) {
	echo '<h6 class="text-error">All fields required</h6>';
} elseif (($customerType == "individual") && (empty($lastName))) {
	echo '<h6 class="text-error">All fields required</h6>';
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
	echo '<h6 class="text-error">Invalid email</h6>';
} elseif ($password != $rePassword) {
	echo '<h6 class="text-error">Passwords do not match</h6>';
} elseif (strlen($password) < 8) {
	echo '<h6 class="text-error">Password must have at least 8 characters</h6>';
} elseif (($customerType == "individual") && (!(preg_match($validAlphabetic, $firstName)))) {
	echo '<h6 class="text-error">Invalid first name</h6>';
} elseif (($customerType == "individual") && (!(preg_match($validAlphabetic, $lastName)))) {
	echo '<h6 class="text-error">Invalid last name</h6>';
} elseif (($customerType == "company") && (!(preg_match($validAlphabetic, $firstName)))) {
	echo '<h6 class="text-error">Invalid company name</h6>';
} elseif (!(preg_match($validNumeric, $zip))) {
	echo '<h6 class="text-error">Invalid ZIP code</h6>';
} elseif (strlen($zip) !== 5) {
	echo '<h6 class="text-error">ZIP code must have 5 digits</h6>';
} elseif (!(preg_match($validNumeric, $phone))) {
	echo '<h6 class="text-error">Invalid phone</h6>';
} elseif (strlen($phone) !== 8) {
	echo '<h6 class="text-error">Phone must have 8 digits</h6>';
} elseif ($phone[0] !== "5") {
	echo '<h6 class="text-error">Phone must start with 5</h6>';
} elseif (!(isset($_POST["acceptTerms"]))) {
	echo '<h6 class="text-error">Read and accept the Terms and Conditions</h6>';
} else {
	$email = mysqli_real_escape_string($connection, $email);
	$sqlQuery = "SELECT *
	FROM `customers`
	WHERE `email` = '$email'";
	$runQuery = mysqli_query($connection, $sqlQuery);
	$rowCount = mysqli_num_rows($runQuery);
	if ($rowCount > 0) {
		echo '<h6 class="text-error">Account already exists, just sign in</h6>';
	} else {
		$firstName = ucfirst(strtolower($firstName));
		$lastName = ucfirst(strtolower($lastName));
		$address = mysqli_real_escape_string($connection, ucwords(strtolower($address)));
		$city = mysqli_real_escape_string($connection, ucwords(strtolower($city)));
		$code = hash("sha256", str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
		$password = hash("sha256", $password);
		$sqlQuery = "INSERT INTO `customers` (`firstName`, `lastName`, `email`, `address`, `city`, `zip`, `country`, `phone`, `status`, `code`, `password`)
		VALUES ('$firstName', '$lastName', '$email', '$address', '$city', '$zip', '$country', '$phone', 'inactive', '$code', '$password')";
		$runQuery = mysqli_query($connection, $sqlQuery);
		if ($runQuery) {
			$customerID = intval(mysqli_insert_id($connection));
			$ipAddress = getenv("REMOTE_ADDR");
			$sqlQuery = "UPDATE `carts`
			SET `customerID` = '$customerID'
			WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
			$runQuery = mysqli_query($connection, $sqlQuery);
			if ($runQuery) {
				ini_set('session.cookie_lifetime', 604800);
				ini_set('session.gc-maxlifetime', 604800);
				session_start();
				$_SESSION["inactive"] = 1;
				$_SESSION["customerID"] = $customerID;
				$_SESSION["email"] = $email;
				$_SESSION["firstName"] = $firstName;
				$_SESSION["code"] = $code;
				echo "sign-up-success";
			} else {
				echo '<h6 class="text-error">Critical error</h6>';
			}
		} else {
			echo '<h6 class="text-error">Critical error</h6>';
		}
	}
}
?>