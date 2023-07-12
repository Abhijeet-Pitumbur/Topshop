<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["customerID"]))) {
	header("location:authenticate");
	exit();
}
$title = "Wishlist";
$css = "wishlist";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-30">
		<div class="page-header">
			<div class="breadcrumbs">
				<ul>
					<li><a type="button">Account Options</a></li>
					<li><a type="button">Wishlist</a></li>
				</ul>
			</div>
			<h1>Wishlist</h1>
		</div>
		<?php
		$customerID = $_SESSION["customerID"];
		$sqlQuery = "SELECT COUNT(*) AS `numWishlistItems`
		FROM `wishlists`
		WHERE `customerID` = '$customerID'";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$numWishlistItems = mysqli_fetch_assoc($runQuery)["numWishlistItems"];
		if ($numWishlistItems > 0) {
			$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`
			FROM `wishlists` AS `w`
			INNER JOIN `products` AS `p`
			ON `w`.`productID` = `p`.`productID`
			INNER JOIN `brands` AS `b`
			ON `p`.`brandID` = `b`.`brandID`
			WHERE `w`.`customerID` = '$customerID'
			ORDER BY `w`.`wishlistID` DESC";
			$runQuery = mysqli_query($connection, $sqlQuery);
			$i = 0;
			while ($results = mysqli_fetch_assoc($runQuery))
			{
				$wishlistItems[$i] = $results;
				$i++;
			}
		?>
		<table class="table table-striped wishlist-list">
			<thead>
				<tr>
					<th>
						Product
					</th>
					<th>
						Price
					</th>
					<th>
						Action
					</th>
					<th>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < count($wishlistItems); $i++) { ?>
				<tr>
					<td>
						<div class="thumb-cart">
							<img src="images/products/<?php echo $wishlistItems[$i]['productID']; ?>-1.jpg" class="lazy">
						</div>
						<span class="item-cart"><a href="product?id=<?php echo sprintf("%06d", $wishlistItems[$i]['productID']); ?>"><?php echo $wishlistItems[$i]['brandName'] . ' ' . $wishlistItems[$i]['productName']; ?></a></span>
					</td>
					<td>
						<strong>
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($wishlistItems[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($wishlistItems[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($wishlistItems[$i]['newPrice']);
						}
						?>
						</strong>
					</td>
					<td>
						<div>
							<a type="button" class="btn-1 outline">Add to cart</a>
						</div>
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
				<a type="button" class="btn-1 gray">Clear wishlist</a>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="container empty-cart">
		<div class="row justify-content-center text-center">
			<div class="col-xl-7 col-lg-9">
				<img src="images/others/empty-cart.svg" class="img-fluid" width="400" height="280">
				<h2>Empty Wishlist</h2>
				<h6>Your wishlist is empty. Let's go add something!</h6>
				<p>You can add products you want to buy to your wishlist to save them for future reference.</p>
				<div class="main-title mb-4">
					<p><a class="btn-1" href="index">Go to Home Page</a></p>
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
</body>
</html>