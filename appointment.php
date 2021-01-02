<?php

$serviceName = $_GET['serviceTitle'];
define('Title', $serviceName);

include 'header.php';


//include 'includes/data.inc.php';
include 'includes/connect.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>

<br><br><br><br><br>
    <?php 

if(isset($_SESSION['user'])){

    if($_SESSION['user'] == 'customer'){
        
        $sql ='SELECT * FROM services WHERE s_title = ?';
        $stmt = mysqli_stmt_init($conn);
        $_SESSION['serviceName']=$serviceName;



        if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:..index.php?error=someThingwentWrong');
        exit();
        }
        else{
        mysqli_stmt_bind_param($stmt,'s',$serviceName);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $serviceDetails = mysqli_fetch_assoc($result);

        }


    ?>   


    <div class="displate">
    <img src="<?php echo $serviceDetails['s_logo_address'] ; ?>" alt="<?php echo $serviceName; ?>">


    <div class="details">
    <div class="besides">
    <h1><?php echo $serviceDetails['s_title']; ?></h1>
    <p>
    <?php echo $serviceDetails['s_package']; ?>
    </p>
    </div>
    </div>


    <div class="appointment">
    <form action="includes/appointments.inc.php" method="post">

    <textarea name="address" id="address" cols="500" rows="4" placeholder ="Address" ></textarea>

    <!--<input type="text" name="Address" id="Address" placeholder='Address'>
    <input type="text" name="city" id="city" placeholder='City'>   -->

    <select name="City" id="city">
    <option value="Mumbai">Mumbai</option>
    <option value="Delhi">Delhi</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Jaipur">Jaipur</option>
    </select>

    <button type=submit >Set appointment</button>
    </form>
    </div>

    <?php  
    } else {


        if(isset($_POST['appointmentfilter'])){

            $serviceName_a=$_POST['serviceName'];
            $City_a = $_POST['City'];
            $status = 'pending';

            $sql ='SELECT * FROM appointments where s_title=? and a_city=? and a_status=?';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                
                header('Location:..\appointment.php?serviceTitle=sqlerror');
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,'sss',$serviceName_a,$City_a,$status);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
               
                if(mysqli_num_rows($result)){
                ?>
                <!-- table top -->
                <div class="tablemargin">
                <table class="content-table">
                <thead>
                    <tr>
                    <th>Service Title</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>status</th>
                    <th>Assignment</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                  while($row=mysqli_fetch_assoc($result))
                      {
                        echo '<tr><td>'.$row['s_title'].'</td><td>'.$row['a_address'].'</td><td>'.$row['a_city'].'</td><td>'.$row['a_status'].'</td>';
                ?>
                        <td>
                        <form action="yourAppointments.php" method="post" id=assignedbtn>
                        <input type="hidden" name=appointmentID value=<?php echo $row['a_id']; ?>>
                        <input type="hidden" name=serviceproviderID value=<?php echo $_SESSION['id']; ?>>
                        </form>
                        <button type="submit" form="assignedbtn" value="Assignedbtn">Get Assigned</button>
                        </td></tr>

                <?php
                    } 

                  echo '</tbody></table></div>';    
                }   
                else{
                    echo '<h1>You have no appointments</h1>';
                }

    
            }

        }
    

    }

}else{
header("Location:index.php?unauthorized access");
exit();


}
    ?>




</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




</body>
</html>

<?php

include 'footer.php';

?>