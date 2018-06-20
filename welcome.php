<?php
session_start(); //Start the session
if(empty($_SESSION['username'])){ //If session not registered
header("location:login.php?msg=Please login with credentials"); // Redirect to login.php page
}
else {//Continue to current page
define("ADMIN",$_SESSION['username']); //Get the user name from the previously registered super global variable
header( 'Content-Type: text/html; charset=utf-8' );
if(!empty($_SESSION['responseObj'])){
	define("USERSNO",$_SESSION['responseObj']['currentUser']['sno']);
	define("USERNAME",$_SESSION['responseObj']['currentUser']['firstName']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Welcome To Admin Page Demonstration</title>
</head>
<body>
	<?php echo isset($_SESSION['validatemessage'])?$_SESSION['validatemessage']:""; /*Echo the username */ ?>
	
	

    <h1>Welcome To Admin Page Mr. <?php echo ADMIN /*Echo the username */ ?></h1>
    <p><a href="logout.php">Logout</a></p> <!-- A link for the logout page -->
    <p>Put Admin Contents</p>
</body>
</html>
<?php } ?>