<!-- The orders page's layout differs depending if the user is an administrator, basic customer or not logged in -->

<!DOCTYPE html>
<html lang="en" class="orderHtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Biltong Pantry</title>
    <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
    <style>
        tr:nth-of-type(odd) {
            background-color: #FDF2E9;
        }
    </style>
</head>

<!-- <?php
        // starts the session
        if (!isset($_SESSION)) {
            session_start();
        }

        // used to connect to the database
        include('connection.php');


        // if the current order is clicked/set
        if (isset($_POST["currentOrder"])) {

            $OrderClicked = $_POST["currentOrder"];

            // if delivery progress button pressed
            if (isset($_POST["inProgressButton"])) {
                // update order status
                if ($conn) {
                    $databaseSelection = mysqli_select_db($conn, $database);

                    if ($databaseSelection) {

                        $sqlQuery4 = "UPDATE tbl_order SET orderStatus ='Delivery In Progress'
                                         WHERE orderID = '$OrderClicked'";
                        $result4 = mysqli_query($conn, $sqlQuery4);
                    }
                }
            }


            // if order success button pressed
            if (isset($_POST["successButton"])) {
                // update order status
                if ($conn) {
                    $databaseSelection = mysqli_select_db($conn, $database);

                    if ($databaseSelection) {

                        $sqlQuery4 = "UPDATE tbl_order SET orderStatus ='Success'
                                          WHERE orderID = '$OrderClicked'";
                        $result4 = mysqli_query($conn, $sqlQuery4);
                    }
                }
            }


            // if order canceled button pressed
            if (isset($_POST["cancelOrderButton"])) {
                // update order status
                if ($conn) {
                    $databaseSelection = mysqli_select_db($conn, $database);

                    if ($databaseSelection) {

                        $sqlQuery4 = "UPDATE tbl_order SET orderStatus ='Cancelled'
                                         WHERE orderID = '$OrderClicked'";
                        $result4 = mysqli_query($conn, $sqlQuery4);
                    }
                }
            }
        }
        ?>-->

<body class="orderBody">

    <!-- Fixed navigation bar (top of page) -->
    <nav class="fixedNav">
        <?php
        require "topNavigation.php";
        ?>
    </nav>


    <?php

    // if user logged in
    if (isset($_SESSION['login_user'])) {

        // if user administrator
        if (($_SESSION['login_userRole'] == "administrator")) {
    ?>

            <h1 class="Heading"><strong>ORDERS RECEIVED</strong></h1>

            <!-- customer orders are displayed in table format -->
            <table class="adminOrdersT">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Amount Due</th>
                        <th>Time Added</th>
                        <th>Status</th>
                        <th>Modify Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    // retrieve orders from database
                    $sql5 = "SELECT * FROM tbl_order ORDER BY orderID DESC";
                    $result5 = mysqli_query($conn, $sql5);

                    if ($result5) {

                        // display orders in table format
                        while ($order = mysqli_fetch_assoc($result5)) {
                    ?>
                            <tr>
                                <form action="" method="POST">
                                    <td><?php echo $order["orderID"]; ?></td>

                                    <td><?php echo $order["customerID"]; ?></td>

                                    <td><?php echo $order["orderAmountDue"]; ?></td>

                                    <td><?php echo $order["orderTimestamp"]; ?></td>

                                    <td><?php echo $order["orderStatus"]; ?></td>

                                    <td>
                                        <input type="hidden" name="currentOrder" id="currentOrder" value="<?= $order['orderID']; ?>" />
                                        <button type="submit" name="inProgressButton" id="inProgressButton">In Progress</button>
                                        <button type="submit" name="successButton" id="successButton">Success</button>
                                        <button type="submit" name="cancelOrderButton" id="cancelOrderButton">Cancel Order</button>
                                    </td>

                                </form>
                            </tr>
                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>

        <?php
        }

        // if basic user
        else {

        ?>

            <h1 class="Heading"><strong>ORDER HISTORY</strong></h1>

            <!-- customer order history displayed in table format -->
            <table class="displayTable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Total</th>
                        <th>Time Ordered</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // retrieves logged in user's orders from the database
                    $customerLoggedIn = $_SESSION['login_userID'];

                    $sql5 = "SELECT * FROM tbl_order WHERE customerID = $customerLoggedIn
                                     ORDER BY orderID DESC";

                    $result5 = mysqli_query($conn, $sql5);


                    if ($result5) {

                        // displays order history in table format
                        while ($order = mysqli_fetch_assoc($result5)) {
                    ?>
                            <tr width="10%">
                                <td><?php echo $order["orderID"]; ?></td>

                                <td><?php echo $order["orderAmountDue"]; ?></td>

                                <td><?php echo $order["orderTimestamp"]; ?></td>

                                <td><?php echo $order["orderStatus"]; ?></td>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

    <?php
        }
    }
    ?>

    <br>
    <br>
    <br>
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

    <!-- Keeps page from refreshing -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>