<?php
  include('connection.php');
  session_start();
  $_SESSION['section']=$_GET['section'];
  $_SESSION['course_id']=$_GET['course_id'];

  $view_users_query= "SELECT tbl_student.full_name, tbl_student.student_id FROM tbl_student INNER JOIN tbl_enrollment ON (tbl_student.student_id=tbl_enrollment.student_id AND tbl_enrollment.section_id='$_SESSION[section]')";
  $run = mysqli_query( $conn, $view_users_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Attandance of students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>



<body class="body">
    <header class="mainheader">
        <img src="images/logo.png">

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
    </header>

      <div >
      <h1 style="text-align: center;">Class Attendence</h1>

      <form action="attendance_complete.php" method="POST">
        <table border="1px" style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th><?php echo date("Y/m/d"); ?></th>
                </tr>
            </thead>
            <tbody>
              <?php
                $i=1;
                while($row = mysqli_fetch_array($run)){
                $student_full_name =  $row[0];
                $student_id        =$row[1];
              ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td class="name-col"><?php echo $student_full_name ?></td>
                    <td class="attend-col"><input type="checkbox" name="attendance_checkbox[]" value="<?php echo $student_id ?>"></td>
                </tr>
              <?php } ?>
              <tr>
                <td colspan="3"><input type="submit" name="attendance_submit_btn" value="Submit Attendance" style="width: 100%;"/></td>
              </tr>
            </tbody>
        </table>
      </form>
      </div>
    </body>
</html>
