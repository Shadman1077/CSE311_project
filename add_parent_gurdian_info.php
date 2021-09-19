<?php
  session_start();
  include("connection.php");
  if(isset($_POST['parent_gurdian_info_btn'])){
    $father  =  $_POST['father'];
    $mother  =  $_POST['mother'];
    $gurdian = $_POST['gurdian'];
    $phone   =  $_POST['phone'];

    if ($father == '') {
      echo "<script>alert('Please enter the father's name')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
      exit();
    }
    if ($mother == '') {
      echo "<script>alert('Please enter the mother's name')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
      exit();
    }
    if ($gurdian == '') {
      echo "<script>alert('Please enter the gurdian's name')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
      exit();
    }
    if ($phone == '') {
      echo "<script>alert('Please enter the gurdian's phone number')</script>";
      echo "<script>window.open('registration.php','_self')</script>";
      exit();
    }

    $insert_parent_gurdian_info = "insert into tbl_parent_gurdian (student_id, father, mother, gurdian, email, phone)
    value ('$_SESSION[student_id]', '$father', '$mother', '$gurdian', '$email', '$phone')";

     if(mysqli_query($conn, $insert_parent_gurdian_info)){
       echo "<script>window.open('welcome.php','_self')</script>";
     }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register your account</title>
    <link rel="stylesheet" href="css/reg.css">
		</style>
  </head>
  <body>
      <center>
          <h3>Add parent and gurdian info</h3>
          <form  action="" method="post">
            <table>
              <tr>
                <td><label>Father's Name<label></td>
                <td><input type="text" name="father" placeholder="Enter Father's Name"></td>
              </tr>
              <tr>
                <td><label>Mother's Name<label></td>
                <td><input type="text" name="mother" placeholder="Enter mother's Name"></td>
              </tr>
              <tr>
                <td><label>Gurdian's Name<label></td>
                <td><input type="text" name="gurdian" placeholder="Enter gurdian's Name"></td>
              </tr>
              <tr>
                <td><label>Gurdian's Phone<label></td>
                <td><input type="text" name="phone" placeholder="Enter gurdian's phone number"></td>
              </tr>
                <td colspan="2"><input type="submit" name="parent_gurdian_info_btn" value="Submit parent and gurdian info" class="student-sign-up"/></td>
              </tr>
            </table>
          </form>
      </center>

  </body>
</html>
