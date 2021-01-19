<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Biltong Pantry</title>
    <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
</head>

<?php
// starts the session
if (!isset($_SESSION)) {
    session_start();
}
?>

<body class="page">

    <div>

        <!-- Fixed navigation bar (top of page) -->
        <nav class="fixedNav">
            <?php
            require "topNavigation.php";
            ?>
        </nav>

        <div class="Heading"><strong>ABOUT US</strong></div>

        <div class="aboutText">
            The Biltong Pantry is an online biltong and meat product store. It is our mission to supply our clients
            with the highest quality biltong and meat products. With the click of a button, we will arrive at your doorstep
            with the highest quality meat products in the Western Cape.
        </div>

        <div class="aboutWorks">HOW IT WORKS</div>

        <ol class="aboutSteps">
            <li>Login to your account.</li>
            <li>Place your order online.</li>
            <li>The delivery route is planned.</li>
            <li>Your order is delivered.</li>
            <li>Pay for your order on delivery.</li>
        </ol>

        <div class="aboutPrice">
            <strong>Note:</strong> A price-based delivery fee will be automatically added to your order. Orders worth more than
            R800 will have no delivery fee added. Orders worth less than R800 will have a delivery fee of R80 added.
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer>
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <!-- Social media share buttons -->
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
    </div>
</body>

</html>