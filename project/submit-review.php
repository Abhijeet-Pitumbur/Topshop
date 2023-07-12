<?php
include "functions/database.php";
ini_set('session.cookie_lifetime', 604800);
ini_set('session.gc-maxlifetime', 604800);
session_start();
if (!(isset($_SESSION["customerID"]))) {
	header("location:authenticate");
	exit();
}
if ((!(isset($_GET["id"]))) || (strlen($_GET["id"]) !== 6)) {
	header("location:error");
	exit();
}
$productID = intval($_GET["id"]);
$sqlQuery = "SELECT *
FROM `products`
INNER JOIN `brands`
ON `products`.`brandID` = `brands`.`brandID`
INNER JOIN `categories`
ON `products`.`categoryID` = `categories`.`categoryID`
WHERE `products`.`productID` = '$productID'";
$runQuery = mysqli_query($connection, $sqlQuery);
$rowCount = mysqli_num_rows($runQuery);
if ($rowCount == 1) {
	$row = mysqli_fetch_assoc($runQuery);
} else {
	header("location:error");
	exit();
}
$productName = $row['brandName'] . ' ' . $row['productName'];
$title = 'Submit Review for ' . $productName;
$css = "review";
include "functions/header.php";
?>
<main>
	<div class="container margin-60-35">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="submit-review">
					<h3>Submit a Review for <?php echo $productName; ?></h3>
					<div class="rating-submit">
						<div class="form-group">
							<label class="d-block">Overall Rating</label>
							<span class="rating mb-0">
							<input type="radio" class="rating-input" id="5-star" name="rating-input" value="5 Stars"><label for="5-star" class="rating-star"></label>
							<input type="radio" class="rating-input" id="4-star" name="rating-input" value="4 Stars"><label for="4-star" class="rating-star"></label>
							<input type="radio" class="rating-input" id="3-star" name="rating-input" value="3 Stars"><label for="3-star" class="rating-star"></label>
							<input type="radio" class="rating-input" id="2-star" name="rating-input" value="2 Stars"><label for="2-star" class="rating-star"></label>
							<input type="radio" class="rating-input" id="1-star" name="rating-input" value="1 Star"><label for="1-star" class="rating-star"></label>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label>Title of your Review</label>
						<input class="form-control" type="text" placeholder="If you could describe <?php echo $productName; ?> in one sentence, what would you say?">
					</div>
					<div class="form-group">
						<label>Your Review</label>
						<textarea class="form-control" id="reviewbox" placeholder="Write your review to help others learn about <?php echo $productName; ?>"></textarea>
					</div>
					<div class="form-group">
						<label>Add a Picture</label><em> (optional)</em>
						<div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
					</div>
					<div class="form-group">
						<div class="checkboxes float-left add-bottom-15 add-top-15">
							<label class="container-check">I accept the <a href="https://policies.google.com/terms" target="_blank">Terms and Conditions</a>
							<input type="checkbox">
							<span class="checkmark"></span>
							</label>
						</div>
					</div>
					<a type="button" class="btn-1">Submit Review</a>
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