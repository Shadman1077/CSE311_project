<?php
  include('connection.php');
  session_start();
  $view_users_query = "SELECT tbl_course.course_id, tbl_course.course_code, tbl_course.course_title, tbl_section.section_number, tbl_section.section_id FROM tbl_course INNER JOIN tbl_section ON (tbl_course.course_id=tbl_section.course_id AND tbl_section.teacher_id='$_SESSION[teacher_id]')";
  $run = mysqli_query( $conn, $view_users_query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grades of students</title>
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
                <li><a href="view_users.php">Student_info</a></li>
                <li><a href="courseT.php">Mycourses</a></li>
                <li><a href="attendanceT.php">Attandance</a></li>
                <li><a href="grade-submission.php">GradeSubmission</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

        </nav>
    </header>
          <div class="attendance" style="text-align: center">
            <h1>Final grade submission</h1>
            <section>
               <select class="select" onChange="document.location.href=this.value" style="width: 32%;">
                  <option value="0">Please select a course to submit final grade</option>
                  <?php
                  while($row = mysqli_fetch_array($run)){
                    $course_id      =  $row[0];
                    $course_code    =  $row[1];
                    $section        =  $row[4];
                  ?>
                    <option value="submit-final-grade.php?course_id=<?php echo $course_id ?>&section=<?php echo $section?>"><?php echo $course_code." section-".$section?></option>
                  <?php } ?>
               </select>
            </section>
          </div>
    </body>
</html>
