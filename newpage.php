<?php
session_start();
if(isset($_POST['contactme']))
{
$_SESSION['countcontact']=1;
}
if(isset($_POST['addressme'])){
	$_SESSION['countaddress']=1;
}
if(strcmp($_SESSION['back'],"mycart")==0)
header("location:mycart.php");
else
	header("location:detail.php");
?>