<!-- Creates the connection used to connect to the database -->
<?php
$servername = "localhost";
$database = "thebiltongpantry";
$username = "root";
$password = "";

// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>