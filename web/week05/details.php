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

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hotel Details</title>
<link rel="stylesheet" href="css/css.css">
</head>

<body>
<!-- navbar -->
<div class="navbar">
	<a class="active" id="home" href="index.php">HOME</a>
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
			<?php include('footer.php'); ?>
</div>

</body>
</html>