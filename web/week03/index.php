<?php
    session_start();
    // array of products and prices
    $products = array("Square 10k White Gold", "Round 14k White Gold", "Round 10k White Gold");
    $prices = array("1199.00", "1499.00", "1299.00");
    
    //save to session variables
    if ( isset($_GET["add"]) ) {
        $i = $_GET["add"];
        $qty = $_SESSION["qty"][$i] + 1;
        $_SESSION["products"][$i] = $products[$i];
        $_SESSION["prices"][$i] = $prices[$i] * $qty;
        $_SESSION["cart"][$i] = $i;
        $_SESSION["qty"][$i] = $qty;
     }

?>

<!-- !DOCTYPE html -->
<?php include ('doctypehtml.php'); ?>

    <title>Browse products</title>
</head>
<body>

<!-- navbar -->
<div class='navbar'>
    <a class="active" id="home" href="index.php">HOME</a>
    <a id="viewCart" href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span>CART</a>
    <a id="checkout" href="checkout.php">CHECKOUT</a>
    </div>
    <div class="row">
</div>
<!-- navbar -->
<div class="body">
    <br>
 

    <div class="container-fluid">
        <div id="product" class="row justify-content-between, justify-content-around">
        <?php
            for ($i=0; $i<3; $i++) {
        ?>
            <div class="productDisplay"> 
                <img src="images/<?php echo($products[$i]); ?>.jpg" alt="<?php echo($products[$i]); ?>" width="200px" height="200px"> 
                <h5><?php echo($products[$i]); ?></h5>
                <p class="price">$<?php echo($prices[$i]); ?></p>
                <a id="abutton"" type="button" href="?add=<?php echo($i); ?>">Add to cart</a>
            </div>
        <?php
            }
        ?>
        </div>

    </div> 
</div>


<?php include('../footer.php'); ?>

    
</body>
</html>

