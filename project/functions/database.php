<?php
ini_set('display_errors', 'off');
include dirname(__DIR__)."/credentials.php";
if (!(isset($connection))) {
	$connection = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
}
if (!$connection) {
	exit("Database connection error");
}
?>