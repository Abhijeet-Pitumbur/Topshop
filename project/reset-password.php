<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if ((!(isset($_SESSION["reset"]))) && (!(isset($_SESSION["customerID"])))) {
	header("location:error");
	exit();
} else {
	$customerID = $_SESSION["customerID"];
	unset($_SESSION["customerID"]);
	unset($_SESSION["reset"]);
}
$title = "Reset Password";
$css = "authenticate";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box-account">
					<h3 class="new-customer">Reset Password</h3>
					<div class="form-container">
						<form onsubmit="return false" id="resetPassword">
							<div class="form-group">
								<input type="hidden" class="form-control" name="customerID" id="customerID" value="<?php echo intval($customerID); ?>">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
								<a type="button" onclick="showHidePassword('password')" class="ti-eye password-eye"></a>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Confirm New Password">
								<a type="button" onclick="showHidePassword('rePassword')" class="ti-eye password-eye"></a>
							</div>
							<hr>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn-1 full-width"></div>
						</form>
						<div class="text-center" id="resetPasswordMsg"></div>
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
<script>
	function showHidePassword(textBoxID) {
		var textBox = document.getElementById(textBoxID);
		if (textBox.type === "password") {
			textBox.type = "text";
		} else {
			textBox.type = "password";
		}
	}
</script>
</body>
</html>