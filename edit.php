<?php

	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
?>

<html>
<head>
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
			
			color:#663500;
			margin-top:50px;
			
		}
		.inputclass{
			width:180px;
			margin:auto;
			height:34px;
			border-radius:5px;
		}
		
		.sub3{
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
		float:right;
		background-color:red;
		color:white;
		font-weight:bold;
		margin-right:28%;
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
		width:40%;
		height : 350px;
		margin-left:50%;
		margin-top: 5%;
		
		
	}
	
	#submain{
		width: 55%;
		height:350px;
		margin: 0px;
		float:left;
		margin-right:2%
		margin-left: 50%;
	}
	
	submain2{
		float:right;
		padding:2px;
	}
	
	
	
	#image{
		width:100%;
		height: 70%;
		margin-top:0px;
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
		width:100%;
		height:33%%;
		}
	
</style>
</head>
<body>

<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $itemid=$_SESSION['item_id'];
  $query= "SELECT name , price , description , category, colour , quantity FROM image_items where id='$itemid'";
  $result=mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($result);
  $name_item= $row['name'];
  $price_item= $row['price'];
  $desc_item= $row['description'];
  $cat= $row['category'];
  $colour_item= $row['colour'];
  $quantity_item= $row['quantity'];
  $old_name= $row['name'];

?>

<p id="sub1"><b>The field with ' <span style = "color:#ff0000">*</span> ' mark is required</b></p>
		<form name="myForm" enctype="multipart/form-data" onsubmit="" action="" method="post">
		<input type="hidden" name="submitted" value="true" />
			<div class= "sub4">
			<div class="sub2" >
			
				<table>
					<tr>
						<td>Name<span class="error">*</span></td>
						<td><input type="text" class="inputclass" name="itemname" id="B" value='<?php echo $name_item ; ?>' onFocus="this.value=''" required/></td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					
					
				
					
					<tr>
						<td>Cost<span class="error">*</span> </td>
						<td> <input type="text" name="itemprice" class="inputclass" value='<?php echo $price_item ; ?>' required/></td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					
					
					<tr>
						<td>Colour<span class="error">*</span> </td>
						<td><input type="text" name="itemcolour" class="inputclass" value='<?php echo $colour_item ; ?>' required/> </td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					
					<tr>
						<td>Quantity<span class="error">*</span> </td>
						<td> <input type="text" name="itemquantity" value='<?php echo $quantity_item ; ?>' class="inputclass" required/></td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					
					
					<tr>	
						<td>Description<span class="error">*</span> </td>
						<td> <textarea class="descclass"  name="itemdesc" rows=7 cols=50  id="itemdesc" required/><?php echo $desc_item ; ?></textarea></td>
					
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr><td></td>
					<td>
					<input type= "file" name="image" required/>
					
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td><input type="submit"value="Display Item" name="Displayitem"/></td>
						<td><input type="reset" value="Reset" /></td>
					</tr>
					
					
				</table>
				</form>
				</div>
				
				<?php
				if(isset($_POST['Displayitem'])){
				$_SESSION["Category"]=$cat;
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
			if(strcmp($name,$old_name)==0)
			{
				echo '<div id= "main">';
				echo '<div id = "submain">';
					echo '<div id = "image">';
						$aExtraInfo = getimagesize($_FILES['image']['tmp_name']);
						$sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
						echo '<img style="width:100%; height:100%;" src="' . $sImage . ' " alt="Your Image"/>';
						$_SESSION["image"]=$sImage;
					echo '</div>';
					echo '<div id= "desc">';
						echo '<div id = "name">';
							echo $_POST['itemname'];
						echo '</div>';
						echo '<div id = "name">';
							echo $_POST['itemprice'];
						echo '</div>';
						echo '<div id = "button">';
							echo $_POST['itemcolour'];
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div id = "submain2">';
					echo  '<b><u>Description</u></b><br>';
					echo $_POST['itemdesc'];
				echo '</div>';
			echo '</div>';
			echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="additemconfirm.php" method="post">';
			echo '<input type = "hidden" name = "update" value="update"/>';
		echo '<input class="verifyblog" type="submit"value="UPDATE" name="additem"/>';
		echo "</form>";
			}
			else{
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
						echo '<img style="width:100%; height:100%;" src="' . $sImage . ' " alt="Your Image"/>';
						$_SESSION["image"]=$sImage;
					echo '</div>';
					echo '<div id= "desc">';
						echo '<div id = "name">';
							echo $_POST['itemname'];
						echo '</div>';
						echo '<div id = "name">';
							echo $_POST['itemprice'];
						echo '</div>';
						echo '<div id = "button">';
							echo $_POST['itemcolour'];
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div id = "submain2">';
					echo  '<b><u>Description</u></b><br>';
					echo $_POST['itemdesc'];
				echo '</div>';
			echo '</div>';
			echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="additemconfirm.php" method="post">';
			echo '<input type = "hidden" name = "update" value="update"/>';
		echo '<input class="verifyblog" type="submit"value="UPDATE" name="additem"/>';
		echo "</form>";
				}
				}
				
	}
	?>
	
	  
</body>
</html>
<?php
} else{
	header("Location:error_page.php");
}
?>