<?php
session_start();
$itemid=$_POST['itemid'];
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 if(isset($_POST['cancel']))
 {
	 $query_get_quantity= "SELECT quantity FROM buyitem WHERE item_id='$itemid'";
	 $result_get_quantity=mysqli_query($con,$query_get_quantity);
	 $row_get_quantity = mysqli_fetch_assoc($result_get_quantity);
	 $addquantity= $row_get_quantity['quantity'];
	 
	 $query= "DELETE FROM buyitem WHERE item_id='$itemid'";
	 $result=mysqli_query($con,$query);
	 
	 $query_quantity= "UPDATE image_items SET quantity=quantity + '$addquantity' WHERE id='$itemid'";
	 $result_quantity=mysqli_query($con,$query_quantity);
 }
 else if(isset($_POST['reduce'])){
	 $query= "UPDATE buyitem SET quantity=quantity-1 WHERE item_id='$itemid'";
	 $result=mysqli_query($con,$query);
	 
	 $query_see_quantity="SELECT quantity FROM buyitem WHERE item_id='$itemid'";
	 $result_see_quantity=mysqli_query($con,$query_see_quantity);
	 $row_see_quantity = mysqli_fetch_assoc($result_see_quantity);
	 if($row_see_quantity['quantity']==0){
		 $query= "DELETE FROM buyitem WHERE item_id='$itemid'";
	 $result=mysqli_query($con,$query);
	 }	 
	 $query_quantity= "UPDATE image_items SET quantity=quantity+1 WHERE id='$itemid'";
	 $result_quantity=mysqli_query($con,$query_quantity);
 }
 else{
	 $query= "UPDATE buyitem SET quantity=quantity+1 WHERE item_id='$itemid'";
	 $result=mysqli_query($con,$query);
	 $query_quantity= "UPDATE image_items SET quantity=quantity-1 WHERE id='$itemid'";
	 $result_quantity=mysqli_query($con,$query_quantity); 
 }
 header("location:mycart.php");
 mysqli_close($con);
?>