<?php

if(isset($_POST['login_spSubmit'])){

    require 'connect.php';


$spEmail = $_POST['spemail'];
$sppwd = $_POST['sppassword'];



    $sql ='SELECT * FROM service_provider where sp_email=?';
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:..\login.php?error = sqlerror');
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,'s',$spEmail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($row=mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($sppwd,$row['sp_password']);
            echo $row['sp_activation'];
            if($pwdCheck == FALSE || $row['sp_activation'] == 'false')
            {
                header('Location:..\login.php?error = wrong password&status=Activationrequired');
                exit();
            }
            else{
                session_start();
                $_SESSION['id']   = $row['sp_id'];
                $_SESSION['user'] = 'serviceProvider';
                $_SESSION['name'] = $row['sp_name'];
                $_SESSION['email']= $row['sp_email'];
                $_SESSION['loggedin']= 'yes'; 
                header('Location:..\index.php?Loggedin = SP');
                exit();
            }
        }   
        else{

            if($spEmail = 'admin@123'){
                if($sppwd = 'admin'){
                    session_start();
                    $_SESSION['admin'] = 'admin';
                    $_SESSION['user'] = 'spadmin';
                    $_SESSION['name'] = 'admin';
                    $_SESSION['loggedin']= 'yes'; 
                header('Location:..\index.php?Admin');
                exit();

                }
            }
            else{
                header('Location:..\login.php?error = enter valid details');
                exit();

            }

        }



        
    }








}
