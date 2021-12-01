<?php include('navbar.php'); ?>

<div class="main-content">
    <div class="design">
        <h1>Manage CATEGORY</h1>
        <br>
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['no-category-found'])) {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['failed- remove'])) {
            echo $_SESSION['failed- remove'];
            unset($_SESSION['failed- remove']);
        }


        ?>
        <br><br><br><br>


        <a href="<?php echo HOMEPAGE; ?>admin/add-category.php" class="btnaction">ADD CATEGORY</a>
        <br /><br />
        <table class=tbl-full>
            <tr>
                <th>Sr.No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM category";

            // Execute Query
            $res = mysqli_query($conn, $sql);

            // count rows
            $count = mysqli_num_rows($res);

            $sn = 1;

            // check whether we have data in database or not
            if ($count > 0) {

                // we have data in database
                // get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['Title'];
                    $Image_name = $row['Image_name'];
                    $featured = $row['Featured'];
                    $active = $row['Active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php
                            // Check whether image name is available or not
                            if ($Image_name != "") {
                                // Display the Image
                            ?>
                                <img src="<?php echo HOMEPAGE; ?>Images/category/<?php echo $Image_name; ?>" width="100px ">

                            <?php

                            } else {
                                // Display the message
                                echo "<div>Image Not Added.</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td><a href="<?php echo HOMEPAGE; ?>admin/delete-category.php?id=<?php echo $id; ?>&Image_name=<?php echo $Image_name; ?>" class=btnactionr> DELETE CATEGORY </a> ||
                            <a href="<?php echo HOMEPAGE; ?>admin/update-category.php?id=<?php echo $id; ?>&Image_name=<?php echo $Image_name; ?>" class=btnactiong> UPDATE CATEGORY </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                // we do not have data
                // we'll display the message inside table
                ?>

                <tr>
                    <td colspan="6">
                        <div>No Category Added.</div>
                    </td>
                </tr>
            <?php
            }

            ?>


        </table>
    </div>

</div>

<?php include('footer.php'); ?>