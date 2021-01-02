<?php

session_start();

require 'connect.php';

if(isset($_POST["appointmentid"])){
$aid = $_POST["appointmentid"];

$sql = 'UPDATE appointments SET a_status="Completed" where a_id=?';
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
    //header('Location:../profile.php?error = sqlerror');
    //exit();
}
else{
    mysqli_stmt_bind_param($stmt,'s',$aid);
    mysqli_stmt_execute($stmt);
    header('Location:../profile.php?appointment=closed');
    exit();
   
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
  

}

