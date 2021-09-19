<!DOCTYPE html>
<html>

<head>
    <title>Profile of Teacher</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        .a{
          margin-right: 10px;
          margin-top: 22px;
        }
        .b{

        }

    </style>
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


    <h3 style="text-align: center;">Profile</h3>
    <div class="box-container">

        <div class="a">
            <img style="align-items: left; width: 200px; height: 200px;"  src="images/img_avatar.png" >
        </div>
        <div class="b">
            <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Teacher's Name</th>
                    <th>Teacher's Designation</th>
                    <th>Depertment</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Address</th>

                  </tr>
                </thead>
                <tbody id="tmp">
                <?php
                include('./connection.php');
                session_start();
                $view_users_query = "SELECT tbl_teacher.*, tbl_department.department_name from tbl_teacher INNER JOIN tbl_department ON (tbl_teacher.department_id=tbl_department.department_id AND tbl_teacher.teacher_id='$_SESSION[teacher_id]')";
                $run = mysqli_query( $conn, $view_users_query);
                while ($row = mysqli_fetch_array($run)) {
                    $teacher_id          =  $row[0];
                    $teacher_name        =  $row[2];
                    $teacher_designation =  $row[3];
                    $department          =  $row[9];
                    $phone               =  $row[4];
                    $email               =  $row[5];
                    $username            =  $row[6];
                    $address             =  $row[8];

                ?>

                <tr>
                  <td><?=$teacher_id;?></td>
                  <td><?=$teacher_name;?></td>
                  <td><?=$teacher_designation;?></td>
                  <td><?=$department;?></td>
                  <td><?=$phone;?></td>
                  <td><?=$email;?></td>
                  <td><?=$username;?></td>
                  <td><?=$address;?></td>
                </tr>

                  <?php
                    }
                  ?>

                </tbody>
              </table>
        </div>
    </div>
</body>
</html>
