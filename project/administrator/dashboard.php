<?php
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["adminID"]))) {
	header("location:../admin");
	exit();
}
$title = "Dashboard";
$css = "home";
include "header.php";
?>
<main class="bg-gray">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-xl-7 col-lg-9">
				<img src="images/others/under-construction.svg" class="img-fluid add-bottom-15" width="500" height="500">
				<h3>Hello, <?php echo $_SESSION["adminName"]; ?>!</h3>
				<h6>This webpage is currently under construction. Check back soon!</h6>
			</div>
		</div>
	</div>
</main>
</body>
</html>