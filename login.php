<html>

<head>
    <meta charset="UTF-8">
    <title>Login And Registration Form</title>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
    <script src="validate.js"></script>
</head>

<body>
    <div class="bg">
        <section class="Navbar">
            <div class="container">
                <div class="logo">
                    <img src="Images\LOGO.png" alt="Food Logo" class="img">
                </div>
                <div class="Menu text-right">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li>
                            <a href="food.php">Foods</a>
                        </li>

                        <li>
                            <a href="#">About</a>
                        </li>

                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </section>
    </div>
    <div class="Login">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="Login()">Log In</button>
                <button type="button" id="regis" class="toggle-btn" onclick="Register()">Register</button>
            </div>
            <div class="Social-icons">
                <img src="Images/fb.png">
                <img src="Images/tw.png">
                <img src="Images/gp.png">
            </div>
            <form id="Login" name="mylogin" class="input-group" action="login.php" method="POST">
                <input type="text" name="name" class="input-field" placeholder="User Id" required>
                <input type="Password" name="pass" class="input-field" placeholder="Enter Password" required><br /><br />
                <button type="submit" id="btnlogin" class="submit-btn" name="log">Log In</button>
            </form>
            <form id="Register" name="regi" class="input-group" action="login.php" method="POST">
                <input type="text" name="urname" class="input-field" placeholder="User Id" required />
                <input type="email" name="emailid" class="input-field" placeholder="Email Id" required />
                <input type="Password" name="newpass" class="input-field" placeholder="Enter Password" required />
                <input type="Password" name="repass" class="input-field" placeholder="Confirm New Password" required /><br /><br />
                <button type="submit" id="btnregi" class="submit-btn" onclick="register()" name="reg">Register</button>
            </form>
        </div>
        <!--Footer-->
        <section class="Footer">
            <div class="container text-center">
                <p style="color:#FFFFFF">All right reserved, ©2021 <a href="color:#00FF00">Green Cart</a></p>
            </div>
    </div>
    <script>
        var x = document.getElementById("Login");
        var y = document.getElementById("Register");
        var z = document.getElementById("btn");

        function Register() {
            x.style.left = "-400px"
            y.style.left = "50px"
            z.style.left = "110px"
        }

        function Login() {
            x.style.left = "50px"
            y.style.left = "450px"
            z.style.left = "0px"
        }
    </script>
</body>

</html>
<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_database = 'grocery';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['reg'])) {
    $username = $_POST['urname'];
    $pass = $_POST['newpass'];
    $emailid = $_POST['emailid'];

    $sql = "INSERT INTO users (username,password,email_id)VALUES ('$username','$pass','$emailid')";
    if ($conn->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='http://localhost/PANDEY/login.php';
             </SCRIPT>");
    }
}

if (isset($_POST['name'])) {
    $username = $_POST['name'];
    $pass = $_POST['pass'];


    $sql = "select * from users where username ='$username'";
    $result = $conn->query($sql) or die("Unsucess");

    if ($result->num_rows > 0) {
        $r = mysqli_fetch_array($result);
        if ($pass == $r['password']) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Registered');
                window.location.href='http://localhost/PANDEY/index.php';
                </SCRIPT>");
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
             window.alert('UnSuccessfull Login');
                </SCRIPT>");
        }
    } else {
        echo ("<script LANGUAGE='JavaScript'>
             window.alert('You Have not Registered.');
             </script>");
    }
}
$conn->close();
?>