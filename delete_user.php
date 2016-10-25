<?php
	session_start();
	if(isset($_POST['submit'])){
		echo $_POST['user'];
		$host='localhost';
		$user='root';
		$pass='';
		$db='subkuch';

		// Create connection
		$conn = new mysqli($host,$user,$pass,$db);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
	echo $_POST['user'];
		$qry1 = "delete from buyitem WHERE username='$_POST[user]' ";
		$abc1 = mysqli_query($conn,$qry1);
		$qry = "delete from user WHERE name='$_POST[user]' ";
		$abc = mysqli_query($conn,$qry);
		if($abc && $abc1){
			echo "yes";
			$_SESSION["delete"]="yes";
		}
		else{
			echo "error";
			$_SESSION["delete"]="error";
			header("Location: welcome.php");
		}
		$_SESSION['username']="username";
		header("Location: main.php");
		
	}
?>