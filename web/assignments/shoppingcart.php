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
                    <div class="container">
                        <section class="item">
                            <h2>Clock</h2>
                            <img src="img/clock.jpg" alt="Clock">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <input type="hidden" name ="item" value="Clock">                
                                <input type="submit" name="order" value="Order"/>
                            </form>
                        </section>
                        <section class="item">
                            <h2>Angel Wings</h2>
                            <img src="img/angelwing.jpg" alt="">
                            <form action="shoppingcart.php" method="post">
                                <input type="hidden" name ="item" value="Angel Wings">                
                                <input type="submit" name="order" value="Order"/>
                            </form>
                        </section>
                        <section class="item">
                            <h2>Home Sign</h2>
                            <img src="img/home.jpg" alt="Home is where I'm with you">
                            <form action="shoppingcart.php" method="post">
                                <input type="hidden" name ="item" value="Home Sign">                
                                <input type="submit" name="order" value="Order"/>
                            </form>
                        </section>
                         <section class="item">
                            <h2>Love to Moon</h2>
                            <img src="img/lovetomoon.jpg" alt="Love you to the moom and back">
                            <form action="shoppingcart.php" method="post">
                                <input type="hidden" name ="item" value="Love to Moon">                
                                <input type="submit" name="order" value="Order"/>
                            </form>
                        </section>
                    </div>
                </div>
        
        <?php
            if (isset($_POST['item'])){
                $_SESSION['item'][]= filter_input(INPUT_POST, item, FILTER_SANITIZE_STRING);
            }
        ?>
        
        
    </body>
</html>