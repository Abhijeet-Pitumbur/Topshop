<?php
if (empty($grid)) {
	header("location:../error");
	exit();
}
for ($i = 0; $i < count($grid); $i++) {
	if ($grid[$i]['collectionID'] == 1) {
?>

<div class="col-6 col-md-4">
	<div class="grid-item">
		<figure>
			<span class="ribbon featured">Featured</span>
			<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-1.jpg">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-0.jpg">
			</a>
		</figure>
		<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
			class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
		</div>
		<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<h3><?php echo $grid[$i]['brandName'] . ' ' . $grid[$i]['productName']; ?></h3>
		</a>
		<div class="price-box">
			<span class="new-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['newPrice']);
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
			<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $grid[$i]['productID'] . ', ' . $grid[$i]['collectionID'] . ', \'' . $grid[$i]['brandName'] . '\', \'' . $grid[$i]['productName'] . '\', ' . $grid[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
			</li>
		</ul>
	</div>
</div>
<?php	} else if ($grid[$i]['collectionID'] == 2) { ?>
<div class="col-6 col-md-4">
	<div class="grid-item">
		<figure>
			<span class="ribbon flash"><?php echo $grid[$i]['discountPercent'] . '% Off'; ?></span>
			<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-1.jpg">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-0.jpg">
			</a>
			<div data-countdown="<?php echo $grid[$i]['discountEndDate']; ?>" class="countdown"></div>
		</figure>
		<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
			class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
		</div>
		<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<h3><?php echo $grid[$i]['brandName'] . ' ' . $grid[$i]['productName']; ?></h3>
		</a>
		<div class="price-box">
			<span class="new-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['newPrice']);
			}
			?>
			</span>
			<span class="old-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['oldPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['oldPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['oldPrice']);
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
			<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $grid[$i]['productID'] . ', ' . $grid[$i]['collectionID'] . ', \'' . $grid[$i]['brandName'] . '\', \'' . $grid[$i]['productName'] . '\', ' . $grid[$i]['newPrice'] . ', ' . $grid[$i]['oldPrice'] . ', ' . $grid[$i]['discountPercent'] . ')'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
			</li>
		</ul>
	</div>
</div>
<?php	} else if ($grid[$i]['collectionID'] == 3) { ?>
<div class="col-6 col-md-4">
	<div class="grid-item">
		<figure>
			<span class="ribbon best">Best Selling</span>
			<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-1.jpg">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-0.jpg">
			</a>
		</figure>
		<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
			class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
		</div>
		<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<h3><?php echo $grid[$i]['brandName'] . ' ' . $grid[$i]['productName']; ?></h3>
		</a>
		<div class="price-box">
			<span class="new-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['newPrice']);
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
			<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $grid[$i]['productID'] . ', ' . $grid[$i]['collectionID'] . ', \'' . $grid[$i]['brandName'] . '\', \'' . $grid[$i]['productName'] . '\', ' . $grid[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
			</li>
		</ul>
	</div>
</div>
<?php	} else if ($grid[$i]['collectionID'] == 4) { ?>
<div class="col-6 col-md-4">
	<div class="grid-item">
		<figure>
			<span class="ribbon new">New Arrival</span>
			<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-1.jpg">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-0.jpg">
			</a>
		</figure>
		<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
			class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
		</div>
		<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<h3><?php echo $grid[$i]['brandName'] . ' ' . $grid[$i]['productName']; ?></h3>
		</a>
		<div class="price-box">
			<span class="new-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['newPrice']);
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
			<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $grid[$i]['productID'] . ', ' . $grid[$i]['collectionID'] . ', \'' . $grid[$i]['brandName'] . '\', \'' . $grid[$i]['productName'] . '\', ' . $grid[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
			</li>
		</ul>
	</div>
</div>
<?php	} else { ?>
<div class="col-6 col-md-4">
	<div class="grid-item">
		<figure>
			<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-1.jpg">
			<img class="img-fluid lazy" src="images/products/<?php echo $grid[$i]['productID']; ?>-0.jpg">
			</a>
		</figure>
		<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
			class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
		</div>
		<a href="product?id=<?php echo sprintf("%06d", $grid[$i]['productID']); ?>">
			<h3><?php echo $grid[$i]['brandName'] . ' ' . $grid[$i]['productName']; ?></h3>
		</a>
		<div class="price-box">
			<span class="new-price">
			<?php
			if (($_COOKIE["CURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
				echo '€' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
			} else if (($_COOKIE["CURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
				echo '$' . number_format($grid[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
			} else {
				echo 'Rs ' . number_format($grid[$i]['newPrice']);
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
			<li><a type="button" onclick="<?php echo 'quickAddToCart(' . $grid[$i]['productID'] . ', 0, \'' . $grid[$i]['brandName'] . '\', \'' . $grid[$i]['productName'] . '\', ' . $grid[$i]['newPrice'] . ', 0, 0)'; ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
			</li>
		</ul>
	</div>
</div>
<?php
	}
}
?>
