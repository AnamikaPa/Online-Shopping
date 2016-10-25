<?php
session_start();

$_SESSION['item_cat']= $_GET['Category'];
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$query= "SELECT name FROM user WHERE admin=1";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);

if(strcmp($_SESSION['username'],$row['name'])==0)
	header("location:items.php");
else
	header("location:buyitems.php");
mysqli_close($con);

?>

