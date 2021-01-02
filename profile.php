<?php

define('Title','Profile');

include "header.php";
include "includes/connect.php";

if(isset($_SESSION["user"])){

    if($_SESSION['user'] == 'customer'){

        //Profile details
        $sql ="SELECT * FROM customer WHERE cust_id=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){

        header("Location:index.php?sql error");
        exit();

        }
        else{
        mysqli_stmt_bind_param($stmt,'s',$_SESSION['ID']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="profile" >
        <ul type=none>
        <li><p>Name:</p><h1><?php echo $row['cust_name']; ?></h1></li>
        <li><p>Location:</p><h1><?php echo $row['cust_location']; ?></h1></li>
        <li><p>Address:</p><h1><?php echo $row['cust_Address']; ?></h1></li>
        <li><p>Email:</p><h1><?php echo $row['cust_email']; ?></h1></li>
        </ul>
        </div>


        <?php
        }

        $sql = "SELECT * FROM appointments where cust_id=?";     
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:index.php?error=sqlerror");
        exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,'s',$_SESSION['ID']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result)){
            ?>
                <!-- table top -->
                <div class="tablemargin" style="margin-left:10%">
                <table class="content-table">
                <thead>
                <tr>
                <th>Service Title</th>
                <th>Address</th>
                <th>City</th>
                <th>status</th>
                <th>confirmation</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                    echo '<tr><td>'.$row['s_title'].'</td><td>'.$row['a_address'].'</td><td>'.$row['a_city'].'</td><td>'.$row['a_status'].'</td>';
               ?>
                    <td>
                        <form action="includes/confirmed.inc.php" method="post">
                        <input type="hidden" name="appointmentid" value=<?php echo $row['a_id'];?>>    
                        <button type="submit">close</button>
                        </form>
                    </td>



                <?php
                }
                echo '</tbody></table></div>';   
            }
            else{
                echo "<h1>YOU have no appointments</h1>";
            }

        }
    }
}
else{
    header("Location: index.php?unauthorized access");
    exit();
}


?>













