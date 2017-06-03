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
        <script>
            function validateOrgForm() {
                var fee=document.addOrg.fee.value;
                if(document.addOrg.orgName.value == ""){
                    alert("Must enter an organization name");
                    document.addOrg.orgName.focus();
                    return false;
                }
                if(document.addOrg.fee.value == ""){
                    alert("Must enter a fee amount");
                    document.addOrg.fee.focus();
                    return false;
                }if (isNaN(fee)){
                    alert("Fee must be a number");
                    document.addOrg.fee.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <header>
            <a href="dashboard.php"><h1>LeaguePay</h1></a>
              <form class="logoutButton" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name ="logout" >
                <input type="submit" name='logout' value="Log Out" class="logoutbtn">
            </form>
           
        </header>

        <div class="center">
            <h2>Add New Organization</h2>
            <form name="addOrg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateOrgForm()" class= "addOrg">
                
                <label for="orgName">Organization Name</label>
                <input type="text" name="orgName" required>
                <label for="fee">Fee</label>
                <input type="number" name="fee" required>

                <input type="submit" name ="add" value="Add">
                
            
            </form>            
        </div>
        
    </body>    
    <footer>
    </footer>
</html>