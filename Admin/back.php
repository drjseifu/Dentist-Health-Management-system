<?php
session_start();
 $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
if (isset($_POST['post'])) {
     
 
    $curdir = getcwd();
    $id = null;
    $acfn = $_POST['content'];
   $h=date('Y-m-d H:i:s');
    $target_dir = "Uploaded_Files_news/".$id . "/ ";
    $target_file =  $target_dir. date("dmYhis") . basename($_FILES['myfile']["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $location = "Uploaded_Files_news/".$id . "/ ". date("dmYhis") .$_FILES['myfile']["name"]; 
    $result = mysqli_query($conn, "INSERT INTO news(`idnews`, `news`, `location`, `date`)VALUE('$id','$acfn','$location','$h')");

    if ($result) {
        if(!is_dir( $target_dir))
        {
            mkdir( $target_dir, 0755, true);
                move_uploaded_file($_FILES['myfile']['tmp_name'], $target_file);
              
                  
                    $files = date("dmYhis") . $_FILES['myfile']["name"]; 
                    $_SESSION['msg']="<script>alert('Successfully News Posted')</script>";
                    header("Location: ../Admin/news_send.php");
                    
                    exit();
           
        }else if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_file)){
           
            $files = date("dmYhis") . $_FILES['myfile']["name"]; 
            $_SESSION['msg']="<script>alert('Successfully News Posted')</script>";
            header("Location: ../Admin/news_send.php");
            exit();
           
        }
    }
    }

    if (isset($_POST['paybill'])) {
        
  
$id=$_POST['apovement'];
$pay="panding";

$target_dir = "Uploaded_Files_bill/".$id . "/ ";
$target_file =  $target_dir. date("dmYhis") . basename($_FILES['myfile']["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$location = "Uploaded_Files_bill/".$id . "/ ". date("dmYhis") .$_FILES['myfile']["name"]; 
        $result = mysqli_query($conn, "UPDATE status SET payment_bill='$location',payment='$pay' WHERE casefile_idcasefile=$id");
   
        if ($result) {
            if(!is_dir( $target_dir))
            {
                mkdir( $target_dir, 0755, true);
                    move_uploaded_file($_FILES['myfile']['tmp_name'], $target_file);
                  
                      
                        $files = $_FILES['myfile']['tmp_name']; 
                        
                        // header("Location: index.php");
                        exit();
               
            }else if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_file)){
               
                $files =$_FILES['myfile']['tmp_name']; 
                // header("Location:index.php");
                exit();
               
            }
        }
    }

if(isset($_POST['comment'])){
$yy=null;
$id=1;
    $name=$_POST['name'];
    $subject=$_POST['subject'];
   $result=mysqli_query($conn,"INSERT INTO `comment`(`idcomment`, `name`, `content`, `time`, `date`, `user_iduser`) VALUES ('$yy','$name','$subject','','','$id')");
    if ($result=true) {
        header("Location:index.php");
    }else{

    }
}
if(isset($_POST['changepass'])){
$id=1;
    $opw=$_POST['opw'];
    $npw=$_POST['npw'];
    $rpw=$_POST['rpw'];
   
    
    
        $result=mysqli_query($conn,"UPDATE user Set password='$npw' WHERE iduser='$id'");
        if ($result=true) {
            header("Location:index.php");
        }else{
    
        }
    
}
?>