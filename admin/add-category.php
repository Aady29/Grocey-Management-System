<?php include('navbar.php'); ?>


<div class="main-content">
    <div class="design">
        <h1>ADD CATEGORY</h1>

        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <!--Add Category Form starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="t30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>

                        <input type="file" name="Image">

                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No

                    </td>

                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btnactiong">
                    </td>
                </tr>
            </table>


        </form>
        <!-- Add Category Form Ends-->
        <?php

        // check whether the submit button is clicked or not
        if (isset($_POST['submit'])) {

            // echo "Clicked";
            // 1. Get the value from category form
            $title = $_POST['title'];

            //  for radio input type we need to check the button is selected or not.
            if (isset($_POST['featured'])) {
                // get the value from form
                $featured = $_POST['featured'];
            } else {
                // Set the default value
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            // Check whether the image is selected or not and set the value for image name accordingly
            // print_r($_FILES['Image']);

            if (isset($_FILES['Image']['name'])) {
                // Upload the image
                // To upload image we need image name, source path and destination path.
                $Image_name = $_FILES['Image']['name'];

                // Upload the image only if image is selected
                if ($Image_name != "") {

                    // Auto Rename our image
                    // Get the extension of our image (jpg, png, gif,etc)e.g. "vegetable.jpg"
                    $ext = end(explode('.', $Image_name));

                    // Rename the image
                    $Image_name = "Vegetables_category_" . rand(000, 999) . '.' . $ext; //e.g. Vegetable_category_834.jpg

                    $source_path = $_FILES['Image']['tmp_name'];

                    $destination_path = "../Images/category/" . $Image_name;

                    // Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    // check whether the image is uploaded or not
                    // And if image is uploaded then we will stop the process and redirect with error message
                    if ($upload == false) {

                        // Set message
                        $_SESSION['upload'] = "<div> Failed to upload Image. </div>";
                        // Redirect to Add Category Page
                        header('location:' . HOMEPAGE . 'admin/add-category.php');
                        // Stop the process
                        die();
                    }
                }
            } else {
                // Dont upload Image and set the image_name value as blank
                $Image_name = "";
            }

            // die(); //Breaking of code here

            // 2. Create sql query to insert Category into database
            $sql = "INSERT INTO category SET
                title = '$title',
                Image_name = '$Image_name',
                featured= '$featured',
                active= '$active' 
                ";

            // 3. Execute the query and save in database
            $res = mysqli_query($conn, $sql);

            // 4. Check whether the query executed or not and data added or not
            if ($res == true) {
                // Query Executed and Category Added
                $_SESSION['add'] = "<div>Category Added Sucessfully. </div";
                // Redirect to manage category page 
                header('location:' . HOMEPAGE . 'admin/category.php');
            } else {
                // Failed to add category
                $_SESSION['add'] = "<div>Failed To Add Category. </div";
                // Redirect to manage category page 
                header('location:' . HOMEPAGE . 'admin/add-category.php');
            }
        }

        ?>
    </div>

</div>


<?php include('footer.php'); ?>