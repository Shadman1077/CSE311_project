<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/js.js="></script>
    <script src="javascript/login.js"></script>

</head>

<body class="body">
    <header class="mainheader">
        <img src="images/logo.png">
        <content id="search">
            <form>
                <input type="text" name="search" placeholder="Search anything..." onclick="window.location.href='search.html'">
            </form>
        </content>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="course.html">Course</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Login</a></li>

            </ul>
        </nav>
    </header>

    <br>
<br>
<br>
<br>
        <center>

        <section>
            <div class="bg"><strong><h3>Please select Any-</h3></strong></div>

            <select onchange="la(this.value)">
               <option disabled selected>Please Select</option>
               <option value="student_login.php">Student</option>
               <option value="teacher_login.php">Teacher</option>

            </select>
            <script type="text/javascript">
                function la(src)
                {
                    window.location=src;
                }


            </script>
         </section>
            </center>
        

<br>
<br>
<br>
<br>

    <footer style="text-align: center;" class="mainFooter">
        <p>Copyright &copy <a href="https://www.facebook.com/profile.php?id=100007900456547">Shanjida Akter & Shadman Shakeeb Khan</a> </p>

            <a href="https://www.facebook.com/profile.php?id=100007900456547">Facebook</a>
            <a href="https://www.instagram.com/shadman_sakeeb_khan/?utm_medium=copy_link&fbclid=IwAR1U9p0AZ_RTAnX0NpHvSo3I_bzzzuW4fWMdN_llLpwW_RL4ylsrXgcYaq4">Instagram</a>


    </footer>


</body>

</html>
