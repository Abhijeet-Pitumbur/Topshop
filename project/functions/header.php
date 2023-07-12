<?php
ini_set('display_errors', 'off');
if (empty($title)) {
	header("location:../error");
	exit();
}
?>
<!DOCTYPE html>
<!-- Abhijeet Pitumbur © Topshop 2023 -->
<html lang="EN">
	<head>
		<meta charset="UTF-8">
		<title>Topshop - <?php echo $title; ?></title>
		<base href="<?php echo WEBSITE_URL . '/index'; ?>">
		<meta name="author" content="Abhijeet Pitumbur">
		<meta name="theme-color" content="#004DDA">
		<meta name="robots" content="index, follow">
		<meta name="description" content="Topshop - Your One-Stop Shop - E-Commerce Website by Abhijeet Pitumbur">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="google-site-verification" content="UcV7INLourV-4yyaKZ5zE5p7ufe2OvCml5VUO8Mmtno"/>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="canonical" href="<?php echo WEBSITE_URL . '/'; ?>">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link href="stylesheets/roboto.css" rel="stylesheet">
		<link href="stylesheets/bootstrap.css" rel="stylesheet">
		<link href="stylesheets/main.css" rel="stylesheet">
		<link href="stylesheets/<?php echo $css; ?>.css" rel="stylesheet">
		<script>
			var currentDate = new Date();
			var currentTime = currentDate.getTime();
			var expireTime = currentTime + 31556952000;
			currentDate.setTime(expireTime);
			if (document.cookie.indexOf('LANGUAGE=') == -1) {
				document.cookie = 'LANGUAGE=English; expires=' + currentDate.toUTCString();
			}
			if (document.cookie.indexOf('CURRENCY=') == -1) {
				document.cookie = 'CURRENCY=MUR; expires=' + currentDate.toUTCString();
			}
			console.log("Hello World!");
		</script>
		<?php
		if ((!(isset($_SESSION["MURtoUSD"]))) || (!(isset($_SESSION["MURtoEUR"])))) {
			try {
				$sqlQuery = "SELECT *
				FROM `currencies`";
				$i = 0;
				$runQuery = mysqli_query($connection, $sqlQuery);
				while ($results = mysqli_fetch_assoc($runQuery)) {
					$row[$i] = $results;
					$i++;
				}
				$_SESSION["MURtoUSD"] = doubleval($row[0]["conversionRate"]);
				$_SESSION["MURtoEUR"] = doubleval($row[1]["conversionRate"]);
				if ((!(isset($_SESSION["MURtoUSD"]))) || (!(isset($_SESSION["MURtoEUR"]))) || ($_SESSION["MURtoUSD"] == 0) || ($_SESSION["MURtoEUR"] == 0)) {
					throw new Exception("Critical error");
				}
			} catch (Exception $e) {
				$_SESSION["MURtoUSD"] = 0.025;
				$_SESSION["MURtoEUR"] = 0.02;
			}
		}
		?>
		<noscript>
			<h6 style="text-align: center; background-color: #CC0014; padding:5px; margin: 0px">
				<a href="https://www.enablejavascript.io/" target="_blank" rel="noreferrer" style="color: #FFFFFF">Warning! This website requires JavaScript to function properly. Click here for instructions on how to enable JavaScript in your web browser.</a>
			</h6>
		</noscript>
	</head>
	<body>
		<div id="page">
		<header class="version-2">
			<div class="layer" id="layer"></div>
			<div class="main-header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index"><img src="images/logos/topshop.svg" width="160" height="35"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open-close" type="button">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<?php
							$sqlQuery = "SELECT *
							FROM `classes`";
							$runQuery = mysqli_query($connection, $sqlQuery);
							$i = 1;
							while ($results = mysqli_fetch_assoc($runQuery)) {
								$classes[$i] = $results;
								$i++;
							}
							$sqlQuery = "SELECT *
							FROM `categories`";
							$runQuery = mysqli_query($connection, $sqlQuery);
							$i = 1;
							while ($results = mysqli_fetch_assoc($runQuery)) {
								$categories[$i] = $results;
								$i++;
							}
							?>
							<div class="main-menu">
								<div id="header-menu">
									<a href="index"><img src="images/logos/topshop-black.svg" width="100" height="35"></a>
									<a type="button" class="open-close" id="close-in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[1]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=01"><?php echo $categories[1]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=iphones">iPhone</a></li>
														<li><a href="search?query=samsung+phones">Samsung</a></li>
														<li><a href="search?query=lg+phones">LG</a></li>
														<li><a href="search?query=huawei+phones">Huawei</a></li>
														<li><a href="search?query=oneplus+phones">OnePlus</a></li>
														<li><a href="search?query=nokia+phones">Nokia</a></li>
														<li><a href="search?query=xiaomi+phones">Xiaomi</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=02"><?php echo $categories[2]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=macbooks">MacBook</a></li>
														<li><a href="search?query=dell+laptops">Dell</a></li>
														<li><a href="search?query=hp+laptops">HP</a></li>
														<li><a href="search?query=lenovo+laptops">Lenovo</a></li>
														<li><a href="search?query=acer+laptops">Acer</a></li>
														<li><a href="search?query=surface+laptops">Surface</a></li>
														<li><a href="search?query=chromebooks">Chromebook</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=03"><?php echo $categories[3]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=macs">Mac</a></li>
														<li><a href="search?query=dell+desktops">Dell</a></li>
														<li><a href="search?query=hp+desktops">HP</a></li>
														<li><a href="search?query=lenovo+desktops">Lenovo</a></li>
														<li><a href="search?query=asus+desktops">ASUS</a></li>
														<li><a href="search?query=intel+desktops">Intel</a></li>
														<li><a href="search?query=samsung+desktops">Samsung</a></li>
														<li><a href="search?query=acer+desktops">Acer</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=04"><?php echo $categories[4]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=printers">Printers</a></li>
														<li><a href="search?query=monitors">Monitors</a></li>
														<li><a href="search?query=mice">Mice</a></li>
														<li><a href="search?query=keyboards">Keyboards</a></li>
														<li><a href="search?query=hard+disk+drives">Hard Disk Drives</a></li>
														<li><a href="search?query=solid+state+drives">Solid State Drives</a></li>
														<li><a href="search?query=headphones">Headphones</a></li>
														<li><a href="search?query=webcams">Webcams</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[2]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=05"><?php echo $categories[5]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=ovens">Ovens</a></li>
														<li><a href="search?query=gas+stoves">Gas Stoves</a></li>
														<li><a href="search?query=kitchen+extractors">Kitchen Extractors</a></li>
														<li><a href="search?query=dishwashers">Dishwashers</a></li>
														<li><a href="search?query=coffee+makers">Coffee Makers</a></li>
														<li><a href="search?query=microwave+ovens">Microwave Ovens</a></li>
														<li><a href="search?query=kettles">Kettles</a></li>
														<li><a href="search?query=rice+cookers">Rice Cookers</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=06"><?php echo $categories[6]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=refrigerators">Refrigerators</a></li>
														<li><a href="search?query=televisions">Televisions</a></li>
														<li><a href="search?query=air+conditioners">Air Conditioners</a></li>
														<li><a href="search?query=fans">Fans</a></li>
														<li><a href="search?query=lighting">Lighting</a></li>
														<li><a href="search?query=cleaning+tools">Cleaning Tools</a></li>
														<li><a href="search?query=vacuum+cleaners">Vacuum Cleaners</a></li>
														<li><a href="search?query=washing+machines">Washing Machines</a></li>
														<li><a href="search?query=irons">Irons</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=07"><?php echo $categories[7]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=paper+shredders">Paper Shredders</a></li>
														<li><a href="search?query=water+dispensers">Water Dispensers</a></li>
														<li><a href="search?query=calculators">Calculators</a></li>
														<li><a href="search?query=binders+and+laminators">Binders and Laminators</a></li>
														<li><a href="search?query=lockers+and+safes">Lockers and Safes</a></li>
														<li><a href="search?query=projectors">Projectors</a></li>
														<li><a href="search?query=networking">Networking</a></li>
														<li><a href="search?query=labelling+machines">Labelling Machines</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=08"><?php echo $categories[8]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=water+tanks">Water Tanks</a></li>
														<li><a href="search?query=outdoor+lighting">Outdoor Lighting</a></li>
														<li><a href="search?query=water+pumps">Water Pumps</a></li>
														<li><a href="search?query=pressure+washers">Pressure Washers</a></li>
														<li><a href="search?query=security+cameras">Security Cameras</a></li>
														<li><a href="search?query=generators">Generators</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[3]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=09"><?php echo $categories[9]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=men+clothing">Men</a></li>
														<li><a href="search?query=women+clothing">Women</a></li>
														<li><a href="search?query=kids+clothing">Kids</a></li>
														<li><a href="search?query=baby+clothing">Baby</a></li>
														<li><a href="search?query=unisex+clothing">Unisex</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=10"><?php echo $categories[10]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=men+shoes">Men</a></li>
														<li><a href="search?query=women+shoes">Women</a></li>
														<li><a href="search?query=kids+shoes">Kids</a></li>
														<li><a href="search?query=sports+shoes">Sports</a></li>
														<li><a href="search?query=boots">Boots</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=11"><?php echo $categories[11]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=sunglasses">Sunglasses</a></li>
														<li><a href="search?query=watches">Watches</a></li>
														<li><a href="search?query=handbags">Handbags</a></li>
														<li><a href="search?query=wallets">Wallets</a></li>
														<li><a href="search?query=laptop+bags">Laptop Bags</a></li>
														<li><a href="search?query=backpacks">Backpacks</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=12"><?php echo $categories[12]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=necklaces">Necklaces</a></li>
														<li><a href="search?query=earrings">Earrings</a></li>
														<li><a href="search?query=rings">Rings</a></li>
														<li><a href="search?query=bracelets">Bracelets</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="submenu">
										<a type="button" class="show-submenu"><?php echo $categories[13]['categoryName']; ?></a>
										<ul>
											<h3><a href="category?id=13">All</a></h3>
											<li><a href="search?query=sofas">Sofas</a></li>
											<li><a href="search?query=beds">Beds</a></li>
											<li><a href="search?query=tables+and+chairs">Tables and Chairs</a></li>
											<li><a href="search?query=bedroom+sets">Bedroom Sets</a></li>
											<li><a href="search?query=office+chairs">Office Chairs</a></li>
											<li><a href="search?query=tv+racks">TV Racks</a></li>
											<li><a href="search?query=bookshelves">Bookshelves</a></li>
											<li><a href="search?query=computer+desks">Computer Desks</a></li>
											<li><a href="search?query=jewellery+cabinets">Jewellery Cabinets</a></li>
											<li><a href="search?query=coffee+tables">Coffee Tables</a></li>
											<li><a href="search?query=shower+cabins">Shower Cabins</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a type="button" class="show-submenu"><?php echo $categories[14]['categoryName']; ?></a>
										<ul>
											<h3><a href="category?id=14">All</a></h3>
											<li><a href="search?query=perfumes">Perfumes</a></li>
											<li><a href="search?query=music+instruments">Music Instruments</a></li>
											<li><a href="search?query=art+supplies">Art Supplies</a></li>
											<li><a href="search?query=camping+kits">Camping Kits</a></li>
											<li><a href="search?query=car+seat+covers">Car Seat Covers</a></li>
											<li><a href="search?query=personal+care">Personal Care</a></li>
											<li><a href="search?query=pet+care">Pet Care</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<a class="phone-top" href="contact"><strong><span>Need Help?</span>Contact Us!</strong></a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li>
										<span>
										<a type="button">
										<span class="hamburger hamburger--spin">
										<span class="hamburger-box">
										<span class="hamburger-inner"></span>
										</span>
										</span>
										MENU
										</a>
										</span>
										<div id="menu">
											<ul>
												<li>
													<span><a href="index">Home Page</a></span>
												</li>
												<li>
													<span><a type="button">Account Options</a></span>
													<ul>
														<?php if (isset($_SESSION["customerID"])) { ?>
														<li><a type="button" onclick="location.href='functions/sign-out'">Sign Out</a></li>
														<?php } else { ?>
														<li><a type="button" onclick="location.href='authenticate'">Sign In or Sign Up</a></li>
														<?php } ?>
														<li><a href="account">My Account</a></li>
														<li><a href="orders">Orders</a></li>
														<li><a href="cart">Cart</a></li>
														<li><a href="wishlist">Wishlist</a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Top Categories</a></span>
													<ul>
														<li><a href="category?id=01"><?php echo $categories[1]['categoryName']; ?></a></li>
														<li><a href="category?id=02"><?php echo $categories[2]['categoryName']; ?></a></li>
														<li><a href="category?id=09"><?php echo $categories[9]['categoryName']; ?></a></li>
														<li><a href="category?id=10"><?php echo $categories[10]['categoryName']; ?></a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Topshop Collections</a></span>
													<ul>
														<?php
														$sqlQuery = "SELECT *
														FROM `collections`";
														$runQuery = mysqli_query($connection, $sqlQuery);
														$i = 1;
														while ($results = mysqli_fetch_assoc($runQuery)) {
															$collections[$i] = $results;
															$i++;
														}
														?>
														<li><a href="collection?id=1"><?php echo $collections[1]['collectionName']; ?></a></li>
														<li><a href="collection?id=2"><?php echo $collections[2]['collectionName']; ?></a></li>
														<li><a href="collection?id=3"><?php echo $collections[3]['collectionName']; ?></a></li>
														<li><a href="collection?id=4"><?php echo $collections[4]['collectionName']; ?></a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Customer Services</a></span>
													<ul>
														<li><a href="https://www.google.com/search?q=do+a+barrel+roll" target="_blank" rel="noreferrer">Request a Repair</a></li>
														<li><a href="https://www.google.com/search?q=dvd+screensaver" target="_blank" rel="noreferrer">Refund Policy</a></li>
														<li><a href="https://www.google.com/search?q=blink+html" target="_blank" rel="noreferrer">Warranty Information</a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Help and Contact</a></span>
													<ul>
														<li><a href="help">Help and FAQ</a></li>
														<li><a href="contact">Contact Topshop </a></li>
														<li><a href="about">About Topshop</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<form onsubmit="return false" id="searchProducts">
									<?php if (isset($_SESSION["customerID"])) { ?>
									<input type="text" class="form-control" name="query" id="query" placeholder="<?php echo 'Hi, ' . $_SESSION["firstName"] . '! What are you looking for?'; ?>">
									<?php } else { ?>
									<input type="text" class="form-control" name="query" id="query" placeholder="What are you looking for? Search here">
									<?php } ?>
									<button type="submit"><i class="header-icon-search-custom"></i></button>
								</form>
							</div>
						</div>
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top-tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="cart" class="cart-bt" id="headerCartNumItems">
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
										if ($numCartItems > 99) {
										?>
										<strong>99</strong>
										<?php } else if ($numCartItems > 0) { ?>
										<strong><?php echo $numCartItems; ?></strong>
										<?php } ?>
										</a>
										<div class="dropdown-menu">
											<?php
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
												while ($results = mysqli_fetch_assoc($runQuery))
												{
													$cartItems[$i] = $results;
													$totalPrice += ($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
													$i++;
												}
												if ($numCartItems > 5) {
													array_splice($cartItems, 5);
												}
											?>
											<ul id="headerCartItems">
												<?php for ($i = 0; $i < count($cartItems); $i++) { ?>
												<li>
													<a href="product?id=<?php echo sprintf("%06d", $cartItems[$i]['productID']); ?>">
														<figure><img src="images/products/<?php echo $cartItems[$i]['productID']; ?>-1.jpg" width="50" height="50" class="lazy"></figure>
														<strong>
														<span>
														<?php echo $cartItems[$i]['quantity'] . 'x ' . $cartItems[$i]['brandName'] . ' ' . $cartItems[$i]['productName']; ?>
														</span>
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
													</a>
												</li>
												<?php } ?>
											</ul>
											<?php if ($numCartItems > 5) { ?>
											<div id="headerCartOverflow" class="text-center">
												<p>Showing the 5 most recent <br>products added to cart</p>
											</div>
											<?php
												}
											} else {
											$totalPrice = 0;
											?>
											<div class="text-center">
												<p>Your cart is empty</p>
											</div>
											<?php } ?>
											<div class="total-drop">
												<div class="clearfix">
													<strong>Total</strong>
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
												</div>
												<a href="cart" class="btn-1 outline">View Cart</a>
												<a href="checkout" class="btn-1">Checkout</a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="wishlist" class="wishlist"></a>
										<div class="dropdown-menu">
											<div class="text-center">
												<p>Your wishlist is empty</p>
											</div>
											<div class="text-center"><a href="wishlist" class="btn-1 outline">View Wishlist</a></div>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="account" class="access-link"><span>Account</span></a>
										<div class="dropdown-menu">
											<?php if (isset($_SESSION["customerID"])) { ?>
											<div class="text-center" id="dropdownName">
												<h6><?php echo 'Hi, ' . $_SESSION["firstName"] . '!'; ?></h6>
												<p><?php echo $_SESSION["email"]; ?></p>
											</div>
											<a type="button" onclick="location.href='functions/sign-out'" class="btn-1">Sign Out</a>
											<?php } else { ?>
											<a type="button" onclick="location.href='authenticate'" class="btn-1">Sign In or Sign Up</a>
											<?php } ?>
											<ul>
												<li>
													<a href="account"><i class="ti-customer"></i>My Account</a>
												</li>
												<li>
													<a href="orders"><i class="ti-package"></i>View Orders</a>
												</li>
												<li>
													<a href="track-order"><i class="ti-truck"></i>Track Order</a>
												</li>
												<li>
													<a href="help"><i class="ti-help-alt"></i>Help and FAQ</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a type="button" class="btn-search-mob"><span>Search</span></a>
								</li>
								<li>
									<a href="#menu" class="btn-cat-mob">
										<div class="hamburger hamburger--spin" id="hamburger">
											<div class="hamburger-box">
												<div class="hamburger-inner"></div>
											</div>
										</div>
										Menu
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="search-mob-wp">
					<form onsubmit="return false" id="searchProductsMobile">
						<input type="text" class="form-control" name="query" id="queryMobile" placeholder="What are you looking for? Search here">
						<input type="submit" class="btn-1 full-width" value="Search">
					</form>
				</div>
			</div>
		</header>
