<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel = "stylesheet" href="style.css">
    <title>The Biltong Pantry</title>
    <link rel="shortcut icon" type="image/jpg" href="images/theBiltongPantryLogo.jpg">
</head>

<!--<?php

// used to connect to the database
include('connection.php');

// if a username and password is entered
if ((isset($_POST["emailL"])) && (isset($_POST["passwordL"]))){
    
    $email=$_POST["emailL"];
    $passwordR=$_POST["passwordL"];
    if($conn){
        
        $databaseSelection=mysqli_select_db ($conn, $database);

        // if database selected
        if($databaseSelection){
      
            // find manager account
            $sqlQuery = "SELECT * FROM tbl_manager WHERE managerEmail = '$email' AND managerPassword='$passwordR'";
            
              $resultt=mysqli_query($conn, $sqlQuery);
      
      
              $rowt=mysqli_fetch_assoc($resultt);
          
              
              $count = mysqli_num_rows($resultt);
      
    
              // if account found
              if($count == 1) {

                  // start session
                  session_start();

                  // save manager details retrieved
                  $_SESSION['login_user'] = $rowt['managerEmail'];
                  $_SESSION['login_userID'] = $rowt['managerID'];
                  $_SESSION['login_userRole'] = $rowt['managerRole'];
                
                  // go to shop page
                  header("Location: ../ITEC301 Project Code/shop.php");
                 
          
             // if manager account not found
              }else{

                // search customer account in database
                $Q = "SELECT * FROM tbl_customer WHERE customerEmail = '$email' AND customerPassword='$passwordR'";

                $result=mysqli_query($conn, $Q);
        
                $row=mysqli_fetch_assoc($result);
            
                $counter = mysqli_num_rows($result);
        
  
                // if customer account found
                if($counter == 1) {
                    
                  // start session
                    session_start();
                   
                   // save customer details retrieved
                    $_SESSION['login_user'] = $row['customerEmail'];
                    $_SESSION['login_userID'] = $row['customerID'];
                    $_SESSION['login_userRole'] = "customer";
                   
                     // go to home page
                    header("Location: ../ITEC301 Project Code/home.php");
                }
                // account does not exist
                else{
                  echo ' -->
                 <style>
                #fai{
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
        
                #fai.show {
                visibility: visible;
                 }
                </style>
      
       
                <html>
                     <div id="fai">Account does not exist!</div>
                </html>

                <script>
                function showNotification() {
                    var element = document.getElementById("fai");
                    element.className = "show";
                    setTimeout(function(){element.className = element.className.replace("show", ""); }, 2000);
                  }
                  showNotification();
                </script>
                <!--  ';
                }

             }
        }

    }
}
?>-->

<body>
    <!-- Fixed navigation bar (top of page) -->
    <nav class = "fixedNav">
        <?php 
            require "topNavigation.php";
        ?>
    </nav>
    
    <!-- login section on page-->
    <section class = "loginSection">
        <form class = "loginClass" name = "loginForm" action = "" method="POST">
            <h1>LOGIN</h1>
            <input type="text" placeholder= "Email" name = "emailL" id="emailL">
            <input type="password" placeHolder = "Password" name = "passwordL" id="passwordL">
            <button type="button" onclick="validate()">LOGIN</button>
            <a href = "register.php"  class="registerD">Don't have an account? Register here.</a>
        </form>
    </section>
    
    <footer id ="loginFooter">
        Copyright © 2020 <strong> The Biltong Pantry | Cape Town South Africa.</strong>
        <!-- Social share buttons -->
        <div id = "socialDiv">
            <div id = "socialDivInner">
                <a href="https://www.facebook.com/share" class="fa fa-facebook"></a>
                <a href="https://twitter.com/share" class="fa fa-twitter"></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src= "scripts/currentPageHighlight.js"></script>
    <script src= "scripts/menuAnimation.js"></script>
    <script src= "scripts/loginToAccount.js"></script>
    
      <!-- Keeps page from refreshing -->
      <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>


</body>
</html> 