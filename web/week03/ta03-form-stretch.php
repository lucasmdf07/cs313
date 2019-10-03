<?php
  $majors = array("Computer Science"=>"CS", "Web Design and Development"=>"WD", 
                  "Computer Information Technology"=>"CIT", "Computer Engineering"=>"CE");  
  ?>
  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="ta03-results-stretch.php" onsubmit="return true" id="form" method="POST">
        <p>Name<br>
            <input type="text" placeholder="Name" id="name" name="name"></p>

        <p>Email<br>
            <input type="text" placeholder="Email Address" id="email" name="email"></p>

            <!-- Major inputs -->

            <h3>Major: </h3>
           <?php

			foreach ($majors as $key=>$key_value) {
  			print "<input type='radio' name='major' value='$key' id='$key_value'><label
                for='$key_value'>$key</label><br>";
			}
			?>
            

            

            <!-- Continents inputs -->
            <h3>Select the continents you have visited: </h3>
                <input type="checkbox" name="continents[]" value="NA" id="NA"><label for="NA">North America</label><br>

                <input type="checkbox" name="continents[]" value="SA" id="SA"><label for="SA">South
                    America</label><br />

                <input type="checkbox" name="continents[]" value="EU" id="EU"><label for="EU">Europe</label><br />

                <input type="checkbox" name="continents[]" value="AS" id="AS"><label for="AS">Asia</label><br />

                <input type="checkbox" name="continents[]" value="AUS" id="AUS"><label for="AUS">Australia</label><br />

                <input type="checkbox" name="continents[]" value="AF" id="AF"><label for="AF">Africa</label><br />

                <input type="checkbox" name="continents[]" value="AN" id="AN"><label for="AN">Antarctica</label><br />
        

                    <br>

                    <input type="textarea" name="comments" value="" id="comments"><label for="comments"></label>
                    <br>
                    <br>
                    <input type="submit" id="submitButton">


    </form>


</body>

</html>