<?php

// Start the session
session_start();
require_once('database.php');
require_once('login.php');

if (isset($_POST['logout'])){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['person_id']);
    session_destroy() ;
     header('Location:index.php');
    exit();
}
if (isset($_POST['add'])){
    $name= filter_input(INPUT_POST, 'orgName', FILTER_SANITIZE_STRING);
    $fee =filter_input(INPUT_POST, 'fee', FILTER_SANITIZE_NUMBER_INT);
    $ownerId= $_SESSION['person_id'];
    //var_dump($name);
    //var_dump($fee);
    //var_dump($ownerId);
    add_org($name, $fee, $ownerId);
    header('Location:dashboard.php');
    exit();
    
    
}
//var_dump($_SESSION);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <title><?php echo $_SESSION['name']; ?> | LeaguePay</title>
    </head>
    <body>
        <header>
            <h1>LeaguePay</h1>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name ="logout" >
                <input type="submit" name='logout' value="Log Out">
            </form>
        </header>
        <div class="center">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                
                <label for="orgName">Organization Name</label>
                <input type="text" name="orgName">
                <label for="fee">Fee</label>
                <input type="number" name="fee">

                <input type="submit" name ="add" value="Add">
                
            
            </form>            
        </div>
        
    </body>    
    <footer>
    </footer>
</html>