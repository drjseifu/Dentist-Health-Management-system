<?php
class Backend
{
    private $host = "localhost";
    private $user = "root";
    private $database = "db";
    protected $attrs = array();
    protected $table;
    protected $connection;
    protected $query;
    function connection()
    { 
        $conn = mysqli_connect($this->host, $this->user, "", $this->database);
        if ($conn->connect_errno > 0) {
            die('Unable to connect to Databse [' . $conn->connect_error . ']');
        } else {
            $this->connection = $conn;
            return $conn;
        }
    }
    function check_insert_query(){
        $val = "INSERT  INTO $this->table VALUES(";
        for ($i = 0; $i < count($this->attrs); $i++) {
            $attr = $this->attrs[$i];
            if ($i == (count($this->attrs) - 1)) {
                if ($attr === null) {
                    $val = $val . NULL . ")";
                } elseif (is_string($attr)|| $attr=='') {
                    $val = $val . "'" . $attr . "');";
                } else {
                    $val = $val . $attr . ");";
                }
            } else {
                if ($attr === null) {
                    $attr = "null";
                    $val = $val . $attr . ",";
                } elseif (is_string($attr) || $attr=='') {
                    $val = $val . "'" . $attr . "',";
                } else {
                    $val = $val . $attr . ",";
                }
            }
        }
        return $val;
        // echo "<script>consol.log($val)</script>";
    }
    function insert()
    {
        $val = $this->check_insert_query(); 
        $this->query = $val;
        mysqli_query($this->connection, $val) or die(mysqli_error($this->connection));
       
            return mysqli_insert_id($this->connection);
        
    }

    /**
     * Set the value of attrs,connection and tables
     *
     * @return  self
     */
    public function setAttrs($connection, $table, $attrs)
    {
        $this->attrs = $attrs;
        $this->table = $table;
        $this->connection = $connection;
        return $this;
    }

    /**
     * Get the value of query
     */
    public function getQuery()
    {
        return $this->query;
    }


    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    function auth($table,$user_name,$password)
   {
      $query = mysqli_query($this->connection, "SELECT * FROM $table WHERE Username = '$user_name'")or die($this->connection->error);;
      
      while ($row = $query->fetch_assoc()) {
         $de_pass = password_verify($password,$row['Pass']);
         if ($user_name == $row["Username"] && $de_pass) {
            return $row;
         }else{
             return "Wrong password";
         }
      }
   }
    function logout(){
            session_unset();
    }
}

$obj = new Backend;
$conn = $obj->connection();
// $data = array();
// $data[0]=null;
// $data[1]="cus";
// $data[2]="bini";
// $data[3]="1234";
// $data[4]="biniyam yirdaw";
// $data[5]="active";
// $obj->setAttrs($conn,'user',$data);
// $lid = $obj->insert();

//$lid = $obj->insert();
// $data2= array();
// $data1[0]=null;
// $data1[1]="date";
// $data1[2]="destion file";
// $data1[3]="accuser name";
// $data1[4]=$lid;
// $obj->setAttrs($conn,'decision',$data2);
// $lid = $obj->insert();


if (isset($_POST['save'])) {
  
    $data1= array();
    $data1[0]=$_POST['id'];
    $data1[1]=$_POST["acfn"];
    $data1[2]=$_POST["adfn"];
    $data1[3]=$_POST["acp"];
    $data1[4]=$_POST["adp"];
    $data1[5]=$_POST["af"];
    $data1[6]=$_POST["alf"];
    $data1[7]=$_POST["alpn"];
    $data1[8]=$_POST["alp"];
    
    $obj->setAttrs($conn,'test',$data1);
    echo $obj->check_insert_query();
    }


    // $con=new mysqli('localhost','root','','ctest')or die(mysqli_error($mysqli));
    if (isset($_POST['aprove'])) {
        $id=$_POST['apovement'];
        
      
              $result = mysqli_query($conn, "UPDATE status SET payment='aprove' WHERE casefile_idcasefile=$id") or die(mysqli_error($conn));

if ($result=== TRUE) {
  header('location:index.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

// $con->close();
    }
    if(isset($_POST['add'])){
      
        $data=array();
        $data[0]=null;
        $data[1]=$_POST['role'];
        $data[2]=$_POST['user'];
        $data[3]=$_POST['pass'];
        $data[4]=$_POST['fname'];
        $data[5]=$_POST['stat'];
        $obj->setAttrs($conn,'user',$data);
        echo $obj->check_insert_query();
        $obj->insert();
    }
    if(isset($_POST['update'])){
    $id=$_POST['id'];
       $role=$_POST['role'];
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $fname=$_POST['fname'];
        $stat=$_POST['stat'];
        $result = mysqli_query($conn, "UPDATE user SET role='$role',username='$user',password='$pass',fullname='$fname',status='$stat' WHERE iduser =$id") or die(mysqli_error($conn));
        if ($result=== TRUE) {
            header('location:index.php');
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }
 
    }
    
