<?php include('navbar.php') ?>

<div class="main-content">
    <div class="design">
        <h1>Add GROCERY</h1>

        <br><br>

        <?php

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="t30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the GROCERY">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the GROCERY"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="Price of the GROCERY">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php

                            $sql = "SELECT * FROM category WHERE Active='Yes'";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['Title'];
                            ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">NO CATEGORY FOUND</option>
                            <?php
                            }

                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Grocery" class="btnactiong">
                    </td>
                </tr>


            </table>
        </form>


        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));

                    $image_name = "GROCERY-NAME-" . rand(0000, 9999) . "." . $ext;

                    $src = $_FILES['image']['tmp_name'];

                    $dst = "../Images/grocery/" . $image_name;

                    $upload = move_uploaded_file($src, $dst);

                    if ($upload == false) {
                        $_SESSION['upload'] = "FAILED TO UPLOAD IMAGE!!!";
                        header('location:' . HOMEPAGE . 'admin/addgrocery.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }

            $sql2 = "INSERT INTO grocery SET
                    title = '$title',
                    description ='$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $_SESSION['add'] = "GROCERY ADDED SUCCESSFULLY...";
                header('location:' . HOMEPAGE . 'admin/grocery.php');
            } else {
                $_SESSION['add'] = "FAILED TO ADD GROCERY!!!";
                header('location:' . HOMEPAGE . 'admin/grocery.php');
            }
        }

        ?>

    </div>
</div>


<?php include('footer.php') ?>