
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Biltong Pantry</title>
    <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">

</head>

<!--<?php

    // starts the session
    if (!isset($_SESSION)) {
        session_start();
    }

    // used to connect to the database
    include('connection.php');

    // if the confirm order button is pressed and values are set
    if ((isset($_POST["confirmOrderButton"]))  &&  (isset($_POST["userO"])) &&  (isset($_POST["invoiceTimestamp"])) && (isset($_POST["amountDue"]))) {

        $userI = $_POST["userO"];
        $date = $_POST["invoiceTimestamp"];
        $Due = $_POST["amountDue"];
        $PendingStatus = "Pending";

        // insert order into database
        if ($conn) {
            $databaseSelection = mysqli_select_db($conn, $database);

            if ($databaseSelection) {
                $sqlQ = "INSERT INTO tbl_order(customerID,orderAmountDue,orderTimestamp,orderStatus)
                      VALUES('" . $userI . "', '" . $Due . "', '" . $date . "', '" . $PendingStatus . "')";

                $res = mysqli_query($conn, $sqlQ);

                if ($res) {
                    // gets the logged in user's id
                    $U = $_SESSION['login_userID'];

                    // gets the logged in user's latest order/invoice id
                    $sqlQue = "SELECT MAX(orderID) FROM tbl_order WHERE customerID = '$U'";
                    $r = mysqli_query($conn, $sqlQue);
                    $row = mysqli_fetch_row($r);
                    $latestOrder = $row[0];

                    if ($r) {
                        // newest order retrieved
                        if (isset($_SESSION["cart"])) {
                            if (!empty($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $its => $vls) {

                                    //insert orderID into tbl_order_line in database
                                    $pID  = $vls['productID'];
                                    $quan = $vls['quantity'];

                                    $Q = "INSERT INTO tbl_order_line(orderID,productID,quantity)
                            VALUES('" . $latestOrder . "', '" . $pID . "', '" . $quan . "')";

                                    $ree = mysqli_query($conn, $Q);
                                }
                            }
                        }

                        if ($ree) {

                            // display notification that order has been submitted
                            echo '-->
                   <style>
                   #orderSuccess{
                    z-index: 2;
                    visibility: hidden;
                    min-width: 300px;
                    color: white;
                    font-weight:bold;
                    padding: 20px;
                    position: fixed;
                    margin-left: -150px;
                    left: 50%;
                    bottom: 50px;
                    font-size: 17px;
                    background-color:  rgb(106, 226, 106);
                   }
                   
                   #orderSuccess.show {
                       visibility: visible;
                     }
                   </style>
                 
                   <html>
                     <div id="orderSuccess">Your order has been submitted!</div>
                   </html>

                   <script>
                   function showNotification() {
                    var element = document.getElementById("orderSuccess");
                    element.className = "show";
                    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                  }
                  showNotification();
                   </script>
                   <!--';

                            // remove items from cart
                            unset($_SESSION['cart']);

                        }
                    }
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

    <h1 class="Heading">Your Order</h1>

    <!-- Customer's order is displayed in table format -->
    <table class="checkoutTable">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Details</th>
                <th>Total Price</th>
            </tr>
        </thead>

        <tbody>
            <!-- <?php
                    // display all of the customer's items in cart
                    // product details are retrieved from the cart
                    // the cart retrieved the product details from the database - this is done in the shop.php file
                    if (!empty($_SESSION["cart"])) {
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                    ?>-->
            <tr>
                <td><?php echo $value["productDescription"]; ?></td>
                <td><?php echo $value["quantity"]; ?></td>
                <td>R <?php echo $value["productPrice"]; ?></td>
                <td>R <?php echo number_format($value["quantity"] * $value["productPrice"], 2); ?></td>
            </tr>

            <!--<?php

                            $total = $total + ($value["quantity"] * $value["productPrice"]);
                        }
                        // if order is worth less than R800, add R80 delivery fee
                        if ($total < 800) {
                            $total = $total + 80;
                        }
                ?>-->
            <tr>
                <th colspan="2" style="font-size:20px;">Amount Due: R <?php echo number_format($total, 2); ?></th>
            </tr>
            <tr>
                <th colspan="2" style="background-color:white;">
                    <form action="" method="POST">
                        <a href="cart.php"><button type="button" id="backToCartButton" name="backToCartButton">Back To Cart</button><span style="width: 100px"></span></a>
                        <input type="hidden" name="userO" id="userO" value="<?= $_SESSION['login_userID']; ?>">

                        <!-- Gets the current time of checkout-->
                        <!-- <?php
                                $time = microtime(true);
                                $micro = sprintf("%06d", ($time - floor($time)) * 1000000);
                                $d = new DateTime(date('Y-m-d H:i:s.' . $micro, $time));
                                ?>-->

                        <input type="hidden" name="invoiceTimestamp" id="invoiceTimestamp" value="<?= $d->format("Y-m-d H:i:s.u"); ?>">
                        <input type="hidden" name="amountDue" id="amountDue" value="<?= $total; ?>">

                        <button type="submit" id="confirmButton" name="confirmOrderButton">Confirm Order</button>

                    </form>
                </th>
            </tr>
        <?php
                    }
        ?>
        </tbody>
    </table>

    <footer>
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <div id="socialDiv">
            <div id="socialDivInner">
                <a href="https://www.facebook.com/share" class="fa fa-facebook"></a>
                <a href="https://twitter.com/share" class="fa fa-twitter"></a>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="scripts/menuAnimation.js"></script>

    <!-- Keeps page from refreshing -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>