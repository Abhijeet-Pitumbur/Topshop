<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["customerID"]))) {
	header("location:authenticate");
	exit();
}
$title = "Orders";
$css = "orders";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a type="button">Orders</a></li>
				</ul>
			</div>
			<h1>Orders</h1>
		</div>
		<?php
		$customerID = $_SESSION["customerID"];
		$sqlQuery = "SELECT COUNT(*) AS `numOrders`
		FROM `orders`
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$numOrders = mysqli_fetch_assoc($runQuery)["numOrders"];
		if ($numOrders > 0) {
		?>
		<table class="table table-striped order-list">
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sqlQuery = "SELECT `orderID`, `date`, `status`
				FROM `orders`
				WHERE `customerID` = '$customerID'
				ORDER BY `orderID` DESC";
				$runQuery = mysqli_query($connection, $sqlQuery);
				$i = 0;
				while ($results = mysqli_fetch_assoc($runQuery)) {
					$orders[$i] = $results;
					$i++;
				}
				for ($i = 0; $i < count($orders); $i++) {
				?>
				<tr>
					<td>
					<button class="collapsible">
						<table class="table table-striped order-list header-list">
							<thead>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<?php
							$orderID = $orders[$i]['orderID'];
							$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `o`.`quantity`
							FROM `orderdetails` AS `o`
							INNER JOIN `products` AS `p`
							ON `o`.`productID` = `p`.`productID`
							INNER JOIN `brands` AS `b`
							ON `p`.`brandID` = `b`.`brandID`
							WHERE `o`.`orderID` = '$orderID'
							ORDER BY `o`.`orderdetailID` DESC";
							$runQuery = mysqli_query($connection, $sqlQuery);
							$j = 0;
							$orderTotal = 0;
							unset($orderItems);
							while ($results = mysqli_fetch_assoc($runQuery)) {
								$orderItems[$j] = $results;
								$orderTotal += ($orderItems[$j]['quantity'] * $orderItems[$j]['newPrice']);
								$j++;
							}
							?>
							<tbody>
								<tr>
									<td>
										<strong><?php echo 'Order ' . sprintf("%06d", $orderID); ?></strong>
									</td>
									<td>
										<strong><?php echo $orders[$i]['date']; ?></strong>
									</td>
									<td>
										<strong>
										<?php
										if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
											echo '€' . number_format($orderTotal * $_SESSION["MURtoEUR"]);
										} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
											echo '$' . number_format($orderTotal * $_SESSION["MURtoUSD"]);
										} else {
											echo 'Rs ' . number_format($orderTotal);
										}
										?>
										</strong>
									</td>
									<td>
										<strong><?php echo $orders[$i]['status']; ?></strong>
									</td>
								</tr>
							</tbody>
						</table>
					</button>
					<div class="product-list">
						<table class="table table-striped order-list">
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php for ($j = 0; $j < count($orderItems); $j++) { ?>
								<tr>
									<td>
										<div class="thumb-cart">
											<img src="images/products/<?php echo $orderItems[$j]['productID']; ?>-0.jpg" class="lazy">
										</div>
										<span class="item-cart"><a href="product?id=<?php echo sprintf("%06d", $orderItems[$j]['productID']); ?>"><?php echo $orderItems[$j]['quantity'] . 'x ' . $orderItems[$j]['brandName'] . ' ' . $orderItems[$j]['productName']; ?></a></span>
									</td>
									<td>
										<strong>
										<?php
										if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
											echo '€' . number_format($orderItems[$j]['quantity'] * $orderItems[$j]['newPrice'] * $_SESSION["MURtoEUR"]);
										} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
											echo '$' . number_format($orderItems[$j]['quantity'] * $orderItems[$j]['newPrice'] * $_SESSION["MURtoUSD"]);
										} else {
											echo 'Rs ' . number_format($orderItems[$j]['quantity'] * $orderItems[$j]['newPrice']);
										}
										?>
										</strong>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<hr>
		<div class="main-title mb-4">
			<p>Want to check the status of your delivery?</p>
			<p><a class="btn-1 gray" href="track-order">Track Order</a></p>
		</div>
		<hr>
	</div>
	<?php } else { ?>
	<div class="container empty-cart">
		<div class="row justify-content-center text-center">
			<div class="col-xl-7 col-lg-9">
				<img src="images/others/empty-cart.svg" class="img-fluid" width="400" height="280">
				<h2>No Orders</h2>
				<h6>You have not placed any orders. Let's go buy something!</h6>
				<p>You need to add some products to your cart and then checkout to place an order.</p>
				<div class="main-title mb-4">
					<p><a class="btn-1" href="cart">View Cart</a></p>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<script>
	var collapsibles = document.getElementsByClassName("collapsible");
	for (var i = 0; i < collapsibles.length; i++) {
		collapsibles[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight) {
				content.style.maxHeight = null;
			} else {
				content.style.maxHeight = content.scrollHeight + "px";
			}
		});
	}
</script>
</body>
</html>