
  

<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role']=='admin') {
    // $_SESSION['msg'] = "You are logged in";
}else{
    header('location:../login.php');
}

$conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
    $fname="";
    $uname="";
    $mname="";
    $pass="";
    $lname="";
    $em="";
    $age="";
    $role="Please Choose Role";
    $gen="Please Select Gender";
    $id="";
    $sts="Please Choose Status";
    if(isset($_GET['delete']))
    {
        $tt=$_GET['delete'];
        $result = mysqli_query($conn, "DELETE FROM  user  WHERE iduser =$tt") or die(mysqli_error($conn));

        if ($result=== TRUE) {
          header('location:register.php');
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }

    }
    if(isset($_GET['edit'])){

    $tt=$_GET['edit'];
                             $sql = "SELECT *  FROM user WHERE iduser ='$tt'";
                             $result = $conn->query($sql);
                         
                             while($row = $result->fetch_assoc()){
                                $fname=$row['fname'];
                                $uname=$row['username'];
                                $mname=$row['mname'];
                                $pass=$row['password'];
                                $lname=$row['lname'];
                                $em=$row['email'];
                                $age=$row['age'];
                                $role=$row['role'];
                                $gen=$row['gender'];
                                $id=$row['iduser'];
                                $sts=$row['Status'];

                             }        
                            }
               

    
    
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Register Doctor</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../image/icon-logo.png">
    <script src="../Backend/jquery.min.js"></script>
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
                    <a href="#" class="active"><span class="las la-home"></span>
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
                                  
                                    <li> <a style="color:white;" href="changepassword.php">Change Password</a></li> <br>
                                    <li><a style="color:white;" href="../Backend/logout.php">Logout</a></li>
                                </ul>
            </div>
            </div>
        </header>

        <main>

           
                <div class="projects" >
                    <div class="card" style="background-image: url(../image/foot_white.jpg);">
                        <div class="card-header" style="background-color: #008bca;"  >
                            
                            <h3 style="color: white;">Register Employee </h3>
                            
                            <form action="insertUser.php" method="post">
                            <input  type="submit"  <?php if(!isset($_GET['edit'])){ echo 'hidden';}?> name="update" value="update" style="width:85px; height: 32px; border-radius: 10px; background-color: #269900; border:none; color: white; "> <button <?php if(isset($_GET['edit'])){ echo 'hidden';}?> id="sub" name="submit" type="submit" style="background-color: white; color: black;">Register <span class="las la-arrow-right">
                               
                            </span></button>
                         
                       
                        </div>

                        <div class="register"  >
                            <div >
                            <?php if (isset($_SESSION['msg'])) {
                
                echo $_SESSION['msg'];
                $_SESSION['msg']=null;
            } ?>
                                <table class="table-responsive" style="margin-left: 100px;">
                                    <thead>
                                        <tr>
                                            <td>First Name <br><input id="form_fname"type="text" value="<?php echo $fname?>" name="fname" required placeholder="e.g:  Abebe" minlength="2" maxlength="20"></td>
                                            <script type="text/javascript">
function check()
{
    jQuery.ajax({
        url:"check_avilability.php",
        data:'id='+$("#form_idname").val(),
        type:"POST",
        success:function(data){
            $("#check_id").html(data);
        },
        error:function(){}

    });
  

}

</script>
<script type="text/javascript">
function checku()
{
    jQuery.ajax({
        url:"check_avilability.php",
        data:'uname='+$("#form_username").val(),
        type:"POST",
        success:function(data){
            $("#check_u").html(data);
        },
        error:function(){}

    });
  

}

