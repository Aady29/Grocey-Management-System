<?php

include('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if ($res == true) {
    $_SESSION['delete'] = "Admin Deleted Successfully.";
    header('location:' . HOMEPAGE . 'admin/admin.php');
} else {
    $_SESSION['delete'] = "Unable Delete Admin, Try Again.";
    header('location:' . HOMEPAGE . "admin/admin.php");
}
