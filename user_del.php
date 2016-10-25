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
	
		$qry = "DELETE FROM user WHERE id ='$_POST[user]'";
		$abc = mysqli_query($conn,$qry);
		
		
		$qry = "select name from user WHERE id ='$_POST[user]'";
		$name = mysqli_query($conn,$qry);
		$row = mysqli_fetch_array($name);
		$qry = "DELETE FROM buyitem WHERE name ='$_row[name]'";
		$abc = mysqli_query($conn,$qry);
		if($abc){
			$_SESSION['delete']="yes";
		}
		else{
			$_SESSION['delete']="error";
		}
		header("Location:user.php");
	}

?>