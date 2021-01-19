
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


    // if message button is pressed
    if (isset($_POST["submitMessageButton"])) {

        $nameToAdd = $_POST["name"];
        $lastNameToAdd = $_POST["lastname"];
        $emailToAdd = $_POST["email"];
        $numberToAdd = $_POST["number"];
        $textToAdd = $_POST["textArea"];

        // if there is a connection to the database
        if ($conn) {
            $databaseSelection = mysqli_select_db($conn, $database);

            // if the database is selected
            if ($databaseSelection) {

                // insert message into database
                $sqly = "INSERT INTO tbl_message(senderName,senderLastName,senderEmail,senderNumber,senderMessage)
                     VALUES('" . $nameToAdd . "', '" . $lastNameToAdd . "', '" . $emailToAdd . "', '" . $numberToAdd . "', '" . $textToAdd . "')";

                $resu = mysqli_query($conn, $sqly);

                if ($resu) {
                    // notification saying that message was submitted
                    echo '
                   <style>
                   #mes{
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
                    background-color:  rgb(106, 226, 106);
                   }
                   
                   #mes.show {
                       visibility: visible;
                     }
                   </style>
                 
                   <html>
                        <div id="mes">Your message has been submitted!</div>
                   </html>
                   <script>
                   function showNotification() {
                    var element = document.getElementById("mes");
                    element.className = "show";
                    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                  }
                  showNotification();
                   </script>
                   ';
                } 
                else {
                    // notification saying that message was not submitted
                    echo '
                    <style>
                    #Err{
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
            
                     #Err.show {
                         visibility: visible;
                      }
                    </style>
          
                    <html>
                          <div id="Err">An error occurred. Please try again!</div>
                    </html>

                     <script>
                     function showNotification() {
                        var element = document.getElementById("Err");
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
    ?>-->


<body>

    <!-- Fixed navigation bar (top of page) -->
    <nav class="fixedNav">
        <?php
        require "topNavigation.php";
        ?>
    </nav>

    <section class="contactSection">

        <form class="contactClass" name="contactForm" action="contact us.php#nameCUS" onsubmit="return validate();" method="POST">

            <div class="contactFormLayout">
                <div class="contactForm-heading">
                    <h1>CONTACT US</h1>
                </div>

                <div class="contactForm-body">
                    <p><label>First Name*</label><br><input type="text" name="name" id="nameCUS"></p>
                    <p><label>Last Name*</label><br><input type="text" name="lastname" id="lastNameCUS"></p>
                    <p><label>Email*</label><br><input type="text" name="email" id="emailCUS"></p>
                    <p><label>Mobile Number*</label><br><input type="text" name="number" id="numberCUS"></p>
                    <p><label>Message*</label><br><textarea name="textArea" id="textAreaCUS"></textarea></p>
                    <button type="submit" name="submitMessageButton">SUBMIT</button>
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
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="scripts/currentPageHighlight.js"></script>
    <script src="scripts/menuAnimation.js"></script>
    <!-- Verify inputs prior to submitting-->
    <script src="scripts/contactUsPage.js"></script>

</body>

</html>