<!DOCTYPE html>
<html>

<head>
    <title>General Information</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/login.js"></script>

    <link rel="stylesheet" href="css/style.css" />

    <script >

    </script>
    <style>

        th{
            background-color: black;
        }
        th,td{
            height: 100px;
            width: 15%;
        }
        table, th,td{

            border: 1px solid white;
            border-collapse: collapse;
            text-align: center;
        }
        table{
            width: 100%;
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
                <li><a href="welcome.php">Profile</a></li>
                <li><a href="general.php">GeneralInfo</a></li>
                <li><a href="parent.php">PersonalInfo</a></li>
                <li><a href="attendance.php">Attandance</a></li>
                <li><a href="grade.php">Grade</a></li>
                <li><a href="mail.html">Mail</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>

        </nav>
    </header>

    <div class="box-container">
        <div class="box-1">
            <h3>Profile</h3>
            <img class="propic" src="images/img_avatar.png" >
            <a href="#">193018790</a>

        </div>
        <div class="box-2">
            <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Major</th>
                    <th>Current Status</th>
                    <th>Admission Semester</th>
                    <th>Current CGPA</th>
                    <th>Credit Count</th>
                    <th>Credit Passed</th>
                  </tr>

                </thead>
                <tbody id="tmp">
                <?php
                include('./connection.php');
                session_start();
                $view_users_query = "SELECT tbl_student.*, SUM(tbl_enrollment.gpa*tbl_enrollment.credit_passed), SUM(tbl_enrollment.credit_count), SUM(tbl_enrollment.credit_passed) FROM tbl_student INNER JOIN tbl_enrollment ON (tbl_student.student_id=tbl_enrollment.student_id AND tbl_student.student_id='$_SESSION[student_id]')";
                $run = mysqli_query( $conn, $view_users_query);
                $row = mysqli_fetch_array($run);

                $student_id          =  $row[0];
                $student_name        =  $row[1];
                $major               =  $row[9];
                $current_status      =  $row[10];
                $admission_semester  =  $row[11];

                if($row[13]==0){$total_credit_count  = "-";}
                else{
                  $total_credit_count  = $row[13];
                }

                if($row[14]==0){$total_credit_passed = "-";}
                else{
                  $total_credit_passed = $row[14];
                }
                
                if($total_credit_count==0){$current_cgpa= "-";}
                else{
                  $total_cgpa      = $row[12]/$total_credit_count;
                }
            ?>
        

                <tr>
                  <td><?=$student_id;?></td>
                  <td><?=$student_name;?></td>
                  <td><?=$major;?></td>
                  <td><?=$current_status;?></td>
                  <td><?=$admission_semester;?></td>
                  <td><?=number_format($total_cgpa, 2);?></td>
                  <td><?=$total_credit_count;?></td>
                  <td><?=$total_credit_passed;?></td>
                </tr>
                </tbody>
              </table>
        </div>


    </div>

  </body>
</html>
