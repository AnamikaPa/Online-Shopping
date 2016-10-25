<?php
session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
$username= $_SESSION['username'];
$_SESSION['back']="mycart";
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
<style>
.head{
	width:100%;
	height:100%;
}
.main{
	padding:20px;
	margin:50px 5px;
	width:70%;
	height:200px;
	float:left;
}
.image{
	float:left;
	width:20%;
	height:200px;
	margin-left:20px;
	margin-right:10px;
}

.item_desc{
	float:left;
	margin-right:50px;
}
.desc{
	float:left;
	width;20%;
	height:100%;
	text-align:center;
	margin-right:50px;
}

.button{
	float:left;
	margin-top:20px;
}

.form{
	position:absolute;
	width:33%;
	height:100%;
	background-color: lightgrey;
	margin-left:65%;
}
</style>
</head>

<body>
			<div id="header">
				<a href="main.php"></a>
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
			</div>
<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  echo $username;
  $query="SELECT item_id , quantity FROM buyitem WHERE username='$username'";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  if($num>0)
  {
  echo '<div class = "head">';
  while($row = mysqli_fetch_assoc($result))
  {
	  $itemid=$row['item_id'];
	  $quantity=$row['quantity'];
	  $query_item="SELECT image , name , category , price , colour , description , quantity FROM image_items WHERE id='$itemid'";
	  $result_item=mysqli_query($con,$query_item);
	  $row_item = mysqli_fetch_assoc($result_item);
	  $image_item=$row_item['image'];
	  $name_item=$row_item['name'];
	  $category_item=$row_item['category'];
	  $price_item=$row_item['price'];
	  $description_item=$row_item['description'];
	  $colour_item=$row_item['colour'];
	  $quantity_item=$row_item['quantity'];
	  $total= $quantity * $price_item;
	  
	  echo '<div class = "main">';
	  
		echo '<div class="image">';
			echo '<img style="width:100%; height:100%;" src="' . $image_item . ' "/>';
		echo '</div>';
		echo '<div class="item_desc">';
			echo '<p>Product Model : '.$name_item . '</p>';
		echo '</div>';
		
		echo '<div class="desc">';
			echo '<h4><u>  Quantity </u>: '.$quantity .'</h4>';
			echo '<h4><u>  Cost </u> : '. $price_item .'</h4>';
			
		echo '<h4><u>  Subcost </u> : '. $total .'</h4>';
			
		echo '</div>';
		
		echo '<div class="button">';
		
		echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="cancel.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$itemid.'>';
							echo '<input class="cancel" type="submit" value="Cancel" name="cancel">';
						echo "</form>";
						echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="cancel.php" method="post">';
							echo '<input type="hidden" name="itemid" value='.$itemid.'>';
							echo '<input class="cancel" type="submit" value="Qty(-)" name="reduce">';
						echo "</form>";
							if($quantity_item==0){
						echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="" method="post">';
							echo '<input class="cancel" type="submit" value=" Qty(+)" name="add" disabled />';
						echo "</form>";
							}
							else{
								echo '<form name="myForm2" enctype="multipart/form-data" onsubmit="" action="cancel.php" method="post">';
								echo '<input type="hidden" name="itemid" value='.$itemid.'>';
							echo '<input class="cancel" type="submit" value="Qty(+)" name="add">';
						echo "</form>";
							}
							
			
		echo '</div>';
		echo '</div>';
  }
  $query_name="SELECT name, email , address , mobile FROM user WHERE name='$username'";
	  $result_name=mysqli_query($con,$query_name);
	  $row_name = mysqli_fetch_assoc($result_name);
  echo '<div class="form">';
  echo '<h3 style="font-size:20px;text-align:center;"><u><b>Shipping Detail</b></u></h3><hr>';
  echo '<h3 style="font-size:20px;text-align:center;">TO : <i>'.$row_name['name'].'</i></h3>';
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
 
  echo'<hr>';
  echo '<h3 style="font-size:20px;text-align:center;">Products</h3>';
  $query="SELECT item_id , quantity FROM buyitem WHERE username='$username'";
  $result=mysqli_query($con,$query);
  echo'<table style="width:100%; text-align:center;">';
  echo'<tr style="width:100%">';
   echo '<td style="width:25%"><b><u> Item </b></u> </td>';
   echo '<td style="width:25%"> <b><u>Quantity</b></u> </td>';
   echo '<td style="width:30%"><b><u> Subcost </b></u></td>';
   echo'</tr>';
   $total_amount=0;
   while($row = mysqli_fetch_assoc($result))
  {
	  $itemid=$row['item_id'];
	  $quantity=$row['quantity'];
	  $query_item="SELECT name , price  FROM image_items WHERE id='$itemid'";
	  $result_item=mysqli_query($con,$query_item);
	  $row_item = mysqli_fetch_assoc($result_item);
	  $name_item=$row_item['name'];
	  $price_item=$row_item['price'];
	  $total= $quantity * $price_item;
	  echo'<tr style="width:100%">';
   echo '<td style="width:25%"> '.$name_item.' </td>';
   echo '<td style="width:25%"> '.$quantity.' </td>';
   echo '<td style="width:30%">'.$total.'</td>';
   $total_amount=$total_amount + $total;
   echo'</tr>';
  }
  echo'</table>';
  echo '<h3 style="float:right; margin-right:20px;">Amount Payable : <b><u><span style="color:red; font-size:30px;"> Rs '.$total_amount.'</span></u></b></h3><br><br><br><br>';
  echo '<form name="myForm3" enctype="multipart/form-data"  action="orderconfirm.php" method="post">';
		echo '<input type = "submit" style="font-size:16px;margin-right:-200px;float:right;" name="contactme" value="Place My Order" >';
		echo'</form>';
  echo '</div>';
  echo '</div>';
  }
  else{
	  $_SESSION['order_placed']='false';
	  header("location:welcome.php");
  }
  echo '</div>';
  mysqli_close($con);
?>
</body>
</html>
<?php
} else{
	header("Location:error_page.php");
}
?>