<?php
include('./connection.php');
session_start();
if(isset($_POST['attendance_submit_btn'])){
$view_users_query = "SELECT tbl_student.full_name, tbl_student.student_id, tbl_enrollment.total_class_done, tbl_enrollment.total_present from tbl_student INNER JOIN tbl_enrollment ON (tbl_enrollment.student_id=tbl_student.student_id AND tbl_enrollment.teacher_id='$_SESSION[teacher_id]' AND tbl_enrollment.course_id='$_SESSION[course_id]' AND tbl_enrollment.section_id='$_SESSION[section]')";
$run = mysqli_query( $conn, $view_users_query);

while($attendance_info=mysqli_fetch_array($run)){
  $students=$attendance_info[1];
  $total_class_query="UPDATE tbl_enrollment SET total_class_done=total_class_done+1 WHERE student_id=$students AND section_id='$_SESSION[section]'";
  mysqli_query( $conn, $total_class_query);
}

if(!empty($_POST['attendance_checkbox'])){
    foreach($_POST['attendance_checkbox'] as $student_id){
      $attendance_query="UPDATE tbl_enrollment SET total_present=total_present+1 WHERE student_id=$student_id AND section_id='$_SESSION[section]'";
      mysqli_query( $conn, $attendance_query);
    }
  }
}
?>
