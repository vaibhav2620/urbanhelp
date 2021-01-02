<?php
session_start();

if(isset($_POST['appointmentfilter'])){

    require 'connect.php';


    $serviceName_a=$_POST['serviceName'];
    $City_a = $_POST['City'];



    $sql ='SELECT * FROM appointments where s_title=? and a_city=?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo '1';
        header('Location:..\appointment.php?serviceTitle=sqlerror');
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,'ss',$serviceName_a,$City_a);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

       
        if(mysqli_num_rows($result)){
          while($row=mysqli_fetch_assoc($result))
              {
                echo $row['a_id']." ".$row["cust_id"]." ".$row["s_title"]." ".$row["a_address"]." ".$row["a_city"]."<br>";
              
              }  
        }   
        else{
           // header('Location:..\appointment.php?serviceTitle=no apppointments available');
            //exit();
        }




    }

}
