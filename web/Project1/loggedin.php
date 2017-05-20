<?php

// Start the session
session_start();
require_once('database.php');
require_once('login.php');
if (isset($_SESSION)){
    $person=$_SESSION['person_id'];
    $organizations=get_orgs($person);
   // $message = 'It worked';
   // var_dump($_SESSION);
    
  //  var_dump($organizations);
}

if (isset($_POST['logout'])){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['person_id']);
    session_destroy() ;
     header('Location:index.php');
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
            
            <?php if (!empty($message)){?><p><?php echo $message;?></p><?php }?>
            <table>
                <tr>
                    <th>Organization</th>
                    <th>Fee</th>
                </tr>
                <tr>
                <?php foreach ($organizations as $org): ?> 
                    <td><?php echo $org['name']; ?></td>
                    <td>$<?php echo $org['fee']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>    
    <footer>
    </footer>
</html>