<?php
session_start();
$_SESSION['speci']='true';
$con = mysqli_connect("localhost","root","","SubKuch");
$username=$_SESSION['username'];
$mobile=$_SESSION['mobile'];
$address=$_SESSION['address'];
$itemid=$_SESSION['item_detail_id'];
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $query_email="SELECT address, email, mobile FROM user WHERE name='$username'";
  $result_email=mysqli_query($con,$query_email);
  $row_email = mysqli_fetch_assoc($result_email);
  $email=$row_email['email'];
  $_SESSION['mobile']=$row_email['mobile'];
  $_SESSION['address']=$row_email['address'];
  
  $query_cart="SELECT cart FROM confirm_order WHERE username='$username'";
  $result_cart=mysqli_query($con,$query_cart);
  
  $num_cart=mysqli_num_rows($result_cart);
  if($num_cart>0)
  {
	  while($row_cart = mysqli_fetch_assoc($result_cart))
	  {
		  $cart=$row_cart['cart'];
	  }
  }
  else{
	  $cart=0;
  }
		$cart= $cart+1;
	  
		$query_itemname="SELECT name FROM image_items WHERE id='$itemid'";
		$result_itemname=mysqli_query($con,$query_itemname);
		$row_itemname = mysqli_fetch_assoc($result_itemname);
		$itemname=$row_itemname['name'];
		
		$query_insert="INSERT INTO confirm_order(username,item_id,quantity,contact,email,address,item_name,cart) VALUES('$username','$itemid',1,'$mobile','$email','$address','$itemname','$cart')";
		$result_insert=mysqli_query($con,$query_insert);

		$query_update="UPDATE image_items SET quantity=quantity-1 WHERE id='$itemid'";
		$result_update=mysqli_query($con,$query_update);
		
 mysqli_close($con);
 $_SESSION['buy_confirmed']='true';
		header("location:detail.php");
?>