  <html>
  <body>


 <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">

    <input type="text" name="firstName" placeholder="First name" required>
	<br>
	<br>
	<input type="text" name="lastName" placeholder="Last name" required>
	<br>
	<br>
	<input type="text" name="username" placeholder="Username" required>
	<br>
	<br>
	<input type="email" name="email" placeholder="Email" required>
	<br>
	<br>
	<input type="email" name="email2" placeholder="Confirm email" required>
	<br>
	<br>
	<input type="password" name="password" placeholder="Password" required>
	<br>	
	<br>
	<input type="password" name="password2" placeholder="Confirm password" required>
    <br>
	<br>
    <input type="submit" name="submitButton" value="SUBMIT">
    <br>
	<br>	
	<p>Already have an account? Sign in <a href="SF.php">here</a>!</p>	
    <br>	
	<?php 
	require_once("config.php");
	require_once("includes/classes/Account.php");
    
	$account = new Account($con);	

    if((isset($_POST["email"])) && ($_POST["email2"]) && ($_POST['email']!=$_POST['email2'])) {
       echo "Error! Different emails.";
    } elseif((isset($_POST["password"])) && ($_POST["password2"]) && ($_POST['password']!=$_POST['password2'])) {
       echo "Error! Different password!";
    } elseif(isset($_POST["submitButton"])) {
		$St = $con->prepare("INSERT INTO `users` VALUES ('Null',?, ?, ?, ?, ?,'1')");
		$St->execute(array($_POST["firstName"],$_POST["lastName"], $_POST["username"], $_POST["email"], $_POST["password"]));
		$firstname=$_POST["firstName"];
		echo "Thanks for registering, ".$firstname;
    }   
?>
	
 </form>
 </body>
 </html>
 