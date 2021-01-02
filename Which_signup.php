<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        html{
            height:100%;
        }
    </style>

</head>
<body>
    <br><br><br><br>
<div style="margin-left:30%; background-color:lightblue; width:40%; border-radius:5%;padding:0.1%;margin-top:5%;">
<div class="indesign" style='background-color:black; color:lightblue;border-radius:5%; width:90%; margin:5%;'> 
    <h1 style='margin-left:15%'>
        WHO ARE YOU?
    </h1>
    <div style='margin-left:1%;display:inline-block; width:30%; font-size:80%;'>
    <p>
    <a href="signup.php?WHO=customer" style='color:gray;'><h2 style='background-color:black;padding:10%; font-size:200%; display:inline-block; border-radius:10%; margin-left:20%;'>Customer</h2></a>
    </p>
    </div>

    <div style=' display:inline-block; width:40%; font-size:80%;'>
    <p>
    <a href="signup.php?WHO=serviceprovider" style='color:gray;'><h2 style='background-color:black;padding:8%; font-size:200%; display:inline-block; border-radius:10%;margin-left:40%; width:100%;'>Service Provider</h2></a>
    </p>
    </div>
</div>
</div>
<br><br><br><br><br><br><br>
<br>

</body>
</html>

<?php

include 'footer.php';

?>
