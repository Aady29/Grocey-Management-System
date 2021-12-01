<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="design">
        <div class="container">
            <header>
                <a href="index.html">
                    <h1>Contact Us</h1>
                </a>
                <p>The question of what you want to own is actually the question of how you want to live your life.</p>
            </header>
            <div class="content">
                <div class="content-form">
                    <section>
                        <h2>Address:</h2>
                        <p>
                            GREEN CART<br>
                            Sec-5<br>
                            Ghansoli, 400701.
                        </p>
                    </section>

                    <section>
                        <h2>Phone:</h2>
                        <p>8433524924</p>
                    </section>

                    <section>
                        <h2>E-mail:</h2>
                        <p>Aadarsh@gmail.com</p>
                    </section>
                </div>
            </div>

            <form action="contact.php" class="form" method="post">
                <div class="right">
                    <div class="contact-form">
                        <input type="text" name="full_name" placeholder="FULL NAME" maxlength="20" required><br>
                    </div>
                    <div class="contact-form">
                        <input type="text" name="email" placeholder="EMAIL" maxlength="8" required><br>
                    </div>
                    <div class="contact-form">
                        <input type="text" name="message" placeholder="TYPE YOUR MESSAGE...." required><br>
                    </div>
                    <div class="contact-form">
                        <div class="contact-form">
                            <input type="submit" name="save">
                        </div>
                    </div>
            </form>

        </div>
    </div>
</body>

</html>