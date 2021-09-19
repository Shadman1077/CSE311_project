<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header("Location: teacher_login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>User List</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/loginT.js"></script>

    <style>

        th{
            background-color: skyblue;
        }
        th,td{
            height: 100px;
            width: 15%;
        }
        table, th,td{

            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        table{
            width: 100%;
            margin-bottom: 10px;
        }


    </style>
  </head>
  <body class="body">
  <header class="mainheader">
        <img src="./images/logo.png">

        <nav>

        <ul>

                <li><a href="profileT.php">Profile</a></li>
                <li><a href="student_info.php">StudentInfo</a></li>
                <li><a href="courseT.php">Mycourses</a></li>
                <li><a href="attendanceT.php">Attendance</a></li>
                <li><a href="grade-submission.php">GradeSubmission</a></li>
                <li><a href="./logout.php">Logout</a></li>


            </ul>
        </nav>
    <div id="notice"></div>

      <?php
      if(isset($_GET['del'])) {
        echo "<script>$('#notice')
              .show()
              .html('<div>Successfully! <strong> record deleted. </strong> </div>')
              .fadeOut(5000)</script>";
      }
      ?>
      <div>
        <input type="text" name="live_search" id="live_search" autocomplete="off"
          placeholder="Search student...">



      </div>

      <h1 style="text-align:center;">All Enrolled Student</h1>

      <table>
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Current Status</th>
            <th>Current CGPA</th>
            <th>Credit Pass</th>
            <th>Major</th>
          </tr>
        </thead>
        <tbody id="tmp">
        <?php
        include('connection.php');
        $_SESSION['section']=$_GET['section'];
        $view_users_query= "SELECT tbl_student.full_name, tbl_student.student_id, tbl_student.email, tbl_student.current_status, SUM(tbl_enrollment.gpa), SUM(tbl_enrollment.credit_count), SUM(tbl_enrollment.credit_passed), tbl_student.major FROM tbl_student INNER JOIN tbl_enrollment ON (tbl_student.student_id=tbl_enrollment.student_id AND tbl_enrollment.section_id='$_SESSION[section]') GROUP BY tbl_student.student_id";
        $run = mysqli_query( $conn, $view_users_query);
        while ($row = mysqli_fetch_array($run)) {
            $Student_name   =  $row[0];
            $Student_id     =  $row[1];
            $email          =  $row[2];
            $current_status =  $row[3];
            $query="SELECT SUM(tbl_enrollment.gpa*tbl_enrollment.credit_passed), SUM(tbl_enrollment.credit_count), SUM(tbl_enrollment.credit_passed) FROM tbl_enrollment WHERE student_id='$Student_id'";
            $run_query = mysqli_query( $conn, $query);
            $credit_details = mysqli_fetch_array($run_query);
            if($credit_details[1]==0){$current_cgpa= "-";}
            else{
              $current_cgpa =  $credit_details[0]/$credit_details[1];
            }

            if($credit_details[2]==0){$credit_passed= "-";}
            else{
              $credit_passed =  $credit_details[2];
            }

            $student_major  =  $row[4];
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

        </tbody>
        <tbody id="search_result"></tbody>
      </table>

      <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                  $(document).click(function(data) {
                      $("#tmp").hide();
                    });
                    $.ajax({
                        url: 'live_search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {

                            $('#tmp').html("");
                            $('#search_result').html(data);



                        }
                    });
                } else {
                   $('#tmp').css('display', 'none');
                }
            });
        });
    </script>
  </body>
</html>
