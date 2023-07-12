<?php ini_set('display_errors', 'off'); ?>
<!DOCTYPE html>
<!-- Abhijeet Pitumbur © Topshop 2023 -->
<html lang="EN">
	<head>
		<meta charset="UTF-8">
		<title>Topshop Administrator - <?php echo $title; ?></title>
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
								<a href="index"><img src="images/logos/topshop.svg" width="160" height="70"></a>
							</div>
						</div>
						<div class="col-xl-6 col-lg-7"></div>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<a class="phone-top" type="button" onclick="location.href='functions/admin-sign-out'"><strong><span>Sign Out</span></strong></a>
						</div>
					</div>
				</div>
			</div>
		</header>
