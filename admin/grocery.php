<?php include('navbar.php'); ?>

<div class="main-content">
    <div class="design">
        <h1>Manage GROCERY</h1>
        <br><br><br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['unaccess'])) {
            echo $_SESSION['unaccess'];
            unset($_SESSION['unaccess']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>
        <br><br><br><br>
        <a href="<?php echo HOMEPAGE; ?>admin/addgrocery.php" class="btnaction">ADD GROCERY</a>
        <br><br><br><br>
        <table class=tbl-full>
            <tr>
                <th>Sr.No</th>
                <th>Title</th>
                <th>₹Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php

            $sql = "SELECT * FROM grocery";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>₹<?php echo $price; ?>/kg</td>
                        <td>
                            <?php
                            if ($image_name == "") {
                                echo "IMAGE NOT ADDED";
                            } else {
                            ?>
                                <img src="<?php echo HOMEPAGE; ?>Images/grocery/<?php echo $image_name; ?>" width="100px">
                            <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td><a href="<?php echo HOMEPAGE; ?>admin/delete-grocery.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class=btnactionr> DELETE GROCERY </a> || <a href="<?php echo HOMEPAGE; ?>admin/update-grocery.php?id=<?php echo $id; ?>" class=btnactiong> UPDATE GROCERY </a></td>
                    </tr>


            <?php
                }
            } else {
                echo "<tr> <td colspan='7'> GROCERY NOT ADDED YET </td> </tr>";
            }

            ?>

        </table>
    </div>

</div>

<?php include('footer.php'); ?>