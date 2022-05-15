<!DOCTYPE html>
<html>
<?php session_start();

require_once 'Backend/backend.php';
$obj = new Backend();
$conn = $obj->connection();
if (isset($_POST['login'])) {
    # code...
    // echo "1";
    $result = $obj->auth($conn,$_POST['user'],$_POST['pass']);
    if ($result === null) {
       $error = "Incorrect Password or UserName";
    //    echo "2";
   } else {
       unset($error);
    //    echo "13";
       // $_SESSION['id'] = $result['idUsers'];
       $_SESSION['user'] = $result['username'];
       $_SESSION['Name'] = $result['fname']." ". $result['lname'];
       $_SESSION['role'] = $result['role'];
       $_SESSION['id'] = $result['iduser'];
       require_once 'Backend/Routing.php';
   }
   // $_SESSION['role'] = $row['Role'];
  
   //  $row = $obj->fetch($conn, 'Users', $_SESSION['user'], 'Username');
}
?>
<head>
    <title>Dembia Primary Hospital</title>
    <link href="css/hmsstyle.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="image/icon-logo.png">
</head>

<body style="background-image: url(image/foot_white.jpg); background-size: cover;">
    <div class="top">
        <div>
            Contact Us +251930970778 | Dembiahospital@gmail.com
        </div>
    </div>

    <div class="nav">
        <div>
            <table>
                <tr>
                    <td width="600px">
                        <img src="image/logo.png">
                    </td>
                    <td> <br> <br>
                        <font size="4px">
                            <a href="index.html">HOME</a>
                            <a href="doctors.html">DOCTORS</a>
                            
                            <a href="services.html">SERVICES</a>
                            <a href="about.html">ABOUT US</a>
                            <a href="index.html #contactus">CONTACT US</a>
                            <a href="#"class="nav-active">LOGIN</a>
                        </font>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<form action="" method="post">
    <div class="login">
        <img src="image/login.png" class="login_image">
        <h1 align="Center">Welcome back!</h1> <br>
        <h3 align="Center">Please sign in</h3>
        <?php if (isset($error)):?><h3 align="Center"><?php echo $error; ?></h3><?php endif;?>
        <p>Username</p>
        <input name="user" class="input" type="text" placeholder="Enter your username" required>
        <p>Password</p>
        <input  name="pass" class="input" type="password" placeholder="* * * * * * *" required> <br> <br>
        <button style="width: 267px; border:none; border-radius: 20px;  background-color: #2FA5EB; color: white; height: 35px;" type="submit" name="login"><b> Login </b></button><br> 
    </div>
</form>







    <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br> <br> <br> <br> <br> <br> <br>








    <div class="nav_down">
        <div>
            &copy; 2021. Dembia Primary Hospital | Ethiopia, Amhara
        </div>
    </div>






</body>

</html>