<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	header("location:index");
	exit();
}
$title = "Sign In or Sign Up";
$css = "authenticate";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a type="button">Sign In or Sign Up</a></li>
				</ul>
			</div>
			<h1>Sign In or Sign Up</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box-account">
					<h3 class="customer">Already a customer? Sign in below</h3>
					<div class="form-container">
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a type="button" class="social-btn facebook">Sign in with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a type="button" class="social-btn twitter">Sign in with Twitter</a>
							</div>
						</div>
						<div class="divider"><span>or sign in with your email</span></div>
						<form onsubmit="return false" id="signIn">
							<div class="form-group">
								<input onfocusout="validateEmail(this, '#signInMsg')" type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input onfocusout="validateBlank(this, '#signInMsg', 'Password')" type="password" class="form-control" name="password" id="password" placeholder="Password">
								<a type="button" onclick="showHidePassword('password')" class="ti-eye password-eye"></a>
							</div>
							<div class="clearfix add-bottom-15">
								<div class="checkboxes float-start">
									<label class="container-check">Keep me signed in
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</div>
								<div class="float-end"><a id="forgot" type="button">Forgot Password?</a></div>
							</div>
							<div class="text-center"><input type="submit" value="Sign In" class="btn-1 full-width"></div>
						</form>
						<div class="text-center" id="signInMsg"></div>
						<form onsubmit="return false" id="forgotPassword">
							<div class="form-group">
								<input onfocusout="validateEmail(this, '#forgotPasswordMsg')" type="email" class="form-control" name="emailForgot" id="emailForgot" placeholder="Your email">
							</div>
							<p class="text-center">A link to reset your password will be sent to your email</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn-1"></div>
							<hr>
							<div class="text-center"><a class="btn-1 gray" id="forgotBack" type="button">Back</a></div>
							<div class="text-center outputMsg" id="forgotPasswordMsg"></div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list-ok">
							<li>
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo 'Free Delivery on €' . number_format(2500 * $_SESSION["MURtoEUR"]) . '+ Orders';
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo 'Free Delivery on $' . number_format(2500 * $_SESSION["MURtoUSD"]) . '+ Orders';
							} else {
								echo 'Free Delivery on Rs ' . number_format(2500) . '+ Orders';
							}
							?>
							</li>
							<li>100% Secure Payment</li>
							<li>24/7 Online Support</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list-ok">
							<li>30-day Money-back Guarantee</li>
							<li>Warranty-covered Repairs</li>
							<li>Account Data Protection</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box-account">
					<h3 class="new-customer">New customer? Sign up below</h3>
					<div class="form-container">
						<form onsubmit="return false" id="signUp">
							<div class="form-group">
								<input onfocusout="validateEmail(this, '#signUpMsg')" type="email" class="form-control" name="newEmail" id="newEmail" placeholder="Email">
							</div>
							<div class="form-group">
								<input onfocusout="validateBlank(this, '#signUpMsg', 'Password')" type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Password">
								<a type="button" onclick="showHidePassword('newPassword')" class="ti-eye password-eye"></a>
							</div>
							<div class="form-group">
								<input onfocusout="validateBlank(this, '#signUpMsg', 'Password')" type="password" class="form-control" name="reNewPassword" id="reNewPassword" placeholder="Confirm Password">
								<a type="button" onclick="showHidePassword('reNewPassword')" class="ti-eye password-eye"></a>
							</div>
							<hr>
							<div class="form-group">
								<label class="container-radio" id="individualRadio">Individual
								<input type="radio" name="customerType" value="individual" checked>
								<span class="checkmark"></span>
								</label>
								<label class="container-radio" id="companyRadio">Company
								<input type="radio" name="customerType" value="company">
								<span class="checkmark"></span>
								</label>
							</div>
							<div class="individual box">
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="address" id="address" placeholder="Address">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="city" id="city" placeholder="City">
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="zip" id="zip" placeholder="ZIP Code">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<div class="custom-select-form">
												<select class="form-control wide add-bottom-10" name="country" id="country">
													<option value="" selected>Country</option>
													<option value="Mauritius">Mauritius</option>
													<option value="Rodrigues">Rodrigues</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
										</div>
									</div>
								</div>
							</div>
							<div class="company box hiddenBox">
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="comName" id="comName" placeholder="Company Name">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="comAddress" id="comAddress" placeholder="Address">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="comCity" id="comCity" placeholder="City">
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="comZip" id="comZip" placeholder="ZIP Code">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<div class="custom-select-form">
												<select class="wide add-bottom-10" name="comCountry" id="comCountry">
													<option value="" selected>Country</option>
													<option value="Mauritius">Mauritius</option>
													<option value="Rodrigues">Rodrigues</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="comPhone" id="comPhone" placeholder="Phone">
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label class="container-check">
									<div>I accept the <a href="https://policies.google.com/terms" target="_blank">Terms and Conditions</a></div>
									<input type="checkbox" name="acceptTerms" value="accept">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="text-center"><input type="submit" value="Sign Up" class="btn-1 full-width"></div>
						</form>
						<div class="text-center" id="signUpMsg"></div>
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
	$('input[name="customerType"]').on("click", function () {
		var inputValue = $(this).attr("value");
		var targetBox = $("." + inputValue);
		$(".box").not(targetBox).hide();
		$(targetBox).show();
	});
	function validateBlank(textBox, msgBoxID, msg) {
		if (textBox.value == "") {
			$(msgBoxID).html('<h6 class="text-error">' + msg + ' required</h6>');
		} else {
			$(msgBoxID).html("");
		}
	}
	function validateEmail(emailBox, msgBoxID) {
		if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(emailBox.value)) {
			$(msgBoxID).html("");
		} else if (emailBox.value == "") {
			$(msgBoxID).html('<h6 class="text-error">Email required</h6>');
		} else {
			$(msgBoxID).html('<h6 class="text-error">Invalid email</h6>');
		}
	}
</script>
</body>
</html>