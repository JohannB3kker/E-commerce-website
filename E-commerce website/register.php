
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
// starts session
if (!isset($_SESSION)) {
    session_start();
}

// used to connect to the database
include('connection.php');


// if register button is pressed and values are set
if ((isset($_POST["registerButton"])) && (isset($_POST["nameR"])) && (isset($_POST["lastNameR"]))
    && (isset($_POST["emailR"])) && (isset($_POST["addressR"])) && (isset($_POST["numberR"]))
    && (isset($_POST["passwordR"]))){

    $name = $_POST["nameR"];
    $lastName = $_POST["lastNameR"];
    $email = $_POST["emailR"];
    $address = $_POST["addressR"];
    $number = $_POST["numberR"];
    $passwordR = $_POST["passwordR"];

    // if a connection is made to the database
    if ($conn) {

        $databaseSelection = mysqli_select_db($conn, $database);

        if ($databaseSelection) {


            // checks if entered email exists in database
            $sq = "SELECT * FROM tbl_customer WHERE customerEmail = '$email'";

            $r = mysqli_query($conn, $sq);

            // amount of accounts found with entered email
            $accountFound = mysqli_num_rows($r);


            // if account does not exist
            if ($accountFound == 0) {


                // insert new account into database
                $sqlQuery = "INSERT INTO tbl_customer(customerFirstName,customerLastName,customerEmail,customerAddress,customerPhoneNumber,customerPassword)
                     VALUES('" . $name . "', '" . $lastName . "', '" . $email . "', '" . $address . "', '" . $number . "', '" . $passwordR . "')";


                $result = mysqli_query($conn, $sqlQuery);

                if ($result) {

                    // display notification that account has been created
                    echo '
                <style>
                #new{
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
           
                #new.show {
                    visibility: visible;
                }
                </style>
          
                <html>
                     <div id="new">Account created!</div>
                </html>

                <script>
                function showNotification() {
                    var element = document.getElementById("new");
                    element.className = "show";
                    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                  }
                  showNotification();
                </script>
                ';
                }

                // if account already exists
            } else {

                // display error

                echo '
            <style>
            #failure{
                z-index: 2;
                  visibility: hidden;
                  max-width: 300px;
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
        
            #failure.show {
                visibility: visible;
            }
            </style>
      
       
            <html>
             <div id="failure">An account with that email already exists!</div>
            </html>

            <script>
            function showNotification() {
                var element = document.getElementById("failure");
                element.className = "show";
                setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
              }
              showNotification();
            </script>
            ';
            }
        }
    }
}
?>

<body>

    <div class="page">

        <!-- Fixed navigation bar (top of page) -->
        <nav class="fixedNav">
            <?php
            require "topNavigation.php";
            ?>
        </nav>

        <section class="registerSection">

            <form class="registerClass" name="registerForm" action="register.php#nameR" onsubmit="return validate();" method="POST">

                <!-- form header -->
                <div class="registerFormLayout">

                    <div class="form-heading">
                        <h1>CREATE ACCOUNT</h1>
                    </div>

                    <div class="form-body">
                        <p><label>First Name*</label><br><input type="text" name="nameR" id="nameR"></p>
                        <p><label>Last Name*</label><br><input type="text" name="lastNameR" id="lastNameR"></p>
                        <p><label>Email*</label><br><input type="text" name="emailR" id="emailR"></p>
                        <p><label>Address*</label><br><input type="text" name="addressR" id="addressR"></p>
                        <p><label>Mobile Number*</label><br><input type="text" name="numberR" id="numberR"></p>
                        <p><label>Password*</label><br><input type="password" name="passwordR" id="passwordR"></p>
                        <p><label>Confirm Password*</label><br><input type="password" name="confirmPasswordR" id="confirmPasswordR"></p>
                        <button type="submit" class="registerButton" name="registerButton">REGISTER</button>
                        <a href="login.php" class="loginD">Already have an account? Login here.</a>
                    </div>

                </div>
            </form>
        </section>

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
        <script src="scripts/menuAnimation.js"></script>
        <script src="scripts/registerNewUser.js"></script>

        <!-- Keeps page from refreshing -->
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </div>
</body>

</html>