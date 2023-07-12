<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "Cart";
$css = "cart";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a type="button">Cart</a></li>
				</ul>
			</div>
			<h1>Cart</h1>
		</div>
		<?php
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
		if ($numCartItems > 0) {
			if (isset($_SESSION["customerID"])) {
				$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
				FROM `carts` AS `c`
				INNER JOIN `products` AS `p`
				ON `c`.`productID` = `p`.`productID`
				INNER JOIN `brands` AS `b`
				ON `p`.`brandID` = `b`.`brandID`
				WHERE `c`.`customerID` = '$customerID'
				ORDER BY `c`.`cartID` DESC";
			} else {
				$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
				FROM `carts` AS `c`
				INNER JOIN `products` AS `p`
				ON `c`.`productID` = `p`.`productID`
				INNER JOIN `brands` AS `b`
				ON `p`.`brandID` = `b`.`brandID`
				WHERE `c`.`customerID` = 0 AND `c`.`ipAddress` = '$ipAddress'
				ORDER BY `c`.`cartID` DESC";
			}
			$runQuery = mysqli_query($connection, $sqlQuery);
			$i = $totalPrice = 0;
			while ($results = mysqli_fetch_assoc($runQuery)) {
				$cartItems[$i] = $results;
				$totalPrice += ($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
				$i++;
			}
		?>
		<table class="table table-striped cart-list">
			<thead>
				<tr>
					<th>
						Product
					</th>
					<th>
						Price
					</th>
					<th>
						Quantity
					</th>
					<th>
						Subtotal
					</th>
					<th>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < count($cartItems); $i++) { ?>
				<tr>
					<td>
						<div class="thumb-cart">
							<img src="images/products/<?php echo $cartItems[$i]['productID']; ?>-1.jpg" class="lazy">
						</div>
						<span class="item-cart"><a href="product?id=<?php echo sprintf("%06d", $cartItems[$i]['productID']); ?>"><?php echo $cartItems[$i]['brandName'] . ' ' . $cartItems[$i]['productName']; ?></a></span>
					</td>
					<td>
						<strong>
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($cartItems[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($cartItems[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($cartItems[$i]['newPrice']);
						}
						?>
						</strong>
					</td>
					<td>
						<div class="numbers-row">
							<input type="text" value="<?php echo $cartItems[$i]['quantity']; ?>" id="quantity" class="quantity-stepper" name="quantity">
							<div class="inc button-inc">+</div>
							<div class="dec button-inc">-</div>
						</div>
					</td>
					<td>
						<strong>
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
						}
						?>
						</strong>
					</td>
					<td class="options">
						<a type="button"><i class="ti-trash"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="row add-top-30 flex-sm-row-reverse cart-actions">
			<div class="col-sm-4 text-end">
				<a type="button" id="openClearCartPanel" class="btn-1 gray">Clear cart</a>
				<span class="outputMsg"></span>
				<a href="index" class="btn-1 outline">Add more items to cart</a>
			</div>
			<div class="col-sm-8">
				<div class="apply-coupon">
					<form onsubmit="return false" id="applyCoupon">
						<div class="form-group">
							<div class="row g-2">
								<div class="col-md-6"><input type="text" class="form-control" name="couponCode" id="couponCode" placeholder="Coupon code"></div>
								<div class="col-md-4">
									<input type="submit" value="Apply coupon" class="btn-1 gray">
									<a type="button" class="info" data-bs-toggle="modal" data-bs-target="#coupons"></a>
								</div>
							</div>
							<?php if (isset($_SESSION["coupon"])) { ?>
							<div class="outputMsg" id="applyCouponMsg">
								<h6 class="text-success"><?php echo $_SESSION["coupon"] . '% discount coupon applied'; ?></h6>
							</div>
							<?php } else { ?>
							<div class="outputMsg" id="applyCouponMsg"></div>
							<?php } ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="box-cart">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<ul>
						<li>
							<span>Subtotal</span>
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($totalPrice * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($totalPrice * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($totalPrice);
							}
							?>
						</li>
						<?php if (isset($_SESSION["coupon"])) { ?>
						<li>
							<span>Coupon</span>
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '- €' . number_format(((intval($_SESSION["coupon"]) / 100) * $totalPrice) * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '- $' . number_format(((intval($_SESSION["coupon"]) / 100) * $totalPrice) * $_SESSION["MURtoUSD"]);
							} else {
								echo '- Rs ' . number_format(((intval($_SESSION["coupon"]) / 100) * $totalPrice));
							}
							$totalPrice = ((100 - intval($_SESSION["coupon"])) / 100) * $totalPrice;
							?>
						</li>
						<?php } ?>
						<li>
							<?php
							if ($totalPrice > 2500) {
								$deliveryFee = 0;
							} else {
								$deliveryFee = 150;
								$totalPrice += $deliveryFee;
							}
							?>
							<span>Delivery</span>
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($deliveryFee * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($deliveryFee * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($deliveryFee);
							}
							?>
						</li>
						<li>
							<span>Total</span>
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($totalPrice * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($totalPrice * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($totalPrice);
							}
							?>
						</li>
					</ul>
					<a href="checkout" class="btn-1 full-width cart">Proceed to Checkout</a>
				</div>
			</div>
		</div>
	</div>
	<?php	} else { ?>
	<div class="container empty-cart">
		<div class="row justify-content-center text-center">
			<div class="col-xl-7 col-lg-9">
				<img src="images/others/empty-cart.svg" class="img-fluid" width="400" height="280">
				<h2>Empty Cart</h2>
				<h6>Your cart is empty. Let's go buy something!</h6>
				<p>You need to add some products to your cart before proceeding to checkout.</p>
				<div class="main-title mb-4">
					<p><a class="btn-1" href="index">Go to Home Page</a></p>
				</div>
			</div>
		</div>
	</div>
	<?php	} ?>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<div class="top-panel" id="clearCartPanel">
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="item-panel">
						<div class="outputMsg"></div>
						<a>
							<h5>Clear cart?</h5>
						</a>
						<div>
							<span>Are you sure you want to delete all items in your cart?</span>
						</div>
					</div>
				</div>
				<div class="col-md-5 btn-panel">
					<a type="button" onclick="location.href='functions/clear-cart'" class="btn-1 outline">Yes, clear</a>
					<span class="outputMsg"></span>
					<a type="button" id="closeClearCartPanel" class="btn-1">No, cancel</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="coupons" tabindex="-1" role="dialog" aria-labelledby="coupons-title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="text-end">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h5 class="modal-title" id="coupons-title">Coupons</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dui faucibus in ornare quam viverra orci sagittis eu volutpat. Malesuada bibendum arcu vitae elementum. Congue mauris rhoncus aenean vel elit scelerisque.</p>
				<p>Tellus molestie nunc non blandit massa. Venenatis cras sed felis eget velit aliquet sagittis. Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in.</p>
			</div>
		</div>
	</div>
</div>
<script>
	$("#openClearCartPanel").on("click", function () {
		$("#clearCartPanel").addClass("show");
		$("#clearCartPanel").addClass("layer-is-visible");
	});
	$("#closeClearCartPanel").on("click", function () {
		$("#clearCartPanel").removeClass("show");
		$("#clearCartPanel").removeClass("layer-is-visible");
	});
</script>
</body>
</html>