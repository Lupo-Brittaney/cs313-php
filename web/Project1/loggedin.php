<?php

// Start the session
session_start();
require_once('database.php');
require_once('login.php');
if (isset($_SESSION)){
    $person=$_SESSION['person_id'];
    $organizations=get_orgs('2');
   // $message = 'It worked';
   // var_dump($_SESSION);
    
  //  var_dump($organizations);
    

}



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