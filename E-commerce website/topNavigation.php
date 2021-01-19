<!-- The top navigation differs depending if the user is an administrator, basic customer or not logged in -->

<?php
// starts the session
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION['login_user'])) {

    // navigation bar if user is a customer
    if (($_SESSION['login_userRole']) == "customer") {

?>
        <ul class="company">
            <h1><a href="home.php">The Biltong Pantry</a></h1>
            <figure>
                <img src="images/theBiltongPantryLogo.jpg" alt="The Biltong Pantry Logo">
            </figure>
        </ul>

        <!-- Navigation links on the fixed navigation bar -->
        <ul class="navLinks">
            <li><a href="home.php">HOME</a></li>
            <li><a href="about us.php">ABOUT US</a></li>
            <li><a href="shop.php">SHOP</a></li>
            <li><a href="contact us.php">CONTACT US</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <li><a href="cart.php" class="cart">
                    <i class='fa fa-shopping-cart'></i>
                </a></li>
            <form class="navLogoutClass" name="navLogoutClass" action="logoutProcess.php" method="POST">
                <button type="submit" name="logoutButton">LOGOUT</button>
            </form>
        </ul>

        <!-- Loads an icon library for the drop-down icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Drop-down navigation menu -->
        <div class="topnav">
            <!-- Drop-down menu links (these links are hidden by default) -->
            <div id="myLinks">
                <a href="home.php" class="homeD">HOME</a>
                <a href="about us.php" class="aboutUsD">ABOUT US</a>
                <a href="shop.php" class="shopD">SHOP</a>
                <a href="contact us.php" class="contactUsD">CONTACT US</a>
                <a href="orders.php">MY ORDERS</a>

                <a href="cart.php" class="cartD">
                    <i class='fa fa-shopping-cart'></i>
                </a>

                <form class="navLogoutClass" name="dropNavLogoutClass" action="logoutProcess.php" method="POST">
                    <button type="submit" name="logoutButton">LOGOUT</button>
                </form>
            </div>
            <!-- Drop-down menu icon which is used to toggle the menu links -->
            <a href="javascript:void(0);" class="icon" onclick="menuToggle()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

    <?php
        // navigation bar if user is an administrator
    } elseif (($_SESSION['login_userRole']) == "administrator") {

    ?>
        <ul class="company">
            <h1><a href="home.php">The Biltong Pantry</a></h1>
            <figure>
                <img src="images/theBiltongPantryLogo.jpg" alt="The Biltong Pantry Logo">
            </figure>
        </ul>

        <!-- Navigation links on the fixed navigation bar -->
        <ul class="navLinks">
            <li><a href="home.php">HOME</a></li>
            <li><a href="about us.php">ABOUT US</a></li>
            <li><a href="shop.php">SHOP</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <form class="navLogoutClass" name="dropNavLogoutClass" action="logoutProcess.php" method="POST">
                <button type="submit" name="logoutButton">LOGOUT</button>
            </form>
        </ul>

        <!-- Loads an icon library for the drop-down icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Drop-down navigation menu -->
        <div class="topnav">
            <!-- Drop-down menu links (these links are hidden by default) -->
            <div id="myLinks">
                <a href="home.php" class="homeD">HOME</a>
                <a href="about us.php" class="aboutUsD">ABOUT US</a>
                <a href="shop.php" class="shopD">SHOP</a>
                <a href="orders.php">ORDERS</a>
                <form class="navLogoutClass" name="dropNavLogoutClass" action="logoutProcess.php" method="POST">
                    <button type="submit" name="logoutButton">LOGOUT</button>
                </form>
            </div>

            <!-- Drop-down menu icon which is used to toggle the menu links -->
            <a href="javascript:void(0);" class="icon" onclick="menuToggle()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

    <?php
    }

    // top navigation if user is not logged in
} else {

    ?>
    <ul class="company">
        <h1><a href="home.php">The Biltong Pantry</a></h1>
        <figure>
            <img src="images/theBiltongPantryLogo.jpg" alt="The Biltong Pantry Logo">
        </figure>
    </ul>

    <!-- Navigation links on the fixed navigation bar -->
    <ul class="navLinks">
        <li><a href="home.php">HOME</a></li>
        <li><a href="about us.php">ABOUT US</a></li>
        <li><a href="shop.php">SHOP</a></li>
        <li><a href="contact us.php">CONTACT US</a></li>
        <li><a href="login.php" class="login">
                <i class='fa fa-user'></i>
            </a></li>
        <li><a href="cart.php" class="cart">
                <i class='fa fa-shopping-cart'></i>
            </a></li>
    </ul>
    <!-- Loads an icon library for the drop-down icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Drop-down navigation menu -->
    <div class="topnav">

        <!-- Drop-down menu links (these links are hidden by default) -->
        <div id="myLinks">
            <a href="home.php" class="homeD">HOME</a>
            <a href="about us.php" class="aboutUsD">ABOUT US</a>
            <a href="shop.php" class="shopD">SHOP</a>
            <a href="contact us.php" class="contactUsD">CONTACT US</a>
            <a href="login.php" class="loginD">
                <i class='fa fa-user'></i>
            </a>
            <a href="cart.php" class="cartD">
                <i class='fa fa-shopping-cart'></i>
            </a>
        </div>
        <!-- Drop-down menu icon which is used to toggle the menu links -->
        <a href="javascript:void(0);" class="icon" onclick="menuToggle()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
<?php

}
?>