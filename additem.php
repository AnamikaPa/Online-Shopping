<?php
session_start();
if($_SESSION['item_cat']=='pic_slider' ) header("Location: addslide.php");

	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="main1.css">

<style>

.error{
			color:red;
		}
		body{
			background-repeat:no-repeat;
			background-size:100%;
			background-attachment:fixed;
		}
		.sub2{
			background-color:white;
			color:white;
			padding:20px;
			padding-right:50px;
			padding-left:50px;
			width:25%;
			border-width:5px;
			border-color:white;
			float:left;
			border-width:5px;
			height:80%;
		}
		#sub1{
			margin-left:49px;
			width:388px;
			background-color:#f5f5f0;
			padding:10px;
			position:absolute;
			color:#663500;
			margin-top:70px;
			
		}
		table{
			background-color:#f5f5f0;
			padding:20px;
			position:absolute;
			color:#663500;
			margin-top:90px;
		}
		.inputclass{
			width:180px;
			margin:auto;
			height:34px;
			border-radius:5px;
		}
		
		.sub3{
			margin-top:70px;
			float:right;
			width:50%;
			margin-right:10%;
			height:100%;
		}
		.sub4{
			width:100%;
			height:90%;
		}
		.blogcategory{
			width:40%;
			height:5%;
			opacity: 0.5;
			filter: alpha(opacity=50);
			float:left;
			padding:5px;
			margin-top:3%;
			position:absolute;
			z-index: 1000;
		}
		
		.blogtitle{
			height:7%;
			padding:5px;
			font-weight:bold;
			font-size:20px;
			background-color:#8B4513;
			color:red;
		}
		
		.blogdesc{
			height:30%;
			padding:5px;
			background-color:#CD853F;
			color:white;
		}
		
		.blogauthor{
			width:100%;
			height:30%;
			float:right;
			
			
		}
		
		.blogdate{
			width:100%;
			height:30%;
			float:right;
			margin-top:5%;
			
			
		}
		.image{
			height:58%;
			width:100%;
			position:relative;
			
			}
		
		.authoranddate{
			width:26%;
			height:8%;
			float:right;
			margin-top:45%;
			
		}
		
		.descclass{
			width:240px;
			height:120px;
			border-radius:5px;
		}
		
	.verifyblog{
		position:absolute;
		background-color:grey;
		color:white;
		height:30px;
		color:white;
		border-radius:5px;
		font-weight:bold;
		margin-left:400px;
		margin-top:500px;
	}
	
	.imagesize{
		max-width:100%;
		max-height:100%;
	}	
	
	
.backbutton{
	float:right;
	background-color:#663500;
	width:100px;
	height:40px;
}
	
	#main{
		padding:20px;
		background-color:#f5f5f0;
		position:absolute;
		width:30%;
		min-height : 450px;
		margin-left:50%;
		margin-top: 5%;
	}
	
	#submain{
		width: 60%;
		height:360px;
		margin: 0px;
		float:left;
		margin-right:2%
		margin-left: 50%;
	}
	
	submain2{
		margin-left:10px;
		float:right;
		padding:2px;
	}
	
	
	
	#image{
		
		width:100%;
		height: 70%;
		margin:10px;
		position:relative;
	}
	
	#desc{
		width: 100%;
		height : 30%;
		margin-top:0px;
	}
	
	#name{
		width:100%;
		height: 33%;
		
	}
	
	#button{
		margin-left:10px;
		background-color:grey;
		border-radius:5px;
		color:white;
		height: 30px;
		}
	
</style>


</style>
</head>

<body>

<?php

if(strcmp($_SESSION['checksave'],"false")==0)
{
	?><script>alert("Error in saving item :(");</script><?php
	
}
if(strcmp($_SESSION['checksave'],"true")==0)
{
	?><script>alert("Saved successfully :)");</script><?php
	
}
$_SESSION['checksave']="";
?>
<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
						
							<a class="abc" href="welcome.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="user_page.php">Edit Profile</a>
							<a class="abc" href="logout.php">Log Out</a>
						
				</div>
			</div>
