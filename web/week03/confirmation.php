<?php
session_start();
error_reporting(0);
$name = htmlspecialchars($_POST["name"]);
$street = htmlspecialchars($_POST["street"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);

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
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <p><h4>You have ordered:</h4></p>
                    
                <?php
                    if ( isset($_SESSION["cart"]) ) {
                ?>
                    <table >
                    <tr>
                        <th>Product</th>
                        <th width="100px"></th>
                        <th>Qty</th>
                        <th width="50px"></th>
                        <th>Amount</th>
                        <th width="30px"></th>
                        <th></th>
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
                            <td><?php echo( $_SESSION["prices"][$i]); ?></td>
                            <td width="15px">&nbsp;</td>
                        </tr>
                    <?php
                    
                    $total = $total + $_SESSION["prices"][$i];
                    }
                    $_SESSION["total"] = $total;
                    ?>
                        <tr height="30">
                            <td> </td>
                        </tr>
                        <tr height="30">
                            <td><h4>Total : <?php echo($total); ?></h4></td>
                    </tr>
                </table>
                
                <?php
                }
                ?>
            <p><h4>It will be shipped to:</h4></p>
            <p>&nbsp;<?=$name?><br>
                &nbsp;<?=$street?><br>
                &nbsp;<?=$city?>, <?=$state?> <?$zip?></p>



                <div class="container-fluid">
                    To start new order, click 
            <a id="viewCart" href="logout.php">HERE</a>
            </div>


            <br>
        </div>
</div>
<br>



        <?php include ('footer.php'); ?>
    
        </body>
</html>