<!-- The shop page's layout differs depending if the user is an administrator, basic customer or not logged in -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>The Biltong Pantry</title>
  <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
  <!-- changes colour of every second table row -->
  <style>
    tr:nth-of-type(odd) {
      background-color: #FDF2E9;
    }
  </style>
</head>


<!--<?php

    // starts the session
    if (!isset($_SESSION)) {
      session_start();
    }

    // used to connect to the database
    include('connection.php');

    // ------------------------------------------------------------------------------------------------------------
    // Add product to cart
    // ------------------------------------------------------------------------------------------------------------

    // if add to cart button is pressed
    // add product to cart
    if ((isset($_POST["addToCartButton"]))  &&  (isset($_POST["productAddToCart"]))) {

      $addToCartProduct = $_POST["productAddToCart"];

      if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "productID");

        if (!in_array($addToCartProduct, $item_array_id)) {
          $count = count($_SESSION["cart"]);
          $item_array = array(
            //array             names
            'productID' => $addToCartProduct,
            'productDescription' => $_POST["hiddenDescription"],
            'productPrice' => $_POST["hiddenProductPrice"],
            'quantity' => $_POST["quantityInsert"],
            'productImage' => $_POST["hiddenProductImage"],
            'userID'   => $_POST["userIDInsert"],
          );

          $_SESSION["cart"][$count] = $item_array;


          // notification saying that product is added to cart
          echo '-->
                <style>
                #snackDSS{
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
                  background-color: rgb(106, 226, 106);
                }
                
                #snackDSS.show {
                    visibility: visible;
                  }
                </style>
             
                <html>
                    <div id="snackDSS">Added to cart!</div>
                </html>

                <script>
                function showNotification() {
                  var element = document.getElementById("snackDSS");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
                </script>
                <!--';

          // if product is already in cart
          // display error
        } else {
          echo '-->
                <style>
                #snackDE{
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
                
                #snackDE.show {
                    visibility: visible;
                  }
                </style>
             
                <html>
                  <div id="snackDE">Already added to cart!</div>
                </html>

                <script>
                function showNotification() {
                  var element = document.getElementById("snackDE");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
                </script>
                <!--';
        }

        // set cart
      } else {
        $item_array = array(
          'productID' => $addToCartProduct,
          'productDescription' => $_POST["hiddenDescription"],
          'productPrice' => $_POST["hiddenProductPrice"],
          'quantity' => $_POST["quantityInsert"],
          'productImage' => $_POST["hiddenProductImage"],
          'userID'   => $_POST["userIDInsert"],
        );

        $_SESSION["cart"][0] = $item_array;
      }
    }



    // ------------------------------------------------------------------------------------------------------------
    // Edit product in database
    // ------------------------------------------------------------------------------------------------------------


    // if the required values are set
    if ((isset($_POST["productToBeEdited"])) && (isset($_POST["editProductDescription"]))
      && (isset($_POST["editProductPrice"])) && (isset($_POST["dateEdit"]))
    ) {


      $EditProduct = $_POST["productToBeEdited"];
      $UpdatedProductDesc = $_POST["editProductDescription"];
      $UpdatedProductPrice = $_POST["editProductPrice"];
      $CurrentD = $_POST["dateEdit"];
      $UpdatedImageFile = "images/" . basename($_FILES["replacementImage"]["name"]);
      $uploadStatus2 = 1;
      $imageFileType2 = strtolower(pathinfo($UpdatedImageFile, PATHINFO_EXTENSION));




      // if submit changes button is pressed
      if (isset($_POST["submitChanges"])) {

        // if an image is selected
        if (isset($_FILES['replacementImage']) && !empty($_FILES['replacementImage']['name'])) {

          // check if file is an image
          $checks = getimagesize($_FILES["replacementImage"]["tmp_name"]);
          // if file not an image
          if ($checks == false) {
            $uploadStatus2 = 0;
          }


          // if image already exists
          if (file_exists($UpdatedImageFile)) {
            // display notification
            echo '-->
              <style>
              #imageExists{
                z-index: 2;
                visibility: hidden;
                min-width: 300px;
                color: white;
                font-weight:bold;
                padding: 20px;
                position: fixed;
                margin-left: -150px;
                left: 50%;
                bottom: 120px;
                font-size: 17px;
                background-color: rgb(255, 83, 83);
              }
  
              #imageExists.show {
                 visibility: visible;
              }
              </style>

              <html>
                  <div id="imageExists">Image already exists!</div>
              </html>

              <script>
              function showNotification() {
                var element = document.getElementById("imageExists");
                element.className = "show";
                setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
              }
              showNotification();
              </script>
              <!--
              ';

            // set upload status to 0
            $uploadStatus2 = 0;
          }


          // check the size of the image
          // 10 Megabytes limit on each image
          if ($_FILES["replacementImage"]["size"] > 10485760) {

            echo '-->
            <style>
            #imageLarge{
              z-index: 2;
              visibility: hidden;
              min-width: 300px;
              color: white;
              font-weight:bold;
              padding: 20px;
              position: fixed;
              margin-left: -150px;
              left: 50%;
              bottom: 120px;
              font-size: 17px;
              background-color: rgb(255, 83, 83);
            }
      
            #imageLarge.show {
               visibility: visible;
            }
           </style>
    
            <html>
                 <div id="imageLarge">Image is too large!</div>
            </html>

            <script>
                function showNotification() {
                  var element = document.getElementById("imageLarge");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
            </script>
            <!--
            ';

            // set upload status to 0
            $uploadStatus2 = 0;
          }

          // check the image type
          // if image not jpg, png or jpeg display error
          if ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {

            //error
            echo '-->
            <style>
            #imageType{
              z-index: 2;
              visibility: hidden;
              min-width: 300px;
              color: white;
              font-weight:bold;
              padding: 20px;
              position: fixed;
              margin-left: -150px;
              left: 50%;
              bottom: 120px;
              font-size: 17px;
              background-color: rgb(255, 83, 83);
              }
  
               #imageType.show {
               visibility: visible;
             }
             </style>

             <html>
              <div id="imageType">Please select a JPG, JPEG or PNG file.</div>
             </html>

             <script>
             function showNotification() {
              var element = document.getElementById("imageType");
              element.className = "show";
              setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
             }
              showNotification();
             </script>
             <!--
             ';

            // update upload status
            $uploadStatus2 = 0;
          }

          // if upload status is not 0
          // upload product details to database
          if ($uploadStatus2 != 0) {

            // move image to desination
            move_uploaded_file($_FILES["replacementImage"]["tmp_name"], $UpdatedImageFile);


            if ($conn) {
              $databaseSelection = mysqli_select_db($conn, $database);

              if ($databaseSelection) {

                // update product in database
                $sqlQuery2 = "UPDATE tbl_product SET productDescription ='$UpdatedProductDesc', 
                                productPrice ='$UpdatedProductPrice', productImage ='$UpdatedImageFile', 
                                productDateEdited = '$CurrentD'
                                WHERE productID = '$EditProduct'";

                $result2 = mysqli_query($conn, $sqlQuery2);

                if ($result2) {

                  // display notification
                  echo '-->
                  <style>
                  #updatedPr{
                    z-index: 2;
                    visibility: hidden;
                    min-width: 300px;
                    color: white;
                    font-weight:bold;
                    padding: 20px;
                    position: fixed;
                    margin-left: -150px;
                    left: 50%;
                    bottom: 120px;
                    font-size: 17px;
                    background-color: rgb(255, 83, 83);
                   }
        
                   #updatedPr.show {
                      visibility: visible;
                    }
                  </style>
     
                  <html>
                       <div id="updatedPr">Product updated!</div>
                  </html>

                  <script>
                  function showNotification() {
                    var element = document.getElementById("updatedPr");
                    element.className = "show";
                    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                  }
                  showNotification();
                  </script>
                  <!--
                  ';
                }

                // if product is not updated
                else {
                  //show error
                  echo '-->
                    <style>
                    #productUpError{
                         z-index: 2;
                         visibility: hidden;
                         min-width: 300px;
                         color: white;
                         font-weight:bold;
                         padding: 20px;
                         position: fixed;
                         margin-left: -150px;
                         left: 50%;
                         bottom: 120px;
                         font-size: 17px;
                         background-color: rgb(255, 83, 83);
                        }
        
                     #productUpError.show {
                        visibility: visible;
                        }
                  
                     </style>
      
                      <html>
                            <div id="productUpError">The product could not be updated!</div>
                      </html>
       
                       <script>
                       function showNotification() {
                        var element = document.getElementById("productUpError");
                        element.className = "show";
                        setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                      }
                      showNotification();
                       </script>
                       <!--';
                }
              }
            }
          }

          // if image not selected
        } else {

          if ($conn) {
            $databaseSelection = mysqli_select_db($conn, $database);

            if ($databaseSelection) {

              // update product
              $sq = "UPDATE tbl_product SET productDescription ='$UpdatedProductDesc', 
                          productPrice ='$UpdatedProductPrice', productDateEdited = '$CurrentD'
                           WHERE productID = '$EditProduct'";

              $rt = mysqli_query($conn, $sq);

              if ($rt) {

                // display notification
                echo '-->
                <style>
                 #updatedPr{
                  z-index: 2;
                  visibility: hidden;
                  min-width: 300px;
                  color: white;
                  font-weight:bold;
                  padding: 20px;
                  position: fixed;
                  margin-left: -150px;
                  left: 50%;
                  bottom: 120px;
                  font-size: 17px;
                  background-color: rgb(106, 226, 106);
                  }
        
                #updatedPr.show {
                     visibility: visible;
                  }
                </style>
     
                <html>
                    <div id="updatedPr">Product updated!</div>
                </html>

                <script>
                function showNotification() {
                  var element = document.getElementById("updatedPr");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
                </script>

                <!--';
              }

              // if product could not be updated
              else {
                //show error
                echo '-->
           
                <style>
            
                #productUpError{
                  z-index: 2;
                  visibility: hidden;
                  min-width: 300px;
                  color: white;
                  font-weight:bold;
                  padding: 20px;
                  position: fixed;
                  margin-left: -150px;
                  left: 50%;
                  bottom: 120px;
                  font-size: 17px;
                  background-color: rgb(255, 83, 83);
                }
        
                #productUpError.show {
                  visibility: visible;
                }
          
                </style>
      
                <html>
                     <div id="productUpError">The product could not be updated!</div>
                </html>
       
                <script>
                function showNotification() {
                  var element = document.getElementById("productUpError");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
                </script>
                <!--';
              }
            }
          }
        }
      }
    }








    /// -----------------------------------------------------------------------------------------------------------
    // Add new product to database
    // ------------------------------------------------------------------------------------------------------------


    // if save product button is pressed and updated product details are set
    if ((isset($_POST['saveProduct'])) && (isset($_POST["newProductPrice"])) && (isset($_POST["newProductDescription"]))
      && (isset($_POST["dateAdded"]))
      && (isset($_POST["dateEdited"])) && (isset($_SESSION['login_userID']))
    ) {

      $NewProductDesc = $_POST["newProductDescription"];
      $NewProductPrice = $_POST["newProductPrice"];
      $DateAdded = $_POST["dateAdded"];
      $DateOfEdit = $_POST["dateEdited"];
      $managerAdded = $_SESSION['login_userID'];

      // if an image is selected
      if (isset($_FILES["imageToUpload"])) {

        $targetImageFile = "images/" . basename($_FILES["imageToUpload"]["name"]);

        // set upload status to 1
        $uploadStatus = 1;
        $imageFileType = strtolower(pathinfo($targetImageFile, PATHINFO_EXTENSION));
      }


      // check if file is an image
      $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
      if ($check == false) {
        // if not an image
        // set upload status to 0
        $uploadStatus = 0;
      }

      // check if the image already exists
      if (file_exists($targetImageFile)) {

        // display error if image exists

        echo '-->
  
        <style>
  
        #imageExists{
          z-index: 2;
          visibility: hidden;
          min-width: 300px;
          color: white;
          font-weight:bold;
          padding: 20px;
          position: fixed;
          margin-left: -150px;
          left: 50%;
          bottom: 120px;
          font-size: 17px;
          background-color: rgb(255, 83, 83);
        }
  
        #imageExists.show {
          visibility: visible;
        }
        </style>

        <html>
              <div id="imageExists">Image already exists!</div>
        </html>

  
        <script>
        function showNotification() {
          var element = document.getElementById("imageExists");
          element.className = "show";
          setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
        }
        showNotification();
        </script>
        <!--';

        // change upload status to 0
        $uploadStatus = 0;
      }


      // check the size of the image
      // 10 Megabytes limit on each image
      // if image larger than 10 Megabytes
      if ($_FILES["imageToUpload"]["size"] > 10485760) {

        // display error
        echo '-->
     
        <style>
        #imageLarge{
          z-index: 2;
          visibility: hidden;
          min-width: 300px;
          color: white;
          font-weight:bold;
          padding: 20px;
          position: fixed;
          margin-left: -150px;
          left: 50%;
          bottom: 120px;
          font-size: 17px;
          background-color: rgb(255, 83, 83);
        }
      
        #imageLarge.show {
          visibility: visible;
        }
        </style>
    
        <html>
            <div id="imageLarge">Image is too large!</div>
        </html>

         <script>
         function showNotification() {
          var element = document.getElementById("imageLarge");
          element.className = "show";
          setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
         }
         showNotification();
        </script>
         <!-- ';

        // change upload status
        $uploadStatus = 0;
      }

      // check the image type
      // only jpg, png and jpeg images are allowed
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

        // display error
        echo '-->
    
        <style>
    
        #imageType{
          z-index: 2;
          visibility: hidden;
          min-width: 300px;
          color: white;
          font-weight:bold;
          padding: 20px;
          position: fixed;
          margin-left: -150px;
          left: 50%;
          bottom: 120px;
          font-size: 17px;
          background-color: rgb(255, 83, 83);
        }
    
        #imageType.show {
          visibility: visible;
        }
    
        </style>
  
        <html>
              <div id="imageType">Please select a JPG, JPEG or PNG file.</div>
        </html>

        <script>
        function showNotification() {
          var element = document.getElementById("imageType");
          element.className = "show";
          setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
        }
        showNotification();
        </script>
        <!--';
        // update upload status
        $uploadStatus = 0;
      }

      // if upload status is not 0
      // upload product details to database
      if ($uploadStatus != 0) {

        // move image to destination folder
        move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $targetImageFile);
        if ($conn) {
          $databaseSelection = mysqli_select_db($conn, $database);

          if ($databaseSelection) {

            // insert into database
            $sqlQuery = "INSERT INTO tbl_product(managerID,productDescription,productPrice,productImage,productDateAdded,productDateEdited)
                       VALUES('" . $managerAdded . "', '" . $NewProductDesc . "', '" . $NewProductPrice . "', 
                                  '" . $targetImageFile . "', '" . $DateAdded . "', '" . $DateOfEdit . "')";

            $result = mysqli_query($conn, $sqlQuery);

            // success notification
            if ($result) {
              echo '-->
              <style>
              #newPr{
                z-index: 2;
                visibility: hidden;
                min-width: 300px;
                color: white;
                font-weight:bold;
                padding: 20px;
                position: fixed;
                margin-left: -150px;
                left: 50%;
                bottom: 120px;
                font-size: 17px;
                background-color: rgb(106, 226, 106);
              }
            
              #newPr.show {
                visibility: visible;
              }
           
              </style>

              <html>
                    <div id="newPr">New product added!</div>
              </html>

              <script>
              function showNotification() {
                var element = document.getElementById("newPr");
                element.className = "show";
                setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
              }
              showNotification();
              </script>
              <!--';
            }
            // display error if product could not be updated
            else {
              echo '-->
            
              <style>
            
              #productAddError{
                z-index: 2;
                  visibility: hidden;
                  min-width: 300px;
                  color: white;
                  font-weight:bold;
                  padding: 20px;
                  position: fixed;
                  margin-left: -150px;
                  left: 50%;
                  bottom: 120px;
                  font-size: 17px;
                  background-color: rgb(255, 83, 83);
              }
            
              #productAddError.show {
                visibility: visible;
              }
           
              </style>
          
              <html>
                     <div id="productAddError">The product could not be added!</div>
              </html>

              <script>
              function showNotification() {
                var element = document.getElementById("productAddError");
                element.className = "show";
                setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
              }
              showNotification();
              </script>
            
              <!--';
            }
          }
        }
      }
    }


    // ------------------------------------------------------------------------------------------------------------
    // Remove product from database
    // ------------------------------------------------------------------------------------------------------------

    // if the remove product button is pressed
    // delete product from database
    if (isset($_POST['removeButton'])) {

      $productToRemove = $_POST['productToBeRemoved'];

      if ($conn) {
        $databaseSelection = mysqli_select_db($conn, $database);

        if ($databaseSelection) {

          // delete product from database
          $removeQuery = "DELETE FROM tbl_product WHERE productID = $productToRemove";

          $removeResult = mysqli_query($conn, $removeQuery);

          // success notification
          if ($removeResult) {
            echo '-->
                <style>
                #newPro{
                  z-index: 2;
                  visibility: hidden;
                  min-width: 300px;
                  color: white;
                  font-weight:bold;
                  padding: 20px;
                  position: fixed;
                  margin-left: -150px;
                  left: 50%;
                  bottom: 120px;
                  font-size: 17px;
                  background-color: rgb(255, 83, 83);
                }
                
                #newPro.show {
                  visibility: visible;
                }
                </style>
             
                <html>
                    <div id="newPro">Product removed!</div>
                </html>

                <script>
                function showNotification() {
                  var element = document.getElementById("newPro");
                  element.className = "show";
                  setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                }
                showNotification();
                </script>
                <!-- ';
          }
        }
      }
    }


    // ------------------------------------------------------------------------------------------------------------
    // Open edit product overlay if edit product button is pressed
    // ------------------------------------------------------------------------------------------------------------
    // if edit button is pressed
    // open edit product overlay
    if (isset($_POST['editButton'])) {

      $productToEdit = $_POST['editProductID'];

      if ($conn) {
        $databaseSelection = mysqli_select_db($conn, $database);

        if ($databaseSelection) {

          // retrieve product details from database
          $editQuery = "SELECT * FROM tbl_product WHERE productID = $productToEdit";

          $editResult = mysqli_query($conn,  $editQuery);

          // if product found, show it
          if ($editResult > 0) {

            while ($product = mysqli_fetch_assoc($editResult)) {
    ?>-->
<div id="editOverlay" style="display:block">
  <form action="shop.php" method="POST" enctype="multipart/form-data">
    <div class="editFormLayout">

      <div class="editFormHeading">
        <h1>Edit Product Details</h1>
      </div>


      <div class="editFormBody">
        <p><label>Description:</label><br><input type="text" name="editProductDescription" id="editProductDescription" value="<?= $product['productDescription']; ?>"></p>
        <p><label>Price:</label><br><input type="text" name="editProductPrice" id="editProductPrice" value="<?= $product['productPrice']; ?>"></p>
        <p><label>Image:</label><br><input type="file" name="replacementImage" class="uploader" id="replacementImage" value="<?= $product['productImage']; ?>"></p>

        <input type="hidden" name="productToBeEdited" id="productToBeEdited" value="<?= $product['productID']; ?>">

        <!-- <?php
              $date = new DateTime(date('Y-m-d'));
              ?>-->

        <input type="hidden" name="dateEdit" id="dateEdit" value="<?= $date->format("Y-m-d"); ?>">

        <button type="submit" Class="saver" name="submitChanges">SAVE</button>

      </div>
    </div>
  </form>
  <div id="closeEditOverlay" onclick="hide()">Cancel</div>
</div>
<!--<?php
            }
          }
        }
      }
    }
    ?>-->

