<head>
	<meta charset="utf-8">
</head>
<body>

<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
	<input type="text" name="username" placeholder="Username" required>
	<br>
	<br>
	<input type="password" name="password" placeholder="Password" required>
    <br>
	<br>
	<input type="submit" name="submitButton" value="SUBMIT">
    <br>
	<br>	
    <p>Do you need an account? Sign in <a href="index.php">here</a>!</p>
	
	
	<?php 
	require_once("config.php");
	require_once("includes/classes/Account.php");
	$account = new Account($con);	
	
    if(isset($_POST["submitButton"])) {
		$st = $con->prepare("SELECT password FROM users WHERE username=?");
		$st->execute(array($_POST["username"]));
		$pass = $st->fetchColumn();
		if($pass==$_POST["password"]){
			$st1 = $con->prepare("SELECT firstname FROM users WHERE username = ?");
		    $st1->execute(array($_POST["username"]));	
			$name = $st1->fetchColumn();
            echo "Hello, ".$name;
		} else
		echo "Error! Сheck entered data.";
    }   
?>

</form>	
</body>
</html>
