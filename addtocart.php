<?php
session_start();
$username=$_SESSION['username'];
?>
<?php
if(strcmp($_SESSION['page'],"buyitems")==0)
  {
	$itemid=$_POST['itemid'];
  }
  else
  {
	$itemid= $_SESSION['item_detail_id'];
  }


$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $query_get_name="SELECT name FROM image_items where id= '$itemid'";
  $result_get_name=mysqli_query($con,$query_get_name);
  $row_get_name = mysqli_fetch_assoc($result_get_name);
  $_SESSION['get_name']=$row_get_name['name'];
  
  $query_quantity="SELECT username FROM buyitem WHERE item_id='$itemid' and username='$username'";
  $result_quantity=mysqli_query($con,$query_quantity);
  $num=mysqli_num_rows($result_quantity);
  if($num>0)
	  
	  {
		  $query="UPDATE buyitem SET quantity=quantity+1 WHERE item_id='$itemid' and username='$username'";
		  $result=mysqli_query($con,$query);
	  }
  else{
  $query="INSERT INTO buyitem(username,item_id,quantity)VALUES('$username','$itemid',1)";
  $result=mysqli_query($con,$query);
  }
  
  $query_quantity= "Update image_items set quantity= quantity-1 where id= '$itemid'";
  $result_quantity=mysqli_query($con,$query_quantity);
  $_SESSION['added_to_cart']="true";
  if(strcmp($_SESSION['page'],"buyitems")==0)
  {
	$_SESSION['page']="";
	header("location:buyitems.php");
  }
  else
  {
	  $_SESSION['page']="";
	header("location:detail.php");
  }
  mysqli_close($con);
?>

