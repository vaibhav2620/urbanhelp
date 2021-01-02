<?php


define('Title','login');

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<br><br><br><br>
<div class="container" >


    <div class="signupform" style=' margin:5%; '>
        <h1> Customer</h1>
    <form action="includes\login_cust.inc.php" method='post' >

        
    <div class="label_s">
    <label for="email"> Email:</label><br>
    </div>
    <div class="field_s">
    <input type="email" name='email' required>
    </div>
    
    <div class="label_s">
    <label for='password'> Password:</label><br>
    </div>
    <div class="field_s">
    <input type="password" name='password' required>
    </div>
    
    <input type="submit" name='login_Submit' value=login class ='LOGIN'>
    
    
    </form>
    

    </div>

</div>
<div class="container" style=' margin-left:0%'>    
    <div class="signupform" style="  margin:5%">
    <h1>Service Provider</h1>
    <form action="includes\login_sp.inc.php" method='post' >

        
    <div class="label_s">
    <label for="email"> Email:</label><br>
    </div>
    <div class="field_s">
    <input type="email" name='spemail'>
    </div>
    
    <div class="label_s">
    <label for='password'> Password:</label><br>
    </div>
    <div class="field_s">
    <input type="password" name='sppassword'>
    </div>
    
    <input type="submit" name='login_spSubmit' value=login class ='LOGIN'>
    
    
    </form>
  
    </div>

   
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<p style='font-size:150%;color:white '>If not already a user then <a href="Which_signup.php">signup</a></p>

</body>
</html>

<?php

include 'footer.php';

?>