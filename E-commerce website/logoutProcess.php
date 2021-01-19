<!-- This file is used to logout from the website -->
<!-- destroys current session -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: ../ITEC301 Project Code/home.php");
?>