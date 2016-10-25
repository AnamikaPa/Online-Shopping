<?php
session_start();
	
$itemid= $_SESSION['item_detail_id'];
$_SESSION['page']="detail";
$username=$_SESSION['username'];
$_SESSION['back']="detail";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<script src="js/jquery-1.6.js" type="text/javascript"></script>
<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="css/jquery.jqzoom.css" type="text/css">
<style type"text/css">

body{
	margin:0px;
	padding:0px;
	font-family:Arial;
	}
a img,:link img,:visited img {
	border: none; 
	}
table {
	border-collapse: collapse; 
	border-spacing: 0; 
	}
:focus { 
outline: none;
 }
*{
	margin:0;
	padding:0;
	}
p, blockquote, dd, dt{
	margin:0 0 8px 0;
	line-height:1.5em;
	}
fieldset {
	padding:0px;
	padding-left:7px;
	padding-right:7px;
	padding-bottom:7px;
	}
fieldset legend{
	margin-left:15px;
	padding-left:3px;
	padding-right:3px;
	color:#333;
	}
dl dd{
	margin:0px;
	}
dl dt{}

.clearfix:after{
	clear:both;
	content:".";
	display:block;
	font-size:0;
	height:0;
	line-height:0;
	visibility:hidden;
	}
.clearfix{
	display:block;
	zoom:1}


ul#thumblist{display:block;}
ul#thumblist li{
	float:left;
	margin-right:2px;
	list-style:none;
	}
ul#thumblist li a{
	display:block;
	border:1px solid #CCC;
	}
ul#thumblist li a.zoomThumbActive{
    border:1px solid red;
}

.jqzoom{

	text-decoration:none;
	float:left;
}

#button{
		width:100%;
		height:33%;
		align:center;
		
	}
	
	.allowORdeny{
		float:left;
		margin:10px;
		margin-left:4px;
	}
	
	.allowblog{
		background-color:black;
		color:white;
		padding:2px;
		width:90px;
		margin-left:30px;
		margin-top:0px;
		height:35px;
	}

#desc{
	float:right;
	width:300px;
	height:450px;
	margin-top:-300px;
	position:relative;
	margin-right:80px;
}

p{
	
	font-size:15px;
}
.form{
	width:430px;
	margin-top:-250px;
	height:100%;
	float:right;
	margin-right:-150px;
}
#not{
	color:red;
	position:absolute;
	margin:100px 500px;
	background-color:white;
	padding:5px;
}

</style>
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
});


</script>
</head>

<body>

<?php

if(strcmp($_SESSION['added_to_cart'],"true")==0)
{
	?><script>alert("<?php echo'Item '.$_SESSION['get_name'].' added successfully to your cart'; ?>");</script><?php
	
}
if(strcmp($_SESSION['buy_confirmed'],"true")==0)
{
	?><script>alert("Your items will be shipped within 3 days..\nHAPPY SHOPPING :)");</script><?php
	
}
$_SESSION['added_to_cart']="";
$_SESSION['buy_confirmed']="";
?>

<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  
  $query= "SELECT image,name,description,category,price,colour,quantity FROM image_items WHERE id= '$itemid'";
  $result=mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($result);
  $image=$row['image'];
  $name=$row['name'];
  $desc=$row['description'];
  $category=$row['category'];
  $price=$row['price'];
  $colour=$row['colour'];
  $quantity=$row['quantity'];
?>
		<div id="pink">
			<div id="header">
				<a href="main.php"></a>
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
			</div>

<?php

if($quantity==0)
{
	echo'<h1 id="not">Not In Stock !</h1>';
}

