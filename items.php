<?php
session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
$category = $_SESSION['item_cat'];


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
<?php

if(strcmp($_SESSION['checkupdate'],"false")==0)
{
	?><script>alert("Error in updating :(");</script><?php
	
}
if(strcmp($_SESSION['checkupdate'],"true")==0)
{
	?><script>alert("Updated successfully :)");</script><?php
	
}
$_SESSION['checkupdate']="";
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="main1.css">
<link rel="stylesheet" type="text/css" href="items.css">

</head>
<body>
<?php
if(strcmp($_SESSION['checkdelete'],"false")==0)
{
	?><script>alert("Error in deleting :(");</script><?php
	
}
if(strcmp($_SESSION['checkdelete'],"true")==0)
{
	?><script>alert("Deleted successfully :)");</script><?php
	
}
$_SESSION['checkdelete']="";
?>

<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id="right">
					<a class="abc" href="admin.php" title="Home">Home</a>
					<a class="abc" href="user.php"> User's Info </a>
					<a class="abc" href="a_contact.php">Visitor's Contact </a>
					<a class="abc" href="user_page.php">Account</a>
					<a class="abc" href="additem.php">Add Product</a>
					<a class="abc" href="logout.php">Log Out</a>
				</div>
			</div>
			<?php
			$con = mysqli_connect("localhost","root","","SubKuch");
			if (!$con)
			{
				die('Could not connect: ' . mysqli_error());
			}
			?>
			<?php 
				$result=mysqli_query($con,"SELECT * from image_items where category='pic_slider'");
				while($row = mysqli_fetch_assoc($result)){
			?>
			<img class="mySlides" src=<?php echo $row['image']; ?> style="width:100%; height:300px;">
			
				<?php } ?>
			<br>
			<br>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>			
<br>
<br>
<br>
<br>			
<br>
<br>
<br>
<br>			
		
	
<?php

  echo '<div >';
  echo '<div style="background-color:orange; margin-top:80px; width:200px; text-align:center; color:white; margin-left:50px; padding:10px; border-radius:5px;">';
	echo $category;
	echo '</div style="padding="20px;">';
  $query_item="SELECT id, name, image ,quantity, description , price FROM image_items where category = '$category'";
  $result_item=mysqli_query($con,$query_item);
  while($row_item = mysqli_fetch_assoc($result_item))
  {
	  $image_item= $row_item['image'];
	  if($category !='pic_slider'){
	  echo '<div id = "submain">';
	  echo '<div id = "image">';
	  echo '<img style="width:100%; height:100%;" src="' . $image_item . ' " alt="Your Image"/>';
	  if($row_item['quantity']==0)
	  {
		  echo '<h2><span> STOCK OUT! </span></h2>';
	  }
	  echo '</div>';
	  echo '<div id= "desc">';
	  echo '<div id = "name">';
	  echo '<b>'.$row_item['name'].'</b>';
	  echo '</div>';
	  echo '<div id = "name">';
	  echo 'Cost - ' . $row_item['price'];
	  echo '</div>';
	  echo '<div id = "button">';
	  echo  '<div class="allowORdeny">';
				echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="delete.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Delete" name="deleteitem"/>';
						echo "</form>";
					echo "</div>";
					
					echo '<div class="allowORdeny">';
						echo '<form name="myForm3" enctype="multipart/form-data" onsubmit="" action="itemid.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Edit" name="edititem"/>';
						echo "</form>";
						echo '</div>';
					
	  echo '</div>';
	  echo '</div>';
	  echo '</div>';
	  
	  }
	  else{
		  echo '<div style=" margin:auto; width:80%; height:300px; margin-top:100px;" >';
		  echo '<img style="width:100%; height:100%;" src="' . $image_item . ' " alt="Your Image"/>';
	  
		  echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="delete.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Delete" name="deleteitem"/>';
		echo "</form>";
		echo '</div>';
	  }
  }
   echo '</div>';
  mysqli_close($con);
  ?>
  </body>
</html><?php
} else{
	header("Location:error_page.php");
}
?>