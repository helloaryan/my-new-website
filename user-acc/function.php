<?php 
class MyBank{
    public $time ;
    public $date;
    public $date_time;


	protected $conn;
	private $host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "my_bank2";

	public function __construct(){
		$this->conn = new mysqli($this->host,$this->db_user,$this->db_pass,$this->db_name);
		if($this->conn->connect_error){
			die("You Are Not connected to database");
		}
        date_default_timezone_set("Asia/Kolkata");
		$this->date = date("Y-m-d");
		$this->time = date("H-i-s a");
		$this->date_time = date("Y-m-d H-i-s A"); 
	}


	public function register_user($name,$email,$mobile,$autousername,$autopassword){

  // $sqlexist used to check eamil is already taken or not
  $sqlexist = " SELECT * FROM `users` WHERE `email` = '$email'";
  $result = mysqli_query($conn ,$sqlexist);
  $num_rows = mysqli_num_rows($result);
  if($num_rows>0){
    echo '<div class="alert alert-danger alert-dismissable">email already exist please choose another email adress!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';

	}else{
		
	}



}




if(class_exists('MyBank')){
$object = new MyBank();



}else{
	echo "This class doest not exist" ;
}
?>