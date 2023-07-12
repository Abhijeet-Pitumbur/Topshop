<?php
include "database.php";
try {
	$requestURL = "https://v6.exchangerate-api.com/v6/ca36679e1cdbc0c53b0cabfe/latest/MUR";
	$responseJSON = file_get_contents($requestURL);
	$response = json_decode($responseJSON);
	$MURtoUSD = doubleval($response->conversion_rates->USD);
	$MURtoEUR = doubleval($response->conversion_rates->EUR);
	$source = "API";
	if ((!(isset($MURtoUSD))) || (!(isset($MURtoEUR))) || ($MURtoUSD == 0) || ($MURtoEUR == 0)) {
		throw new Exception("Critical error");
	}
} catch (Exception $e) {
	$MURtoUSD = 0.025;
	$MURtoEUR = 0.02;
	$source = "fallback";
}
$sqlQuery = "UPDATE `currencies`
SET `conversionRate` = '$MURtoUSD'
WHERE `currencyID` = '1'";
$updateUSD = mysqli_query($connection, $sqlQuery);
$sqlQuery = "UPDATE `currencies`
SET `conversionRate` = '$MURtoEUR'
WHERE `currencyID` = '2'";
$updateEUR = mysqli_query($connection, $sqlQuery);
if ($updateUSD && $updateEUR) {
	exit('Currency rates updated with ' . $source . ' values');
} else {
	exit("Error updating currency rates");
}
?>