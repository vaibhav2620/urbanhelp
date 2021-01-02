<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Title,' | URBANhelp' ; ?></title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="navBar">

    <div class="header" >
     

        <a href="index.php">
        <img src="visuals/logo1.svg" alt="URBANhelp">
        </a>


    
        <?php

            if(isset($_SESSION['loggedin']))
            {

        ?>

            
            <div class="dropdown" >
            <button class="dropbtn" ><p style="margin-left:0%; font-size:180%"><?php echo $_SESSION['name'];?></p></button>
            <div class="dropdown-content">
            <?php if($_SESSION['user'] == 'customer' ){echo '<a href="profile.php">Profile</a>';}?>
            <?php if($_SESSION['user'] == 'serviceProvider' ){echo '<a href="yourAppointments.php">Your Appointments</a>';}?>
            <a href="includes/logout.inc.php">logout</a>
            </div>
            </div>
            
            
          
        <?php
            }
            else{

       
        ?>
            <a href="login.php"><button  class="start-login">login</button></a>
            
        <?php
        }
         
        ?>

    </div>
   

</div>
<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
 

</body>
</html>