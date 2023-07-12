<?php
include "functions/database.php";
if (!(isset($_GET["query"]))) {
	header("location:error");
	exit();
}
if ((!(isset($_GET["page"]))) || (intval($_GET["page"]) <= 0)) {
	header('location:search?query=' . $_GET["query"] . '&page=1');
	exit();
}
$searchQuery = preg_replace('/[^a-zA-Z\d]/', '+', $_GET["query"]);
$searchQuery = preg_replace('/\+\++/', '+', $searchQuery);
$searchQuery = trim($searchQuery, '+');
$searchQuery = urldecode($searchQuery);
$searchQuery = strtolower($searchQuery);
if (strlen($searchQuery) == 0) {
	header("location:error");
	exit();
} else if (strlen($searchQuery) > 70) {
	$searchQuery = substr($searchQuery, 0, 70);
	header('location:search?query=' . $searchQuery . '&page=' . $_GET["page"]);
	exit();
}
if (strcmp($_GET["query"], $searchQuery) !== 0) {
	$searchQuery = preg_replace('/[\s]/', '+', $searchQuery);
	header('location:search?query=' . $searchQuery . '&page=' . $_GET["page"]);
	exit();
}
$keywords = explode(" ", $searchQuery);
for ($i = 0; $i < count($keywords); $i++) {
	if ($i == 0) {
		$keywordSearch = "`products`.`keywords` LIKE '%" . $keywords[$i] . "%'";
	} else {
		$keywordSearch .= " AND `products`.`keywords` LIKE '%" . $keywords[$i] . "%'";
	}
}
$sqlQuery = 'SELECT COUNT(*) AS `numProducts`
FROM `products`
WHERE ' . $keywordSearch;
$runQuery = mysqli_query($connection, $sqlQuery);
$numProducts = mysqli_fetch_assoc($runQuery)["numProducts"];
if ($numProducts > 0) {
	$gridLimit = 15;
	$numPages = ceil($numProducts / $gridLimit);
	$page = min($numPages, $_GET["page"]);
	if ($_GET["page"] > $numPages) {
		header('location:search?query=' . $searchQuery . '&page=' . $numPages);
		exit();
	}
	$gridOffset = ($page - 1) * $gridLimit;
	$gridStart = $gridOffset + 1;
	$gridEnd = min(($gridOffset + $gridLimit), $numProducts);
	$prevPage = ($page > 1) ? 'search?query=' . $searchQuery . '&page=' . ($page - 1) : "#";
	$nextPage = ($page < $numPages) ? 'search?query=' . $searchQuery . '&page=' . ($page + 1) : "#";
	$sqlQuery = 'SELECT *
	FROM `products`
	INNER JOIN `brands`
	ON `products`.`brandID` = `brands`.`brandID`
	WHERE ' . $keywordSearch . '
	ORDER BY `products`.`unitsSold` DESC
	LIMIT ' . $gridLimit . '
	OFFSET ' . $gridOffset;
	$runQuery = mysqli_query($connection, $sqlQuery);
	if ($runQuery) {
		$i = 0;
		while ($results = mysqli_fetch_assoc($runQuery)) {
			$grid[$i] = $results;
			$i++;
		}
	} else {
		header("location:error");
		exit();
	}
}
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = 'Search results for ' . $searchQuery;
$css = "grid";
include "functions/header.php";
?>
<main>
	<div class="top-banner">
		<div class="featured-image-gradient opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 77, 218, 0.1)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li>Search results for</li>
					</ul>
				</div>
				<h1><?php echo ucwords($searchQuery);?></h1>
			</div>
		</div>
		<img src="images/grid/search.jpg" class="img-fluid">
	</div>
	<div id="stick-here"></div>
	<div class="toolbox elemento-stick">
		<div class="container">
			<ul class="clearfix">
				<li>
					<div class="sort-select">
						<select name="sort" id="sort">
							<option value="popularity" selected>Sort by Most Popular</option>
							<option value="rating">Sort by Highest Rating</option>
							<option value="date">Sort by Most Recent</option>
							<option value="price">Sort by Lowest Price</option>
							<option value="price-desc">Sort by Highest Price</option>
						</select>
					</div>
				</li>
				<li>
					<a type="button"><i class="ti-view-grid"></i></a>
					<a type="button"><i class="ti-view-list"></i></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="container margin-30">
		<div class="row">
			<?php if ($numProducts > 0) { ?>
			<aside class="col-lg-3" id="sidebar-fixed">
				<div class="filter-col">
					<div class="inner-bt"><a type="button" class="open-filters"><i class="ti-close"></i></a></div>
					<div class="filter-type abhijeet">
						<h4><a href="#filter-1" data-bs-toggle="collapse" class="opened">Brands</a></h4>
						<div class="collapse show" id="filter-1">
							<ul>
								<li>
									<label class="container-check">Apple<small>12</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Samsung<small>24</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">LG<small>23</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Huawei<small>15</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="filter-type abhijeet">
						<h4><a href="#filter-2" data-bs-toggle="collapse" class="opened">Price</a></h4>
						<div class="collapse show" id="filter-2">
							<ul>
								<li>
									<label class="container-check">Rs 0 - Rs 1,000<small>6</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Rs 1,000 - Rs 10,000<small>12</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Rs 10,000 - Rs 50,000<small>24</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Rs 50,000+<small>42</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="filter-type abhijeet">
						<h4><a href="#filter-3" data-bs-toggle="collapse" class="closed">Categories</a></h4>
						<div class="collapse" id="filter-3">
							<ul>
								<li>
									<label class="container-check">Phones<small>12</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Laptops<small>16</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Desktops<small>5</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Peripherals<small>8</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="filter-type abhijeet">
						<h4><a href="#filter-4" data-bs-toggle="collapse" class="closed">Collections</a></h4>
						<div class="collapse" id="filter-4">
							<ul>
								<li>
									<label class="container-check">Featured Products<small>5</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Flash Sales<small>8</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">Best Selling<small>13</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container-check">New Arrivals<small>16</small>
									<input type="checkbox" checked>
									<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
					</div>
					<div class="buttons text-center">
						<a type="button" class="btn-1">Filter</a>
						<span class="outputMsg"></span>
						<a type="button" class="btn-1 gray">Reset</a>
					</div>
				</div>
			</aside>
			<div class="col-lg-9">
				<div class="row small-gutters">
					<?php include "functions/products-grid.php"; ?>
				</div>
				<?php if ($numPages > 1) { ?>
				<div class="pagination-wrapper">
					<ul class="pagination">
						<li><a href="<?php echo $prevPage; ?>" class="prev">❮</a></li>
						<?php for ($i = 1; $i <= $numPages; $i++) { ?>
						<li>
							<a href="<?php echo 'search?query='. $searchQuery . '&page=' . $i; ?>" <?php echo ($i == $page) ? "class='active'" : "" ?>><?php echo $i; ?></a>
						</li>
						<?php } ?>
						<li><a href="<?php echo $nextPage; ?>" class="next">❯</a></li>
					</ul>
				</div>
				<?php } ?>
				<p class="text-center"><?php echo 'Showing results ' . $gridStart . ' to ' . $gridEnd . ' out of ' . $numProducts; ?></p>
				<br>
			</div>
			<?php } else { ?>
			<div class="col-lg-9">
				<h5>
					Your search for "<?php echo $searchQuery; ?>" did not match any products.
					<hr>
					Suggestions:
				</h5>
				<p>
				<ul>
					<li>Make sure that all words are spelled correctly.</li>
					<li>Avoid punctuation and special characters.</li>
					<li>Try more general keywords.</li>
					<li>Try different keywords.</li>
				</ul>
				</p>
			</div>
			<?php } ?>
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
<script src="javascript/jquery.js"></script>
<script src="javascript/main.js"></script>
<script src="javascript/sidebar.js"></script>
<script src="javascript/grid.js"></script>
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
</script>
</body>
</html>