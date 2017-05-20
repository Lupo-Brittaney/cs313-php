<?php
// Start the session
session_start();
require_once('database.php');
require_once('login.php');


//check for session variable = person logged in
if (isset($_POST['email'])){
    $email = test_input($_POST["email"]);
    $personReturn=get_person($email);
    if($personReturn==!NULL){
      $name=$personReturn['firstname'];
      $person_id=$personReturn['id'];
        $_SESSION['email']=$email;
        $_SESSION['name']=$name;
        $_SESSION['person_id']=$person_id;
        
        header('Location:loggedin.php');
        exit();
        //$message = 'It worked';
        //var_dump($_SESSION);
    }else{
       $message= 'User email not found.';
    }      
}//else{
//    $message='Please submit a valid email address';
//}

var_dump($_SESSION);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['logout'])){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['person_id']);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <title>Home | LeaguePay</title>
 
            
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <fieldset>
                    <legend>Login</legend>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <input type="submit" value="Login">
                </fieldset>
            </form>
            <div class="intro">
                <h2>LeaguePay</h2>
                <p>In LeaguePay you can easily view and manage the fees you owe or are owed in any organization. Are you the manager of a softball team and need to collect the dues from your team mates? Do you run a fantasy sports league and need to track who has paid their league dues? All of that can be done right here in LeaguePay. Sign in to get started today!</p>
            </div>
        </div>
    </body>    
    <footer>
    </footer>
</html>