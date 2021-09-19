var attempt = 3; //Variable to count number of attempts

//Below function Executes on click of login button
function validate() {
    //valid or not
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    //taking password
    if (username == "Shadman" && password == "12345") {
        alert("Login successfully");
        window.location = "success.html";
        return false;
    } else {
        attempt--;
        alert("Incorrect Password !! You have left " + attempt + " attempt;");

        //Disabling fields after 3 attempts
        if (attempt == 0) {
            document.getElementById("username").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("submit").disabled = true;
            return false;
        }
    }
}