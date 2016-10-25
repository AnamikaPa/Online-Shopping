<?php
session_start();
?>

<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
  $name=$_POST['Email_Name'];
  $pwd=$_POST['Password'];
  
  
  $query="SELECT name, password FROM user where ( name='$name' or email='$name') and binary password='$pwd'";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  
  $query_admin="SELECT name FROM user where admin = 1";
  $query_admin_email= "SELECT email FROM user WHERE admin= 1";
  $result_admin=mysqli_query($con,$query_admin);
  $result_admin_email=mysqli_query($con,$query_admin_email);
  $row_admin = mysqli_fetch_assoc($result_admin);
  $row_admin_email = mysqli_fetch_assoc($result_admin_email);
  $admin= $row_admin['name'];
  $admin_email= $row_admin_email['email'];

  
  if($num > 0)
  {
	  if(strcmp($name,$admin)==0){
		  $_SESSION['username']=$name;
		  header("Location:admin.php");
	  }
	  else if(strcmp($name,$admin_email)==0)
	  {
		  $_SESSION['username']=$admin;
		  header("Location:admin.php");
	  }
	  else{
		  $query_name= "SELECT name FROM user where name= '$name' or email= '$name'";
		  $result_name=mysqli_query($con,$query_name);
		  $row_name = mysqli_fetch_assoc($result_name);
		  $_SESSION['username']=$row_name['name'];
	  header("Location:welcome.php");
	  }
  }
  else
  {
			 $_SESSION['login']="login failed";
	  	  header("Location:login.php");
} 
  
mysqli_close($con);
?>
