<?php
session_start();
?>
<?php
$id= $_POST['itemid'];
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  
$query="DELETE FROM image_items WHERE id= '$id'";
if(!mysqli_query($con,$query)){
		$_SESSION['checkdelete']="false";
	 
	}else
	{	
		$_SESSION['checkdelete']="true";
	}
	header("location:items.php");

?>