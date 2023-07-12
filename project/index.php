<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "Your One-Stop Shop";
$css = "home";
include "functions/header.php";
?>
<main>
	<?php
	for ($i = 1; $i <= 3; $i++) {
		$sqlQuery = "SELECT *
		FROM `featured`
		INNER JOIN `products`
		ON `featured`.`productID` = `products`.`productID`
		INNER JOIN `brands`
		ON `products`.`brandID` = `brands`.`brandID`
		WHERE `featured`.`featuredID` = $i";
		$runQuery = mysqli_query($connection, $sqlQuery);
		$featuredProducts[$i] = mysqli_fetch_assoc($runQuery);
	}
	if (isset($_SESSION["customerID"])) {
	?>
	<div id="carousel-home-2">
		<div class="owl-carousel owl-theme">
			<div class="owl-slide cover" style="background-image: url(images/home/customer-1.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center white">
									<h2 class="owl-slide-animated owl-slide-title"><?php echo $featuredProducts[1]["brandName"] . '<br>' . $featuredProducts[1]["productName"]; ?></h2>
									<p class="owl-slide-animated owl-slide-subtitle">
									<?php echo $featuredProducts[1]["tagline"]; ?>
									</p>
									<div class="owl-slide-animated owl-slide-cta">
										<a class="btn-1" href="product?id=<?php echo sprintf("%06d", $featuredProducts[1]['productID']); ?>">
										<?php
										if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
											echo 'Shop Now at €' . number_format($featuredProducts[1]['newPrice'] * $_SESSION["MURtoEUR"]);
										} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
											echo 'Show Now at $' . number_format($featuredProducts[1]['newPrice'] * $_SESSION["MURtoUSD"]);
										} else {
											echo 'Show Now at Rs ' . number_format($featuredProducts[1]['newPrice']);
										}
										?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-slide cover" style="background-image: url(images/home/customer-2.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center white">
									<h2 class="owl-slide-animated owl-slide-title"><?php echo $classes[1]['className']; ?></h2>
									<p class="owl-slide-animated owl-slide-subtitle"><?php echo $classes[1]['tagline']; ?></p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn-1" href="search?query=<?php echo strtolower($classes[1]['className']); ?>">Shop Now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-slide cover" style="background-image: url(images/home/customer-3.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center white">
									<h2 class="owl-slide-animated owl-slide-title"><?php echo $classes[2]['className']; ?></h2>
									<p class="owl-slide-animated owl-slide-subtitle"><?php echo $classes[2]['tagline']; ?></p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn-1" href="search?query=<?php echo strtolower($classes[2]['className']); ?>">Shop Now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-slide cover" style="background-image: url(images/home/customer-4.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center white">
									<h2 class="owl-slide-animated owl-slide-title"><?php echo $classes[3]['className']; ?></h2>
									<p class="owl-slide-animated owl-slide-subtitle"><?php echo $classes[3]['tagline']; ?></p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn-1" href="search?query=<?php echo strtolower($classes[3]['className']); ?>">Shop Now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="icon-drag-mobile"></div>
	</div>
	<?php } else { ?>
	<div class="header-video">
		<div id="featured-video">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.2)">
				<div class="container">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6">
							<div class="slide-text white">
								<h3><?php echo $featuredProducts[1]["brandName"] . '<br>' . $featuredProducts[1]["productName"]; ?></h3>
								<p><?php echo $featuredProducts[1]["tagline"]; ?></p>
								<a class="btn-1" href="product?id=<?php echo sprintf("%06d", $featuredProducts[1]['productID']); ?>">
								<?php
								if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
									echo 'Shop Now at €' . number_format($featuredProducts[1]['newPrice'] * $_SESSION["MURtoEUR"]);
								} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
									echo 'Show Now at $' . number_format($featuredProducts[1]['newPrice'] * $_SESSION["MURtoUSD"]);
								} else {
									echo 'Show Now at Rs ' . number_format($featuredProducts[1]['newPrice']);
								}
								?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="images/home/video-fix.png" class="header-video--media" data-video-src="videos/featured-1"
			data-teaser-source="videos/featured-1" data-provider="" data-video-width="1920" data-video-height="960">
	</div>
	<?php } ?>
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
	<div class="container margin-60-35">
		<div class="main-title mb-4">
			<h2>Collections</h2>
			<span>Collections</span>
			<p>Enjoy the best of Topshop.</p>
		</div>
		<div class="row small-gutters categories-grid">
			<div class="col-sm-12 col-md-6">
				<a href="collection?id=2">
					<img src="images/home/collection-2.jpg" class="img-fluid lazy">
					<div class="wrapper">
						<h2><?php echo $collections[2]['collectionName']; ?></h2>
						<?php
						$sqlQuery = "SELECT COUNT(*) AS `numCollectionItems`
						FROM `products`
						WHERE `collectionID` = 2";
						$runQuery = mysqli_query($connection, $sqlQuery);
						$numCollectionItems = mysqli_fetch_assoc($runQuery)["numCollectionItems"] + 1200;
						?>
						<p><?php echo number_format($numCollectionItems) . ' Products'; ?></p>
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="row small-gutters mt-md-0 mt-sm-2">
					<div class="col-sm-6">
						<a href="collection?id=4">
							<img src="images/home/collection-4.jpg" class="img-fluid lazy">
							<div class="wrapper">
								<h2><?php echo $collections[4]['collectionName']; ?></h2>
								<?php
								$sqlQuery = "SELECT COUNT(*) AS `numCollectionItems`
								FROM `products`
								WHERE `collectionID` = 4";
								$runQuery = mysqli_query($connection, $sqlQuery);
								$numCollectionItems = mysqli_fetch_assoc($runQuery)["numCollectionItems"] + 500;
								?>
								<p><?php echo number_format($numCollectionItems) . ' Products'; ?></p>
							</div>
						</a>
					</div>
					<div class="col-sm-6">
						<a href="collection?id=1">
							<img src="images/home/collection-1.jpg" class="img-fluid lazy">
							<div class="wrapper">
								<h2><?php echo $collections[1]['collectionName']; ?></h2>
								<?php
								$sqlQuery = "SELECT COUNT(*) AS `numCollectionItems`
								FROM `products`
								WHERE `collectionID` = 1";
								$runQuery = mysqli_query($connection, $sqlQuery);
								$numCollectionItems = mysqli_fetch_assoc($runQuery)["numCollectionItems"] + 200;
								?>
								<p><?php echo number_format($numCollectionItems) . ' Products'; ?></p>
							</div>
						</a>
					</div>
					<div class="col-sm-12 mt-sm-2">
						<a href="collection?id=3">
							<img src="images/home/collection-3.jpg" class="img-fluid lazy">
							<div class="wrapper">
								<h2><?php echo $collections[3]['collectionName']; ?></h2>
								<?php
								$sqlQuery = "SELECT COUNT(*) AS `numCollectionItems`
								FROM `products`
								WHERE `collectionID` = 3";
								$runQuery = mysqli_query($connection, $sqlQuery);
								$numCollectionItems = mysqli_fetch_assoc($runQuery)["numCollectionItems"] + 1000;
								?>
								<p><?php echo number_format($numCollectionItems) . ' Products'; ?></p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container margin-60-35">
		<div class="main-title mb-4">
			<h2><?php echo $classes[1]['className']; ?></h2>
			<span><?php echo $classes[1]['className']; ?></span>
			<p><?php echo $classes[1]['tagline']; ?></p>
		</div>
		<div class="isotope-filter">
			<ul>
				<li><a type="button" id="all" data-filter="*">All</a></li>
				<li><a type="button" id="flash" data-filter=".flash"><?php echo $collections[2]['collectionName']; ?></a></li>
				<li><a type="button" id="best" data-filter=".best"><?php echo $collections[3]['collectionName']; ?></a></li>
				<li><a type="button" id="new" data-filter=".new"><?php echo $collections[4]['collectionName']; ?></a></li>
			</ul>
		</div>
		<div class="isotope-wrapper">
			<div class="row small-gutters">
				<?php
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 2 AND `products`.`categoryID` <= 4
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$flashSales[$i] = $results;
					$i++;
				}
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 3 AND `products`.`categoryID` <= 4
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$bestSelling[$i] = $results;
					$i++;
				}
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 4 AND `products`.`categoryID` <= 4
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$newArrivals[$i] = $results;
					$i++;
				}
				for ($i = 0; $i < 4; $i++) {
				?>
				<div class="col-6 col-md-4 col-xl-3 isotope-item flash">
					<div class="grid-item">
						<figure>
							<span class="ribbon flash"><?php echo $flashSales[$i]['discountPercent'] . '% Off'; ?></span>
							<a href="product?id=<?php echo sprintf("%06d", $flashSales[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $flashSales[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $flashSales[$i]['productID']; ?>-0.jpg">
							</a>
							<div data-countdown="<?php echo $flashSales[$i]['discountEndDate']; ?>" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $flashSales[$i]['productID']); ?>">
							<h3><?php echo $flashSales[$i]['brandName'] . ' ' . $flashSales[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($flashSales[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($flashSales[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($flashSales[$i]['newPrice']);
							}
							?>
							</span>
							<span class="old-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($flashSales[$i]['oldPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($flashSales[$i]['oldPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($flashSales[$i]['oldPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $flashSales[$i]['productID'] . ', ' . $flashSales[$i]['collectionID'] . ', \'' . $flashSales[$i]['brandName'] . '\', \'' . $flashSales[$i]['productName'] . '\', ' . $flashSales[$i]['newPrice'] . ', ' . $flashSales[$i]['oldPrice'] . ', ' . $flashSales[$i]['discountPercent'] . ')'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3 isotope-item best">
					<div class="grid-item">
						<figure>
							<span class="ribbon best">Best Selling</span>
							<a href="product?id=<?php echo sprintf("%06d", $bestSelling[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $bestSelling[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $bestSelling[$i]['productID']; ?>-0.jpg">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $bestSelling[$i]['productID']); ?>">
							<h3><?php echo $bestSelling[$i]['brandName'] . ' ' . $bestSelling[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($bestSelling[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($bestSelling[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($bestSelling[$i]['newPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $bestSelling[$i]['productID'] . ', ' . $bestSelling[$i]['collectionID'] . ', \'' . $bestSelling[$i]['brandName'] . '\', \'' . $bestSelling[$i]['productName'] . '\', ' . $bestSelling[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3 isotope-item new">
					<div class="grid-item">
						<figure>
							<span class="ribbon new">New Arrival</span>
							<a href="product?id=<?php echo sprintf("%06d", $newArrivals[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $newArrivals[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $newArrivals[$i]['productID']; ?>-0.jpg">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $newArrivals[$i]['productID']); ?>">
							<h3><?php echo $newArrivals[$i]['brandName'] . ' ' . $newArrivals[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($newArrivals[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($newArrivals[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($newArrivals[$i]['newPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $newArrivals[$i]['productID'] . ', ' . $newArrivals[$i]['collectionID'] . ', \'' . $newArrivals[$i]['brandName'] . '\', \'' . $newArrivals[$i]['productName'] . '\', ' . $newArrivals[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="main-title mb-4">
			<p><a class="btn-1" href="search?query=<?php echo strtolower($classes[1]['className']); ?>">View More</a></p>
		</div>
	</div>
	<div class="featured lazy" data-bg="url(images/home/featured-2.jpg)">
		<div class="featured-image-gradient opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
			<div class="container margin-60">
				<div class="row justify-content-center justify-content-md-start">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<h3><?php echo $featuredProducts[2]["brandName"] . '<br>' . $featuredProducts[2]["productName"]; ?></h3>
						<p><?php echo $featuredProducts[2]["tagline"]; ?></p>
						<div class="feat-text-block">
							<a class="btn-1" href="product?id=<?php echo sprintf("%06d", $featuredProducts[2]['productID']); ?>">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo 'Shop Now at €' . number_format($featuredProducts[2]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo 'Show Now at $' . number_format($featuredProducts[2]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Show Now at Rs ' . number_format($featuredProducts[2]['newPrice']);
							}
							?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container margin-60-35">
		<div class="main-title mb-4">
			<h2><?php echo $classes[3]['className']; ?></h2>
			<span><?php echo $classes[3]['className']; ?></span>
			<p><?php echo $classes[3]['tagline']; ?></p>
		</div>
		<div class="isotope-filter-2">
			<ul>
				<li><a type="button" id="all-2" data-filter="*">All</a></li>
				<li><a type="button" id="flash-2" data-filter=".flash-2"><?php echo $collections[2]['collectionName']; ?></a></li>
				<li><a type="button" id="best-2" data-filter=".best-2"><?php echo $collections[3]['collectionName']; ?></a></li>
				<li><a type="button" id="new-2" data-filter=".new-2"><?php echo $collections[4]['collectionName']; ?></a></li>
			</ul>
		</div>
		<div class="isotope-wrapper-2">
			<div class="row small-gutters">
				<?php
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 2 AND `products`.`categoryID` >= 9 AND `products`.`categoryID` <= 12
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$flashSales[$i] = $results;
					$i++;
				}
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 3 AND `products`.`categoryID` >= 9 AND `products`.`categoryID` <= 12
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$bestSelling[$i] = $results;
					$i++;
				}
				$i = 0;
				$sqlQuery = "SELECT *
				FROM `products`
				INNER JOIN `brands`
				ON `products`.`brandID` = `brands`.`brandID`
				WHERE `products`.`collectionID` = 4 AND `products`.`categoryID` >= 9 AND `products`.`categoryID` <= 12
				ORDER BY RAND()
				LIMIT 4";
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery))
				{
					$newArrivals[$i] = $results;
					$i++;
				}
				for ($i = 0; $i < 4; $i++) {
				?>
				<div class="col-6 col-md-4 col-xl-3 isotope-item-2 flash-2">
					<div class="grid-item">
						<figure>
							<span class="ribbon flash"><?php echo $flashSales[$i]['discountPercent'] . '% Off'; ?></span>
							<a href="product?id=<?php echo sprintf("%06d", $flashSales[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $flashSales[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $flashSales[$i]['productID']; ?>-0.jpg">
							</a>
							<div data-countdown="<?php echo $flashSales[$i]['discountEndDate']; ?>" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $flashSales[$i]['productID']); ?>">
							<h3><?php echo $flashSales[$i]['brandName'] . ' ' . $flashSales[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($flashSales[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($flashSales[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($flashSales[$i]['newPrice']);
							}
							?>
							</span>
							<span class="old-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format(($flashSales[$i]['oldPrice']) * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format(($flashSales[$i]['oldPrice']) * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($flashSales[$i]['oldPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $flashSales[$i]['productID'] . ', ' . $flashSales[$i]['collectionID'] . ', \'' . $flashSales[$i]['brandName'] . '\', \'' . $flashSales[$i]['productName'] . '\', ' . $flashSales[$i]['newPrice'] . ', ' . $flashSales[$i]['oldPrice'] . ', ' . $flashSales[$i]['discountPercent'] . ')'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3 isotope-item-2 best-2">
					<div class="grid-item">
						<figure>
							<span class="ribbon best">Best Selling</span>
							<a href="product?id=<?php echo sprintf("%06d", $bestSelling[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $bestSelling[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $bestSelling[$i]['productID']; ?>-0.jpg">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $bestSelling[$i]['productID']); ?>">
							<h3><?php echo $bestSelling[$i]['brandName'] . ' ' . $bestSelling[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($bestSelling[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($bestSelling[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($bestSelling[$i]['newPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $bestSelling[$i]['productID'] . ', ' . $bestSelling[$i]['collectionID'] . ', \'' . $bestSelling[$i]['brandName'] . '\', \'' . $bestSelling[$i]['productName'] . '\', ' . $bestSelling[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3 isotope-item-2 new-2">
					<div class="grid-item">
						<figure>
							<span class="ribbon new">New Arrival</span>
							<a href="product?id=<?php echo sprintf("%06d", $newArrivals[$i]['productID']); ?>">
							<img class="img-fluid lazy" src="images/products/<?php echo $newArrivals[$i]['productID']; ?>-1.jpg">
							<img class="img-fluid lazy" src="images/products/<?php echo $newArrivals[$i]['productID']; ?>-0.jpg">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
						</div>
						<a href="product?id=<?php echo sprintf("%06d", $newArrivals[$i]['productID']); ?>">
							<h3><?php echo $newArrivals[$i]['brandName'] . ' ' . $newArrivals[$i]['productName']; ?></h3>
						</a>
						<div class="price-box">
							<span class="new-price">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo '€' . number_format($newArrivals[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo '$' . number_format($newArrivals[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Rs ' . number_format($newArrivals[$i]['newPrice']);
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
							<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $newArrivals[$i]['productID'] . ', ' . $newArrivals[$i]['collectionID'] . ', \'' . $newArrivals[$i]['brandName'] . '\', \'' . $newArrivals[$i]['productName'] . '\', ' . $newArrivals[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
								title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
							</li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="main-title mb-4">
			<p><a class="btn-1" href="search?query=<?php echo strtolower($classes[3]['className']); ?>">View More</a></p>
		</div>
	</div>
	<div class="featured lazy" data-bg="url(images/home/featured-3.jpg)">
		<div class="featured-image-gradient opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
			<div class="container margin-60">
				<div class="row justify-content-center justify-content-md-start">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<h3><?php echo $featuredProducts[3]["brandName"] . '<br>' . $featuredProducts[3]["productName"]; ?></h3>
						<p><?php echo $featuredProducts[3]["tagline"]; ?></p>
						<div class="feat-text-block">
							<a class="btn-1" href="product?id=<?php echo sprintf("%06d", $featuredProducts[3]['productID']); ?>">
							<?php
							if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
								echo 'Shop Now at €' . number_format($featuredProducts[3]['newPrice'] * $_SESSION["MURtoEUR"]);
							} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
								echo 'Show Now at $' . number_format($featuredProducts[3]['newPrice'] * $_SESSION["MURtoUSD"]);
							} else {
								echo 'Show Now at Rs ' . number_format($featuredProducts[3]['newPrice']);
							}
							?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-gray">
		<div class="container margin-30">
			<div id="brands" class="owl-carousel owl-theme">
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-1.png"
						class="owl-lazy"></a>
				</div>
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-2.png"
						class="owl-lazy"></a>
				</div>
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-3.png"
						class="owl-lazy"></a>
				</div>
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-4.png"
						class="owl-lazy"></a>
				</div>
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-5.png"
						class="owl-lazy"></a>
				</div>
				<div class="item">
					<a type="button"><img src="images/home/placeholder.png" data-src="images/brands/brand-6.png"
						class="owl-lazy"></a>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
$includeCheck = true;
include "functions/footer.php";
?>
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
<div class="top-panel" id="accountExperiencePanel">
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="item-panel">
						<div class="outputMsg"></div>
						<a>
							<h5>Sign in for the best Topshop experience!</h5>
						</a>
						<div>
							<span>Use a Topshop account to place orders, save products to your cart and wishlist, and more!</span>
						</div>
					</div>
				</div>
				<div class="col-md-5 btn-panel">
					<a type="button" id="closeAccountExperiencePanel" class="btn-1 outline">Not Now</a>
					<span class="outputMsg"></span>
					<a type="button" onclick="location.href='authenticate'" class="btn-1">Sign In or Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<script src="javascript/modernizr.js"></script>
<script src="javascript/isotope.js"></script>
<?php if (isset($_SESSION["customerID"])) { ?>
<script src="javascript/carousel.js"></script>
<?php } else { ?>
<script src="javascript/video.js"></script>
<script>
	HeaderVideo.init({
		container: $('.header-video'),
		header: $('.header-video--media'),
		videoTrigger: $("#video-trigger"),
		autoPlayVideo: true
	});
</script>
<?php } ?>
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
	$(window).on('load', function () {
		var $container = $('.isotope-wrapper');
		$container.isotope({
			itemSelector: '.isotope-item',
			layoutMode: 'masonry'
		});
	});
	$('.isotope-filter').on('click', 'a', 'change', function () {
		var selector = $(this).attr('data-filter');
		$('.isotope-wrapper').isotope({
			filter: selector
		});
	});
	$(window).on('load', function () {
		var $container = $('.isotope-wrapper-2');
		$container.isotope({
			itemSelector: '.isotope-item-2',
			layoutMode: 'masonry'
		});
	});
	$('.isotope-filter-2').on('click', 'a', 'change', function () {
		var selector = $(this).attr('data-filter');
		$('.isotope-wrapper-2').isotope({
			filter: selector
		});
	});
	var displayAccountExperiencePanel = true;
	if (window.matchMedia("only screen and (max-width: 760px)").matches) {
		displayAccountExperiencePanel = false;
	}
	<?php if (isset($_SESSION["customerID"])) { ?>
	displayAccountExperiencePanel = false;
	<?php } ?>
	$(window).scroll(function () {
		if (($(document).scrollTop() > 3500) && (displayAccountExperiencePanel)) {
			$("#accountExperiencePanel").addClass("show");
			$("#aaccountExperiencePanel").addClass("layer-is-visible");
			displayAccountExperiencePanel = false;
		}
	});
	$("#closeAccountExperiencePanel").on("click", function () {
		$("#accountExperiencePanel").removeClass("show");
		$("#accountExperiencePanel").removeClass("layer-is-visible");
	});
</script>
</body>
</html>