<?php
  include('./connection.php');
  session_start();
  if(isset($_POST['grade_submit_btn'])){

    foreach($_POST['grade'] as $grade){
      $var=explode("_", $grade);
      $grade_submit_sql= "Update tbl_enrollment SET final_grade='$var[0]', gpa='$var[2]', credit_count='$var[3]' WHERE student_id='$var[1]' AND section_id='$_SESSION[section]'";
      mysqli_query( $conn, $grade_submit_sql);

      $credit_passed_sql= "Update tbl_enrollment SET credit_passed='$var[3]' WHERE student_id='$var[1]' AND '$var[0]'!='F' AND section_id='$_SESSION[section]'";
      mysqli_query( $conn, $credit_passed_sql);
    }
  }
?>
