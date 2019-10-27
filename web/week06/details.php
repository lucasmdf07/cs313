<?php
session_start();

/* include credentials/pass to database */
include 'database/db_access.php';

/*  */
$hotel_Id = $_GET["hotel_Id"];

/*  */
if (!isset($hotel_Id)) {
	die("No site ID.");
}

$selected = array ();

if (!isset($_SESSION["reviews_submitted"])) {
	$_SESSION["reviews_submitted"] = $selected;
}

$name = $_POST["name"];
$description = $_POST["description"];
$rating = $_POST["rating"];

if (isset($name) and isset($description) and isset($rating) and !isset($_SESSION["reviews_submitted"][$hotel_Id])) {
	$stmt = $db->prepare(
	"INSERT INTO rating (reviewer_name, description, rating, hotel_Id) 
	VALUES (:name, :description, :rating, :hotel_Id)");
	
	$stmt->bindValue(':hotel_Id', $hotel_Id, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':description', $description, PDO::PARAM_STR);
	$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
	$stmt->execute();
	
	$_SESSION["reviews_submitted"][$hotel_Id] = true;
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hotel Details</title>
<link rel="stylesheet" href="css/css.css">
<style>



</style>
</head>

<body>
<!-- navbar -->
<div class="navbar">
	<a class="active" id="home" href="index.php">HOME</a>
	<a href="logout.php">Destroy Session</a>
	</div>
	<div class="row"></div>
	 
                     
     
     
<!-- /navbar -->

	<div class="body">
    <br>
	<?php 
	
	$stmt = $db->prepare("SELECT name, address, description FROM hotel WHERE id=:hotel_Id");
	$stmt->bindValue(':hotel_Id', $hotel_Id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $address);
	$stmt->bindColumn(3, $description);
	
	
	while ($stmt->fetch()) {
		echo "<p>Name: " . $name . "</p>";
		echo "<p>About: " . $description . "</p>";
		echo "<p>Address: " . $address . "</p>";
	}

	$stmt = $db->prepare("SELECT url FROM picture WHERE hotel_id=:hotel_Id");
	$stmt->bindValue(':hotel_Id', $hotel_Id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<img class='imageDetails' src='" . $url . "'>";
	}

	?>
	</br>
	</br>

	
	<!-- ************************************************************************************** -->
	

	<h3>Add a Review</h3>

		
	<?php 
	
	if (!isset($_SESSION["reviews_submitted"][$hotel_Id])) {
		echo "
		<form class='rating' action='details.php?hotel_Id=$hotel_Id' method='post'>
			<p>
			Name <br>
			<input type='text' name='name'><br>
			</p>

			<p>
			Description <br>
			<input class='resizedTextbox' type='textarea' name='description'><br>
			</p>

			<p>
			Rate this Hotel from 1 to 5 stars: 
			<div class=stars>
			<input type='radio' id='star5' name='rating' value=5 /><label class = 'full' for='star5' title='Awesome - 5 stars'></label>
			<input type='radio' id='star4' name='rating' value=4 /><label class = 'full' for='star4' title='Pretty good - 4 stars'></label>
			<input type='radio' id='star3' name='rating' value=3 /><label class = 'full' for='star3' title='Meh - 3 stars'></label>
			<input type='radio' id='star2' name='rating' value=2 /><label class = 'full' for='star2' title='Kinda bad - 2 stars'></label>
			<input type='radio' id='star1' name='rating' value=1 /><label class = 'full' for='star1' title='Sucks big time - 1 star'></label></div>
</p>
			<div></div>

			<p>
			<button type='submit'>Submit</button>
			</p>
		</form><br>";
	}
	else {
		echo "<p>You have reviewed this Hotel already.</p><br>";
	}
	?>


	<!-- ************************************************************************************** -->
	
<br>

<?php
echo 	"<h3>View The Reviews Submitted By Our Users</h3>";
	
	$stmt = $db->prepare("SELECT reviewer_name, rating, description FROM rating WHERE hotel_Id=:hotel_Id");
	$stmt->bindValue(':hotel_Id', $hotel_Id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $rating);
	$stmt->bindColumn(3, $description);
	
	while ($stmt->fetch()) {
		echo "<p>- " . $name . "</br>";
		echo $description . "</br>";
		for ($i = 0; $i < $rating; $i++) {
			echo "&#9733";
		}
		
		for ($i = 5; $i > $rating; $i--) {
			echo "&#9734";
		}

		echo "</p>";
	}
	?>



	</>
	</br>

			<?php include('footer.php'); ?>
</div>

</body>
</html>