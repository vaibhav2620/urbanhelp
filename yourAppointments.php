<?php
define('Title','Appointments');
include 'header.php';
include 'includes/connect.php';



echo '<br><br><br><br><br>';

$sql ='SELECT * FROM appointments where sp_id=?';
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){
    
    header('Location:..\appointment.php?serviceTitle=sqlerror');
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,'s',$_SESSION['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

   
    if(mysqli_num_rows($result)){
    ?>
    <!-- table top -->
    <div class="tablemargin">
    <h1 style='color:lightblue; '>Assigned</h1>
    <table class="content-table">
    <thead>
        <tr>
        <th>Service Title</th>
        <th>Address</th>
        <th>City</th>
        <th>status</th>
        </tr>
    </thead>
    <tbody>

    <?php
      while($row=mysqli_fetch_assoc($result))
          {
              if($row['a_status'] == 'Assigned'){
            echo '<tr><td>'.$row['s_title'].'</td><td>'.$row['a_address'].'</td><td>'.$row['a_city'].'</td><td>'.$row['a_status'].'</td></tr>';
        }
        } 

      echo '</tbody></table></div>';    
    }   
    else{
        echo '<h1>You have no appointments</h1>';
    }


}

if(!mysqli_stmt_prepare($stmt,$sql)){
    
    header('Location:..\appointment.php?serviceTitle=sqlerror');
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,'s',$_SESSION['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

   
    if(mysqli_num_rows($result)){
    ?>
    <!-- table top -->
    <div class="tablemargin">
    <h1 style='color:lightblue; '>completed</h1>
    <table class="content-table">
    <thead>
        <tr>
        <th>Service Title</th>
        <th>Address</th>
        <th>City</th>
        <th>status</th>
        </tr>
    </thead>
    <tbody>

    <?php
      while($row=mysqli_fetch_assoc($result))
          {
              if($row['a_status'] == 'Completed'){
            echo '<tr><td>'.$row['s_title'].'</td><td>'.$row['a_address'].'</td><td>'.$row['a_city'].'</td><td>'.$row['a_status'].'</td></tr>';
        }
        } 

      echo '</tbody></table></div>';
       
    }   
    else{
        echo '<h1>You have no appointments</h1>';
    }


}
















if(isset($_POST['appointmentID'])){
    echo $_POST['appointmentID'];
    $aID = $_POST['appointmentID'];
    $spID= $_POST['serviceproviderID'];

    $sql = 'UPDATE appointments SET a_status = "Assigned",sp_id = ?  where a_id = ?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('Location:..\yourAppointment.php?error = sqlerror');
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,'ss',$spID,$aID);
        mysqli_stmt_execute($stmt);
       
    }

mysqli_stmt_close($stmt);
mysqli_close($conn);
      

}

    
echo '<br><br><br><br><br><br><br><br><br>';
include 'footer.php'
    
?>



