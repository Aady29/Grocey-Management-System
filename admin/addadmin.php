<?php include('navbar.php'); ?>

<div class="main-content">
    <div class="design">
        <h1>Add ADMIN</h1>
        <br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>


        <form action="" method="POST">
            <table class="t30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="ENTER YOUR NAME"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="ENTER YOUR USERNAME"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="ENTER YOUR PASSWORD"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="ADD ADMIN" class="btnactiong">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $sql = "INSERT INTO admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        // echo "Data Inserted";
        $_SESSION['add'] = "Admin Added Sucessfully";
        header("location:" . HOMEPAGE . "admin/admin.php");
    } else {
        //echo "Failed To Insert Data";
        $_SESSION['add'] = "Failed To Add ADMIN";
        header("location:" . HOMEPAGE . "admin/addadmin.php");
    }
}

?>