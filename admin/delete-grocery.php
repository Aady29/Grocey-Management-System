<?php

include('config.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../Images/grocery/" . $image_name;

        $remove = unlink($path);

        if ($remove == false) {
            $_SESSION['upload'] = "FAILED TO REMOVE IMAGE FILE";
            header('location:' . HOMEPAGE . 'admin/grocery.php');
            die();
        }
    }

    $sql = "DELETE FROM grocery WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['delete'] = "FOOD DELETED SUCCESSFULLY...";
        header('location:' . HOMEPAGE . 'admin/grocery.php');
    } else {
        $_SESSION['delete'] = "FAILED TO DELETE FOOD!!!!!";
        header('location:' . HOMEPAGE . 'admin/grocery.php');
    }
} else {
    $_SESSION['unaccess'] = "ACCESS DENIED";
    header('location:' . HOMEPAGE . 'admin/grocery.php');
}
