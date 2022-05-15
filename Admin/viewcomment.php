
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
    <title>View Comment</title>
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
                    <a href="viewcomment.php" class="active"><span class="las la-history"></span>
                    <span>View Comments</span></a>
                </li>
                
                <li>
                    <a href="report.php" ><span class="las la-book-medical"></span>
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

     
    </div>
    <div class="container" style=" margin-left:400px;">
    <br><br><br><br><br><br><br>
   










 <div class="card-header" style="background-color: #008bca; width: 700px;">
                            <h3 style="color: white;">View Comment </h3>
                        </div>
                        <br>


 




                           <table  style="background:white; width: 700px; background-image: url(../image/foot_white.jpg);">
                          
                           <?php 
                         $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
                        $sql="SELECT * FROM comment ORDER BY comment.date DESC";
                        $result = $conn->query($sql);
                    
                        while($row = $result->fetch_assoc()): ?>


 <tr>
    <th><label for="fname">Name</label></th>
    <th><label for="subject">Comment</label></th>
    <th><label for="">Date</label></th>
  </tr>
  <tr>
    <td><textarea style="background:white;width:200px;height:20px;" disabled><?php echo $row['name'];?></textarea></td>
    <td><textarea style="background:white;width:250px;height:100px;" disabled><?php echo $row['commnt'];?></textarea></td>
    <td><?php echo $row['date'];?></td>
  </tr>
                        
                        
                     <?php endwhile?>
                          
                           </tbody>
                           </table>
                   
                              
                     
                            </div>

</body>

</html>