<?php include('navbar.php'); ?>
<div class="main-content">
    <div class="design">
        <h1>Admin Management</h1>
        <br /><br />
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br /><br /><br>

        <a href="addadmin.php" class="btnaction">ADD </a>
        <br /><br />
        <table class=tbl-full>
            <tr>
                <th>Sr.No</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php

            $sql = "SELECT * FROM admin";

            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                $count = mysqli_num_rows($res);

                $sn = 1;

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><a href="<?php echo HOMEPAGE; ?>admin/update-password.php?id=<?php echo $id; ?>" class=btnactionr> Change Password</a> || <a href="<?php echo HOMEPAGE; ?>admin/deleteadmin.php?id=<?php echo $id; ?>" class=btnactionr> DELETE </a> || <a href="<?php echo HOMEPAGE; ?>admin/updateadmin.php?id=<?php echo $id; ?>" class=btnactiong> UPDATE </a></td>
                        </tr>
            <?php

                    }
                } else {
                }
            }

            ?>

        </table>
    </div>
</div>
<div class="clearfix"></div>


<?php include('footer.php'); ?>