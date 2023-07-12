<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "Contact";
$css = "contact";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-60">
		<div class="main-title">
			<h2>Contact Topshop</h2>
			<span>Contact Topshop</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="box-contacts">
					<i class="ti-support"></i>
					<h2>Topshop Help Center</h2>
					<a href="tel://+23058038524">+230 5803 8524</a> - <a href="mailto:topshop@abhijt.com">topshop@abhijt.com</a>
					<small>Monday to Saturday, 08:00-18:00</small>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box-contacts">
					<i class="ti-map-alt"></i>
					<h2>Topshop Headquarters</h2>
					<a href="https://www.google.com/maps/search/?api=1&query=Surinam+Mauritius" target="_blank">Royal Road, Surinam, Mauritius</a>
					<small>Monday to Friday, 09:00-15:00</small>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box-contacts">
					<i class="ti-package"></i>
					<h2>Topshop Order Queries</h2>
					<a href="tel://+23058038524">+230 5803 8524</a> - <a href="mailto:me@abhijt.com">me@abhijt.com</a>
					<small>Monday to Saturday, 08:00-18:00</small>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-white">
		<div class="container margin-60-35">
			<h4 class="pb-3">Submit a Message to Topshop</h4>
			<div class="row">
				<div class="col-lg-4 col-md-6 add-bottom-25">
					<form onsubmit="return false" id="submitMessage">
						<div class="form-group">
							<input class="form-control" type="text" name="name" id="name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input class="form-control" type="email" name="email" id="email" placeholder="Your Email">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="messageBox" id="messageBox" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn-1 full-width" id="submitMessageIcon">Submit Message</button>
						</div>
						<div class="text-center" id="submitMessageMsg"></div>
					</form>
				</div>
				<div class="col-lg-8 col-md-6 add-bottom-25">
					<iframe class="map-contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14947.251450570164!2d57.50763425!3d-20.51389635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c651d8c0a64fb%3A0xf8633d5e6f971cc9!2sSurinam!5e0!3m2!1sen!2smu!4v1638629549020!5m2!1sen!2smu" loading="lazy" allowfullscreen></iframe>
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
</body>
</html>