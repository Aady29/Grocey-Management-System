<?php include('navbar.php'); ?>

<div class="main-content">
    <div class="design">
        <h1>DASHBOARD</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br><br>
        <div class="col-4 text-center">
            <h1>VEGETABLE</h1><br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>FRUITS</h1><br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>DRY FRUITS</h1><br />
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>DAILY ESSENTIALS</h1><br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>MILK PRODUCTS</h1><br />
            Categories
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<?php include('footer.php'); ?>