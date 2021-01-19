<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Biltong Pantry</title>
    <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
// starts the session
if (!isset($_SESSION)) {
    session_start();
}
?>

<body>

    <div id="page">

        <!-- Fixed navigation bar (top of page) -->
        <nav class="fixedNav">
            <?php
            require "topNavigation.php";
            ?>
        </nav>

        <section class="top">
            <div class="fader">
                <img id="f3" src="images/biltongBackground1.jpg" alt="Image of biltong">
                <img id="f2" src="images/dryWorsBackground2.jpg" alt="Image of dryWorsBackground2">
                <img id="f1" src="images/cabanossiBackground3.jpg" alt="Image of cabanossiBackground3">
            </div>
        </section>

        <!-- Content of the home page -->
        <div class="content">
            <div class="mainHeading">
                <div id="welcomeHeading">
                    <strong>WELCOME.</strong>
                </div>
            </div>
            <section class="bottom">


            <div class="productsHeading">
                Popular <strong>products.</strong>
            </div>

            <!-- Products on home page -->
            <figure>
                <img src="images/biltong.jpg" alt="Image of biltong">
                <figcaption>Biltong</figcaption>
                <div class="goToShop"><a href="shop.php">SHOP</a></div>
            </figure>
            <figure>
                <img src="images/biltongBites.jpg" alt="Image of biltong bites">
                 <figcaption>Biltong Bites</figcaption>
                 <div class="goToShop"><a href="shop.php">SHOP</a></div>
            </figure>
            <figure>
                <img src="images/dryWorsHome.jpg" alt="Image of dry wors">
                <figcaption>Dry Wors</figcaption>
                 <div class="goToShop"><a href="shop.php">SHOP</a></div>
            </figure>
            </section>
       </div>
    </div>

    <footer>
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <!-- Social share buttons -->
        <div id="socialDiv">
            <div id="socialDivInner">
                <a href="https://www.facebook.com/share" class="fa fa-facebook"></a>
                <a href="https://twitter.com/share" class="fa fa-twitter"></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="scripts/currentPageHighlight.js"></script>
    <script src="scripts/menuAnimation.js"></script>

</body>

</html>