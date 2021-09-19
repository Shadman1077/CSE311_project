<?php
session_start();
if(!isset($_SESSION['student_email'])){
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/login.js"></script>

    <link rel="stylesheet" href="css/style.css" />

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-43981329-1']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
        //]]>
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
    <h3>Student Profile</h3>
    <div class="box-container">

        <div class="box-1">
        <img class="propic" src="images/user1.png" ><br>
        <?=$_SESSION['student_email']?>
        </div>
        <div class="box-2">
            <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>

                </thead>
                <tbody id="tmp">
                <?php
                include('./connection.php');
                $view_users_query = "select * from tbl_student where email='$_SESSION[student_email]'";
                $run = mysqli_query( $conn, $view_users_query);
                while ($row = mysqli_fetch_array($run)) {
                    $student_name  =  $row[1];
                    $student_email  =  $row[2];
                ?>

                <tr>
                  <td><?=$student_name;?></td>
                  <td><?=$student_email;?></td>
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
