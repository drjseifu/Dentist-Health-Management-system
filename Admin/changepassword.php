
<?php
 session_start();
 
 if (isset($_SESSION['role']) && $_SESSION['role']=='admin') {
     // $_SESSION['msg'] = "You are logged in";
   }else{
     header('location:../login.php');
   }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../image/icon-logo.png">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="../image/logo_white.png" width="300px">
        </div>
        
        <div class="sidebar-menu">
        <ul>
                <li>
                    <a href="register.php"><span class="las la-home"></span>
                    <span>Manage Employees</span></a>
                </li>
                <li>
                    <a href="news_send.php"><span class="las la-stethoscope"></span>
                    <span>Post News</span></a>
                </li>
       
               
                <li>
                    <a href="viewcomment.php"><span class="las la-history"></span>
                    <span>View Comments</span></a>
                </li>
                
                <li>
                    <a href="report.php" ><span class="las la-book-medical"></span>
                    <span>Report</span></a>
                </li>
            </ul>
        </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Administrator
            </h2>
            <ul>
                <li class="dropdown">
                    <div class="user-wrapper">
                        <img src="../image/admin.png" width="40px" height="40px" alt="">
                        <div>
                        <h4><?php echo $_SESSION['Name']?></h4>
                            <small> <?php echo $_SESSION['role']?> &dArr;</small>
                            <div class="dropdown-content" >
                                <ul>
                                  
                                    <li> <a style="color:white" href="changepassword.php">Change Password</a></li> <br>
                                    <li><a style="color:white" href="../Backend/logout.php">Logout</a></li>
                                </ul>
            </div>
        </header>

        <main>
        <?php  
    $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));  
    if(isset($_POST['change']))
    {

    $np=$_POST['np'];
    $cp=$_POST['cp'];
    $op=$_POST['op'];
    
 
                        $sql = "SELECT *   FROM user  where  `iduser`='" . $_SESSION['id']. "' ";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()): 
                           
                            $password=$op;
                            $de_pass = false;
                            if ($password == $row['password']){
                                $de_pass = true;
                            }
                            if($de_pass)
                            {
                             
                                if($np==$cp)
                                {
                                    $Q = "UPDATE `user` SET `password`='" . $_POST['cp'] . "' WHERE `iduser`='" . $_SESSION['id']. "'";
                                    $query = mysqli_query($conn, $Q) or die(mysqli_error($conn));
                                    $msg="<script>alert('Sucssfully Password Changed')</script>";
                                }else{
                                    $error="<script>alert('Password Not Match')</script>";
                                }
                            }else {
                                $msg="<script>alert('Old Password is Not Correct')</script>";
                            }


                        endwhile;
    
    }
    ?>
    <form action="" method="post">
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="margin-top:3rem;">Change Password
            </h2><br><br>
            <div class="inputgroup" style="width: 500px;">
         <div class="input" >
                        <label style="color:black; font-weight: bold;" for="Wereda">old password</label><br>
                        <input required name="op" type="password" id="username" placeholder="Please Enter old Password" required>
                    </div>
                    <div class="input" >
                        <label style="color:black; font-weight: bold;" for="Wereda">New password</label><br>
                        <input required name="np" type="password" id="username" placeholder="Please New Enter Password" required>
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Kebele">Commform password</label><br>
                        <input required name="cp" type="password" id="password" placeholder="Please Enter Commform password"required> 
                        <label style="color:red; font-weight: bold;"><?php echo $retVal = (isset($error)) ? $error : $retVal = (isset($msg)) ? $msg: null ; ?></label>
                    </div>
                  <br><br><br>
                    
            </div>
            <div class="classbn">
                <div class="buttt"><button  name="change"  class="button ok">Change </button>
                  
                </div>

            </div>
        </div>
        </form>
        </main>

    </div>
    
   
</body>

</html>
<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	
	<script src="js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
  