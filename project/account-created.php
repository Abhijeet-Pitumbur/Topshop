<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["inactive"]))) {
	header("location:error");
	exit();
} else if (isset($_SESSION["customerID"])) {
	$customerID = hash("sha256", $_SESSION["customerID"]);
	$email = $_SESSION["email"];
	$firstName = $_SESSION["firstName"];
	$code = $_SESSION["code"];
	$emailType = 1;
	unset($_SESSION["customerID"]);
	unset($_SESSION["email"]);
	unset($_SESSION["firstName"]);
	unset($_SESSION["code"]);
	unset($_SESSION["inactive"]);
}
$title = "Account Created";
$css = "checkout";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div id="confirm">
					<div class="icon success-animation svg add-bottom-15">
						<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
							<g fill="none" stroke="#8EC343" stroke-width="2">
								<circle cx="36" cy="36" r="35" id="tickCircle"></circle>
								<path d="M17.417,37.778l9.93,9.909l25.444-25.393" id="tickPath"></path>
							</g>
						</svg>
					</div>
					<h2>Account Created</h2>
					<h6>Verify your email to be able to start using your account.</h6>
					<p>A verification email has been sent. Click the link in the email to verify the email address belongs to you.</p>
					<div class="main-title mb-4">
						<p>
							<a class="btn-1 gray email-provider" href="https://accounts.google.com/ServiceLogin?service=mail"><img src="images/logos/gmail.svg" class="email-provider-img" height="20"/>Gmail</a>
							<a class="btn-1 gray email-provider" href="https://outlook.office.com/mail/"><img src="images/logos/outlook.svg" class="email-provider-img" height="20"/>Outlook</a>
							<a class="btn-1 gray email-provider" href="https://www.icloud.com/mail"><img src="images/logos/icloud.svg" class="email-provider-img" height="20"/>iCloud Mail</a>
							<a class="btn-1 gray email-provider" href="https://login.yahoo.com/?.src=ym"><img src="images/logos/yahoo.svg" class="email-provider-img" height="20"/>Yahoo! Mail</a>
						</p>
					</div>
					<p>Go check your inbox! Above are shortcuts to some of the popular email providers you might be using.</p>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<?php include "functions/send-email.php"; ?>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
</body>
</html>