<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "Track Order";
$css = "error";
include "functions/header.php";
?>
<main class="bg-gray">
	<div id="track-order">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-xl-7 col-lg-9">
					<img src="images/others/track-order.svg" class="img-fluid add-bottom-15" width="200" height="175">
					<h2>Track Order</h2>
					<p>Check the status of your delivery</p>
					<form onsubmit="randomLocation(); return false">
						<div class="search-bar">
							<input type="text" class="form-control" name="orderID" id="orderID" placeholder="Order ID">
							<input type="submit" value="Track">
						</div>
					</form>
				</div>
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
<script>
	function randomLocation() {
		var orderID = document.getElementById('orderID');
		if (orderID.value != "") {
			var south = Math.floor(Math.random() * (465 - 175 + 1) + 175);
			var east = Math.floor(Math.random() * (665 - 505 + 1) + 505);
			window.open('https://www.google.com/maps?q=-20.' + south + ',57.' + east);
		}
	}
</script>
</body>
</html>