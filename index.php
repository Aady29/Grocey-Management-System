<?php include('navbar.php');  ?>
<!--Grocery Search-->
<section class="Grocery-Search text-center">
    <div class="container">

    </div>
</section>

<!--Categories-->
<section class="Categories">
    <div class="container ">
        <h2 class="text-center decor">Top Deals!!!</h2>

        <?php
        $sql = "SELECT * FROM category WHERE Active='Yes' AND Featured='Yes' LIMIT 3";

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
                                            echo "IMAGE NOT AVAILABLE";
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
                    } else {
                        echo "CATEGORY NOT ADDED!!..";
                    }
                            ?>
                            <div class="clearfix"></div>
    </div>
</section>

<!--Grocery Menu-->
<section class="GroceryMenu">
    <div class="container">
        <h2 class="text-center decor1">Get Your Favourite Groceries</h2>

        <?php
        $sql2 = "SELECT * FROM grocery WHERE active='Yes' AND featured='Yes' LIMIT 6";

        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];

        ?>
                <div class="Grocery-Menu-box">
                    <div class="Grocery-Menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "IMAGE NOT AVAILABLE";
                        } else {
                        ?>
                            <img src="<?php echo HOMEPAGE; ?>Images/grocery/<?php echo $image_name ?>" alt="Image" class="img-Grocery">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="Grocery-Menu-info">
                        <h2><?php echo $title; ?></h2>
                        <p class="Grocery-price">₹<?php echo $price; ?>/Kg</p>
                    </div>
                    <a href="#" class="btn btn-Grocery">Order Now</a>
                    <div class="clearfix"></div>
                </div>
        <?php
            }
        } else {
            echo "GROCERY NOT AVAILABLE!!!";
        }


        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php include('footer.php'); ?>