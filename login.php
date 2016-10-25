<script>
	<?php
	session_start();
	if($_SESSION["usernam"]=="active"){
		?> alert("Your Account had been Deleted(Manually or by Admin)!");<?php
	}
	if($_SESSION["usernam"]=="usernam"){
		?> alert("You had entered wrong Username or Email or Password");<?php
	}
	if($_SESSION["abcd"]=="true"){
		?> alert("Please Login to proceed!");<?php
	}
	$_SESSION["usernam"]='';
	$_SESSION["username"] = "username";
	$_SESSION['order_placed']="";
	$_SESSION['order_confirmed']="";
	$_SESSION["abcd"]=="";
	?>
</script>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
	<?php

if(strcmp($_SESSION['login'],"login failed")==0)
{
	?><script>alert("Either username or password is incorrect!");</script><?php
	
}
$_SESSION['login']="";
$_SESSION['checkdelete']="";
$_SESSION["check_name"]="";
$_SESSION["check_email"]="";
$_SESSION["check"]="";
?>
	
		<div id="pink" >
			<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
			</div>
			<form name="myForm" action="checklogin.php" method="post">
				<div id="login">
					<p>Username or Email<br /> 
						<input type="text" name="Email_Name" placeholder="Username/Email" required></input>
					</p>
					<p>Password<br />
						<input type="password" name="Password" placeholder="Password" required></input>
					</p>
					<input class="button" type="submit" name="submit" value="Log In"></input>
				</div>
			</form>
			<div id="register"><a href="register.php" title="Not a Member?">Register</a>
			</div>
			<div id="return"><a href="main.php" title="Are u Lost?">Return to Think.com</a>
			</div>
		</div>
	</body>
</html>