<p id="sub1"><b>The field with ' <span style = "z-index:20;color:#ff0000">*</span> ' mark is required</b></p>

		<form name="myForm" enctype="multipart/form-data" onsubmit="" action="" method="post">
		<input type="hidden" name="submitted" value="true" />
			<div class= "sub4">
			<div class="sub2" >
			
				<table>
					<tr>
						<td>Name<?php ?><span class="error">*</span></td>
						<td><input type="text" class="inputclass" name="itemname" id="B" value='' onFocus="this.value=''" required/></td>
					</tr>
					<tr>
						<td>Cost<span class="error">*</span> </td>
						<td> <input type="number" name="itemprice" class="inputclass" required/></td>
					</tr>
					<tr>
						<td>Colour<span class="error">*</span> </td>
						<td><input type="text" name="itemcolour" class="inputclass" required/> </td>
					</tr>
					<tr>
						<td>Quantity<span class="error">*</span> </td>
						<td> <input type="number" name="itemquantity" class="inputclass" required/></td>
					</tr>
					
					<tr>	
						<td>Description<span class="error">*</span> </td>
						<td> <textarea class="descclass"  name="itemdesc" rows=7 cols=50  id="itemdesc" required/></textarea></td>
					
					</tr>
					<tr><td></td>
					<td>
					<input type= "file" name="image" required/>
					
					</tr>
					<tr>
						<td><input id="button" type="submit"value="Display Item" name="Displayitem"/></td>
						<td><input id="button" type="reset" value="Reset" /></td>
					</tr>
				
				</table>
					</form>
				</div>
				
				<?php
				if(isset($_POST['Displayitem'])){
				$_SESSION["Category"]=$_SESSION['item_cat'];
				$_SESSION["item_name"]= $_POST['itemname'];
				$_SESSION["item_price"]= $_POST['itemprice'];
				$_SESSION["item_colour"]= $_POST['itemcolour'];
				$_SESSION["item_desc"]= $_POST['itemdesc'];
				$_SESSION["quantity"]= $_POST['itemquantity'];
				$name= $_POST['itemname'];
				
				$con = mysqli_connect("localhost","root","","SubKuch");
			if (!$con)
			{
				die('Could not connect: ' . mysqli_error());
			}
			$query="SELECT name FROM image_items where name='$name'";
			$result=mysqli_query($con,$query);
			$num=mysqli_num_rows($result);
			
			if($num > 0)
			{
				?><script>alert("Already exist");</script><?php
			}
			
			else{
			echo '<div id= "main">';
				echo '<div id = "submain">';
					echo '<div id = "image">';
						$aExtraInfo = getimagesize($_FILES['image']['tmp_name']);
						$sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
						echo '<img style="width:100%; height:100%;" src="' . $sImage . ' " alt="Your Image"/><br>';
						$_SESSION["image"]=$sImage;
					echo '</div>';
					echo '<div id= "name">';
						echo '<div id = "name">';
							echo $_POST['itemname'];
						echo '</div>';
						echo '<div id = "name">';
							echo $_POST['itemprice'];
						echo '</div>';
						echo '<div id = "name">';
							echo $_POST['itemcolour'];
						echo '</div>';
					
				echo '<div id = "submain2">';
					echo  '<b><u>Description</u></b><br>';
					echo $_POST['itemdesc'];
				echo '</div>';
				echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="additemconfirm.php" method="post">';
			echo '<input type = "hidden" name = "update" value="notupdate"/>';
		echo '<input class="verifyblog" type="submit"value="Add Item" name="additem"/>';
		echo "</form>";
				}
				}
	?>
	<?php
} else{
	header("Location:error_page.php");
}
?>

	  
</body>
</html>