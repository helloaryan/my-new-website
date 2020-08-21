<?php 
ob_start();
require_once("user-acc/function.php");
?>
<?php include "header.php";?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $mobile = trim($_POST["mobile"]);
  

  $autousername = trim($_POST['username']);
  $autopassword = trim($_POST['password']);

    $keylength_usernmae = 8;
    $str_username = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randstr_username = str_shuffle($str_username);
    $autousername = substr($randstr_username, 0,$keylength_usernmae);

    $keylength_password = 8;
    $str_password = "1234567890abcdefghijlmnopqrstuv";
    $randstr_password = str_shuffle($str_password);
    $autopassword = substr($randstr_password, 0,$keylength_password);
    $hash = password_hash($autopassword, PASSWORD_DEFAULT);

  if($name == "" || $email == "" || $mobile == ""){
    echo '<div class="alert alert-danger alert-dismissable">Required Fields Can Not Be Empty !<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';

  }elseif(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^",$email) ){
        echo '<div class="alert alert-danger alert-dismissable">Please provide valid Email !<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
  }elseif (!preg_match('/^[0-9]{10}+$/', $mobile)) {
            echo '<div class="alert alert-danger alert-dismissable">Please provide valid Mobile No. !<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
  }elseif (!ctype_alpha(str_replace(" ", "", $name))) {
             echo '<div class="alert alert-danger alert-dismissable">Name must have only alphabates.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                 
        }else{
          $res = $object->register_user($name,$email,$mobile,$autousername,$autopassword);
          if($res){
            echo '<div class="alert alert-success alert-dismissable">Registration Successful !<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
            header('location:register');
          }

        }

}
        


?>


<div class="container my-5">
	<h2 class="text-center">Create An Account</h2>
	<form method="POST" class="w-75 offset-1  bg-light p-2">
  <div class="form-group">
    <label>Full Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="eamil">
  </div>

   <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="number">
  </div>

  
    <input type="hidden" class="form-control" name="username">
    <input type="hidden" class="form-control" name="password">
  

  


  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>
</div>