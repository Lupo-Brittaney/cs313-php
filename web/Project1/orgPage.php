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
if (isset($_POST['toUpdate'])){
$orgId= filter_input(INPUT_POST, 'orgId', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['orgId']= $orgId;
}
$members = get_members($_SESSION['orgId']);
//var_dump($_SESSION['orgId']);


//var_dump($members);
if (isset($_POST['update'])){
    $memberId= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_NUMBER_INT);
    $payAmount= filter_input(INPUT_POST, 'payAmount', FILTER_SANITIZE_NUMBER_INT);
    $payType= filter_input(INPUT_POST, 'payType', FILTER_SANITIZE_STRING);
    //$payDate= $_POST["payDate"];
    //var_dump($memberId);
    //var_dump($payAmount);
   // var_dump($payType);
    
    update_pay($memberId, $payAmount, $payType);
    header('Location:orgPage.php');
    exit();

    
}
if(isset($_POST['delete'])){
    $deleteOrg=$_SESSION['orgId']; 
    //var_dump($deleteOrg);
   delete_org($deleteOrg);
   header('Location:dashboard.php');
   exit();
    
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
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name ="logout" >
                <input type="submit" name='logout' value="Log Out">
            </form>
        </header>
        <div class="center">
            <h1>Organization Home</h1>
            <table>
                
                <tr>
                    <th colspan="2">Member</th>
                    <th>Payment</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <?php foreach ($members as $member): ?>
                    <td><?php echo $member['firstname']; ?></td>
                    <td><?php echo $member['lastname']; ?></td>
                    <td>$<?php echo $member['payamount']; ?></td>
                    <td><a href="mailto:<?php echo $member['email']; ?>"><?php echo $member['email']; ?></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <h2> Add Member </h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">
                <label for="email">Email</label>
                <input type="text" name="email">
                <label for ="payAmount">Payment Amount</label>
                <input type="number" name="payAmount">
                <label for="payType">Payment Type</label>
                <select name="payType">
                    <option value="cash">Cash</option>
                    <option value="check">Check</option>
                    <option value="other">Other</option>
                </select>
                
                <input type="submit" name="add" value="Add">
            </form>
            <h2>Update Payment</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="name">Name</label>
                <select name="name">
                    <?php foreach ($members as $member):?>
                    <option value="<?php echo $member['person_id']; ?>"><?php echo $member['firstname']; ?></option> 
                    <?php endforeach; ?>
                </select>
                <label for="payAmount"> Payment Amount</label>
                <input type="number" name="payAmount">
                <label for="payType"> Payment Type</label>
                <select name="payType">
                    <option value="cash">Cash</option>
                    <option value="check">Check</option>
                    <option value="other">Other</option>
                </select>
                <input type="submit" name="update" value="Update">
            </form>
            
            <h2>Delete this Organization</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this game review?');">
            </form>                   

        </div>
        
    </body>    
    <footer>
    </footer>
</html>