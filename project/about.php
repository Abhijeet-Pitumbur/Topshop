<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "About";
$css = "about";
include "functions/header.php";
?>
<main class="bg-gray">
	<div class="container margin-60-35 add-bottom-30">
		<div class="main-title">
			<h2>About Topshop</h2>
			<span>About Topshop</span>
			<p>Topshop put together a dynamic and professional team with the objective of transforming the online shopping experience in Mauritius.</p>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-5">
				<div class="box-about">
					<h2>Top Products</h2>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
					<p>Dui faucibus in ornare quam viverra orci sagittis eu volutpat. Malesuada bibendum arcu vitae elementum. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere urna nec tincidunt. Amet nulla facilisi morbi tempus iaculis urna id volutpat lacus. Tellus molestie nunc non blandit massa. Venenatis cras sed.</p>
					<img src="images/about/about-arrow.svg" class="arrow-1">
				</div>
			</div>
			<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
				<img src="images/about/about-1.svg" class="img-fluid" width="350" height="268">
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
				<img src="images/about/about-2.svg" class="img-fluid" width="350" height="268">
			</div>
			<div class="col-lg-5">
				<div class="box-about">
					<h2>Top Brands</h2>
					<p class="lead">Eu sem integer vitae justo eget magna. Consequat nisl vel pretium.</p>
					<p>Fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Nunc sed augue lacus viverra vitae congue eu consequat.Sed turpis tincidunt id aliquet risus feugiat in ante. Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla.</p>
					<img src="images/about/about-arrow.svg" class="arrow-2">
				</div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center ">
			<div class="col-lg-5">
				<div class="box-about">
					<h2>10,000+ Products</h2>
					<p class="lead">Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum.</p>
					<p>Et netus et malesuada fames ac turpis egestas sed tempus. Tincidunt dui ut ornare lectus. Eget sit amet tellus cras adipiscing. Euismod elementum nisi quis eleifend quam adipiscing vitae proin. Id volutpat lacus laoreet non curabitur gravida arcu. Etiam erat velit scelerisque in dictum non. Vel eros donec ac odio tempor orci.</p>
				</div>
			</div>
			<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
				<img src="images/about/about-3.svg" class="img-fluid" width="350" height="316">
			</div>
		</div>
	</div>
	<div class="bg-white">
		<div class="container margin-60-35">
			<div class="main-title">
				<h2>Why Choose Topshop?</h2>
				<span>Why Choose Topshop?</span>
				<p>Topshop is always imagining ways to exceed the expectations of its customers.</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-medall-alt"></i>
						<h3>10,000+ Customers</h3>
						<p>Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum. Nec sagittis aliquam malesuada bibendum nisi porta lorem.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-help-alt"></i>
						<h3>24/7 Support</h3>
						<p>Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Vitae auctor eu augue ut lectus. Urna neque viverra justo nec ultrices.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-gift"></i>
						<h3>Great Sale Offers</h3>
						<p>Odio eu feugiat pretium nibh ipsum consequat nisl vel. Lorem donec massa sapien faucibus et molestie ac. Ullamcorper morbi tincidunt.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-headphone-alt"></i>
						<h3>Direct Help Line</h3>
						<p>Enim ut tellus elementum sagittis vitae et leo duis ut. Consectetur libero id faucibus tincidunt eget. Risus commodo viverra accumsan lacus.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-wallet"></i>
						<h3>Secure Payments</h3>
						<p>Rutrum quisque non tellus orci ac auctor augue. Mauris nunc congue nisi vitae suscipit tellus mauris a. Amet consectetur adipiscing elit duis.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box-feat">
						<i class="ti-comments"></i>
						<h3>Support via Chat</h3>
						<p>Purus non enim praesent elementum facilisis leo vel fringilla. Adipiscing vitae nisl proin sagittis nisl rhoncus mattis rhoncus urna.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container margin-60">
		<div class="main-title">
			<h2>Meet Topshop Staff</h2>
			<span>Meet Topshop Staff</span>
			<p>A company has a name, but its people give it meaning.</p>
		</div>
		<div class="owl-carousel owl-theme carousel-centered">
			<div class="item">
				<a type="button">
					<div class="title">
						<h4>Michael Scott<em>General Manager</em></h4>
					</div>
					<img src="images/about/staff-1.jpg">
				</a>
			</div>
			<div class="item">
				<a type="button">
					<div class="title">
						<h4>Jim Halpert<em>Digital Marketing</em></h4>
					</div>
					<img src="images/about/staff-2.jpg">
				</a>
			</div>
			<div class="item">
				<a type="button">
					<div class="title">
						<h4>Dwight Schrute<em>Web Developer</em></h4>
					</div>
					<img src="images/about/staff-3.jpg">
				</a>
			</div>
			<div class="item">
				<a type="button">
					<div class="title">
						<h4>Pam Beasly<em>Customer Services</em></h4>
					</div>
					<img src="images/about/staff-4.jpg">
				</a>
			</div>
			<div class="item">
				<a type="button">
					<div class="title">
						<h4>Andy Bernard<em>Business Strategist</em></h4>
					</div>
					<img src="images/about/staff-5.jpg">
				</a>
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