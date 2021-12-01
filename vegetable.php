<?php include('navbar.php');  ?>

<!--Food Search-->
<section class="Grocery-Search text-center">
    <div class="container">

    </div>
</section>

<section class="GroceryMenu">
    <div class="container">
        <h2 class="text-center decor1">Explore Your Favourite VEGETABLES</h2>
        <?php
        $sql = "SELECT * FROM grocery WHERE active='Yes' AND category_id='1'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
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
                            <img src="<?php echo HOMEPAGE; ?>Images/grocery/<?php echo $image_name; ?>" alt="veggies" class="img-Grocery">
                        <?php
                        }
                        ?>


                    </div>
                    <div class="Food-Menu-info">
                        <h2><?php echo $title; ?></h2>
                        <p class="Grocery-price">₹<?php echo $price; ?>/Kg</p>
                        <p class="Grocery-desc"><?php echo $description; ?></p><br>
                    </div>
                    <a href="#" class="btn btn-Grocery">Order Now</a>
                    <div class="clearfix"></div>
                </div>

        <?php

            }
        } else {
            echo "GROCERY NOT FOUND";
        }




        ?>




        <div class="clearfix"></div>
    </div>
</section>

<?php include('footer.php'); ?>