<?php
// Include config file
include('config.php');

// echo "Delete page";
// check whether the id and Image_name value is set or not
if (isset($_GET['id']) and isset($_GET['Image_name'])) {

    // Get the value and delete
    // echo "Get value and Delete";

    $id = $_GET['id'];
    $Image_name = $_GET['Image_name'];

    // Remove The Physical image file is available

    if ($Image_name != "") {
        // Image is available. so remove it

        $path = "../Images/category/" . $Image_name;
        // Remove the image

        $remove = unlink($path);

        // If failed to remove image then add a error message and stop the process

        if ($remove == false) {
            // Set the session message

            $_SESSION['remove'] = "<div>Failed To Remove Category Image.</div>";
            // Rediect to manage category

            header('location:' . HOMEPAGE . 'admin/category.php');
            // Stop the Process

            die();
        }
    }
    // Delete Data from Database
    // sql query delete data from databse

    $sql = "DELETE FROM category WHERE id = $id";

    // Execute the query

    $res = mysqli_query($conn, $sql);

    // check whether the data is delete from database or not

    if ($res == true) {
        // Set success message and redirect
        $_SESSION['delete'] = "<div> Category Deleted Successfully.</div>";
        // Redirect to manage category
        header('location:' . HOMEPAGE . 'admin/category.php');
    }
} else {
    // Redirect to manage category Page
    header('location:' . HOMEPAGE . 'admin/category.php');
}
