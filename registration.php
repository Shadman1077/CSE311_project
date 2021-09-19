<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register your account</title>
    <link rel="stylesheet" href="css/reg.css">
   
  </head>
  <body>
      <center>
          <h3>Student Registration</h3><hr>

          <form  action="signup.php" method="post">
            <table>
              <tr>
                <td><label>Full Name<label></td>
                <td><input type="text" name="fullName" placeholder="Full Name"></td>
              </tr>
              <tr>
                <td><label>Email<label></td>
                <td><input type="email" name="email" placeholder="E-mail"></td>
              </tr>
              <tr>
                <td><label>Password<label></td>
                <td><input type="password" name="password" placeholder="Password"></td>
              </tr>
              <tr>
                <td><label>Phone<label></td>
                <td><input type="text" name="phone" placeholder="Phone"></td>
              </tr>
              <tr>
                <td><label>Date of Birth<label></td>
                <td><input type="date" name="date_of_birth" placeholder="Date of Birth"></td>
              </tr>
              <tr>
                <td><label>Gender<label></td>
                <td><input type="text" name="gender" placeholder="Gender"></td>
              </tr>
              <tr>
                <td><label>Blood Group<label></td>
                <td><input type="text" name="blood_group" placeholder="Blood Group"></td>
              </tr>
              <tr>
                <td><label>Address<label></td>
                <td><input type="text" name="address" placeholder="Address"></td>
              </tr>
              <tr>
                <td><label>Major<label></td>
                <td><input type="text" name="major" placeholder="Major"></td>
              </tr>
              <tr>
                <td><label>Admission Semester<label></td>
                <td><input type="text" name="admission_semester" placeholder="Admission Semester"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="register" value="register" class="student-sign-up"/></td>
              </tr>
            </table>
            Already registered?</br>
          <a href="student_login.php">Sign In</a><br><br>
          </form>
      </center>

  </body>
</html>
