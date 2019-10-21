<?php
session_start();

/* include credentials/pass to database */
include 'database/db_access.php';

/*  */
$siteId = $_GET["siteId"];

/*  */
if (!isset($siteId)) {
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
	
	$stmt = $db->prepare("SELECT url FROM picture WHERE hotel_id=:siteId");
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<img src='" . $url . "'>";
	}

	$stmt = $db->prepare("SELECT name, address, description FROM hotel WHERE id=:siteId");
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $address);
	$stmt->bindColumn(3, $description);
	
	while ($stmt->fetch()) {
		echo "<h2>" . $name . "</h2>";
		echo "<h3>Description</h3>";
		echo "<p>" . $description . "</p>";
		echo "<p>Address: " . $address . "</p>";
	}
	?>


</div>

</body>
</html>