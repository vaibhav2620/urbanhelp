<?php

if(isset($_POST['login_Submit'])){

    require 'connect.php';


$custEmail = $_POST['email'];
$custpwd = $_POST['password'];



    $sql ='SELECT * FROM customer WHERE cust_email=?';
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:..\login.php?error = sqlerror');
        exit();
    }
    else{
        
        mysqli_stmt_bind_param($stmt,'s',$custEmail);
        
        mysqli_stmt_execute($stmt);
       
        $result = mysqli_stmt_get_result($stmt);
        
        

        if($row=mysqli_fetch_assoc($result)){
            
            $pwdCheck = password_verify($custpwd,$row['pwd']);
            if($pwdCheck == FALSE)
            {   
                header('Location:..\login.php?error=wrong password');
                exit();
            }
            else{
              
                session_start();
                $_SESSION['user'] = 'customer';
                $_SESSION['ID'] = $row['cust_id'];
                $_SESSION['name'] = $row['cust_name'];
                $_SESSION['email']= $row['cust_email'];
                $_SESSION['loggedin']= 'yes'; 
                header('Location:..\index.php?customer');
                exit();
            }
        }
        else{
            if($spEmail = 'admin@123'){
                if($sppwd = 'admin'){
                    session_start();
                    $_SESSION['admin']='admin';
                    $_SESSION['user'] = 'custadmin';
                    $_SESSION['name'] = 'admin';
                    $_SESSION['loggedin']= 'yes'; 
                header('Location:..\index.php?Admin');
                exit();

                }
            }
            else{
            header('Location:..\login.php?error=entervaliddetails');
            exit();
        } 



        
    }


}
}