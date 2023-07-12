<?php
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	session_unset();
	header("location:../index");
} else {
	header("location:../error");
}
?>