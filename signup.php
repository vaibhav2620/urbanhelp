<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 
<?php



define('Title','signup');

include 'header.php';

$who = $_GET['WHO'];

if($who == 'customer'){

?>



<div class="container">
    <div class="signupform">
    <form action="includes\signup_cust.inc.php" method='post' >
    <div class="label_s">
    <label for="Name"> Name:</label><br>
    </div> 
    <div class="field_s">   
    <input type="text" name='Name' required>
    </div>

    <div class="label_s">
    <label for="location"> Location(city):</label><br>
    </div>
    <div class="field_s">
    <input type="text" name='location' required>
    </div>
    <div class="label_s">
    <label for="Address"> Address:</label><br>
    </div>
    <div class="field_s">
    <textarea type="text" name='Address'required></textarea>
    </div>
    <div class="label_s">
    <label for="age"> Age:</label><br>
    </div>
    <div class="field_s">
    <input type='number' name='age' required>
    </div>
    
    <label> Gender </label><br>
    <select name="Gender" id="cars">
        <option value="male" name=male>Male</option>
        <option value="Female" name=female>Female</option>
        <option value="other" name=other>Other</option>
    </select>

    
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
    

    <div class="label_s">
    <label for='confirmpassword'>Confirm Password:</label><br>
    </div>
    <div class="field_s">
    <input type="password" name='confirmpassword' required>
    </div>    

    
    <input type="submit" name='Submit' class = 'submit' />
    
    
    </form>
    <p>IF alreay a user<a href="login.php" class="all_signin"> login</a></p>

    </div>

</div>

<?php
}
else{

?>

<div class="container">
    <div class="signupform">
    <form action="includes/signup_sp.inc.php" method='post' >
    <div class="label_s">
    <label for="spName"> Name:</label><br>
    </div> 
    <div class="field_s">   
    <input type="text" name='spName' required>
    </div>

    <div class="label_s">
    <label for="splocation"> Location(city):</label><br>
    </div>
    <div class="field_s">
    <input type="text" name='splocation'required>
    </div>

    <div class="label_s">
    <label for="spage"> Age:</label><br>
    </div>
    <div class="field_s">
    <input type='number' name='spage' required>
    </div>
    
    <label> Gender </label><br>
    
    <input type="radio" id="male" name="spgender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="spgender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="spgender" value="other">
    <label for="other">Other</label>
    

    <div class="label_s">
    <label for='spqualification'> Qualification: </label><br>
    </div>
    <div class="field_s">
    <input type="text" name='spqualification' required>
    </div>

    <div class="label_s">
    <label for="exp"> Years of Experience:</label><br>
    </div>
    <div class="field_s">
    <input type="number" name='yearsofexperience' required>
    </div>
    
    <div class="label_s">
    <label for="spemail"> Email:</label><br>
    </div>
    <div class="field_s">
    <input type="email" name='spemail' required>
    </div>
    

    <div class="label_s">
    <label for='sppassword'> Password:</label><br>
    </div>
    <div class="field_s">
    <input type="password" name='spPassword' required>
    </div>
    
    <div class="label_s">
    <label for='spconfirmpassword'>Confirm Password:</label><br>
    </div>
    <div class="field_s">
    <input type="password" name='spconfirmpassword' required>
    </div>    

    
    <input type="submit" name='spSubmit' class = 'submit' />
    
    
    </form>
    <p>IF alreay a user<a href="login.php" class="all_signin"> login</a></p>

    </div>

</div>




<?php
}

include 'footer.php';

?>


</body>
</html>


