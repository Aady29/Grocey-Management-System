<?php include('navbar.php'); ?>

<!---- Grocery search section --->

<section class="GOrder">

    <div class="container">

        <h1 class="text-center text-black"><u><i>Fill this form to confirm your order.</u></h1>
        <form action="#" class="order">
            <fieldset>
                <legend class="text-red">Selected Grocery</legend>

                <div class="Grocery-Menu-img">
                    <img src="Images/vegies/onion.jpg" alt="Chicken Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="Grocery-menu-info">
                    <h3 class="text-black"> Grocery Title</h3>
                    <p class="grocery-price text-black"> $2.3</p>

                    <div class="order-label text-black"> Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>
            </fieldset>

            <fieldset>
                <legend class="text-red">Delivery Details</legend>
                <div class="order-label text-black"> Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label text-black"> Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 8433xxxxx" class=input-responsive" required>

                <div class="order-label text-black"> Email</div>
                <input type="email" name="email" placeholder="E.g. hi@Aady.com" class=input-responsive" required>

                <div class="order-label text-black"> Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class=input-responsive" required></textarea>
                <br><br>
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-action">

            </fieldset>
        </form>

    </div>

</section>
<!-- Grocery sEARCH Section Ends Here -->

<?php include('footer.php'); ?>