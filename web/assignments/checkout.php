<?php
// Start the session
session_start();
$street=$city=$state=$zip="";

if (isset($_POST['submit'])) {
    $valid = true;
    
    if (empty($_POST["street"])){
        $valid=false;
    }else{
        $street = test_input($_POST["street"]);
        $_SESSION['street']=$street;
    }
    if (empty($_POST["city"])){
        $valid=false;
    }else{
        $city = test_input($_POST["city"]);
        $_SESSION['city']=$city;
    }
    if (empty($_POST["state"])){
        $valid=false;
    }else{
        $state = test_input($_POST["state"]);
        $_SESSION['state']=$state;
    }
    if (empty($_POST["zip"])){
        $valid=false;
    }else{
        $zip = test_input($_POST["zip"]);
        $_SESSION['zip']=$zip;
    }
    
    
    if ($valid){ 
    header('Location:confirm.php');
    exit();
    
    }
}
function test_input($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
        
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
                <div class="container">
                    <h2>Checkout</h2>
                    <div class="item">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <label for="street">Street:</label>
                        <input type="text" name="street" required><br>
                        <label for="city">City:</label>
                        <input type="text" name="city" required><br>
                        <label for="state">State:</label>
                        <input type="text" name="state" required><br>
                        <label for="zip">Zip Code:</label>
                        <input type="text" name="zip" required><br>
                        
                        <input type="submit" name="submit" value="submit">   
                        </form>
                    </div>
                    
                </div>  
            </div>     
    </body>
</html>