<?php

define('Title','HOME');
include 'includes/connect.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div class="image" id=image1>
<img src="visuals/Clean-house.jpg" alt="welcome" style='width:100%;opacity:0.8;'>
<h1> <b style='font-size:larger'> Welcome People </b><br>
<br><br>
<em> We are here to make lifes of people living the cities easy by our <br>
door to door services for all kind of household as well as maintainence.</em>
</h1>
</div>

<?php 
if(!isset($_SESSION['user'])){
?>

<div class="image" id=image1>
<img src="visuals/worker_1.jpg" alt="welcome" style='width:100%;opacity:0.8;'>
<h1> <b style='font-size:larger'> Join us </b><br>
<br><br>
<em> We are here to make lifes of people living the cities easy by our <br>
door to door services for all kind of household as well as maintainence.</em>
</h1>
</div>


<?php
} 
if(isset($_SESSION['user'])){
  
  if($_SESSION['user']=='customer' || $_SESSION['user']=='custadmin'){


echo '<div class="services">
<div class="services_display">';

    $sql = "SELECT * FROM services";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
      header('Location: .\index.php');
      exit();
    }
    else{
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);

      while($row=mysqli_fetch_assoc($result))
      {


?>
        <a href="appointment.php?serviceTitle=<?php echo $row['s_title'];?>">
        <div class="service_item">                                       
          <br>
          <img  src="<?php echo $row['s_logo_address']; ?>"  alt="plumbing">
          <br>
          <p><?php echo $row['s_title']; ?></p>
        </div>
        </a>

<?php



      } 
    }




    ?>





<!--
    <a href="appointment.php?serviceTitle=plumbing">
    <div class="service_item">                                       
      <br>
      <img  src="visuals/plumbing.png" alt="plumbing">
      <br>
      <p>Plumbing</p>
    </div>
    </a>

    <a href="appointment.php?serviceTitle=salonathome">
    <div class="service_item">                                         
      <br>
      <img  src="visuals/hair-salon.png" alt="Salon at home">
      <br>
      <p>Salon at home</p>
  
    </div>
    </a>
    
    <a href="appointment.php?serviceTitle=electrician">
    <div class="service_item">                                        
      <br>
      <img  src="visuals/electrician.png" alt="electrician">
      <br>
      <p>electrician</p>
    </div>
    </a>

    <a href="appointment.php?serviceTitle=sanatizing">
    <div class="service_item">                                         
      <br>
      <img  src="visuals/spray.png" alt="sanatizing" style='opacity:1;'>
      <br>
      <p >Sanatizing</p>
    </div>
    </a>

    
  -->



<?php
  }
  elseif($_SESSION['user']=='serviceProvider' || $_SESSION['user'] == 'spadmin'){
    $sql = "SELECT s_title from services";
    $stmt = mysqli_stmt_init($conn);
    
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);    
?>

<div class="appointment" style="left-margin:10%;" >
  <form action="appointment.php?serviceTitle=Appointments" method="post" id = appointmentsList >
  <select  name="serviceName" id="serviceName" >
    <?php 
      while($row = mysqli_fetch_assoc($result)){ 
    ?>
        <option value="<?php echo $row['s_title']; ?>"><?php echo $row['s_title']; ?></option>
  <?php } ?>
    </select>
        
            <!--<input type="text" name="Address" id="Address" placeholder='Address'>
            <input type="text" name="city" id="city" placeholder='City'>   -->
  <br>      
  <select  name="City" id="city" style="margin:2%">
    <option value="Mumbai">Mumbai</option>
    <option value="Delhi">Delhi</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Jaipur">Jaipur</option>
  </select>
  <br>
            <button type=submit name=appointmentfilter style='padding:2%;margin-left:3%;margin-top:0% ' >Appointment</button>
        </form>
    </div>



<?php
  }


  if($_SESSION['user'] == 'custadmin'){
    ?>
    <div class="addservice" id=addservice>
    <div class="service_item">                                       
      <br>
      <img  src="visuals/add.png" alt="add service">
      <br>
      <p>Add Serevice</p>
    </div>
    </div>
      

<?php
  }
}



?>
  </div>
</div>

<div class="bg-modal">
<div class="modal-content">
<div class="close">+</div>
<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="Service Title">
  <input type="textarea" name="package" placeholder="Package">
  <input type="file" name="ServiceImage" style="color:white;" accept="image/*" />
  <button type="submit" style='width:30%;height:10%;border-radius:5%;font-size:larger;margin-top:5%;background-color:lightgray;' >Upload</button>

</form>



</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script>
document.getElementById('addservice').addEventListener('click',
function(){
 
 document.querySelector('.bg-modal').style.display = 'flex';
});


document.querySelector('.close').addEventListener('click',function(){
document.querySelector('.bg-modal').style.display = 'none';

});
</script>






</body>
</html>



<?php
include 'footer.php';
?>