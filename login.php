<!DOCTYPE HTML> 
<html>
	  <link rel="stylesheet" type="text/css" href="style.css">
   <head>
      <title>Sign in to your account</title>
   </head>
   <body id="body-color">
   		   <?php 
			   $login_form = <<<EOD
        <div id="Login">
         <fieldset style="width:30%">
            <legend>Sign in</legend>
            <table border="0">
               <tr>
	               <form method="POST" action="validate_login_user.php">
               <tr> <td>Email Address</td><td> <input type="text" name="email"></td> </tr> 
			   <tr> <td>Password</td><td> <input type="password" name="pass"></td> </tr> 
			   <tr> <td><input id="button" type="submit" name="submit" value="Sign In"></td> </tr> 
			   </form> 
	        </table>
         </fieldset>
      </div>
EOD;
if (isset($_GET['msg'])) {
$msg = $_GET['msg'];  //GET the message
if($msg != '') echo '<p>'.$msg.'</p>'; //If message is set echo it
}
echo "<h1>Please enter your Login Information</h1>";
echo $login_form;
?>
	  
	  <td>&nbsp;</td>
 <p>
        Don't have an account?
 <a href="signup.php">Create a new account</a>
 </p>
	  
	  
   </body>
</html>