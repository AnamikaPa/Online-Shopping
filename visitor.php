
<html>
<head>
<link rel="stylesheet" type="text/css" href="main1.css">
<link rel="stylesheet" type="text/css" href="items.css">

</head>
<body>
<?php
session_start();
$_SESSION['speci']="true";

$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $category =$_GET['Category'];
?>
<div id="header">
<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
					<a class="abc" href="contact.php">Contact Us</a>
					
					<?php
						if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
							$result=mysqli_query($con,"SELECT * from user where name='$_SESSION[username]'");
							$row_item = mysqli_fetch_assoc($result);
							$row = mysqli_num_rows($result);	
							if($row!=0){ 
							if($row_item['admin']==1){?>
							<a class="abc" href="admin.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="logout.php">Log Out</a>
						<?php  }
							else{?>
							<a class="abc" href="welcome.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="logout.php">Log Out</a>
						<?php }}}
						if(!isset($_SESSION["username"]) || $_SESSION["username"]=="username"){ ?>
							<a class="abc" href="login.php">Sign In</a>
					<?php } ?>
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
 $query_item="SELECT id, name, image , description , quantity, price FROM image_items where category = '$category'";
  $result_item=mysqli_query($con,$query_item);
   	echo '<div style="background-color:orange; margin-top:370px; width:200px; text-align:center; color:white; margin-left:50px; padding:10px; border-radius:5px;">';
	echo $category;
	echo '</div>';

  echo '<div style="margin-left:50px;">';
  while($row_item = mysqli_fetch_assoc($result_item))
  {
	  $image_item= $row_item['image'];
	  echo '<div id = "submain" style=" background-color:#f5f5f0;">';
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
	  if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
		 if($row_item['quantity']==0 )
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
					
	  }
	  else{
$_SESSION['abcd']="true";
		 if($row_item['quantity']==0 )
	  {
		  echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="" method="post">';
							echo '<input type="hidden" name="itemid" value='.$row_item["id"].'>';
							echo '<input class="allowblog" type="submit" value="Add To Cart" name="addtocart" disabled/>';
						echo "</form>";
						
	  }
	  else{
				echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="login.php" method="post">';
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
	  }
					
	  echo '</div>';
	  echo '</div>';
	  echo '</div>'; 
  }
   echo '</div>'; echo '</div>';
  mysqli_close($con);
  ?>
  </body>
</html>