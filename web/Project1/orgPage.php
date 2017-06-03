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
    $orgName= filter_input(INPUT_POST, 'orgName', FILTER_SANITIZE_STRING);
    $_SESSION['orgName']= $orgName;
}
$members = get_members($_SESSION['orgId']);
$fee = get_fee($_SESSION['orgId']);


if (isset($_POST['update'])){
    $memberId= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_NUMBER_INT);
    $payAmount= filter_input(INPUT_POST, 'payAmount', FILTER_SANITIZE_NUMBER_INT);
    $payType= filter_input(INPUT_POST, 'payType');
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
if (isset($_POST['addMember'])){
    $payAmount= filter_input(INPUT_POST, 'payAmount', FILTER_SANITIZE_NUMBER_INT);
    $payType= filter_input(INPUT_POST, 'payType', FILTER_SANITIZE_STRING);
    $firstname= filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastname= filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $orgId=$_SESSION['orgId'];
    $personReturn=get_person($email);
    if ($personReturn==!NULL){
        $person_id=$personReturn['id'];
        $insertMember=add_member($person_id, $payAmount, $payType, $orgId);
        header('Location:orgPage.php');
        exit();
    }else{
        $personId= add_person($firstname, $lastname, $email);
        $personReturn=get_person($email);
        $person_id=$personReturn['id'];
        $insertMember=add_member($person_id, $payAmount, $payType, $orgId);
        header('Location:orgPage.php');
        exit();
        
    }
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
            <a href="dashboard.php"><h1>LeaguePay</h1></a>
              <form class="logoutButton" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name ="logout" >
                <input type="submit" name='logout' value="Log Out" class="logoutbtn">
            </form>

        </header>
        <div class="center">

            <h2><?php echo $_SESSION['orgName']; ?></h2>
            <h3 id="feestatement">Organization fee is $<?php echo $fee['fee']; ?></h3>
            
            <table>
                
                <tr>
                    <th colspan="2">Member</th>
                    <th>Payment</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <?php foreach ($members as $member): ?>
                    <td><?php echo $member['firstname']; ?></td>
                    <td><?php echo $member['lastname']; ?></td>
                    <td>$<?php echo $member['payamount']; ?></td>
                    <td><a href="mailto:<?php echo $member['email']; ?>"><?php echo $member['email']; ?></a></td>
                    <td>            
                        <form name="deleteMember" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <input type="hidden" value="<?php echo $member['id']; ?>">
                        <input type="submit" name="deleteMember" value="Delete Member" onclick="return confirm('Are you sure you want to delete this member?');">
            </form> </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <form class="addform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
                <fieldset>
                    <legend><h3>Add Member</h3></legend>
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" required>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" required><br>
                <label for="email">Email</label>
                <input type="text" name="email" required><br>
                <label for ="payAmount">Payment Amount</label>
                <input type="number" name="payAmount" required>
                <label for="payType">Payment Type</label>
                <select name="payType" required>
                    <option value="cash">Cash</option>
                    <option value="check">Check</option>
                    <option value="other">Other</option>
                </select>
                
                <input type="submit" name="addMember" value="Add Member">
                </fieldset>
            </form>

            <form class="updateform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" > 
                <fieldset>
                    <legend><h3>Update Payment</h3></legend>
                <label for="name">Name</label>
                <select name="name" required>
                    <?php foreach ($members as $member):?>
                    <option value="<?php echo $member['id']; ?>"><?php echo $member['firstname']; ?></option> 
                    <?php endforeach; ?>
                </select><br>
                <label for="payAmount"> Payment Amount</label>
                <input type="number" name="payAmount" required>
                <label for="payType"> Payment Type</label>
                <select name="payType" required>
                    <option value="cash">Cash</option>
                    <option value="check">Check</option>
                    <option value="other">Other</option>
                </select>
                <input type="submit" name="update" value="Update">
                </fieldset>
            </form>
            


            <form name ="deleteOrganization" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="submit" name="delete" value="Delete this Organization" onclick="return confirm('Are you sure you want to delete this organization?');" class="deletebtn">
            </form>                   


        </div>
        
    </body>    
    <footer>
    </footer>
</html>