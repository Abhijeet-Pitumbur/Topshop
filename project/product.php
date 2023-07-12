<?php
include "functions/database.php";
if ((!(isset($_GET["id"]))) || (strlen($_GET["id"]) !== 6)) {
	header("location:error");
	exit();
}
$productID = intval($_GET["id"]);
$sqlQuery = "SELECT *
FROM `products`
INNER JOIN `brands`
ON `products`.`brandID` = `brands`.`brandID`
INNER JOIN `categories`
ON `products`.`categoryID` = `categories`.`categoryID`
WHERE `products`.`productID` = '$productID'";
$runQuery = mysqli_query($connection, $sqlQuery);
$rowCount = mysqli_num_rows($runQuery);
if ($rowCount == 1) {
	$row = mysqli_fetch_assoc($runQuery);
} else {
	header("location:error");
	exit();
}
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = $row['brandName'] . ' ' . $row['productName'];
$css = "product";
include "functions/header.php";
?>
<main>
	<div class="container margin-30">
		<?php if ($row['collectionID'] == 2) { ?>
		<div class="countdown-inner">
			<?php echo $row['discountPercent'] . '% discount ends in '; ?>
			<div data-countdown="<?php echo $row['discountEndDate']; ?>" class="countdown"></div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-6 magnific-gallery">
				<p>
					<a href="images/products/<?php echo $row['productID']; ?>-2.jpg" data-effect="mfp-zoom-in"><img src="images/products/<?php echo $row['productID']; ?>-2.jpg" class="img-fluid"></a>
				</p>
				<p>
					<a href="images/products/<?php echo $row['productID']; ?>-3.jpg" data-effect="mfp-zoom-in"><img src="images/products/<?php echo $row['productID']; ?>-3.jpg" class="img-fluid lazy"></a>
				</p>
				<p>
					<a href="images/products/<?php echo $row['productID']; ?>-4.jpg" data-effect="mfp-zoom-in"><img src="images/products/<?php echo $row['productID']; ?>-4.jpg" class="img-fluid lazy"></a>
				</p>
				<p>
					<a href="images/products/<?php echo $row['productID']; ?>-5.jpg" data-effect="mfp-zoom-in"><img src="images/products/<?php echo $row['productID']; ?>-5.jpg" class="img-fluid lazy"></a>
				</p>
			</div>
			<div class="col-lg-6" id="sidebar-fixed">
				<div class="breadcrumbs">
					<ul>
						<li><a type="button">Categories</a></li>
						<?php if ($row['categoryID'] <= 4) { ?>
						<li><a type="button"><?php echo $classes[1]['className']; ?></a></li>
						<?php } else if ($row['categoryID'] <= 8) { ?>
						<li><a type="button"><?php echo $classes[2]['className']; ?></a></li>
						<?php } else if ($row['categoryID'] <= 12) { ?>
						<li><a type="button"><?php echo $classes[3]['className']; ?></a></li>
						<?php } ?>
						<li><?php echo $row['categoryName']; ?></li>
					</ul>
				</div>
				<div class="prod-info">
					<h1><?php echo $row['brandName'] . ' ' . $row['productName']; ?></h1>
					<span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em> 4.2 stars - 213 reviews</em></span>
					<p><br><?php echo $row['shortDesc']; ?></p>
					<div class="prod-options">
						<div class="row">
							<label class="col-xl-5 col-lg-5 col-md-6 col-6 pt-0"><strong>Colors</strong></label>
							<div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
								<ul>
								<?php
								$colors = explode(', ', $row['colors']);
								for ($i = 0; $i < count($colors); $i++) {
									echo ($i == 0) ? '<li><a type="button" class="color active" style="background-color: ' . $colors[$i] . '"></a></li>' : '<li><a type="button" class="color" style="background-color: ' . $colors[$i] . '"></a></li>' ;
								}
								?>
								</ul>
							</div>
						</div>
						<?php
						if (!(empty($row['options']))) {
							$options = explode(', ', $row['options']);
						?>
						<div class="row">
							<label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Options </strong>
							<?php if (strcmp($options[0], "Small (S)") == 0) { ?>
							<a type="button" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a>
							<?php } ?>
							</label>
							<div class="col-xl-4 col-lg-5 col-md-6 col-6">
								<div class="custom-select-form">
									<select class="wide">
									<?php
									for ($i = 0; $i < count($options); $i++) {
										echo ($i == 0) ? '<option selected>' . $options[$i] . '</option>' : '<option>' . $options[$i] . '</option>' ;
									} ?>
									</select>
								</div>
							</div>
						</div>
						<?php
						}
						if (isset($_SESSION["customerID"])) {
							$customerID = $_SESSION["customerID"];
							$sqlQuery = "SELECT *
							FROM `carts`
							WHERE `productID` = '$productID' AND `customerID` = '$customerID'";
						} else {
							$ipAddress = getenv("REMOTE_ADDR");
							$sqlQuery = "SELECT *
							FROM `carts`
							WHERE `productID` = '$productID' AND `customerID` = 0 AND `ipAddress` = '$ipAddress'";
						}
						$runQuery = mysqli_query($connection, $sqlQuery);
						$rowCount = mysqli_num_rows($runQuery);
						?>
						<form onsubmit="return false" id="updateCart">
							<div class="row">
								<input class="form-control" type="hidden" name="productID" id="productID" value="<?php echo $productID; ?>">
								<label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Quantity</strong></label>
								<div class="col-xl-4 col-lg-5 col-md-6 col-6">
									<div class="numbers-row">
										<?php if ($rowCount > 0) { ?>
										<input class="form-control quantity-stepper" type="text" value="<?php echo mysqli_fetch_assoc($runQuery)["quantity"]; ?>" id="quantity" name="quantity">
										<?php } else { ?>
										<input class="form-control quantity-stepper" type="text" value="1" id="quantity" name="quantity">
										<?php } ?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="row">
						<div class="col-lg-5 col-md-6">
							<div class="price-main">
								<?php if ($row['collectionID'] == 2) { ?>
								<span class="new-price">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($row['newPrice'] * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($row['newPrice'] * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($row['newPrice']);
								}
								?>
								</span>
								<span class="percentage"><?php echo '' . $row['discountPercent'] . '% Off'; ?></span>
								<span class="old-price">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($row['oldPrice'] * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($row['oldPrice'] * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($row['oldPrice']);
								}
								?>
								</span>
								<?php } else { ?>
								<span class="new-price">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo '€' . number_format($row['newPrice'] * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo '$' . number_format($row['newPrice'] * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Rs ' . number_format($row['newPrice']);
								}
								?>
								</span>
								<?php
								}
								if ($row['collectionID'] == 1) {
								?>
								<span class="featured-flag"><?php echo 'Featured'; ?></span>
								<?php } else if ($row['collectionID'] == 3) { ?>
								<span class="best-flag"><?php echo 'Best Selling'; ?></span>
								<?php } else if ($row['collectionID'] == 4) { ?>
								<span class="new-flag"><?php echo 'New Arrival'; ?></span>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<?php if ($rowCount > 0) { ?>
							<input class="form-control" type="hidden" name="updateCartType" id="updateCartType" form="updateCart" value="removeFromCart">
							<input id="updateCartBtn" type="submit" form="updateCart" class="btn-1 full-width outline" value="Added to Cart" onmouseover="removeFromCartText(this)" onmouseout="addedToCartText(this)"/>
							<?php } else { ?>
							<input class="form-control" type="hidden" name="updateCartType" id="updateCartType" form="updateCart" value="addToCart">
							<input id="updateCartBtn" type="submit" form="updateCart" class="btn-1 full-width" value="Add to Cart"/>
							<?php } ?>
							<div class="text-center outputMsg" id="updateCartMsg"></div>
						</div>
					</div>
				</div>
				<div class="product-actions">
					<ul>
						<li>
							<a type="button"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
						</li>
						<li>
							<a type="button"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tabs-product bg-white abhijeet">
		<div class="container">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Details</a>
				</li>
				<li class="nav-item">
					<a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="tab-content-wrapper">
		<div class="container">
			<div class="tab-content" role="tablist">
				<div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
					<div class="card-header" role="tab" id="heading-A">
						<h5 class="mb-0">
							<a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
							Description
							</a>
						</h5>
					</div>
					<div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<h3>Description</h3>
									<p><?php echo $row['longDesc']; ?></p>
								</div>
								<div class="col-md-6">
									<h3>Specifications</h3>
									<div class="table-responsive">
										<table class="table table-sm table-striped">
											<?php
											$specs = explode('~', $row['specs']);
											foreach ($specs as &$values) {
												$values = explode(':', $values);
											}
											?>
											<tbody>
												<?php for ($i = 0; $i < count($specs); $i++) { ?>
												<tr>
													<td><strong><?php echo $specs[$i][0]; ?></strong></td>
													<td><?php echo $specs[$i][1]; ?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
					<div class="card-header" role="tab" id="heading-B">
						<h5 class="mb-0">
							<a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
							Reviews
							</a>
						</h5>
					</div>
					<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
						<div class="card-body">
							<div class="row justify-content-between">
								<div class="col-lg-6">
									<div class="review-content">
										<div class="clearfix add-bottom-10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5 stars</em></span>
											<em>Published 9 hours ago</em>
										</div>
										<h4>"Completely satisfied"</h4>
										<strong>- Michael Scott</strong>
										<p>Ut porttitor leo a diam sollicitudin tempor id eu. Et netus et malesuada fames ac turpis egestas sed tempus. Tincidunt dui ut ornare lectus. Eget sit amet tellus cras adipiscing. Euismod elementum nisi quis eleifend quam adipiscing vitae proin.</p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="review-content">
										<div class="clearfix add-bottom-10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>3 stars</em></span>
											<em>Published 1 day ago</em>
										</div>
										<h4>"Good product"</h4>
										<strong>- Jim Halpert</strong>
										<p>Id volutpat lacus laoreet non curabitur gravida arcu. Etiam erat velit scelerisque in dictum non. Vel eros donec ac odio tempor orci. Interdum posuere lorem ipsum dolor.</p>
									</div>
								</div>
							</div>
							<div class="row justify-content-between">
								<div class="col-lg-6">
									<div class="review-content">
										<div class="clearfix add-bottom-10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4 stars</em></span>
											<em>Published 3 days ago</em>
										</div>
										<h4>"Very good"</h4>
										<strong>- Dwight Schrute</strong>
										<p>Amet nulla facilisi morbi tempus iaculis urna id. Ut consequat semper viverra nam libero justo laoreet. Egestas purus viverra accumsan in nisl nisi. Volutpat est velit egestas dui id ornare. Aliquet sagittis id consectetur purus ut faucibus.</p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="review-content">
										<div class="clearfix add-bottom-10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5 stars</em></span>
											<em>Published 6 days ago</em>
										</div>
										<h4>"Outstanding"</h4>
										<strong>- Pam Beasly</strong>
										<p>Nisi porta lorem mollis aliquam ut porttitor leo. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Vitae auctor eu augue ut lectus. Urna neque viverra justo nec ultrices.</p>
									</div>
								</div>
							</div>
							<p class="text-end"><a href="submit-review?id=<?php echo sprintf("%06d", $row['productID']); ?>" class="btn-1">Submit a Review</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container margin-60-35">
		<div class="main-title">
			<h2>Related Products</h2>
			<span>Related Products</span>
			<p>Customers also viewed these products</p>
		</div>
		<div class="owl-carousel owl-theme products-carousel">
			<?php
			$i = 0;
			$sqlQuery = "SELECT *
			FROM `products`
			INNER JOIN `brands`
			ON `products`.`brandID` = `brands`.`brandID` ";
			if ($row['categoryID'] <= 4) {
				$sqlQuery .= "WHERE `products`.`categoryID` <= 4 ";
			} else if ($row['categoryID'] <= 8) {
				$sqlQuery .= "WHERE `products`.`categoryID` >= 5 AND `products`.`categoryID` <= 8 ";
			} else if ($row['categoryID'] <= 12) {
				$sqlQuery .= "WHERE `products`.`categoryID` >= 9 AND `products`.`categoryID` <= 12 ";
			} else if ($row['categoryID'] <= 13) {
				$sqlQuery .= "WHERE `products`.`categoryID` = 13 ";
			} else {
				$sqlQuery .= "WHERE `products`.`categoryID` >= 14 ";
			}
			$sqlQuery .= 'AND NOT `products`.`productID` = ' . $productID . '
			ORDER BY RAND()
			LIMIT 6';
			$runQuery = mysqli_query($connection, $sqlQuery);
			while ($results = mysqli_fetch_assoc($runQuery))
			{
				$related[$i] = $results;
				$i++;
			}
			for ($i = 0; $i < 6; $i++) {
				if ($related[$i]['collectionID'] == 1) {
			?>
			<div class="item">
				<div class="grid-item">
					<figure>
						<span class="ribbon featured">Featured</span>
						<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-0.jpg">
						</a>
					</figure>
					<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
						class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
					</div>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h3><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h3>
					</a>
					<div class="price-box">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
					</div>
					<ul>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to wishlist"><i class="ti-heart"></i><span>Add to wishlist</span></a>
						</li>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
							compare</span></a>
						</li>
						<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $related[$i]['productID'] . ', ' . $related[$i]['collectionID'] . ', \'' . $related[$i]['brandName'] . '\', \'' . $related[$i]['productName'] . '\', ' . $related[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php	} else if ($related[$i]['collectionID'] == 2) { ?>
			<div class="item">
				<div class="grid-item">
					<figure>
						<span class="ribbon flash"><?php echo $related[$i]['discountPercent'] . '% Off'; ?></span>
						<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-0.jpg">
						</a>
						<div data-countdown="<?php echo $related[$i]['discountEndDate']; ?>" class="countdown"></div>
					</figure>
					<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
						class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
					</div>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h3><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h3>
					</a>
					<div class="price-box">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
						<span class="old-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format(($related[$i]['oldPrice']) * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format(($related[$i]['oldPrice']) * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['oldPrice']);
						}
						?>
						</span>
					</div>
					<ul>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to wishlist"><i class="ti-heart"></i><span>Add to wishlist</span></a>
						</li>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
							compare</span></a>
						</li>
						<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $related[$i]['productID'] . ', ' . $related[$i]['collectionID'] . ', \'' . $related[$i]['brandName'] . '\', \'' . $related[$i]['productName'] . '\', ' . $related[$i]['newPrice'] . ', ' . $related[$i]['oldPrice'] . ', ' . $related[$i]['discountPercent'] . ')'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php	} else if ($related[$i]['collectionID'] == 3) { ?>
			<div class="item">
				<div class="grid-item">
					<figure>
						<span class="ribbon best">Best Selling</span>
						<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-0.jpg">
						</a>
					</figure>
					<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
						class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
					</div>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h3><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h3>
					</a>
					<div class="price-box">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
					</div>
					<ul>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to wishlist"><i class="ti-heart"></i><span>Add to wishlist</span></a>
						</li>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
							compare</span></a>
						</li>
						<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $related[$i]['productID'] . ', ' . $related[$i]['collectionID'] . ', \'' . $related[$i]['brandName'] . '\', \'' . $related[$i]['productName'] . '\', ' . $related[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php	} else if ($related[$i]['collectionID'] == 4) { ?>
			<div class="item">
				<div class="grid-item">
					<figure>
						<span class="ribbon new">New Arrival</span>
						<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-0.jpg">
						</a>
					</figure>
					<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
						class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
					</div>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h3><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h3>
					</a>
					<div class="price-box">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
					</div>
					<ul>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to wishlist"><i class="ti-heart"></i><span>Add to wishlist</span></a>
						</li>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
							compare</span></a>
						</li>
						<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $related[$i]['productID'] . ', ' . $related[$i]['collectionID'] . ', \'' . $related[$i]['brandName'] . '\', \'' . $related[$i]['productName'] . '\', ' . $related[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php	} else { ?>
			<div class="item">
				<div class="grid-item">
					<figure>
						<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg">
						<img class="img-fluid lazy" src="images/products/<?php echo $related[$i]['productID']; ?>-0.jpg">
						</a>
					</figure>
					<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
						class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
					</div>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h3><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h3>
					</a>
					<div class="price-box">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
					</div>
					<ul>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to wishlist"><i class="ti-heart"></i><span>Add to wishlist</span></a>
						</li>
						<li><a type="button" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
							compare</span></a>
						</li>
						<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $related[$i]['productID'] . ', ' . $related[$i]['collectionID'] . ', \'' . $related[$i]['brandName'] . '\', \'' . $related[$i]['productName'] . '\', ' . $related[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
							title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php
				}
			}
			?>
		</div>
	</div>
	<div class="main-title mb-4">
		<p>Need help with <?php echo $row['brandName'] . ' ' . $row['productName']; ?>?</p>
		<p><a class="btn-1" href="contact">Contact Topshop</a></p>
	</div>
	<br>
	<div class="feat">
		<div class="container">
			<ul>
				<li>
					<div class="box">
						<i class="ti-gift"></i>
						<div class="justify-content-center">
							<h3>Free Delivery</h3>
							<p>
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo 'For all orders over €' . number_format(2500 * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo 'For all orders over $' . number_format(2500 * $_SESSION["MURtoUSD"]);
								} else {
									echo 'For all orders over Rs ' . number_format(2500);
								}
								?>
							</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box">
						<i class="ti-wallet"></i>
						<div class="justify-content-center">
							<h3>Secure Payment</h3>
							<p>100% secure payment</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box">
						<i class="ti-headphone-alt"></i>
						<div class="justify-content-center">
							<h3>24/7 Support</h3>
							<p>Reliable online support</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
<div class="top-panel" id="addToCartPanel">
	<div class="container header-panel">
		<a type="button" class="close-top-panel-btn"><i class="ti-close"></i></a>
		<label>Product added to cart</label>
	</div>
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="item-panel">
						<figure>
							<img src="images/products/<?php echo $row['productID']; ?>-1.jpg" class="lazy">
						</figure>
						<h4><?php echo $row['brandName'] . ' ' . $row['productName']; ?></h4>
						<div class="price-panel">
							<?php if ($row['collectionID'] == 2) { ?>
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($row['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($row['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($row['newPrice']);
							}
							?>
							</span>
							<span class="percentage"><?php echo '-' . $row['discountPercent'] . '%'; ?></span>
							<span class="old-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($row['oldPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($row['oldPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($row['oldPrice']);
							}
							?>
							</span>
							<?php } else { ?>
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($row['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($row['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($row['newPrice']);
							}
							?>
							</span>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-5 btn-panel">
					<a href="cart" class="btn-1 outline">View Cart</a>
					<span class="outputMsg"></span>
					<a href="checkout" class="btn-1">Checkout</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container related">
		<label>Related products</label>
		<h4>Customers also viewed these products</h4>
		<div class="row">
			<?php
			for ($i = 0; $i < 3; $i++) {
				if ($related[$i]['collectionID'] == 2) {
			?>
			<div class="col-md-4">
				<div class="item-panel">
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<figure>
							<img src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg" class="lazy">
						</figure>
					</a>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h5><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h5>
					</a>
					<div class="price-panel">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
						<span class="percentage"><?php echo '-' . $related[$i]['discountPercent'] . '%'; ?></span>
						<span class="old-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['oldPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['oldPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['oldPrice']);
						}
						?>
						</span>
					</div>
				</div>
			</div>
			<?php	} else { ?>
			<div class="col-md-4">
				<div class="item-panel">
					<a href="product?id=<?php sprintf("%06d", $related[$i]['productID']); ?>">
						<figure>
							<img src="images/products/<?php echo $related[$i]['productID']; ?>-1.jpg" class="lazy">
						</figure>
					</a>
					<a href="product?id=<?php echo sprintf("%06d", $related[$i]['productID']); ?>">
						<h5><?php echo $related[$i]['brandName'] . ' ' . $related[$i]['productName']; ?></h5>
					</a>
					<div class="price-panel">
						<span class="new-price">
						<?php
						if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
							echo '€' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
						} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
							echo '$' . number_format($related[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
						} else {
							echo 'Rs ' . number_format($related[$i]['newPrice']);
						}
						?>
						</span>
					</div>
				</div>
			</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<div class="top-panel" id="quickAddToCartPanel">
	<div class="container header-panel">
		<a type="button" class="close-top-panel-btn"><i class="ti-close"></i></a>
		<label id="quickAddToCartLabel"></label>
	</div>
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="item-panel">
						<figure>
							<img id="quickProductThumbnail" class="lazy">
						</figure>
						<a id="quickProductLink">
							<h4 id="quickProductName"></h4>
						</a>
						<div class="price-panel">
							<span class="new-price" id="quickNewPrice"></span>
							<span id="quickDiscountPercent"></span>
							<span id="quickOldPrice"></span>
						</div>
					</div>
				</div>
				<div class="col-md-5 btn-panel">
					<a href="cart" class="btn-1 outline">View Cart</a>
					<span class="outputMsg"></span>
					<a href="checkout" class="btn-1">Checkout</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="text-end">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h5 class="modal-title">Size Guide</h5>
				<p>Ullamcorper morbi tincidunt ornare massa eget egestas purus viverra accumsan. Enim ut tellus elementum sagittis vitae et leo duis ut. Consectetur libero id faucibus nisl tincidunt eget risus commodo viverra.</p>
				<div class="table-responsive">
					<table class="table table-striped table-sm sizes">
						<tbody>
							<tr>
								<th scope="row">US Sizes</th>
								<td>6</td>
								<td>6.5</td>
								<td>7</td>
								<td>7.5</td>
								<td>8</td>
								<td>8.5</td>
								<td>9</td>
								<td>9.5</td>
								<td>10</td>
								<td>10.5</td>
							</tr>
							<tr>
								<th scope="row">Euro Sizes</th>
								<td>39</td>
								<td>39</td>
								<td>40</td>
								<td>40-41</td>
								<td>41</td>
								<td>41-42</td>
								<td>42</td>
								<td>42-43</td>
								<td>43</td>
								<td>43-44</td>
							</tr>
							<tr>
								<th scope="row">UK Sizes</th>
								<td>5.5</td>
								<td>6</td>
								<td>6.5</td>
								<td>7</td>
								<td>7.5</td>
								<td>8</td>
								<td>8.5</td>
								<td>9</td>
								<td>9.5</td>
								<td>10</td>
							</tr>
							<tr>
								<th scope="row">inches</th>
								<td>9.25"</td>
								<td>9.5"</td>
								<td>9.625"</td>
								<td>9.75"</td>
								<td>9.9375"</td>
								<td>10.125"</td>
								<td>10.25"</td>
								<td>10.5"</td>
								<td>10.625"</td>
								<td>10.75"</td>
							</tr>
							<tr>
								<th scope="row">cm</th>
								<td>23.5</td>
								<td>24.1</td>
								<td>24.4</td>
								<td>24.8</td>
								<td>25.4</td>
								<td>25.7</td>
								<td>26</td>
								<td>26.7</td>
								<td>27</td>
								<td>27.3</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<script src="javascript/sidebar.js"></script>
<script>
	function quickAddToCart(quickProductID, quickCollectionID, quickBrandName, quickProductName, quickNewPrice, quickOldPrice, quickDiscountPercent) {
		event.preventDefault();
		$.ajax({
			url: "functions/quick-add-to-cart",
			method: "POST",
			dataType: "json",
			data: {
				productID: quickProductID,
				newPrice: quickNewPrice,
				oldPrice: quickOldPrice
			},
			success: function (data) {
				if (data.outputMsg == "quick-add-to-cart-success") {
					document.getElementById("quickAddToCartLabel").innerHTML = "Product added to cart";
					if (data.numCartItems > 99) {
						$("#headerCartNumItems").html("<strong>99</strong>");
					} else if (data.numCartItems > 0) {
						$("#headerCartNumItems").html("<strong>" + data.numCartItems + "</strong>");
					}
				} else if (data.outputMsg == "already-in-cart") {
					document.getElementById("quickAddToCartLabel").innerHTML = "Product already added to cart";
				}
				if ((data.outputMsg == "quick-add-to-cart-success") || (data.outputMsg == "already-in-cart")) {
					document.getElementById("quickProductThumbnail").setAttribute("src", "images/products/" + quickProductID + "-1.jpg");
					document.getElementById("quickProductLink").setAttribute("href", "product?id=" + data.formattedProductID);
					document.getElementById("quickProductName").innerHTML = quickBrandName + " " + quickProductName;
					document.getElementById("quickNewPrice").innerHTML = data.formattedNewPrice;
					if (quickCollectionID == 2) {
						document.getElementById("quickDiscountPercent").setAttribute("class", "percentage");
						document.getElementById("quickDiscountPercent").innerHTML = "-" + quickDiscountPercent + "%";
						document.getElementById("quickOldPrice").setAttribute("class", "old-price");
						document.getElementById("quickOldPrice").innerHTML = data.formattedOldPrice;
					} else {
						document.getElementById("quickDiscountPercent").removeAttribute("class");
						document.getElementById("quickDiscountPercent").innerHTML = "";
						document.getElementById("quickOldPrice").removeAttribute("class");
						document.getElementById("quickOldPrice").innerHTML = "";
					}
					document.getElementById("quickAddToCartPanel").classList.add("show");
					document.getElementById("layer").classList.add("layer-is-visible");
				}
			}
		})
	}
	$('#sidebar-fixed').theiaStickySidebar({
		minWidth: 991,
		updateSidebarHeight: false,
		additionalMarginTop: 90
	});
	function removeFromCartText(btnElement) {
		btnElement.value = "Remove from Cart";
	}
	function addedToCartText(btnElement) {
		btnElement.value = "Added to Cart";
	}
</script>
</body>
</html>