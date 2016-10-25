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
	
		$qry = "DELETE FROM confirm_order WHERE id ='$_POST[user]'";
		$abc = mysqli_query($conn,$qry);
		if($abc){
			$_SESSION['delete']="yes";
		}
		else{
			$_SESSION['delete']="error";
		}
		header("Location:ship.php");
	}

?>