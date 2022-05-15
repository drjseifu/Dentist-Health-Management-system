<?php
session_start();
     $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
if(!empty($_POST['id']))
{
    $query="SELECT * FROM user WHERE iduser  ='".$_POST["id"]."'";
    $rsult=mysqli_query($conn,$query);
    $count=mysqli_num_rows($rsult);
    if( $count>0){
   echo "<span style='color:red'>File number alerdy exists</span>";
      echo "<script>$('#submit').prop('hidden',true);</script>";
    }else{
        echo "<span style='color:green'>Fill number avilable For Register</span>";
       echo "<script>$('#submit').prop('hidden',false);</script>";
    }
}
if(!empty($_POST['uname']))
{
    $query="SELECT * FROM user WHERE username='".$_POST["uname"]."'";
    $rsult=mysqli_query($conn,$query);
    $count=mysqli_num_rows($rsult);
    if( $count>0){
   echo "<span style='color:red'>File number alerdy exists</span>";
      echo "<script>$('#submit').prop('hidden',true);</script>";
    }else{
        echo "<span style='color:green'>Fill Username avilable For Register</span>";
       echo "<script>$('#submit').prop('hidden',false);</script>";
    }
}
?>