<?php
include("connection.php");
if (isset($_POST['login'])) {

  $student_email =  $_POST['email'];
  $password  = $_POST['pass'];

  if ($student_email == '') {
    echo "<script>alert('Please enter the email')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }
  if ($password == '') {
    echo "<script>alert('Please enter the password')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }

  $check_user = "select * from tbl_student where email ='$student_email' AND password='$password'";

  if(mysqli_query($conn,$check_user)){
    $query = mysqli_query($conn,$check_user);
    $student_info=mysqli_fetch_assoc($query);
    
    if($student_info){
    session_start();
    $_SESSION['student_email'] = $student_email;
    $_SESSION['student_id']    = $student_info['student_id'];

    echo "<script>window.open('welcome.php','_self')</script>";
  }
  }else{
    echo "<script>alert('Email or password is incorrect!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }

}else {
  echo "<script>window.open('index.php','_self')</script>";
}



?>
