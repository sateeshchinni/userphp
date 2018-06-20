<!DOCTYPE HTML> 
<html>
	  <link rel="stylesheet" type="text/css" href="style.css">
   <head>
      <title>Sign-Up</title>
   </head>
   <body id="body-color">
   		   <?php 
			   $login_form = <<<EOD
	<div id="SignUp">
         <fieldset style="width:30%">
            <legend>Registration Form</legend>
            <table border="0">
               <tr>
                  <form method="POST" action="connectivity-sign-up_post.php">
               <td>First Name</td><td> <input type="text" name="fname"></td></tr>
			   <tr> <td>Last Name</td><td> <input type="text" name="lname"></td> </tr> 
			   <tr> <td>Middle Name</td><td> <input type="text" name="mname"></td> </tr> 
               <tr> <td>Email</td><td> <input type="text" name="email"></td> </tr> 
			   <tr> <td>UserName</td><td> <input type="text" name="user"></td> </tr> 
			   <tr> <td>Password</td><td> <input type="password" name="pass"></td> </tr> 
			   <tr> <td>Confirm Password </td><td><input type="password" name="cpass"></td> </tr> 
			   <tr> <td><input id="button" type="submit" name="submit" value="Create Account"></td> </tr> 
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
        Already have an account?
 <a href="login.php">Sign In</a>
 </p>
</body>
</html>