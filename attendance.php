<?php
  include('./connection.php');
  session_start();

  $view_users_query = "SELECT tbl_course.course_code, tbl_course.course_title, tbl_section.section_number, tbl_enrollment.total_class_done, tbl_enrollment.total_present FROM tbl_course INNER JOIN tbl_section ON tbl_course.course_id=tbl_section.course_id INNER JOIN tbl_enrollment ON (tbl_section.section_id=tbl_enrollment.section_id AND tbl_enrollment.student_id='$_SESSION[student_id]')";
  $run = mysqli_query( $conn, $view_users_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Give Your Attendence</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">



    <style>
        h1{
            text-align: center;
        }
        table, th, td{
          text-align: center;
          border: 1px solid white;
        }
        th{background-color: #6C7A81;}
    </style>

</head>
<body class="body">
    <header class="mainheader">
        <img src="images/logo.png">
        <nav>
        <ul>
                <li><a href="welcome.php">Home</a>
                    <li><a href="">Profile</a>
                        <div class=sub-menu>
                        <ul>
                            <li><a href="general.php">StudentInfo</a></li>
                            <li><a href="parent.php">PersonalInfo</a></li>
                        </ul>
                        </div>
    
                    </li>
                    <li><a href="attendance.php">Attandance</a></li>
                    <li><a href="grade.php">Grade</a></li>
                    <li><a href="mail.html">Mail</a></li>
                    <li><a href="logout.php">Logout</a></li>
    
                </ul>

        </nav>

        <h1>Class Attendence</h1>
        <center>
        <table>
          <tr>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Section</th>
            <th>Total Class Done</th>
            <th>Total Present</th>
            <th>Total Absent</th>
          </tr>
          <?php
          while($attendance_info=mysqli_fetch_array($run)){?>
          <tr>
            <td><?php echo $attendance_info[0];?></td>
            <td><?php echo $attendance_info[1];?></td>
            <td><?php echo $attendance_info[2];?></td>
            <td><?php echo $attendance_info[3];?></td>
            <td><?php echo $attendance_info[4];?></td>
            <td><?php echo $attendance_info[3]-$attendance_info[4];?></td>
          </tr>
        <?php }?>
        </table>
        <center>
</body>

</html>
