<?php
  include('connection.php');
  session_start();
  $view_users_query = "SELECT tbl_course.course_code, tbl_course.course_title, tbl_section.section_number FROM tbl_course INNER JOIN tbl_section ON (tbl_course.course_id=tbl_section.course_id AND tbl_section.teacher_id='$_SESSION[teacher_id]')";
  $run = mysqli_query( $conn, $view_users_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mycourses</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/login.js"></script>

    <link rel="stylesheet" href="css/style.css" />

    <style>

        th{
            background-color: black;
        }
        th,td{
            height: 60px;
            width: 10%;
        }
        table, th,td{

            border: 1px solid white;
            border-collapse: collapse;
            text-align: center;
        }
        table{
            width: 80%;
            margin: auto;
        }
        h3{
          text-align:center;
        }
    </style>

</head>
<body class="body">
    <header class="mainheader">
        <img src="images/logo.png">
        <nav>

            <ul>
            <li><a href="profileT.php">Profile</a></li>
                <li><a href="view_users.php">StudentInfo</a></li>
                <li><a href="courseT.php">Mycourses</a></li>
                <li><a href="attendanceT.php">Attandance</a></li>
                <li><a href="grade-submission.php">GradeSubmission</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>

        </nav>
    </header>
    <h1 style="text-align: center;">All Courses</h1>
</br>

            <div>
              <table border="2px">
                <tr>
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Section</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($run)){
                  $course_code  =  $row[0];
                  $course_title =  $row[1];
                  $section      =  $row[2];
                ?>
                <tr>
                  <td><?=$course_code;?></td>
                  <td><?=$course_title;?></td>
                  <td><?=$section;?></td>
                </tr>
              <?php } ?>
              </table>
            </div>

</body>
<!DOCTYPE html>
</html>
