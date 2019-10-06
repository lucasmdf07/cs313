<?php
session_start();
error_reporting(0);
?>


<!-- !DOCTYPE html -->
<?php include ('doctypehtml.php'); ?>

    <title>Checkout</title>
</head>
<body>
    <!-- navbar -->
<div class='navbar'>
    <a  id="home" href="index.php">HOME</a>
    <a id="viewCart" href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span>CART</a>
    <a class="active" id="checkout" href="checkout.php">CHECKOUT</a>
    </div>
    <div class="row">
</div>
<!-- navbar -->
<div class="body">
    <br>

        <div id="hrline" class="container-fluid">
            <hr>
        </div>
    <form action="confirmation.php" method="post">  
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" name="name"><br>
                    <label>Address</label>
                    <input type="text" name="street"><br>
                    <label>City</label><input type="text" name="city"><br>
                    <label>State</label><input type="text" name="state"><br>
                    <label>Zipcode</label><input type="text" name="zip"><br>
                    <br>

                    <input type="submit"value="submit"><br>
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include ('footer.php'); ?>
</body>
</html>