
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <title>The Biltong Pantry</title>
  <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
</head>

<?php
// starts the session
if (!isset($_SESSION)) {
  session_start();
}

// sets the session's cart
if (!(isset($_SESSION['cart']))) {
  $_SESSION['cart'];
}


// when the remove button is pressed in the cart page
if (isset($_POST["trashButton"])) {
  $removeFromCart = $_POST['itemRemoveFromCart'];

  // remove item when remove item button pressed
  if (isset($_POST["trashButton"]) && (!empty($removeFromCart || $removeFromCart == 0))) {
    unset($_SESSION['cart'][$removeFromCart]);

    // display notification
    echo '
  <style>
  #cartRemove{
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
  
  #cartRemove.show {
      visibility: visible;
    }
  </style>

  <html>
    <div id="cartRemove">Product removed from cart!</div>
  </html>

  <script>
  function showNotification() {
    var element = document.getElementById("cartRemove");
    element.className = "show";
    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
  }
  showNotification();
  </script>
  ';
  }
}



// update quantity and remove item when quantity 0
if (isset($_POST["updateItemButton"])) {

  if (isset($_POST["hiddenID"])) {
    $ProID = $_POST['hiddenID'];
    $insertedQuantity = $_POST['quantityInput'];

    // update quantity in array if value is more than 0
    if ($insertedQuantity > 0) {
      $_SESSION['cart'][$ProID]['quantity'] =  $insertedQuantity;

      // notify that the quantity has been updated
      echo '
      <style>
      #cartQuan{
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
      
      #cartQuan.show {
          visibility: visible;
        }
      </style>
    
      <html>
        <div id="cartQuan">Product quantity updated!</div>
      </html>
     
      <script>
      function showNotification() {
        var element = document.getElementById("cartQuan");
        element.className = "show";
        setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
      }
      showNotification();
      </script>
      ';


      // remove product from array if quantity is 0
    } elseif ($insertedQuantity == 0) {
      unset($_SESSION['cart'][$ProID]);

      // notification
      echo '
      <style>
      #cartRem{
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
      
      #cartRem.show {
          visibility: visible;
        }
      </style>
    
      <html>
       <div id="cartRem">Product removed!</div>
      </html>
      
      <script>
      function showNotification() {
        var element = document.getElementById("cartRem");
        element.className = "show";
        setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
      }
      showNotification();
      </script>
      ';

      // display error
    } else {
      echo '
      <style>
      #cartErr{
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
        background-color: rgb(255, 83, 83);
      }
      
      #cartErr.show {
          visibility: visible;
        }
      </style>
    
      <html>
        <div id="cartErr">An error occurred. Please try again!</div>
      </html>

      <script>
      function showNotification() {
        var element = document.getElementById("cartErr");
        element.className = "show";
        setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
      }
      showNotification();
      </script>
      ';
    }
  }
}
?>

<body>
  <nav class="fixedNav">
    <?php
    require "topNavigation.php";
    ?>
  </nav>

  <?php
  // if the cart array is not empty
  if (!empty($_SESSION["cart"])) {
  ?>

    <section id="cartSection">

      <div class="shopping-cart">
        <div class="cartTitle">
        <strong>SHOPPING CART</strong>
        </div>

        <div class="cartButtons">
          <div class="checkoutBtn">
            <a href="checkoutPage.php" class="checkoutP"> <button type="button">Proceed to Checkout</button></a>
          </div>
        </div>

        <?php
        $totalPriceDisplay = 0;
        $totalItemsDisplay = 0;
        if (!empty($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $it => $v) {
            $totalPriceDisplay = $totalPriceDisplay + ($v["quantity"] * $v["productPrice"]);
            $totalItemsDisplay = $totalItemsDisplay + ($v["quantity"]);;
          }
        }
        ?>

        <div class="totalPrice">
          <p>Total: <?= number_format($totalPriceDisplay, 2); ?></p>
        </div>

        <div class="totalItems">
          <p>Total Items: <?= $totalItemsDisplay; ?></p>
        </div>

        <?php
        // display each item in the cart array
        if (isset($_SESSION["cart"])) {
          if (!empty($_SESSION["cart"])) {
            $total = 0;
            foreach ($_SESSION["cart"] as $itm => $val) {
        ?>
              <!-- item in cart -->
              <form class="cartThing" action="cart.php" method="POST">
                <div class="item">

                  <!-- Image of product in cart -->
                  <div class="image">
                    <img src="<?= $val['productImage']; ?>" alt="<?= $val['productDescription']; ?>" id="images" />
                  </div>

                  <!-- Description of product in cart -->
                  <div class="descriptionCart">
                    <span><?php echo $val['productDescription']; ?></span>
                  </div>

                  <!-- Image of product in cart -->
                  <div class="quantity">
                    <p>Quantity:</p>
                    <input type="value" value="<?= $val['quantity']; ?>" name="quantityInput" id="quantityInput">
                    <input type="hidden" name="hiddenID" id="hiddenID" value="<?= $itm ?>" />
                  </div>

                  <!-- Buttons and form inputs -->
                  <button type="submit" class="updateItemButton" name="updateItemButton" id="updateItemButton">Update</button>
                  <div class="total-price">R <?php echo number_format($val["quantity"] * $val["productPrice"], 2); ?></div>
                  <input type="hidden" name="itemRemoveFromCart" id="itemRemoveFromCart" value="<?= $itm ?>">
                  <button class="trashBtn" type="submit" name="trashButton"><i class="fa fa-trash"></i> Remove</button>
                </div>

              </form>
        <?php
              $total = $total + ($val["quantity"] * $val["productPrice"]);
            }
          }
        }
        ?>
      </div>
    </section>

  <?php

    // if the cart is empty
  } else {
    // display empty cart image
    echo '
      <style>
      #cartSection{
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: white;
        margin-top:100px;
      }
    </style>
   
    <html>
      <section id="cartSection">
        <img src="images/emptyCart.jpg" alt = "Image of cart">
      </section>
    </html>
      ';
  }
  ?>

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
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="scripts/menuAnimation.js"></script>


  <!-- Keeps page from refreshing -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>


</body>

</html>