</script>
                                            <td>Username<br> <span class="error_form" id="check_u"></span><br><input id="form_username" onInput="checku()" type="text" value="<?php echo $uname?>" name="uname" required  placeholder="e.g: abebe" minlength="2" maxlength="30"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Middle Name <br><input id="form_mname"type="text" value="<?php echo $mname?>" name="mname" required placeholder="e.g:  Kebede" minlength="2" maxlength="20"></td>
                                            <td>Password <br><input <?php if(isset($_GET['edit'])){echo 'disabled';}?> type="password" required placeholder="  * * * * * *" value="<?php echo $pass?>" name="pass" style="width: 250px; height: 40px; " ></td>
                                        
                                            <td></td>
                                        </tr>
                                          <tr>
                                            <td>Last Name <br><input id="form_sname"type="text " value="<?php echo $lname?>"  name="lname" required placeholder="e.g: Alegeta " style="width: 250px; height: 40px; " ></td>
                                            <td>Email <br><input id="form_email" type="Email" value="<?php echo $em?>"  name="em" required placeholder="e.g:  example@gmail.com" style="width: 250px; height: 40px; minlength"></td>
                                            <td></td>
                                        </tr>
                                          <tr>
                                            <td >Gender <br><select name="gen" style="width: 250px; height: 40px; "  required ><option   value="<?php echo $gen?>" selected disabled ><?php echo $gen?></option> <option>Male</option><option>Female</option></select></td>

                                            <td>ID <br>     <span class="error_form" id="check_id"></span><br><input  onInput="check()" id="form_idname" type="text" value="<?php echo $id?>"  name="id" placeholder="e.g: 12345/67 " style="width: 250px; height: 40px; minlength=" 4 " ></td>
                                           <td></td>
                                        </tr>
                                        <tr>
                                            <td >Status <br><select name="sts" style="width: 250px; height: 40px; "  required ><option   value="<?php echo $sts?>" disabled selected><?php echo $sts?></option> <option value="active" >Active</option><option value="deactive">Deactive</option></select></td>
                                            <td>
                                               Choose Role<br>
                                                <select name="role" required  value="<?php echo $role?>"style="width: 250px; height: 40px; ">
                                                    <option selected disabled value="<?php echo $role?>" ><?php echo $role?></option>
                                                    <option value="Doctor"> Doctor</option>
                                                    <option value="LabTechnitian">Lab Technitian</option>
                                                    <option value="Pharmacist">Pharmacist</option>
                                                    <option value="RecordOfficer">Record Officer</option>
                                                    <option value="Cashier">Cashier</option>
                                                    <option value="Nurse">Nurse</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="patient">Patient</option>
                                                </select></td>
                                           <td></td>
                                        </tr>
                                         <tr>
                                            <td>Age <br><input id="form_agename"type="Number " value="<?php echo $age?>" name="age" style="width: 250px; height: 40px; " placeholder="e.g: 21 " minlength="2 " maxlength="3 "></td>
                                         
                                                
<br>
                                               
                                              
                                            </td>
                                            <td></td>
                                          
                                        </tr>

                                       
                                    </thead>
                                
                                </table>

                                <br> <br>
                            </form>
                                <div >
                                    <div align="center" style="background-color: #008bca; height: 30px;">
                                        <h3 style="color: white; font-size: 20px;">Data Tables</h3>
                                    </div>
                                    <div >
                                    
                                        <?php require '../Backend/css.php'?>  
    <table cellpadding="0" cellspacing="0" border="0" class="styled-table datatable-1 table table-bordered table-striped    display" >
                                            <thead>
                                                <tr>
                                                    <th>User id</th>
                                                    <th>User Name</th>
                                                    <th>Role</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php 
                         $conn=new mysqli('localhost','root','','db')or die(mysqli_error($mysqli));
                        $sql = "SELECT *  FROM user ";
                        $result = $conn->query($sql);
                    
                        while($row = $result->fetch_assoc()): ?>

                        <tr  class="odd gradeX">
                        <td><?php echo $row['iduser'];?></td>
                        <td><?php echo $row["username"];?></td>
                      
                        <td><?php echo $row["role"];?></td>
                        <td><?php echo $row["fname"];?></td>
                        <td><?php echo $row["mname"];?></td>
                        <td><?php echo $row["lname"];?></td>
                        <td><?php echo $row["gender"];?></td>
                        <td><?php echo $row["age"];?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["Status"];?></td>
                       
                        <td><span><a href="?edit=<?php echo $row['iduser']?>"> <button style="color: white; background-color: #008bca; width: 45px; border-radius: 7px; border:none; height: 25px;"> edit </button> </a></span> &nbsp; &nbsp;<span><a  href="register.php?delete=<?php echo $row['iduser']?>"> <button style="color: white; background-color: #cc0000; width: 45px; border-radius: 7px; border:none; height: 25px;"> delete </button> </a></span></td>
                        </tr>
                        
                     <?php endwhile?>
                                              
                                               
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
<div>



