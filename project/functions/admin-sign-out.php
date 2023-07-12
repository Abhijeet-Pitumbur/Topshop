<?php
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["adminID"])) {
	unset($_SESSION["adminID"]);
	header("location:../admin");
} else {
	header("location:../error");
}
?>