<!DOCTYPE html>
<html>

<head>
    <title>Personal & Parents Information</title>


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
        <h4>Personal Information</h4>
        <table>
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Student Phone</th>
                <th>Student Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Address</th>

              </tr>

            </thead>
            <tbody id="tmp">
            <?php
            include('./connection.php');
            session_start();
            $view_users_query = "select * from tbl_student where student_id='$_SESSION[student_id]'";
            $run = mysqli_query( $conn, $view_users_query);
            while ($row = mysqli_fetch_array($run)) {
                $student_name  =  $row[1];
                $student_phone =  $row[4];
                $student_email =  $row[2];
                $date_of_birth =  $row[5];
                $gender        =  $row[6];
                $blood_group   =  $row[7];
                $address       =  $row[8];
            ?>


            <tr>
              <td><?=$student_name;?></td>
              <td><?=$student_phone;?></td>
              <td><?=$student_email;?></td>
              <td><?=$date_of_birth;?></td>
              <td><?=$gender;?></td>
              <td><?=$blood_group;?></td>
              <td><?=$address;?></td>
            </tr>

            <?php
              }
            ?>

            </tbody>
          </table>

        </div>
        <div class="box-2">
            <h4>Parent Information</h4>
            <table>
            <thead>
              <tr>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Guardian's Name</th>
                <th>Phone Number</th>

              </tr>

            </thead>
            <tbody id="tmp">
            <?php
            include('./connection.php');
            $view_users_query = "select * from tbl_parent_gurdian where student_id='$_SESSION[student_id]'";
            $run = mysqli_query( $conn, $view_users_query);
            while ($row  = mysqli_fetch_array($run)) {
                $father  =  $row[2];
                $mother  =  $row[3];
                $gurdian =  $row[4];
                $phone   =  $row[6];

            ?>

            <tr>
              <td><?=$father;?></td>
              <td><?=$mother;?></td>
              <td><?=$gurdian;?></td>
              <td><?=$phone;?></td>
            </tr>

              <?php
                }
              ?>
            </tbody>
          </table>

            </div>


    </div>

</body>
<!DOCTYPE html>
</html>
