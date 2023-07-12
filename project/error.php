<?php
http_response_code(404);
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
$title = "404 Error";
$css = "error";
include "functions/header.php";
?>
<main class="bg-gray">
	<div id="error-page">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-xl-7 col-lg-9">
					<img src="images/others/error-404.svg" class="img-fluid" width="400" height="212">
					<p>Page Not Found</p>
					<div class="main-title mb-4">
						<p><a class="btn-1" href="index">Go to Home Page</a></p>
					</div>
					<form onsubmit="return false" id="searchProductsError">
						<div class="search-bar">
							<input type="text" class="form-control" name="query" id="queryError" placeholder="What are you looking for? Search here">
							<input type="submit" value="Search">
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
	$("#searchProductsError").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/search",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data !== "") {
					window.location.href = "search?query=" + data;
				}
			}
		})
	})
</script>
</body>
</html>