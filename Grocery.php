<?php include('navbar.php'); ?>
<section class="Categories">
    <div class="container ">
        <h2 class="text-center decor">Categories</h2>


        <?php
        $sql = "SELECT * FROM category WHERE Active='Yes'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['Title'];
                $image_name = $row['Image_name'];
                if ($title == 'VEGETABLES') {
        ?><a href="<?php echo HOMEPAGE; ?>vegetable.php">
                    <?php
                }
                if ($title == 'FRUITS') {
                    ?><a href="<?php echo HOMEPAGE; ?>fruit.php">
                        <?php
                    }
                    if ($title == 'DRY FRUITS') {
                        ?><a href="<?php echo HOMEPAGE; ?>dryfruit.php">
                            <?php
                        }
                        if ($title == 'DAILY ESSENTIALS') {
                            ?><a href="<?php echo HOMEPAGE; ?>essential.php">
                                <?php
                            }
                            if ($title == 'DAIRY PRODUCTS') {
                                ?><a href="<?php echo HOMEPAGE; ?>dairy.php">
                                    <?php
                                }
                                    ?>
                                    <div class="Box float-img">
                                        <?php
                                        if ($image_name == "") {
                                            echo "IMAGE NOT FOUND.";
                                        } else {
                                        ?>
                                            <img src="<?php echo HOMEPAGE; ?>Images/category/<?php echo $image_name; ?>" alt="category" class="img">
                                        <?php
                                        }
                                        ?>

                                        <h1 class="text-center float-text"><?php echo $title; ?></h1>
                                    </div>
                                    </a>
                            <?php
                        }
                    }

                            ?>

                            <div class="clearfix"></div>
    </div>
</section>
<?php include('footer.php'); ?>