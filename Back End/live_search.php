<?php
  require_once "./connection.php";
  session_start();

  if (isset($_POST['query'])) {
    $q = $_POST['query'];

      $view_users_query= "SELECT tbl_student.full_name, tbl_student.student_id, tbl_student.email, tbl_student.current_status, SUM(tbl_enrollment.gpa), SUM(tbl_enrollment.credit_count), SUM(tbl_enrollment.credit_passed), tbl_student.major FROM tbl_student INNER JOIN tbl_enrollment ON (tbl_student.student_id=tbl_enrollment.student_id AND tbl_enrollment.section_id='$_SESSION[section]') WHERE full_name LIKE '$q%' GROUP BY tbl_student.student_id";
      $result = mysqli_query( $conn, $view_users_query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $Student_name   =  $row[0];
        $Student_id     =  $row[1];
        $email          =  $row[2];
        $current_status =  $row[3];
        if($row[5]==0){$current_cgpa= "-";}
        else{
          $current_cgpa =  ($row[4]*$row[6])/$row[5];
        }

        if($row[6]==0){$credit_passed= "-";}
        else{
          $credit_passed =  $row[6];
        }

        $student_major   =  $row[7];
    ?>

      <tr>
        <td><?=$Student_name;?></td>
        <td><?=$Student_id;?></td>
        <td><?=$email;?></td>
        <td><?=$current_status;?></td>
        <td><?=number_format($current_cgpa, 2);?></td>
        <td><?=$credit_passed;?></td>
        <td><?=$student_major;?></td>

      </tr>

      <?php
        }
      ?>
<?php
    } else {
      echo "<div>User not found</div>";
    }
  }
?>
