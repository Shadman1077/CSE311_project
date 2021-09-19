<?php
  include('connection.php');
  session_start();

  $view_users_query = "SELECT tbl_course.course_id, tbl_course.course_code, tbl_course.course_title, tbl_section.section_number, tbl_section.section_id FROM tbl_course INNER JOIN tbl_section ON (tbl_course.course_id=tbl_section.course_id AND tbl_section.teacher_id='$_SESSION[teacher_id]')";
  $run = mysqli_query( $conn, $view_users_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Informations of students</title>
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
                <li><a href="logout.php">Logout</a></li>


            </ul>

        </nav>
    </header>
          <div class="attendance" style="text-align: center">
            <h1>Student Information</h1>
            <section>
               <select class="select" onChange="document.location.href=this.value" style="width: 35%;">
                  <option value="0">Please select a course to see student information</option>
                  <?php
                  while($row = mysqli_fetch_array($run)){
                    $course_id   =$row[0];
                    $course_code =  $row[1];
                    $section     =  $row[3];
                    $section_id  =  $row[4];
                  ?>
                    <option value="view_users.php?course_id=<?php echo $course_id ?>&section=<?php echo $section_id?>"><?php echo $course_code." section-".$section?></option>
                  <?php } ?>
               </select>
            </section>
          </div>
    </body>
</html>
