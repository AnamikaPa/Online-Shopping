<?php
session_start();
$itemid= $_POST['itemid'];
$_SESSION['item_detail_id']=$itemid;
header("Location:detail.php");
?>