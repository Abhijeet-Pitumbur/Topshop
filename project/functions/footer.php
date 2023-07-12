<?php
if (!$includeCheck) {
	header("location:../error");
	exit();
}
?>

<footer class="revealed">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse-1">Quick Links</h3>
				<div class="collapse dont-collapse-sm links" id="collapse-1">
					<ul>
						<li><a href="account">My Account</a></li>
						<li><a href="help">Help and FAQ</a></li>
						<li><a href="contact">Contact Topshop</a></li>
						<li><a href="about">About Topshop</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse-2">Top Categories</h3>
				<div class="collapse dont-collapse-sm links" id="collapse-2">
					<ul>
						<li><a href="category?id=01"><?php echo $categories[1]['categoryName']; ?></a></li>
						<li><a href="category?id=02"><?php echo $categories[2]['categoryName']; ?></a></li>
						<li><a href="category?id=09"><?php echo $categories[9]['categoryName']; ?></a></li>
						<li><a href="category?id=10"><?php echo $categories[10]['categoryName']; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse-3">Contact Info</h3>
				<div class="collapse dont-collapse-sm contacts" id="collapse-3">
					<ul>
						<li><i class="ti-home"></i><a href="https://www.google.com/maps/search/?api=1&query=Surinam+Mauritius" target="_blank" rel="noreferrer">Surinam, Mauritius</a></li>
						<li><i class="ti-headphone-alt"></i><a href="tel://+23058038524">+230 5803 8524</a></li>
						<li><i class="ti-email"></i><a href="mailto:topshop@abhijt.com">topshop@abhijt.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse-4">Subscribe to Topshop's newsletter</h3>
				<div class="collapse dont-collapse-sm" id="collapse-4">
					<div id="newsletter">
						<form onsubmit="return false" id="subscribeNewsletter">
							<div class="form-group">
								<input type="email" name="emailNewsletter" id="emailNewsletter" class="form-control" placeholder="Your email">
								<button type="submit"><i id ="subscribeNewsletterIcon" class="ti-angle-double-right"></i></button>
								<div id="subscribeNewsletterMsg"></div>
							</div>
						</form>
					</div>
					<div class="follow-media">
						<h5>Follow Topshop</h5>
						<ul>
							<li><a href="https://www.facebook.com/facebook" target="_blank" rel="noreferrer"><img src="images/logos/facebook.svg" class="lazy"></a></li>
							<li><a href="https://www.instagram.com/instagram" target="_blank" rel="noreferrer"><img src="images/logos/instagram.svg" class="lazy"></a></li>
							<li><a href="https://www.youtube.com/user/youtube" target="_blank" rel="noreferrer"><img src="images/logos/youtube.svg" class="lazy"></a></li>
							<li><a href="https://twitter.com/twitter" target="_blank" rel="noreferrer"><img src="images/logos/twitter.svg" class="lazy"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row add-bottom-25">
			<div class="col-lg-6">
				<ul class="footer-selector clearfix">
					<li>
						<div class="styled-select lang-selector">
							<select id="selectLanguage" onchange="var currentDate = new Date(); var currentTime = currentDate.getTime(); var expireTime = currentTime + 31556952000; currentDate.setTime(expireTime); document.cookie = 'LANGUAGE=' + this.value + '; expires=' + currentDate.toUTCString(); location.reload()">
								<option value="English" <?php if ($_COOKIE["LANGUAGE"] == "English") { echo "selected"; } ?>>English</option>
								<option value="French" <?php if ($_COOKIE["LANGUAGE"] == "French") { echo "selected"; } ?>>Français</option>
								<option value="Creole" <?php if ($_COOKIE["LANGUAGE"] == "Creole") { echo "selected"; } ?>>Kreol</option>
							</select>
						</div>
					</li>
					<li>
						<div class="styled-select currency-selector">
							<select id="selectCurrency" onchange="var currentDate = new Date(); var currentTime = currentDate.getTime(); var expireTime = currentTime + 31556952000; currentDate.setTime(expireTime); document.cookie = 'CURRENCY=' + this.value + '; expires=' + currentDate.toUTCString(); location.reload()">
								<option value="MUR" <?php if ($_COOKIE["CURRENCY"] == "MUR") { echo "selected"; } ?>>Mauritian Rupee (MUR)</option>
								<option value="USD" <?php if ($_COOKIE["CURRENCY"] == "USD") { echo "selected"; } ?>>United States Dollar (USD)</option>
								<option value="EUR" <?php if ($_COOKIE["CURRENCY"] == "EUR") { echo "selected"; } ?>>Euro (EUR)</option>
							</select>
						</div>
					</li>
					<li><img src="images/logos/cards.svg" width="198" height="30" class="lazy"></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<ul class="additional-links">
					<li><a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms and Conditions</a></li>
					<li><a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a></li>
					<li><a href="https://bit.ly/Abhijt" target="_blank" rel="noreferrer" onclick="alert('Hello World!')">Abhijeet Pitumbur &copy; Topshop 2023</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
<div id="btn-to-top"></div>
