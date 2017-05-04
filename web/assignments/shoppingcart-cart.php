<?php
// Start the session
session_start();

if(isset($_POST['remove'])) {
    // handle remove
    $key = filter_input(INPUT_POST, remove, FILTER_SANITIZE_STRING);
    unset($_SESSION['item'][$key]);
    
}

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
                <h1>Cart</h1>
                <div class="container">
                
                    <?php foreach ($_SESSION['item'] as $key => $value) : ?>
                    <div class="item">    
                        <?php echo  $value;?>
                            <form action="shoppingcart-cart.php" method="post">
                                <input type="hidden" name ="remove" value="<?php echo $key; ?>">       
                                <input type="submit" name="order" value="Remove"/>
                            </form>
                    </div>
                        <?php endforeach; ?>  
                </div>            
                <form>
                    <button formaction="checkout.php">Checkout</button>
                </form>  
            </div>
        </body>
</html>