<?php
include "database.php";
if (empty($_POST)) {
	header("location:../error");
	exit();
}
if (!(isset($_POST["query"]))) {
	exit("");
}
$searchQuery = preg_replace('/[^a-zA-Z\d]/', '+', $_POST["query"]);
$searchQuery = preg_replace('/\s+/', '+', $searchQuery);
$searchQuery = preg_replace('/\+\++/', '+', $searchQuery);
$searchQuery = trim($searchQuery, '+');
$searchQuery = urlencode($searchQuery);
$searchQuery = strtolower($searchQuery);
if (strlen($searchQuery) == 0) {
	echo "";
} else if (strlen($searchQuery) > 70) {
	$searchQuery = substr($searchQuery, 0, 70);
	echo $searchQuery;
} else {
	echo $searchQuery;
}
?>