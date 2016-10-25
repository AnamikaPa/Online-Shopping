<?php
session_start();
$item_id= $_SESSION['item_id'];
?>
<?php
$name=$_SESSION["item_name"];
$price= $_SESSION["item_price"];
$colour= $_SESSION["item_colour"];
$desc=$_SESSION["item_desc"];
$category=$_SESSION["Category"];
$image= $_SESSION['image'];
$quantity= $_SESSION['quantity'];

$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  
  if(strcmp($_POST['update'],"notupdate")==0) 
  {	  
	$query= "INSERT INTO image_items(image,name,description,category,price,colour,quantity) VALUES ('$image','$name','$desc','$category','$price','$colour','$quantity')";
	if(!mysqli_query($con,$query)){
		$_SESSION['checksave']="false";
	 
	}else
	{	
		$_SESSION['checksave']="true";
	}
	header("Location:items.php");
  }
  
  else if(strcmp($_POST['update'],"update")==0){
	  
	  $query = "UPDATE image_items SET image='$image',name='$name',description='$desc',category='$category',price='$price',colour='$colour' , quantity='$quantity' WHERE id= '$item_id'";
	  if(!mysqli_query($con,$query)){
		$_SESSION['checkupdate']="false";
	 
	}else
	{	
		$_SESSION['checkupdate']="true";
	}
    header("Location:items.php");
  }
  
  
  mysqli_close($con);
?>