?>
<div class="clearfix" id="content" style="margin-left:300px; margin-top:200px; height:300px;width:700px; position:absolute; background-color:#f5f5f0; padding:20px;" >
    <div class="clearfix" style="float:left;">
        <a href="<?php echo $image; ?>" class="jqzoom" rel='gal1'  title="triumph" >
		<?php echo '<img style="width:50%; height:250px; border: 2px solid #666;" src="' . $image . ' " title="triumph" alt="Your Image"/>'; ?>
        </a>
    
	
	<div id= "button">
	<?php
			if($quantity==0 && isset($_SESSION["username"]) && $_SESSION["username"]!="username")
				{
					?>
					<div class="allowORdeny" >
		
	
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="addtocart.php" method="post">
							<input class="allowblog" type="submit" value="Add to cart" name="addtocart" disabled/>
						</form>
					</div>
					
				<div class="allowORdeny">
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="buynow.php" method="post">
							<input class="allowblog" type="submit" value="Buy Now" name="buynow" disabled/>
						</form>
					</div>
					<?php
				}
				
				else if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){?>
				<div class="allowORdeny">
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="addtocart.php" method="post">
							<input class="allowblog" type="submit" value="Add to cart" name="addtocart"/>
						</form>
					</div>
					
				<div class="allowORdeny">
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="buynow.php" method="post">
							<input class="allowblog" type="submit" value="Buy Now" name="buynow"/>
						</form>
					</div>
					<?php
				}
				else{?>
					<div class="allowORdeny">
					
	
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="addtocart.php" method="post">
							<input class="allowblog" type="submit" value="Add to cart" name="addtocart" disabled/>
						</form>
					</div>
					
				<div class="allowORdeny">
				<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="buynow.php" method="post">
							<input class="allowblog" type="submit" value="Buy Now" name="buynow" disabled/>
						</form>
					</div>
					<?php
				}
				
			
				?>
					
	</div>
	</div>
	
	<?php 
	if(strcmp($_SESSION['speci'],"true")==0){?>
	<div id= "desc">
	<h3><u>Specifications</u></h3>
	<br><hr><br>
	<p>Product Model - <?php echo $name;?></p>
	<p>Category - <?php echo $category;?></p>
	<p>Colour - <?php echo $colour;?></p>
	<p>Quantity- <?php echo $quantity;?></p>
	<p>Description - <?php echo $desc;?></p>
	<h5>Cost - <?php echo $price;?></h5>
	</div>
	
		<?php
	}
	else if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
		echo '<div class="form">';
		$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  echo '<div style="background-color:#f5f5f0;  margin-left:-100px; margin-top:230px;">';
  $query_name="SELECT name, email , address , mobile FROM user WHERE name='$username'";
	  $result_name=mysqli_query($con,$query_name);
	  $row_name = mysqli_fetch_assoc($result_name);
  echo '<h3 style="font-size:20px;text-align:center;"><u><b>Shipping Detail</b></u></h3><br><hr><br>';
  echo '<h3 style="font-size:20px;text-align:center;">TO : <i>'.$row_name['name'].'</i></h3><br>';
	if($_SESSION['countcontact']==0 && $_SESSION['countaddress']==0){
		echo '<form name="myForm3" enctype="multipart/form-data"  action="newpage.php" method="post">';
		echo '<p style="font-size:20px; margin-left:10px;">Contact No. : '.$_SESSION['mobile'].'<input type = "submit" style="font-size:16px;margin-left:5px;float:right;" name="contactme" value="Change Contact No." ></p>';
		echo'</form>';
		echo '<form name="myForm3" enctype="multipart/form-data"  action="newpage.php" method="post">';
		echo '<p style="font-size:20px; margin-left:10px;">Address : '.$_SESSION['address'].'<input type = "submit" style="font-size:16px;margin-left:5px;float:right;" name="addressme" value="Change Address" ></p>';
		echo'</form>';
	}
	else if($_SESSION['countcontact']==1 && $_SESSION['countaddress']==0) {
		echo'<form method="POST" action="new.php" name="form2">';
		echo '<p style="font-size:20px; margin-left:10px;">Contact No. : <input type = "text" style="font-size:16px;margin-left:5px;" name="contact" value= '.$_SESSION["mobile"] .' ><input type = "submit" style="font-size:16px;margin-left:5px;float:right;" name="contactmesave" value="Save" ></p>';
	 echo'</form>';
	 echo '<form name="myForm3" enctype="multipart/form-data"  action="newpage.php" method="post">';
		echo '<p style="font-size:20px; margin-left:10px;">Address : '.$_SESSION['address'].'<input type = "submit" style="font-size:16px;margin-left:5px;float:right;" name="addressme" value="Change Address" ></p>';
		echo'</form>';
	}
	else if($_SESSION['countcontact']==0 && $_SESSION['countaddress']==1){
		echo '<form name="myForm3" enctype="multipart/form-data"  action="newpage.php" method="post">';
		echo '<p style="font-size:20px; margin-left:10px;">Contact No. : '.$_SESSION['mobile'].'<input type = "submit" style="font-size:16px;margin-left:5px;float:right;" name="contactme" value="Change Contact No." ></p>';
		echo'</form>';
		echo'<form method="POST" action="new.php" name="form2">';
		echo '<p style="font-size:20px; margin-left:10px;">Address : <input type = "text" style="font-size:16px;margin-left:5px;" name="address" value= '.$_SESSION["address"] .'><input type = "submit" style="float:right;" name="addressmesave" value="Save" ></p>';
	 echo'</form>';
	}
	else{
		echo'<form method="POST" action="new.php" name="form2">';
		echo '<p style="font-size:20px; margin-left:10px;">Contact No. : <input type = "text" style="font-size:16px;margin-left:5px;" name="contact" value= '.$_SESSION["mobile"] .'><input type = "submit" style="float:right;" name="contactmesave" value="Save" ></p>';
	 echo'</form>';
	 echo'<form method="POST" action="new.php" name="form2">';
		echo '<p style="font-size:20px; margin-left:10px;">Address : <input type = "text" style="font-size:16px;margin-left:5px;" name="address" value= '.$_SESSION["address"] .'><input type = "submit" style="float:right;" name="addressmesave" value="Save" ></p>';
	 echo'</form>';
	}
 
  echo'<br><hr><br>';
  
  echo '<h3 style="float:right; margin-right:20px;">Amount Payable : <b><u><span style="color:red; font-size:30px;"> Rs. '.$price.'</span></u></b></h3><br><br><br><br>';
  echo '<form name="myForm3" enctype="multipart/form-data"  action="buy.php" method="post">';
		echo '<input type = "submit" style="font-size:16px;float:right;" name="buy" value="Buy" >';
		echo'</form>';
  echo '</div>';
  echo '</div>';
  
  mysqli_close($con);
  echo '</div>';
  echo '</div>';
  echo '</div>';
	}
	?>
	
	
</div>

</body></html>
<?php
?>