<body>

  <!-- Fixed navigation bar (top of page) -->
  <nav class="fixedNav">
    <?php
    require "topNavigation.php";
    ?>
  </nav>

  <?php

  // if user logged in
  if (isset($_SESSION['login_user'])) {

    // shop page layout if logged in user is administrator
    if (($_SESSION['login_userRole'] == "administrator")) {
  ?>

      <!-- add product overlay -->
      <div id="overlay">
        <form action="shop.php" method="POST" enctype="multipart/form-data">

          <div class="addProductFormLayout">
            <div class="addProductForm-heading">
              <h1>Enter Product Details</h1>
            </div>

            <div class="addProductForm-body">
              <p><label>Description:</label><br><input type="text" name="newProductDescription" id="newProductDescription"></p>
              <p><label>Price:</label><br><input type="text" name="newProductPrice" id="newProductPrice"></p>
              <p><label>Image:</label><br><input type="file" name="imageToUpload" class="uploader" id="imageToUpload"></p>

              <?php
              $date = new DateTime(date('Y-m-d'));
              ?>

              <input type="hidden" name="dateAdded" id="dateAdded" value="<?= $date->format("Y-m-d"); ?>">
              <input type="hidden" name="dateEdited" id="dateEdited" value="<?= $date->format("Y-m-d"); ?>">

              <button type="submit" Class="saver" name="saveProduct">SAVE</button>

            </div>
          </div>
        </form>
        <div id="closeOverlay" onclick="off()">Cancel</div>
      </div>

      <!-- shop page if user is an administrator -->
      <!-- shop products displayed in table format -->
      <h1 class="Heading"><strong>SHOP PRODUCTS</strong></h1>
      <div style="padding:20px">
        <button onclick="on()" id="addProductButton">ADD PRODUCT+</button>
        <table class="adminShopT">
          <thead>
            <tr>
              <th>Product Description</th>
              <th>Product Image</th>
              <th>Current Price</th>
              <th>Date Added</th>
              <th>Date Edited</th>
              <th>Modify</th>
            </tr>
          </thead>
          <tbody>

            <?php
            // retrieve all products from database and display in table
            // display products in table format
            $sqlpr = "SELECT * FROM tbl_product ORDER BY productID DESC";
            $resultt = mysqli_query($conn, $sqlpr);

            while ($product = mysqli_fetch_assoc($resultt)) {
            ?>
              <tr>
                <form action="shop.php" method="POST">
                  <td><?php echo $product["productDescription"]; ?></td>

                  <td> <img src="<?= $product['productImage']; ?>" alt="<?= $product['productDescription']; ?>" id="images" style="max-height:100%; max-width:100%" /></td>

                  <td>R <?php echo $product["productPrice"]; ?></td>

                  <td><?php echo $product["productDateAdded"]; ?></td>

                  <td><?php echo $product["productDateEdited"]; ?></td>

                  <td>

                    <input type="hidden" name="editProductID" id="editProductID" value="<?= $product['productID']; ?>" />

                    <input type="hidden" name="productToBeRemoved" id="productToBeRemoved" value="<?= $product['productID']; ?>">


                    <button type="submit" name="editButton" class="editButton">EDIT</button>

                    <button type="submit" name="removeButton" class="removeButton">REMOVE</button>

                  </td>
                </form>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

      <?php
    } else {
      // shop page layout if user is a customer
      ?>
        <h1 class="customerShopHeading"><strong>SHOP</strong></h1>
        <section class="shopBottom">
          <?php
          // retrieve and display all products from database 
          $sql = "select * from tbl_product ORDER BY productID ASC";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {

            while ($product = mysqli_fetch_assoc($result)) {
          ?>
              <figure>
                <form class="addToCartForm" name="addToCartForm" action="shop.php" method="POST">
                  <img src="<?= $product['productImage']; ?>" alt="<?= $product['productDescription']; ?>" id="images" />

                  <input type="hidden" name="quantityInsert" id="quantityInsert" value="1" />
                  <input type="hidden" name="userIDInsert" id="userIDInsert" value="<?= $_SESSION['login_userID']; ?>" />

                  <input type="hidden" name="productAddToCart" id="productAddToCart" value="<?= $product['productID']; ?>">

                  <input type="hidden" name="hiddenDescription" id="hiddenDescription" value="<?= $product['productDescription']; ?>" />
                  <input type="hidden" name="hiddenProductPrice" id="hiddenProductPrice" value="<?= $product['productPrice']; ?>" />
                  <input type="hidden" name="hiddenProductImage" id="hiddenProductImage" value="<?= $product['productImage']; ?>" />

                  <p class="description"><?= $product['productDescription']; ?></p>
                  <p class="price">Price: R <?= $product['productPrice']; ?></p>
                  <button type="submit" name="addToCartButton" class="addButton">ADD TO CART</button>

                </form>
              </figure>
          <?php
            }
          }
          ?>
        </section>
      <?php
    }
  } else {
    // shop page layout if not logged in
      ?>
      <h1 class="customerShopHeading"><strong>SHOP</strong></h1>
      <section class="shopBottom">
        <?php
        // retrieve and display all products from database 
        $sql = "select * from tbl_product ORDER BY productID ASC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

          while ($product = mysqli_fetch_assoc($result)) {
        ?>
            <figure>
              <form class="addToCartForm" name="addToCartForm" action="" method="POST">
                <img src="<?= $product['productImage']; ?>" alt="<?= $product['productDescription']; ?>" id="images" />
                <p class="description"><?= $product['productDescription']; ?></p>
                <p class="price">Price: R <?= $product['productPrice']; ?></p>
                <button type="button" name="addToCartButton" id="addButtonNotLoggedIn" class="addButton" onclick="goToLoginPage()">ADD TO CART</button>
              </form>
            </figure>
        <?php
          }
        }
        ?>
      </section>
    <?php

  }
    ?>

    <?php
    // shop footer if logged in user is administrator
    if (($_SESSION['login_userRole'] == "administrator")) {
    ?>

      <footer id="adminShopFooter">
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <!-- Social share buttons -->
        <div id="socialDiv">
          <div id="socialDivInner">
            <a href="https://www.facebook.com/share" class="fa fa-facebook"></a>
            <a href="https://twitter.com/share" class="fa fa-twitter"></a>
          </div>
        </div>
      </footer>
    <?php
      // if user not administrator
    } else {
    ?>
      <footer id="shopFooter">
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <!-- Social share buttons -->
        <div id="socialDiv">
          <div id="socialDivInner">
            <a href="https://www.facebook.com/share" class="fa fa-facebook"></a>
            <a href="https://twitter.com/share" class="fa fa-twitter"></a>
          </div>
        </div>
      </footer>
    <?php
    }
    ?>
    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="scripts/currentPageHighlight.js"></script>
    <script src="scripts/menuAnimation.js"></script>
    <script src="scripts/addButtonNotLoggedIn.js"></script>
    <script src="scripts/adminAddProductOverlay.js"></script>



    <!-- Keeps page from refreshing -->
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>

</body>

</html>