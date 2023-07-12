<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (isset($_SESSION["customerID"])) {
	$customerID = $_SESSION["customerID"];
	$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
	FROM `carts`
	WHERE `customerID` = '$customerID'";
} else {
	$ipAddress = getenv("REMOTE_ADDR");
	$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
	FROM `carts`
	WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
}
$runQuery = mysqli_query($connection, $sqlQuery);
$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
if ($numCartItems <= 0) {
	header("location:cart");
	exit();
}
$title = "Checkout";
$css = "checkout";
include "functions/header.php";
if (isset($_SESSION["customerID"])) {
	$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
	FROM `carts` AS `c`
	INNER JOIN `products` AS `p`
	ON `c`.`productID` = `p`.`productID`
	INNER JOIN `brands` AS `b`
	ON `p`.`brandID` = `b`.`brandID`
	WHERE `c`.`customerID` = '$customerID'
	ORDER BY `c`.`cartID` DESC
	LIMIT 10";
} else {
	$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
	FROM `carts` AS `c`
	INNER JOIN `products` AS `p`
	ON `c`.`productID` = `p`.`productID`
	INNER JOIN `brands` AS `b`
	ON `p`.`brandID` = `b`.`brandID`
	WHERE `c`.`customerID` = 0 AND `c`.`ipAddress` = '$ipAddress'
	ORDER BY `c`.`cartID` DESC
	LIMIT 10";
}
$runQuery = mysqli_query($connection, $sqlQuery);
$i = 0;
while ($results = mysqli_fetch_assoc($runQuery)) {
	$cartItems[$i] = $results;
	$i++;
}
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a href="cart">Cart</a></li>
					<li>Checkout</li>
				</ul>
			</div>
			<h1>Checkout</h1>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="step first">
					<h3>1. Customer Info and Billing address</h3>
					<?php if (isset($_SESSION["customerID"])) { ?>
					<div class="row justify-content-center">
						<div class="col-md-10">
							<div id="customer-checkout">
								<div class="icon success-animation svg add-bottom-15">
									<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
										<g fill="none" stroke="#8EC343" stroke-width="2">
											<circle cx="36" cy="36" r="35" id="tickCircle"></circle>
											<path d="M17.417,37.778l9.93,9.909l25.444-25.393" id="tickPath"></path>
										</g>
									</svg>
								</div>
								<h5>Hello there, <?php echo $_SESSION["firstName"]; ?>!</h5>
								<p>You are signed in with <?php echo $_SESSION["email"]; ?></p>
								<p>Topshop will be using your account information at the checkout.</p>
								<p><a class="btn-1 outline full-width" href="account">My Account</a></p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<ul class="nav nav-tabs" id="tab-checkout" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="new-customer-tab" data-bs-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Sign Up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="customer-tab" data-bs-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Sign In</a>
						</li>
					</ul>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
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
						<div class="tab-pane fade relativePosition" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
							<a type="button" class="social-btn facebook">Sign in with Facebook</a>
							<a type="button" class="social-btn twitter">Sign in with Twitter</a>
							<p></p>
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
								<br>
								<div class="text-center"><a class="btn-1 gray" id="forgotBack" type="button">Back</a></div>
								<div class="text-center outputMsg" id="forgotPasswordMsg"></div>
							</form>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="step middle payments">
					<h3>2. Payment and Delivery</h3>
					<h6 class="pb-2">Payment Method</h6>
					<form onsubmit="return false" id="confirmCheckout">
						<ul>
							<li>
								<label class="container-radio">PayPal&trade;<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="paymentType" value="paypal" checked>
								<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container-radio">Credit Card<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="paymentType" value="card">
								<span class="checkmark"></span>
								</label>
								<div id="credit-card-info" class="pt-2 hiddenBox">
									<div class="form-group">
										<input type="text" class="form-control" name="cardName" id="cardName" placeholder="Full Name on Card">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="cardNumber" id="cardNumber" placeholder="Credit Card Number">
									</div>
									<div class="row no-gutters">
										<div class="col-6 form-group pr-1">
											<input type="text" class="form-control" name="cardExpire" id="cardExpire" placeholder="Expiration">
										</div>
										<div class="col-6 form-group pl-1">
											<input type="text" class="form-control" name="cardVerify" id="cardVerify" placeholder="CVC">
										</div>
									</div>
								</div>
							</li>
							<li>
								<label class="container-radio">Cash on Delivery<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="paymentType" value="cash">
								<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container-radio">Internet Banking Transfer<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="paymentType" value="bank">
								<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container-radio">MCB Juice&trade; Transfer<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="paymentType" value="juice">
								<span class="checkmark"></span>
								</label>
							</li>
						</ul>
						<div class="payment-info d-none d-sm-block">
							<figure><img src="images/logos/cards.svg"></figure>
							<p>Topshop accepts Visa, MasterCard, PayPal and MCB Juice.</p>
						</div>
						<h6 class="pb-2">Delivery Method</h6>
						<ul>
							<li>
								<label class="container-radio">Standard Delivery <small class="float-right pt-2">(3-5 days)</small><a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="deliveryType" value="standard" onclick="changeDeliveryType('standard')" checked>
								<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container-radio">Express Delivery <small class="float-right pt-2">(1-2 days)</small><a type="button" class="info" data-bs-toggle="modal" data-bs-target="#payments-method"></a>
								<input type="radio" name="deliveryType" value="express" onclick="changeDeliveryType('express')">
								<span class="checkmark"></span>
								</label>
							</li>
						</ul>
					</form>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="step last">
					<h3>3. Order Summary</h3>
					<div class="box-general summary">
						<ul>
							<?php for ($i = 0; $i < count($cartItems); $i++) { ?>
							<li class="clearfix">
								<a href="product?id=<?php echo sprintf("%06d", $cartItems[$i]['productID']); ?>">
								<em><?php echo $cartItems[$i]['quantity'] . 'x ' . $cartItems[$i]['brandName'] . ' ' . $cartItems[$i]['productName']; ?></em>
								</a>
								<span>
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
								}
								?>
								</span>
							</li>
							<?php
							}
							if ($numCartItems > 10) {
							?>
							<div class="text-center">
								<p>Showing the 10 most recent products added to cart</p>
							</div>
							<?php } ?>
							<p><a class="btn-1 outline full-width" href="cart">View Cart</a></p>
						</ul>
						<ul>
							<li class="clearfix">
								<em><strong>Subtotal</strong></em>
								<span>
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($totalPrice * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($totalPrice * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($totalPrice);
								}
								?>
								</span>
							</li>
							<?php if (isset($_SESSION["coupon"])) { ?>
							<li class="clearfix">
								<em><strong>Coupon</strong></em>
								<span>
								<?php
								$couponDiscountPercent = $_SESSION["coupon"];
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '- €' . number_format(((intval($couponDiscountPercent) / 100) * $totalPrice) * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '- $' . number_format(((intval($couponDiscountPercent) / 100) * $totalPrice) * $_SESSION["MURtoUSD"]);
								} else {
									echo '- Rs ' . number_format(((intval($couponDiscountPercent) / 100) * $totalPrice));
								}
								$totalPrice = ((100 - intval($couponDiscountPercent)) / 100) * $totalPrice;
								?>
								</span>
							</li>
							<?php
							}
							$subtotalPrice = $totalPrice;
							?>
							<li class="clearfix">
								<?php
								if ($totalPrice > 2500) {
									$deliveryFee = 0;
								} else {
									$deliveryFee = 150;
									$totalPrice += $deliveryFee;
								}
								?>
								<em><strong>Delivery</strong></em>
								<span id="formattedDeliveryFee">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($deliveryFee * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($deliveryFee * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($deliveryFee);
								}
								?>
								</span>
							</li>
						</ul>
						<div class="total clearfix">Total
							<span>
								<span id="formattedTotalPriceHTML">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									$formattedTotalPrice = '€' . number_format($totalPrice * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									$formattedTotalPrice = '$' . number_format($totalPrice * $_SESSION["MURtoUSD"]);
								} else {
									$formattedTotalPrice = 'Rs ' . number_format($totalPrice);
								}
								echo $formattedTotalPrice;
								?>
								</span>
								<input type="hidden" form="confirmCheckout" name="formattedTotalPrice" id="formattedTotalPrice" value="<?php echo $formattedTotalPrice; ?>"/>
							</span>
						</div>
						<div class="form-group">
							<label class="container-check">Subscribe to Topshop's email newsletter
							<input type="checkbox" checked>
							<span class="checkmark"></span>
							</label>
						</div>
						<input type="submit" form="confirmCheckout" class="btn-1 full-width" value="Confirm and Checkout"/>
						<div class="text-center outputMsg" id="confirmCheckoutMsg"></div>
					</div>
				</div>
			</div>
			<?php
			try {
				if (empty($_SESSION["MURtoUSD"])) {
					$totalPriceUSD = round($totalPrice * $_SESSION["MURtoUSD"]);
				} else {
					throw new Exception("Critical error");
				}
			} catch(Exception $e) {
				$totalPriceUSD = round($totalPrice * 0.025);
			}
			?>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypalForm">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="business" value="topshop@abhijt.com">
				<input type="hidden" name="return" value="<?php echo WEBSITE_URL; ?>/functions/paypal-transaction"/>
				<input type="hidden" name="cancel_return" value="<?php echo WEBSITE_URL; ?>/checkout"/>
				<input type="hidden" name="custom" value="<?php echo $customerID; ?>">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="lc" value="MU">
				<input type="hidden" name="item_name_1" value="Topshop Order">
				<input type="hidden" name="item_number_1" value="1">
				<input type="hidden" name="quantity_1" value="1">
				<input type="hidden" name="amount_1" id="totalPriceUSD" value="<?php echo $totalPriceUSD; ?>">
				<input type="hidden" name="currency_code" value="USD"/>
				<input type="hidden" name="no_deliveries" value="1">
				<input type="hidden" name="no_note" value="1">
				<input type="submit">
			</form>
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
	$('input[name="customerType"]').on("click", function () {
		var inputValue = $(this).attr("value");
		var targetBox = $("." + inputValue);
		$(".box").not(targetBox).hide();
		$(targetBox).show();
	});
	$('input[name="paymentType"]').on("change", function () {
		if ($("input[name='paymentType']:checked").val() == 'card') {
			$('#credit-card-info').fadeIn('fast');
		} else {
			$('#credit-card-info').fadeOut('fast');
		}
	});
	function showHidePassword(textBoxID) {
		var textBox = document.getElementById(textBoxID);
		if (textBox.type === "password") {
			textBox.type = "text";
		} else {
			textBox.type = "password";
		}
	}
	function changeDeliveryType(deliveryType) {
		var subtotalPrice = Number(<?php echo $subtotalPrice; ?>);
		var deliveryFee = Number(<?php echo $deliveryFee; ?>);
		var currency = String(document.getElementById("selectCurrency").value);
		var MURtoUSD = Number(<?php echo $_SESSION["MURtoUSD"]; ?>);
		var MURtoEUR = Number(<?php echo $_SESSION["MURtoEUR"]; ?>);
		if (deliveryType == "express") {
			deliveryFee *= 2;
		}
		if (currency == "USD") {
			$("#formattedDeliveryFee").html("$" + numberFormat(Math.round(deliveryFee * MURtoUSD), 0));
		} else if (currency == "EUR") {
			$("#formattedDeliveryFee").html("€" + numberFormat(Math.round(deliveryFee * MURtoEUR), 0));
		} else {
			$("#formattedDeliveryFee").html("Rs " + numberFormat(Math.round(deliveryFee), 0));
		}
		totalPrice = subtotalPrice + deliveryFee;
		if (currency == "USD") {
			$("#formattedTotalPriceHTML").html("$" + numberFormat(Math.round(totalPrice * MURtoUSD), 0));
			document.getElementById("formattedTotalPrice").value = "$" + numberFormat(Math.round(totalPrice * MURtoUSD), 0);
		} else if (currency == "EUR") {
			$("#formattedTotalPriceHTML").html("€" + numberFormat(Math.round(totalPrice * MURtoEUR), 0));
			document.getElementById("formattedTotalPrice").value = "€" + numberFormat(Math.round(totalPrice * MURtoEUR), 0);
		} else {
			$("#formattedTotalPriceHTML").html("Rs " + numberFormat(Math.round(totalPrice), 0));
			document.getElementById("formattedTotalPrice").value = "Rs " + numberFormat(Math.round(totalPrice), 0);
		}
		if (MURtoUSD > 0) {
			totalPriceUSD = totalPrice * MURtoUSD;
		} else {
			totalPriceUSD = totalPrice * 0.025;
		}
		document.getElementById("totalPriceUSD").value = Math.round(totalPriceUSD);
	}
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
	function numberFormat(number, decimals) {
		number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
		const n = !isFinite(+number) ? 0 : +number;
		const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
		const sep = ',';
		const dec = '.';
		let s = '';
		const toFixedFix = function (n, prec) {
			if (('' + n).indexOf('e') === -1) {
				return +(Math.round(n + 'e+' + prec) + 'e-' + prec);
			} else {
				const arr = ('' + n).split('e');
				let sig = '';
				if (+arr[1] + prec > 0) {
					sig = '+';
				}
				return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec);
			}
		}
		s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.');
		if (s[0].length > 3) {
			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		}
		if ((s[1] || '').length < prec) {
			s[1] = s[1] || '';
			s[1] += new Array(prec - s[1].length + 1).join('0');
		}
		return s.join(dec);
	}
</script>
<div class="modal fade" id="payments-method" tabindex="-1" role="dialog" aria-labelledby="payments-method-title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="text-end">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h5 class="modal-title" id="payments-method-title">Payment and Delivery</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dui faucibus in ornare quam viverra orci sagittis eu volutpat. Malesuada bibendum arcu vitae elementum. Congue mauris rhoncus aenean vel elit scelerisque.</p>
				<p>Tellus molestie nunc non blandit massa. Venenatis cras sed felis eget velit aliquet sagittis. Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in.</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>