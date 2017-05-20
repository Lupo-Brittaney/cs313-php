<?php
$name=$_POST['name'];
$email=$_POST['email'];
$major=$_POST['major'];
$comments=$_POST['comments'];
$place=$_POST['continent'];



?>

<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
     <?php
     echo "<p>Name:</p>".$name;
     echo "<p>Email:</p>".$email;
     echo "<p>Major:</p>".$major;
     echo "<p>Comments:</p>".$comments;
     echo "<p> Places Visited:</p>";
     foreach($place as $visit){
         echo $visit."<br>";
         
     }
     ?>
     
 </body>
</html>