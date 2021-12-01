<?php include('config.php'); ?>

<html>

<head>
    <title>Login - Grocery Management System</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body class="bgimage">
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        };

        ?>
        <br><br>
        <!-- login form starts here -->
        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Passsword"><br><br>

            <input type="submit" name="submit" value="Login" class="btnaction">
            <br><br>
        </form>
        <!-- login form ends here -->

    </div>
</body>

</html>
<?php
// Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {

    // Process for login
    // 1. Get the data from login form
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // 2. sql to check whether the user with username and password exists or not
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    // 3. Execute the query
    $res = mysqli_query($conn, $sql);

    // 4. Count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // user available and Login successul
        $_SESSION['login'] = "<div>Login Successful. </div>";
        $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it.
        // Redirect to Homepage
        header('location:' . HOMEPAGE . "admin/");
    } else {

        // user not available and Login fail
        $_SESSION['login'] = "<div class='text-center'>Login Failed. </div>";
        header('location:' . HOMEPAGE . "admin/loginADMIN.php");
    }
}



?>