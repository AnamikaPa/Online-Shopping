<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="main1.css">

<style>

		
		table{
			margin-left:30px;
			background-color:#f5f5f0;
			padding:20px;
			position:absolute;
			color:#663500;
			margin-top:90px;
		}
</style>
</head>
<body>
<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
						
							<a class="abc" href="welcome.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="user_page.php">Edit Profile</a>
							<a class="abc" href="logout.php">Log Out</a>
						
				</div>
			</div>
			
<form name="myForm" enctype="multipart/form-data" onsubmit="" action="" method="post">
		<input type="hidden" name="submitted" value="true" />
			<div class= "sub4">
			<div class="sub2" >
			
				<table>
					
					<tr><td></td>
					<td>
					<input type= "file" name="image" required/>
					
					</tr>
					<tr>
						<td><input id="button" type="submit"value="Add Slide" name="Button"/></td>
						<td><input id="button" type="reset" value="Reset" /></td>
					</tr>
				
				</table>
					</form>
				</div>
</body>
</html>


<?php
if(isset($_POST['Button'])){
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $aExtraInfo = getimagesize($_FILES['image']['tmp_name']);
						$sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
						
	$query= "INSERT INTO image_items(image,category,quantity) VALUES ('$sImage','pic_slider',1)";
	if(!mysqli_query($con,$query)){
		$_SESSION['checksave']="false";
	 
	}else
	{	
ECHO "ABD'S'LR;";
		$_SESSION['checksave']="true";
	}
	header("Location:items.php");
}
?>
<?php
} else{
	header("Location:error_page.php");
}
?>
