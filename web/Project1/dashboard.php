<?php

// Start the session
session_start();
require_once('database.php');
require_once('login.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (isset($_SESSION)){
    $person=$_SESSION['person_id'];
    $organizations=get_orgs($person);
    $owner= get_ownerOrg($person);
    
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
                    <th>Amount Paid</th>
                </tr>
                <tr>
                <?php foreach ($organizations as $org): ?> 
                    <td><?php echo $org['name']; ?></td>
                    <td>$<?php echo $org['fee']; ?></td>
                    <td>$<?php echo $org['payamount']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <table>
                
                <tr>
                    <th>Organization</th>
                    <th>Fee</th>
                    <th> </th>
                </tr>
                <tr>
                <?php foreach ($owner as $own): ?> 
                    <td><?php echo $own['name']; ?></td>
                    <td>$<?php echo $own['fee']; ?></td>
                    <td><form action="orgPage.php" method="post">
                            <input hidden name="orgId" value="<?php echo $own['id'];?>">
                            <input hidden name="orgName" value="<?php echo $own['name'];?>">
                            <input type="submit"  name="toUpdate" value="Details">
                        </form>
                    </td>

                </tr>
                <?php endforeach; ?>
            </table>
            <a href="addOrg.php">Add New Organization</a>
        </div>
        
    </body>    
    <footer>
    </footer>
</html>