<?php
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
include "functions/database.php";
if (isset($_SESSION["inactive"])) {
	header("location:error");
	exit();
}
header("refresh:10;url=index");
$title = "Email Verified";
$css = "checkout";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div id="confirm">
					<div class="icon success-animation svg add-bottom-15">
						<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
							<g fill="none" stroke="#8EC343" stroke-width="2">
								<circle cx="36" cy="36" r="35" id="tickCircle"></circle>
								<path d="M17.417,37.778l9.93,9.909l25.444-25.393" id="tickPath"></path>
							</g>
						</svg>
					</div>
					<h2>Email Verified</h2>
					<p>You can now start using your account. You will be automatically redirected to Topshop's Home Page in a few seconds.</p>
					<div class="main-title mb-4">
						<p>Happy Shopping!</p>
						<p><a class="btn-1" href="index">Go to Home Page Now</a></p>
					</div>
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
</body>
</html>