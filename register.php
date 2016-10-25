<script>
<?php
	session_start();
?>
</script>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="register.css">
	</head>
	<body>
	<?php
		if(strcmp($_SESSION["check_name"],"Account not created")==0)
		{
			?><script>alert("Username has already been used");</script><?php
		}
		else if(strcmp($_SESSION["check_email"],"Account not created")==0)
		{
			?><script>alert("Email ID has already been used");</script><?php
		}
		else if(strcmp($_SESSION["check"],"Account created successfully")==0)
		{
			?><script>alert("Account created successfully :)");</script><?php
			header("Location:welcome.php");
		}
		else{
		$_SESSION["check_name"]="";
		$_SESSION["check_email"]="";
		$_SESSION["check"]="";
		}
	?>
	
	
	
		<div id="pink">
			<div id="header">
				<a href="main.php"></a>
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
			</div>
			<form action="InsertUserInfo.php" onsubmit="return validateForm(this)" method="post">
				<div id="login">
					<p>Username<br />
						<input type="text" name="Username" value="" required></input>
					</p>
					<p>Contact No.<br />
						<input type="text" name="ContactNo" value="" required></input>
					</p>
					<p>Email ID<br />
						<input type="text" name="Email" value="" required></input>
					</p>
					<p>Address<br />
						<input type="text" name="addo" value="" required></input>
					</p>
					<p>Password<br />
						<input type="password" name="Password" title="Passwords must contain at least six characters, including uppercase, lowercase letters, numbers and special characters." value="" required></input>
					</p>
					<p>Confirm Password<br />
						<input type="password" name="Cpassword" value="" required></input>
					</p>
					<input class="button" name="submit" type="submit" value="Create Account"></input>
				</div>
			</form>
			<div id="return"><a href="main.php" title="Are u Lost?">Return to Think.com</a>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
	function validateForm(form){

		re=/^\w+$/;
		if(!re.test(form.Username.value)){
			alert("Error: Username must contain only letters, numbers and underscores!");
			form.Username.focus();
			return false;
		}
		
		re=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(!re.test(form.Email.value)){
			alert("Error: You have entered an invalid email address");
			form.Email.focus();
			return false;
		}

		if(form.Password.value == form.Cpassword.value){
			if(form.Password.value.length < 6) {
       			alert("Error: Password must contain at least six characters!");
        		form.Password.focus();
        		return false;
        	}
        	re = /[0-9]/;
      		if(!re.test(form.Password.value)) {
        		alert("Error: password must contain at least one number (0-9)!");
        		form.Password.focus();
        		return false;
      		}
      		re = /[a-z]/;
      		if(!re.test(form.Password.value)) {
        		alert("Error: password must contain at least one lowercase letter (a-z)!");
        		form.Password.focus();
        		return false;
      		}
      		re = /[A-Z]/;
      		if(!re.test(form.Password.value)) {
        		alert("Error: password must contain at least one uppercase letter (A-Z)!");
        		form.Password.focus();
        		return false;
      		}
      		re = /[!@#$%^&*]/;
      		if(!re.test(form.Password.value)) {
        		alert("Error: password must contain at least one Special Charecter(!@#$%^&*)!");
        		form.Password.focus();
        		return false;
      		}
		}else{
			alert("Error: Please check that you've entered and confirmed your password!");
      		form.Password.focus();
      		return false;
		}

		return true;
	}
</script>

