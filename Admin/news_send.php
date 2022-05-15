<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role']=='admin') {
    // $_SESSION['msg'] = "You are logged in";
}else{
    header('location:../login.php');
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>News</title>
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
                    <span>Manage Employee</span></a>
                </li>
                <li>
                    <a href="news_send.php" class="active"><span class="las la-stethoscope"></span>
                    <span>Post News</span></a>
                </li>
               
               
                <li>
                    <a href="viewcomment.php"><span class="las la-history"></span>
                    <span>View Comments</span></a>
                </li>
                
                <li>
                    <a href="report.php"><span class="las la-book-medical"></span>
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

        <main>
  
                 <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header"  style="background-color: #008bca;" >
                            <h3 style="color: white;">Post News </h3>
                            <form action="back.php" method="post" enctype="multipart/form-data">
                            <button type="submit" name="post" style="background-color: white; color: black;" >Post <span class="las la-arrow-right">
                            </span></button>
                        </div>
                        <?php if (isset($_SESSION['msg'])) {
                
                echo $_SESSION['msg'];
                $_SESSION['msg']=null;
            } ?>
                        <div class="register" style="background-image: url(../image/foot_white.jpg);">
                            <div class="table-responsive">
                                <table width="700px">
                                    <thead>
                                        <tr>
                                            <td>Insert File <label style="color: grey;"> (optional) </label> <br><input type="File" name="myfile" placeholder="e.g:  Abebe" minlength="2" maxlength="20"></td>
                                            <td> <br></td>
                                            <td></td>
                                        </tr>
                                          <tr>
                                            <td>Write Your Post <br><textarea required name="content" placeholder="Message" style="width: 636px; height: 300px;"></textarea></td>
                                           
                                            <td></td>
                                        </tr>
                                         

                                       
                                    </thead>
                                
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                

                  
        </main>

    </div>

</body>

</html>