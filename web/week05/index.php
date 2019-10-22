<!DOCTYPE html>
<html lang="en">
<head>
<title>List of Hotels</title>
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

	<!-- <h2>List of Hotels to Rate</h2> -->
	<h4> Click on the Hotel Name for more Details</h4>
	
	<?php
	include 'database/db_access.php';

	// Leonardo, Henrique and Lucas worked together on these loops
	foreach ($db->query("SELECT * FROM state") as $stateLine) {
		echo $stateLine["name"] . ", ";
		$state_Id = $stateLine["id"];
			
	foreach ($db->query("SELECT * FROM city WHERE state_id=$state_Id") as $countyLine) {
			echo $countyLine["name"];
			echo "<ul>";
			$city_Id = $countyLine["id"];
				
	foreach ($db->query("SELECT * FROM hotel WHERE city_id=$city_Id") as $siteLine) {
			$hotel_Id = $siteLine["id"];
			

		$stmt = $db->prepare("SELECT url FROM picture WHERE hotel_id=:hotel_Id");
		$stmt->bindValue(':hotel_Id', $hotel_Id, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<li class='images'><a href='details.php?hotel_Id=$hotel_Id'><img src='" . $url . "'></a></li>";
	}

			echo "<li class='images'><a href='details.php?hotel_Id=$hotel_Id'>" . $siteLine["name"] . "</a></li>";
	}
			echo "</ul>";		
			}
	}
	?>

		<?php include('footer.php'); ?>
</div>

</body>
</html>