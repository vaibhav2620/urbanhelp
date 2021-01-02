<?php

if(isset($_POST['spSubmit'])){

    require 'connect.php';

    $name=$_POST['spName'];
    $location=$_POST['splocation'];
    $age=$_POST['spage'];
    $gender=$_POST['spgender'];
    $qualification=$_POST['spqualification'];
    $exp=$_POST['yearsofexperience'];
    $email=$_POST['spemail'];
    $password=$_POST['spPassword'];
    $confirmpassword=$_POST['spconfirmpassword'];
    $activation='false';

    if($confirmpassword !== $password){
        // header('Location:..\signup.php?WHO=serviceprovider&error=passwordcheck ');
        exit();
    }
    else{
        $sql = "SELECT sp_email FROM service_provider WHERE sp_email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: ../signup.php?WHO=serviceprovider&error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt); 

            if ($resultCheck > 0) {
                header("Location: ../signup.php?WHO=serviceprovider&error=Emailtaken");
                exit();
            }
            else{
                $sql = "INSERT INTO service_provider (sp_name,sp_loction,sp_age,sp_gender,sp_qualification,sp_yearsofexperence, sp_email,sp_password,sp_activation ) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                
                
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header ("Location: ../signup.php?WHO=serviceprovider&error=sqlerror");
                    exit();
                }
                else{
                    $hashedpwd=password_hash($password, PASSWORD_DEFAULT);
                                
                    mysqli_stmt_bind_param($stmt,"sssssssss", $name,$location,$age,$gender,$qualification,$exp,$email,$hashedpwd,$activation);
                    mysqli_stmt_execute($stmt);
                    header ("Location: ../login.php?signup=success");
                    exit();
                  
                }


            } 
        }

mysqli_stmt_close($stmt);
mysqli_close($conn);


    }


}else{
    header ("Location: ../signup.php?WHO=serviceprovider");
    exit();



}