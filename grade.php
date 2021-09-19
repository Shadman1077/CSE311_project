<!DOCTYPE html>
<html>

<head>
    <title>Grade</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/login.js"></script>

    <link rel="stylesheet" href="css/style.css" />

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
            margin-left: 20px;
            width: 95%;
        }
        p{
            font-size: large;
        }
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
    </header>
<p style="text-align:center;color: white;"> Grade History </p>
                <table >
                    <tr>
                        <th style="color: rgb(255, 255, 255);">Course Code</th>
                        <th style="color: rgb(255, 255, 255);">Course Title</th>
                        <th style="color: rgb(255, 255, 255);">Course Credit</th>
                        <th style="color: rgb(250, 250, 250);">Final Grade</th>
                        <th style="color: rgb(255, 255, 255);">GPA</th>
                        <th style="color: rgb(255, 255, 255);">Credit Count</th>
                        <th style="color: rgb(255, 255, 255);">Credit Passed</th>
                    </tr>


                    <?php
                include('./connection.php');
                session_start();

                $view_users_query = "SELECT tbl_course.course_code, tbl_course.course_title, tbl_course.course_credit, tbl_enrollment.final_grade, tbl_enrollment.gpa, tbl_enrollment.credit_count, tbl_enrollment.credit_passed FROM tbl_course INNER JOIN tbl_section ON tbl_course.course_id=tbl_section.course_id INNER JOIN tbl_enrollment ON (tbl_section.section_id=tbl_enrollment.section_id AND tbl_enrollment.student_id='$_SESSION[student_id]')";
                $run = mysqli_query( $conn, $view_users_query);
                while ($row = mysqli_fetch_array($run)) {
                    $course_code    =  $row[0];
                    $course_title   =  $row[1];
                    $course_credit  =  $row[2];
                    $final_grade    =  $row[3];
                    $gpa            =  $row[4];
                    $credit_count   =  $row[5];
                    $credit_passed  =  $row[6];
                ?>

                <tr>
                  <td><?=$course_code;?></td>
                  <td><?=$course_title;?></td>
                  <td><?=$course_credit;?></td>
                  <td><?=$final_grade;?></td>
                  <td><?=$gpa;?></td>
                  <td><?=$credit_count;?></td>
                  <td><?=$credit_passed;?></td>
                </tr>

                <?php
                  }
                ?>
                </table>
    </body>
</html>
