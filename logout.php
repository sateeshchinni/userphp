<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

//echo $_SESSION['username'];

// remove all session variables
session_unset(); 

//echo $_SESSION['username'];

// destroy the session 
session_destroy(); 
//echo $_SESSION['username'];

header("location:login.php?msg=Successfully Logged out"); // Move back to login.php with a logout message
?>

</body>
</html>