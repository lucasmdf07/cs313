<?php
session_start();

// remove an item
if ( isset($_GET["delete"]) ) {
    $i = $_GET["delete"];
    $qty = $_SESSION["qty"][$i];
    $oPrice = $_SESSION["prices"][$i]/$qty;
    $qty--;
    if ($qty == 0) {
        $_SESSION["prices"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
    $nPrice = ($oPrice * $qty);
    $_SESSION["qty"][$i] = $qty;
    $_SESSION["prices"][$i] = $nPrice;
    }
}   

// add another
if ( isset($_GET["add"]) ) {
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i];
    $oPrice = $_SESSION["prices"][$i]/$qty;
    $qty++;
    if ($qty == 0) {
        $_SESSION["prices"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
    $nPrice = ($oPrice * $qty);
    $_SESSION["qty"][$i] = $qty;
    $_SESSION["prices"][$i] = $nPrice;
    }
} 

// get total
if (!isset($_SESSION["total"]) ) {
    $_SESSION["total"] = 0;
    for ($i=0; $i < count($products); $i++) {
        $_SESSION["qty"][$i] = 0;
        $_SESSION["prices"][$i] = 0;
    }
}

?>

<!-- !DOCTYPE html -->
<?php include ('doctypehtml.php'); ?>

    <title>Shopping Cart</title>
</head>
<body>

<!-- navbar -->
<div class='navbar'>
    <a id="home" href="index.php">HOME</a>
    <a class="active" id="viewCart" href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span>CART</a>
    <a id="checkout" href="checkout.php">CHECKOUT</a>
    </div>
    <div class="row">
</div>
<!-- navbar -->


<div class="body">
    <br>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <?php
                if ( isset($_SESSION["cart"]) ) {
                ?>

                <table >
                    <tr>
                        <th><h3>Product</h3></th>
                        <th width="100px"></th>
                        <th><h3>Qty</h3></th>
                        <th width="50px"></th>
                        <th><h3>Amount</h3></th>
                        <th width="30px"></th>
                        <th><h3>Quantity</h3></th>
                    </tr>
                <?php
                $total = 0;
                foreach ( $_SESSION["cart"] as $i ) {
                ?>
                    <tr>
                        <td><?php echo( $_SESSION["products"][$i] ); ?></td>
                        <td width="50px">&nbsp;</td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                        <td width="15px">&nbsp;</td>
                        <td>$<?php echo( $_SESSION["prices"][$i]); ?>.00</td>
                        <td width="10px">&nbsp;</td>
                        <td><a href="?delete=<?php echo($i); ?>">Remove</a></td>
                        <td><a href="?add=<?php echo($i); ?>">Add</a></td>
                        
                    </tr>
                <?php
                
                $total = $total + $_SESSION["prices"][$i];
                }
                $_SESSION["total"] = $total;
                ?>

                    <tr height="30">
                        <td><h4>Total: $<?php echo($total); ?>.00</h4></td>
                    </tr>
                </table>
                <br>
                
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<div>
<?php include ('footer.php'); ?>   
</body>
</html>