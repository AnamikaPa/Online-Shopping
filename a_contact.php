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
	
	$qry = "SELECT * FROM CONTACT ";
	$abc = mysqli_query($conn,$qry);
?>
<html>
	<head>
		<title>Contact Display</title>
		<link rel="stylesheet" type="text/css" href="a_contact1.css">
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
				Viewers Contacts
			</div>
			<div id="block">
				<table>
				<tr align="center">
					<?php if(mysqli_num_rows($abc)!=0){ ?><tH>Name</tH><tH>Email</tH><tH>Phone Number</tH><tH>Comment</tH>
					<?php }else{
						echo "No contacts yet !!";
					} ?>
				</tr>
				
				<?PHP while($row = mysqli_fetch_array($abc)){ ?>
					<tr>
						<td><?php echo $row['Name'];?></td><td><?php echo $row['Email']; ?></td>
						<td><?php echo $row['p_number'];?></td><td><?php echo $row['comment'];?></td>
						<td> 
							<form action="contact_del.php" method="post">
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
	if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="error"){
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
