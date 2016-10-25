<?php
session_start();
$con = mysqli_connect("localhost","root","","SubKuch");
$username=$_SESSION['username'];
$mobile=$_SESSION['mobile'];
$address=$_SESSION['address'];
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $query_email="SELECT email FROM user WHERE name='$username'";
  $result_email=mysqli_query($con,$query_email);
  $row_email = mysqli_fetch_assoc($result_email);
  $email=$row_email['email'];
  $query="SELECT item_id , quantity FROM buyitem WHERE username= '$username'";
  $result=mysqli_query($con,$query);
  
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
	  while($row = mysqli_fetch_assoc($result))
	  {
		$itemid=$row['item_id'];
		$quantity=$row['quantity'];
		$query_itemname="SELECT name FROM image_items WHERE id='$itemid'";
		$result_itemname=mysqli_query($con,$query_itemname);
		$row_itemname = mysqli_fetch_assoc($result_itemname);
		$itemname=$row_itemname['name'];
		
		$query_insert="INSERT INTO confirm_order(username,item_id,quantity,contact,email,address,item_name,cart) VALUES('$username','$itemid','$quantity','$mobile','$email','$address','$itemname','$cart')";
		$result_insert=mysqli_query($con,$query_insert);	
	  }
	  
	  $query="DELETE FROM buyitem where username='$username'";
	  $result=mysqli_query($con,$query);
 mysqli_close($con);
 $_SESSION['order_confirmed']='true';
 header("location:welcome.php");
?>