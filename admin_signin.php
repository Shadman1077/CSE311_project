<?php

include("connection.php");
if (isset($_POST['teacher_login_btn'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username  == '') {
    echo "<script>alert('Please enter the username')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
    exit();
  }
  if ($password == '') {
    echo "<script>alert('Please enter the password')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
    exit();
  }

  $check_user = "select * from tbl_teacher where username ='$username' AND password='$password'";

  if(mysqli_query($conn,$check_user )){
    $query=mysqli_query($conn,$check_user );
    if($query){
      $teacher_info=mysqli_fetch_assoc($query);
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['teacher_id'] =$teacher_info['teacher_id'];

      echo "<script>window.open('./profileT.php','_self')</script>";
    }
  }else{
    echo "<script>alert('Email or password is incorrect!')</script>";
    echo "<script>window.open('./admin_login.php','_self')</script>";
  }

}else {
  echo "<script>window.open('./admin_login.php','_self')</script>";
}



?>
