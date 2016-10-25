<?php
session_start();
?>
<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
//mysql_select_db("blog", $con);
 
  $name=$_POST['Username'];
  $pwd=$_POST['Password'];
  $email=$_POST['Email'];
  $add = $_POST['add'];
 $_SESSION['username']=$_POST['Username'];
  $contactno=$_POST['ContactNo'];
  
  $query="SELECT name FROM user where name='$name'";
  $result=mysqli_query($con,$query);
  $num=mysqli_num_rows($result);
  
  $query_email="SELECT email FROM user where email='$email'";
  $result_email=mysqli_query($con,$query_email);
  $num_email=mysqli_num_rows($result_email);
  if($num > 0)
  {
	  
	  $_SESSION["check_name"]="Account not created";
	  header("Location:register.php");
	  
  }
  else if($num_email>0)
  {
	  $_SESSION["check_email"]="Account not created";
	  header("Location:register.php");
  }
  
  else{
  $sqlinsert="INSERT INTO user(name,password,email,address,mobile,admin) VALUES ('$name','$pwd','$email','$add','$contactno',0)";
  if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record') ;
	 
  }else
  
  {
	  $_SESSION['username']=$name;
	  $_SESSION["check"]="Account created successfully";
	  $_SESSION["check_name"]="";
	  $_SESSION["check_email"]="";
	  header("Location:register.php");
}
  }
 $_SESSION['username']=$_POST['Username'];
mysqli_close($con);
?>

</body>
</html>
<?php
?>
