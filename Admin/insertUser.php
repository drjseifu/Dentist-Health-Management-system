<?php
session_start();
$conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
if (isset($_POST['submit'])) {
    include 'Backend.php';
    $obj = new Backend;
    $conn = $obj->connection();
    $data = array();
    $data[0] = $_POST['id'];
    $data[1] = $_POST['uname'];
//    $data[2] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $data[2] = $_POST['pass'];
    $data[3] = $_POST['role'];
    $data[4] = $_POST['fname'];
    $data[5] = $_POST['mname'];
    $data[6] = $_POST['lname'];
    $data[7] = $_POST['gen'];
    $data[8] = $_POST['age'];
    $data[9] = $_POST['em'];
    $data[10] = $_POST['sts'];
   
    $obj->setAttrs($conn, 'user', $data);
    echo $obj->check_insert_query();
    $lastid = $_POST['id'];
    $obj->insert();
$_SESSION['msg']='<script>alert("Successfully Registered")</script>';
    header('location:register.php');
 
}

if(isset($_POST['update'])){
    $fname=$_POST['fname'];
    $uname=$_POST['uname'];
    $mname=$_POST['mname'];
    // $pass=$_POST['pass'];
    $lname=$_POST['lname'];
    $em=$_POST['em'];
    $age=$_POST['age'];
    $role=$_POST['role'];
    $gen=$_POST['gen'];
    $id=$_POST['id'];
    $sts=$_POST['sts'];
    $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
    $result = mysqli_query($conn, "UPDATE user SET Status='$sts', gender='$gen',role='$role',age='$age',email='$em',lname='$lname',mname='$mname',username='$uname',fname='$fname' WHERE iduser =$id") or die(mysqli_error($conn));
    $_SESSION['msg']='<script>alert("Successfully Updated")</script>';
    if ($result=== TRUE) {
 

      header('location:register.php');
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

}
