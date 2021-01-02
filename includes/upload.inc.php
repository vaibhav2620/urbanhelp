<?php 


require 'connect.php';


if(isset($_POST['title'])){

$serviceName = $_POST['title'];
$package = $_POST['package'];

$file = $_FILES['ServiceImage'];

$fileName = $file['name'];
$fileType = $file['type'];
$filetmploc = $file['tmp_name'];

$allowed=array('image/png','image/jpg','image/jpeg');

if(in_array($fileType,$allowed)){
    
$filedestination = "visuals/".$fileName;
move_uploaded_file($filetmploc,"../".$filedestination);


    $sql =  "SELECT * FROM services where s_title=?";
    $stmt = mysqli_stmt_init($conn);


    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ..\index.php?error=sqlError");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,'s',$serviceName);
        mysqli_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);  
        if($resultcheck > 0){
            header("Location: ..\index.php?error=service already exist");
            exit();
        }
        else{
          $sql="INSERT into services(s_title,s_package,s_logo_address) values (?,?,?)";
          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt,$sql)){
              header("Location:..\index.php?error=sqlerror");
              exit();
          }
          else{
                mysqli_stmt_bind_param($stmt,'sss',$serviceName,$package,$filedestination);
                mysqli_stmt_execute($stmt);
                header("Location:..\index.php?message=successfully added service");
                exit();
          }
        }
    }

}
else{
    header("Location: ..\index.php?filetype = Wrong Type of file ");
    exit();

}








}
