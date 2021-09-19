<?php
include("connection.php");
if (isset($_POST['register'])) {

  $fullName          = $_POST['fullName'];
  $email             = $_POST['email'];
  $password          = $_POST['password'];
  $phone             = $_POST['phone'];
  $dateOfBirth       = $_POST['date_of_birth'];
  $gender            = $_POST['gender'];
  $bloodGroup        = $_POST['blood_group'];
  $address           = $_POST['address'];
  $major             = $_POST['major'];
  $admissionSemester = $_POST['admission_semester'];

  if ($fullName == '') {
    echo "<script>alert('Please enter the name')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($email == '') {
    echo "<script>alert('Please enter the email')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($password == '') {
    echo "<script>alert('Please enter the password')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($phone == '') {
    echo "<script>alert('Please enter the phone number')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($dateOfBirth == '') {
    echo "<script>alert('Please enter the Date of birth')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($gender == '') {
    echo "<script>alert('Please enter the gender')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($bloodGroup == '') {
    echo "<script>alert('Please enter the blood group')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($address == '') {
    echo "<script>alert('Please enter the address')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($major == '') {
    echo "<script>alert('Please enter the major')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }
  if ($admissionSemester == '') {
    echo "<script>alert('Please enter the admission semester')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }

  $check_email_query = "select * from user where email='$email'";
  if ($run_query =  mysqli_query($conn, $check_email_query))
  {
    echo "<script>alert('Email $email already exist in our database, please try another one!')</script>";
    echo "<script>window.open('registration.php','_self')</script>";
    exit();
  }

  $insert_student_info = "insert into tbl_student (full_name, email, password, phone, date_of_birth, gender, blood_group, address, major, admission_semester)
  value ('$fullName', '$email', '$password', '$phone', '$dateOfBirth', '$gender', '$bloodGroup', '$address', '$major', '$admissionSemester')";

   if(mysqli_query($conn, $insert_student_info)){
     $last_insert_id=mysqli_insert_id($conn);
     session_start();
     $_SESSION['student_id']    = $last_insert_id;
     $_SESSION['student_email'] = $email;
     echo "<script>window.open('add_parent_gurdian_info.php','_self')</script>";
   }

}else {
  echo "<script>window.open('registration.php','_self')</script>";
}

?>
