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
    $data1[0]=null;
    $data1[1]=$_POST["fname"];
    $data1[2]=$_POST["mname"];
    $data1[3]=$_POST["lname"];
    $data1[4]=$_POST["gender"];
    $data1[5]=$_POST["age"];
    $data1[6]=$_POST["email"];
    
    $data1[7]=$_POST["phone"];
    $data1[8]=$_POST["region"];
    $data1[9]=$_POST["town"];
    $data1[10]=$_POST["kebele"];
    $data1[11]=$_POST["house"];
    $data1[12]=$_POST["blood"];
 
    
    $obj->setAttrs($conn,'test',$data1);
    echo $obj->check_insert_query();
    $obj->insert();
    
    }