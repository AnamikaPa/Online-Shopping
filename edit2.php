<?php
	session_start();
	if(isset($_POST['done'])){
		echo $_POST['Username'];
		echo $_POST['Email'];
		echo $_POST['mobile'];
		echo $_POST['OPassword'];
		echo $_POST['Password'];
		echo $_POST['Cpassword'];
		
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
		
		if($_POST['OPassword']==''){
			$abc = mysqli_query($conn,"Select * from user where BINARY NAME = '$_POST[Username]' and id!='$_POST[id]'");
			$ab= mysqli_query($conn,"SELECT * FROM user WHERE binary email='$_POST[Email]' and id!='$_POST[id]' ");
		
			if(mysqli_num_rows($abc)!=0){
				echo "user";
				$_SESSION['usernam']="username";
				$_SESSION['register']="no";
				echo $_SESSION['usernam'];
				header("Location: user_page.php");
			}
			else if(mysqli_num_rows($ab)!=0){
				echo "email";
				$_SESSION['usernam']="email";
				$_SESSION['register']="no";
				echo $_SESSION['usernam'];
				header("Location: user_page.php");
			}
			else{
				$def = mysqli_query($conn,"UPDATE buyitem set username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
				$def = mysqli_query($conn,"UPDATE confirm_order set email='$_POST[Email]',contact= '$_POST[mobile]',username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
				$def = mysqli_query($conn,"UPDATE user set NAME='$_POST[Username]',EMAIL='$_POST[Email]',MOBILE ='$_POST[mobile]' where id='$_POST[id]'");
				$_SESSION['username']=$_POST['Username'];
				$_SESSION['register']="yes";
				header("Location: user_page.php");
			}
		}
			
		if($_POST['OPassword']!=''){
		$ab= mysqli_query($conn,"SELECT * FROM user WHERE id='$_POST[id]' ");
		$a = mysqli_fetch_array($ab);
		
		if($_SESSION['username']!=$_POST['Username']){
			$abc = mysqli_query($conn,"Select * from user where BINARY NAME = '$_POST[Username]'");
			if(mysqli_num_rows($abc)!=0){
				echo "user";
				$_SESSION['usernam']="username";
				$_SESSION['register']="no";
				echo $_SESSION['usernam'];
				header("Location: user_page.php");
			}
		}
		
		if($a['email']!=$_POST['Email']){
			$abc = mysqli_query($conn,"Select * from user where BINARY EMAIL = '$_POST[Email]' and id='$_POST[id]'");
			if(mysqli_num_rows($abc)!=0){
				echo "email";
				$_SESSION['usernam']="email";
				$_SESSION['register']="no";
				echo $_SESSION['usernam'];
				header("Location: user_page.php");
			}
		}
		
		if($_POST['OPassword']!=''){
			$abc = mysqli_query($conn,"Select * from user where BINARY NAME = '$_SESSION[username]' and  BINARY PASSWORD='$_POST[OPassword]'");
			if(mysqli_num_rows($abc)==0){
				echo "user";
				$_SESSION['usernam']="password";
				echo $_SESSION['usernam'];
				header("Location: user_page.php");
			}
			else{
				$def = mysqli_query($conn,"UPDATE buyitem set username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
				$def = mysqli_query($conn,"UPDATE confirm_order set email='$_POST[Email]',contact= '$_POST[mobile]',username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
				
				$def = mysqli_query($conn,"UPDATE user set NAME='$_POST[Username]',EMAIL='$_POST[Email]',PASSWORD='$_POST[Password]',MOBILE= '$_POST[mobile]' where ID='$a[id]'");
				$_SESSION['username']=$_POST['Username'];
				$_SESSION['register']="yes";
				header("Location: user_page.php");
			}
		}
		else{
			$def = mysqli_query($conn,"UPDATE buyitem set username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
			$def = mysqli_query($conn,"UPDATE confirm_order set email='$_POST[Email]',contact= '$_POST[mobile]',username='$_POST[Username]' WHERE username='$_SESSION[username]' "); 
			$def = mysqli_query($conn,"UPDATE user set NAME='$_POST[Username]',EMAIL='$_POST[Email]',MOBILE= '$_POST[mobile]' where ID='$a[ID]'");
			$_SESSION['username']=$_POST['Username'];
			$_SESSION['register']="yes";
			//header("Location: user_page.php");
		}
		
		}
	$conn->close();
	}
	
?>