<?php
// Start the session
session_start();
//session_destroy();



?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="scstyles.css" /> 
      <title>Shopping Cart</title>
    </head>
    <body>       
        <header class ="main-header">
            <h1>Shop Away</h1>
            <ul class="main-nav">
                <li><a href="shoppingcart.php">Shop</a></li>
                <li><a href="shoppingcart-cart.php">Cart</a></li>
            </ul>
        </header>
        <div class="center">
            <h2>Confirmation</h2>
            <div class="container">
                <div class="confirmation">
                    <?php
                        echo '<h3>Delivery Address</h3>
                            <p>'.$_SESSION['street'] . '</p>
                            <p>'. $_SESSION['city'] .', '. $_SESSION['state'] .'</p>
                            <p>'.$_SESSION['zip'].'</p>
                            <h3>Items Ordered</h3>';
                        foreach ($_SESSION['item'] as $key => $value) {
                            echo $value . '<br>';}  
                    ?>
                </div>
            </div>
        </div>    
    </body>
</html>