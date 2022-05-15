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
    <title>Generate Report</title>
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
                    <a href="report.php" class="active"><span class="las la-book-medical"></span>
                    <span>Report</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Administrator
            </h2>

         
            <div class="user-wrapper">
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
                </div>
            </div>
        </header>
        <br><br><br>        <br><br><br>
        <div class="cards">
<?php        $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
   $sql="SELECT COUNT(iduser) from user  ";
                        $result = $conn->query($sql);
                        $sql1="SELECT COUNT(gender) from user  where gender='Female' and role='patient' ";
                        $result1 = $conn->query($sql1);
                        $sql2="SELECT COUNT(gender) from user  where gender='Male' and role='patient'";
                        $result2 = $conn->query($sql2);
                        while($row = $result->fetch_assoc()):
                            while($row1= $result1->fetch_assoc()):
                                while($row2= $result2->fetch_assoc()):
                            

                        
                        
                        ?>

<div class="card-single">
    <div>
        <h1><?php echo $row['COUNT(iduser)'];?></h1>
        <span>users</span>
    </div>
    <div>
        <span class="las la-users"></span>
    </div>
</div>

<div class="card-single">
    <div>
        <h1><?php echo $row1['COUNT(gender)'];?></h1>
        <span>Female Patients</span>
    </div>
    <div>
        <span class="las la-stethoscope"></span>
    </div>
</div>

<div class="card-single">
    <div>
        <h1><?php echo $row2['COUNT(gender)'];?></h1>
        <span>Male Patients</span>
    </div>
    <div>
        <span class="las la-wheelchair"></span>
    </div>
</div>

</div>

<?php endwhile;endwhile; endwhile;?>

</body>

</html>