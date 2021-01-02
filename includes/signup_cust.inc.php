<?php

if(isset($_POST['Submit'])){

    require 'connect.php';


    $name=$_POST['Name'];
    $location=$_POST['location'];
    $address=$_POST['Address'];
    $age=$_POST['age'];
    $gender=$_POST['Gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];


    if($confirmpassword !== $password){
        header('Location:..\signup.php?WHO=customer&error = passwordcheck ');
        exit();
    }
    else{
        $sql = "SELECT cust_email FROM customer WHERE cust_email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header ("Location: ../signup.php?WHO=customer&error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt); 

            if ($resultCheck > 0) {
                header("Location: ../signup.php?WHO=customer&error=Emailtaken");
                exit();
            }
            else{
                $sql = "INSERT INTO customer (cust_name,cust_location,cust_Address,cust_age,cust_gender,cust_email,pwd ) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                
                
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header ("Location: ../signup.php?WHO=customer&error=sqlerror");
                    exit();
                }
                else{
                    $hashedpwd=password_hash($password, PASSWORD_DEFAULT);
                                
                    mysqli_stmt_bind_param($stmt,"sssssss", $name,$location,$address,$age,$gender,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header ("Location: ../login.php?signup=Success");
                    exit();
                }


            } 
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);


    }


}else{
    header ("Location: ../signup.php?WHO=customer");
    exit();
}