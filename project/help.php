<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "Help and FAQ";
$css = "help";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-90-65">
		<div class="main-title">
			<h1>Help and Support Center</h1>
			<span>Help and Support Center</span>
			<p>What are you looking for?</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<form onsubmit="window.open('https://theuselessweb.com/'); return false">
					<div class="search-input white">
						<input type="text" placeholder="Search articles or Frequently Asked Questions">
						<button type="submit"><i class="ti-search"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="bg-white">
		<div class="container margin-90-65">
			<div class="main-title">
				<h2>Topshop Support Sections</h2>
				<span>Topshop Support Sections</span>
				<p>Read articles or Frequently Asked Questions</p>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-wallet"></i>
						<h3>Payments</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et aliqua.</p>
					</a>
				</div>
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-customer"></i>
						<h3>Account</h3>
						<p>Malesuada bibendum arcu vitae elementum. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec fermentum.</p>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-help"></i>
						<h3>General Help</h3>
						<p>Tellus molestie nunc non blandit massa. Venenatis cras sed felis eget velit aliquet sagittis. Id faucibus eget nullam.</p>
					</a>
				</div>
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-truck"></i>
						<h3>Delivery</h3>
						<p>Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget nulla dignissim.</p>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-eraser"></i>
						<h3>Refunds</h3>
						<p>Nunc sed augue lacus viverra vitae congue eu consequat. Sed turpis tincidunt id aliquet risus feugiat in ante.</p>
					</a>
				</div>
				<div class="col-md-6">
					<a class="box-topic-2" type="button">
						<i class="ti-comments"></i>
						<h3>Reviews</h3>
						<p>Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum.</p>
					</a>
				</div>
			</div>
			<div class="main-title mb-4">
				<p>Need more help?</p>
				<p><a class="btn-1" href="contact">Contact Topshop</a></p>
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
</body>
</html>