<?php

session_start();


require 'connect.php';

if(isset($_SESSION['user'])){
    
    $address=$_POST['address'];
    $city = $_POST['City'];
    $status = 'pending';
    $sp_id= NULL;

    $sql = "INSERT INTO appointments (cust_id,sp_id,s_title,a_address,a_city,a_status) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("Location: ../appointment.php?serviceTitle=$_SESSION[serviceName]&error=sql");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"ssssss",$_SESSION['ID'],$sp_id,$_SESSION['serviceName'],$address,$city,$status);
        mysqli_stmt_execute($stmt);
        header ("Location: ../appointment.php?serviceTitle=$_SESSION[serviceName]&success=yes");
        exit();
    }
}
else{
    header ("Location: ../appointment.php");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

