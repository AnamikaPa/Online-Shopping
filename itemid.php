<?php
session_start();
$_SESSION['item_id']=$_POST['itemid'];
header("location:edit.php");
?>

