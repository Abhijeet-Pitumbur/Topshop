<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["customerID"]))) {
	header("location:authenticate");
	exit();
}
$title = "My Account";
$css = "account";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a type="button">My Account</a></li>
				</ul>
			</div>
			<h1>My Account</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-4 col-lg-6 col-md-4">
				<div class="box-account">
					<h3 class="customer">Account Dashboard</h3>
					<div class="form-container">
						<div class="row no-gutters">
							<div class="account-settings">
								<div class="customer-account">
									<div class="customer-picture">
										<img src="images/others/account-picture.png"">
									</div>
									<h5 class="customer-name" id="dashboardName">Hello, <?php echo $_SESSION["firstName"]; ?>!</h5>
									<h6 class="customer-email">You are signed in with <?php echo $_SESSION["email"]; ?></h6>
								</div>
								<div class="about">
									<h5>Name</h5>
									<p id="currentName"><?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?></p>
									<h5>Address</h5>
									<p id="currentAddress"><?php echo $_SESSION["zip"] . ' ' . $_SESSION["address"] . ', ' . $_SESSION["city"] . ', ' . $_SESSION["country"]; ?></p>
									<h5>Phone</h5>
									<p id="currentPhone"><?php echo '+230 ' . substr($_SESSION["phone"], 0, 4) . ' ' . substr($_SESSION["phone"], 4, 4); ?></p>
								</div>
							</div>
							<div class="text-center"><a href="cart" class="btn-1 full-width">View Cart</a></div>
							<div class="outputMsg"></div>
							<div class="text-center"><a href="orders" class="btn-1 outline full-width">View Orders</a></div>
							<div class="outputMsg"></div>
							<div class="text-center"><a href="wishlist" class="btn-1 outline full-width">View Wishlist</a></div>
							<div class="outputMsg"></div>
							<div class="text-center"><a type="button" onclick="location.href='functions/sign-out'" class="btn-1 gray full-width">Sign Out</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-6 col-md-8">
				<div class="box-account">
					<h3 class="new-customer">Edit Account</h3>
					<div class="form-container">
						<form onsubmit="return false" id="editAccount">
							<div class="box">
								<div class="row no-gutters">
									<div class="form-group">
										<em>Topshop uses these information for your orders</em>
									</div>
									<?php if (!(empty($_SESSION["lastName"]))) { ?>
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $_SESSION["firstName"]; ?>" placeholder="First Name">
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $_SESSION["lastName"]; ?>" placeholder="Last Name">
										</div>
									</div>
									<?php } else { ?>
									<div class="form-group">
										<input type="text" class="form-control" name="comName" id="comName" value="<?php echo $_SESSION["firstName"]; ?>" placeholder="Company Name">
									</div>
									<?php } ?>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION["address"]; ?>" placeholder="Address">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" class="form-control" name="city" id="city" value="<?php echo $_SESSION["city"]; ?>" placeholder="City">
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="zip" id="zip" value="<?php echo $_SESSION["zip"]; ?>" placeholder="ZIP Code">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<div class="custom-select-form">
												<select class="wide add-bottom-10" name="country" id="country">
													<option value="">Country</option>
													<option value="Mauritius" <?php echo ($_SESSION["country"] == "Mauritius") ? "selected" : "" ?>>Mauritius</option>
													<option value="Rodrigues" <?php echo ($_SESSION["country"] == "Rodrigues") ? "selected" : "" ?>>Rodrigues</option>
													<option value="Other" <?php echo ($_SESSION["country"] == "Other") ? "selected" : "" ?>>Other</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION["phone"]; ?>" placeholder="Phone">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="container-check">I approve these changes to my account</a>
								<input type="checkbox" name="approveChanges" value="approve">
								<span class="checkmark"></span>
								</label>
							</div>
							<div class="text-center"><input type="submit" value="Save Changes" class="btn-1 full-width"></div>
						</form>
						<div class="text-center" id="editAccountMsg"></div>
					</div>
				</div>
				<div class="box-account">
					<div class="form-container">
						<form onsubmit="return false" id="changePassword" autocomplete="off">
							<div class="form-group">
								<em>Your current password is required to change to a new password</em>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password" placeholder="Current Password">
								<a type="button" onclick="showHidePassword('password')" class="ti-eye password-eye"></a>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
								<a type="button" onclick="showHidePassword('newPassword')" class="ti-eye password-eye"></a>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Confirm New Password">
								<a type="button" onclick="showHidePassword('rePassword')" class="ti-eye password-eye"></a>
							</div>
							<div class="form-group">
								<label class="container-check">I approve changing my password</a>
								<input type="checkbox" name="approveNewPassword" value="approve">
								<span class="checkmark"></span>
								</label>
							</div>
							<div class="text-center"><input type="submit" value="Change Password" class="btn-1 full-width"></div>
						</form>
						<div class="text-center" id="changePasswordMsg"></div>
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