<?php
	session_start();
	
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
	$_SESSION['update']="no";
	$host='localhost';
	$user='root';
	$pass='';
	$db='subkuch';

	// Create connection
	$conn = new mysqli($host,$user,$pass,$db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$qry = "SELECT * FROM user WHere admin=0";
	$abc = mysqli_query($conn,$qry);
?>
<html>
	<head>
		<title>User Display</title>
		<link rel="stylesheet" type="text/css" href="user.css">
	</head>
	<body>
		<div id="pink">
			<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id="right">
					<a class="abc" href="admin.php">Home</a>
					<a class="abc" href="user_page.php">Account</a>
					<a class="abc" href="logout.php">Log Out</a>
				</div>
			</div>
			<div id="explore">
				Users Information
			</div>
			<div id="block">
				<table>
				<tr>
					<tH>Name</tH><tH>Email</tH><tH>Contact number</tH><tH>Address</tH>
				</tr>
				
				<?PHP while($row = mysqli_fetch_array($abc)){ ?>
					<tr>
						<td><?php echo $row['name'];?></td><td><?php echo $row['email']; ?></td>
						<td><?php echo $row['mobile'];?></td><td><?php echo $row['address'];?></td>
						<td> 
							<form action="user_del.php" method="post">
								<input type="hidden" value=<?php echo $row['id']?> name="user">
								<input id="button" type="submit" value="Delete" name="submit">
							</form>
						</td>
					</tr>
				<?php }?>
				</table>
			</div>
		</div>
	</body>
</html>
<script>
<?php
	if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="yes"){
		?>alert("Successfully Deleted  :)"); <?php
		$_SESSION["delete"]="no";
	}
	if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="yes"){
		?>alert("Error!"); <?php
		$_SESSION["delete"]="no";
	}
?>
</script>
<?php
} else{
	header("Location:error_page.php");
}
?>