</div>
                
           
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
  
  <style type="text/css">
     div div div div div div div div div a{
        margin-left: 30px;
        border-bottom:2px solid black;
       
      }

      div div div div div div div div div{
        margin-left: 400px;
        margin-top: 20px;
      }
      div div div div div div div div div a:hover{
        cursor: pointer;
      }
  </style>
  <script type="text/javascript">
    $(function() {

        $("#fname_error_message").hide();
        $("#sname_error_message").hide();
        $("#email_error_message").hide();
        $("#password_error_message").hide();
        $("#retype_password_error_message").hide();

        var error_fname = false;
        var error_sname = false;
        var error_email = false;
        var error_password = false;
        var error_retype_password = false;

        $("#form_fname").focusout(function() {
            check_fname();
        });
        $("#form_agename").focusout(function() {
            check_agename();
        });
        $("#form_idname").focusout(function() {
            check_idname();
        });
        $("#form_mname").focusout(function() {
            check_mname();
        });
        $("#form_sname").focusout(function() {
            check_sname();
        });
        $("#form_email").focusout(function() {
            check_email();
        });
        $("#form_password").focusout(function() {
            check_password();
        });
        $("#form_retype_password").focusout(function() {
            check_retype_password();
        });

        function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#form_fname").val();
            if (pattern.test(fname) && fname !== '') {
                $("#fname_error_message").hide();
                $("#form_fname").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#fname_error_message").html("Should contain only Characters");
                $("#fname_error_message").show();
                $("#form_fname").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_fname = true;
            }
        }
        
        function check_agename() {
            var pattern = /^[0-9]+$/;
            var fname = $("#form_agename").val();
            if (pattern.test(fname) && fname !== '' && fname<160) {
                $("#agename_error_message").hide();
                $("#form_agename").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#fname_error_message").html("Should contain only Characters");
                $("#fname_error_message").show();
                $("#form_agename").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_fname = true;
            }
        }
        function check_mname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#form_mname").val();
            if (pattern.test(fname) && fname !== '') {
                $("#mname_error_message").hide();
                $("#form_mname").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#mname_error_message").html("Should contain only Characters");
                $("#mname_error_message").show();
                $("#form_mname").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_fname = true;
            }
        }

        function check_idname() {
            var pattern = /^[0-9]+$/;
            var fname = $("#form_idname").val();
            if (pattern.test(fname) && fname !== '') {
                $("#idname_error_message").hide();
                $("#form_idname").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#idname_error_message").html("Should contain only Characters");
                $("#idname_error_message").show();
                $("#form_idname").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_fname = true;
            }
        }



        function check_sname() {
            var pattern = /^[a-zA-Z]*$/;
            var sname = $("#form_sname").val()
            if (pattern.test(sname) && sname !== '') {
                $("#sname_error_message").hide();
                $("#form_sname").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#sname_error_message").html("Should contain only Characters");
                $("#sname_error_message").show();
                $("#form_sname").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_fname = true;
            }
        }

        function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
                $("#password_error_message").html("Atleast 8 Characters");
                $("#password_error_message").show();
                $("#form_password").css("border-bottom", "2px solid #F90A0A");
                error_password = true;
            } else {
                $("#password_error_message").hide();
                $("#form_password").css("border-bottom", "2px solid #34F458");
            }
        }

        function check_retype_password() {
            var password = $("#form_password").val();
            var retype_password = $("#form_retype_password").val();
            if (password !== retype_password) {
                $("#retype_password_error_message").html("Passwords Did not Matched");
                $("#retype_password_error_message").show();
                $("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
                error_retype_password = true;
            } else {
                $("#retype_password_error_message").hide();
                $("#form_retype_password").css("border-bottom", "2px solid #34F458");
            }
        }

        function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
                $("#email_error_message").hide();
                $("#form_email").css("border-bottom", "2px solid #34F458");
                $('#sub').prop('hidden',false);
            } else {
                $("#email_error_message").html("Invalid Email");
                $("#email_error_message").show();
                $("#form_email").css("border-bottom", "2px solid #F90A0A");
                $('#sub').prop('hidden',true);
                error_email = true;
            }
        }

        $("#registration_form").submit(function() {
            error_fname = false;
            error_sname = false;
            error_email = false;
            error_password = false;
            error_retype_password = false;

            check_fname();
            check_sname();
            check_email();
            check_password();
            check_retype_password();

            if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_retype_password === false) {
                alert("Registration Successfull");
                return true;
            } else {
                alert("Please Fill the form Correctly");
                return false;
            }


        });
    });
</script>