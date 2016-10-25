<?php
session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
$category = $_SESSION['item_cat'];
$_SESSION['checksave']="";
$_SESSION['checkupdate']="";
$_SESSION['page']="buyitems";
$_SESSION['speci']="true";
$_SESSION['countcontact']=0;
$_SESSION['countaddress']=0;
$_SESSION['buy_confirmed']=0;
$_SESSION['added_to_cart']="";
$username=$_SESSION['username'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="main1.css">
<link rel="stylesheet" type="text/css" href="items.css">

</head>
<body>

<?php

if(strcmp($_SESSION['added_to_cart'],"true")==0)
{
	?><script>alert("<?php echo'Item '.$_SESSION['get_name'].' added successfully to your cart'; ?>");</script><?php
	
}
$_SESSION['added_to_cart']="";
?>

<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$query_name="SELECT name, email , address , mobile FROM user WHERE name='$username'";
	  $result_name=mysqli_query($con,$query_name);
	  $row_name = mysqli_fetch_assoc($result_name);
	  $_SESSION['mobile']=$row_name['mobile'];
	  $_SESSION['address']=$row_name['address'];
	  
?>

<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
					
				<a class="abc"href="mycart.php" title="My Cart"><img style="width:40px; height:40px; align:left" src="image/cart.jpg" OnClick="mycart.php"></a>
						
							<a class="abc" href="welcome.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="user_page.php">Edit Profile</a>
							<a class="abc" href="logout.php">Log Out</a>
						
				</div>
			</div>
			
			<?php 
				$result=mysqli_query($con,"SELECT * from image_items where category='pic_slider'");
				while($row = mysqli_fetch_assoc($result)){
			?>
			<img class="mySlides" src=<?php echo $row['image']; ?> style="width:100%; height:300px;">
			
				<?php } ?>
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

<?php
	
  echo '<div style="padding-left:50px;">';
  $query_item="SELECT id, name, image , description , quantity, price FROM image_items where category = '$category'";
  $result_item=mysqli_query($con,$query_item);
   	echo '<div style="background-color:orange; margin-top:370px; width:200px; text-align:center; color:white; margin-left:50px; padding:10px; border-radius:5px;">';
	echo $_SESSION['item_cat'];
	echo '</div>';

  echo '<div >';
  while($row_item = mysqli_fetch_assoc($result_item))
  {
	  $image_item= $row_item['image'];
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
	  
		 if($row_item['quantity']==0)
	  {
		  echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Add To Cart" name="addtocart" disabled/>';
						echo "</form>";
						
	  }
	  else{
				echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="addtocart.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Add To Cart" name="addtocart"/>';
						echo "</form>";
	  }
					echo "</div>";
					echo  '<div class="allowORdeny">';
				echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="viewdetail.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="See Detail" name="seedetail"/>';
						echo "</form>";
					echo "</div>";
					
	  echo '</div>';
	  echo '</div>';
	  echo '</div>'; 
  }
   echo '</div>'; echo '</div>';
  mysqli_close($con);
  ?>
  </body>
</html>
<?php
} else{
	header("Location:error_page.php");
}
?>
