<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["adminID"])) {
	header("location:administrator/dashboard");
	exit();
}
header("refresh:30;url=index");
$title = "Administrator Sign In";
$css = "authenticate";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
	<div class="row justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-8">
			<div class="box-account">
				<h3 class="customer">Topshop Administrator</h3>
				<div class="form-container">
					<div class="text-center"><img src="images/others/admin-access.svg" class="img-fluid" width="350" height="360"></div>
					<div class="text-center">
						<h6 class="text-error">Restricted area! Access authorised to administrators only.</h6>
					</div>
					<br>
					<div class="text-center"><a class="btn-1 full-width" href="index">Go Back to Home Page</a></div>
					<div class="divider"></div>
					<form onsubmit="return false" id="adminSignIn">
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
						<br>
						<div class="text-center"><input type="submit" value="Sign In as Administrator" class="btn-1 gray"></div>
					</form>
					<div class="text-center" id="adminSignInMsg"></div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<script>
	function loop() {
		var count, index, text = "";
		for (count = 0; count < 48; count++) {
			index = Math.floor(Math.sin((Date.now() / 200) + (count / 2)) * 4) + 4;
			text += String.fromCharCode(0x2581 + index);
		}
		window.location.hash = text;
		setTimeout(loop, 50);
	}
	loop();
</script>
</body>
</html>