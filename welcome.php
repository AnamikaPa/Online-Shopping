<?php
session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
$_SESSION['added_to_cart']="";
$username= $_SESSION['username'];
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="main1.css">
<link rel="stylesheet" type="text/css" href="wellcome.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body  >
<?php
if(strcmp($_SESSION['checkdelete'],"false")==0)
{
	?><script>alert("Error in deleting :(");</script><?php
	
}
if(strcmp($_SESSION['checkdelete'],"true")==0)
{
	?><script>alert("Deleted successfully :)");</script><?php
	
}
if(strcmp($_SESSION['order_placed'],"false")==0)
{
	?><script>alert("Your cart is empty");</script><?php
	
}
if(strcmp($_SESSION['order_confirmed'],"true")==0)
{
	?><script>alert("Your items will be shipped within 3 days..\nHAPPY SHOPPING :)");</script><?php
	
}

$_SESSION['checkdelete']="";
$_SESSION['countcontact']=0;
$_SESSION['countaddress']=0;
$_SESSION['order_placed']="";
$_SESSION['order_confirmed']="";
?>

<?php
$con = mysqli_connect("localhost","root","","SubKuch");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$query_name="SELECT name, email , address , mobile FROM user WHERE name='$username'";
	  $result_name=mysqli_query($con,$query_name);
	  $row_name = mysqli_fetch_assoc($result_name);
	  $_SESSION['mobile']=$row_name['mobile'];
	  $_SESSION['address']=$row_name['address'];
	  mysqli_close($con);
?>

<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
					
					<a href="mycart.php" title="My Cart"><img style="width:40px; height:40px; margin-top:4px;" src="image/cart.jpg" OnClick="mycart.php"></a>
					
							<a class="abc" href="welcome.php" title="Home" style="margin-bottom:10px;"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="user_page.php">Edit Profile</a>
							<a class="abc" href="logout.php">Log Out</a>
						
				</div>
			</div>
			
			<?php 
						$con = mysqli_connect("localhost","root","","SubKuch");
						if (!$con){
							die('Could not connect: ' . mysqli_error());
						}
				$result=mysqli_query($con,"SELECT * from image_items where category='pic_slider'");
				while($row = mysqli_fetch_assoc($result)){
			?>
			<img class="mySlides" src=<?php echo $row['image']; ?> style="width:100%; height:300px;">
			
				<?php } ?>
			<br>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 10000); // Change image every 2 seconds
}
</script>
<div class="q">
<h1 id="a">Electronics</H1>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=mobile"><img id="abc"src="images/mobile.jpg" alt="Chania"></a><h2 class="c1"><span>Mobile</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=mobile_accessories"><img id="abc"src="images/acc.jpg" alt="Chania"></a><h2 class="c2"><span>Mobile Accessories</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=laptop"><img id="abc"src="images/laptop.jpg" alt="Chania"></a><h2 class="c3"><span>Laptop</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=tv"><img id="abc"src="images/tv.jpg" alt="Chania"></a><h2 class="c1"><span>TVs</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=camera_accessories"><img id="abc"src="images/camera.jpg" alt="Chania"></a><h2 class="c2"><span>Camera Accessories</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=network_components"><img id="abc"src="images/router.jpg" alt="Chania"></a><h2 class="c3"><span>Network Components</span></h2></div>
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a"> Appliances</H1>
<div class="container">
  <br>
  <div id="myCarousel2" class="carousel slide" data-ride="carousel2">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel2" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=home_entertainment"><img id="abc"src="images/speaker.jpg" alt="Chania"></a><h2 class="c1"><span>Home Entertainment</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=washing_machine"><img id="abc"src="images/washing.jpg" alt="Chania"></a><h2 class="c2"><span>Washing Machines</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=refrigerator"><img id="abc"src="images/frige.jpg" alt="Chania"></a><h2 class="c3"><span>Referigerator</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=kitchen_appliances"><img id="abc" src="images/kit.jpg" alt="Chania"></a><h2 class="c1"><span>Kitchen Appliances</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=air_conditioners"><img id="abc"src="images/air.jpg" alt="Chania"></a><h2 class="c2"><span>Air Conditioners</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=small_home_appliances"><img id="abc"src="images/app.jpg" alt="Chania"></a><h2 class="c3"><span>Small Home Appliances</span></h2></div>
      </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a"> Men</H1>
<div class="container">
  <br>
  <div id="myCarousel3" class="carousel slide" data-ride="carousel3">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel3" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=men_footware"><img id="abc" src="images/foot.jpg" alt="Chania"></a><h2 class="c1"><span> Footware</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=men_clothing"><img id="abc" src="images/menc.jpg" alt="Chania"></a><h2 class="c2"><span>Clothing</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=men_watches"><img id="abc" src="images/mw.jpg" alt="Chania"></a><h2 class="c3"><span>Watches</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=men_accesories"><img id="abc"src="images/ma.jpg" alt="Chania"></a><h2 class="c1"><span>Accesories</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=men_personal_care"><img id="abc"src="images/pc.jpg" alt="Chania"></a><h2 class="c2"><span>Personal Care</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=mens_grooming"><img id="abc"src="images/mg.jpg" alt="Chania"></a><h2 class="c3"><span>Men's Grooming</span></h2></div>
      </div>
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a"> Women</H1>
<div class="container">
  <br>
  <div id="myCarousel4" class="carousel slide" data-ride="carousel4">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel4" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel4" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=women_clothing"><img id="abc"src="images/wc.jpg" alt="Chania"></a><h2 class="c1"><span>Clothing</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=women_footwear"><img id="abc"src="images/wf.jpg" alt="Chania"></a><h2 class="c2"><span>Footwear</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=women_accessories"><img id="abc"src="images/wa.jpg" alt="Chania"></a><h2 class="c3"><span>Accessories</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=women_watches"><img id="abc"src="images/ww.jpg" alt="Chania"></a><h2 class="c1"><span>Watches</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=beauty&personal_care"><img id="abc"src="images/wpc.jpg" alt="Chania"></a><h2 class="c2"><span>Beauty and Personal Care</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=jewellary"><img id="abc"src="images/j.jpg" alt="Chania"></a><h2 class="c3"><span>Jewellary</span></h2></div>
      </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel4" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel4" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a">Baby & Kids</H1>
<div class="container">
  <br>
  <div id="myCarousel5" class="carousel slide" data-ride="carousel5">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=girls_clothing"><img id="abc"src="images/gc.jpg" alt="Chania"></a><h2 class="c1"><span>Girl's Clothing</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=boys_clothing"><img id="abc"src="images/bc.jpg" alt="Chania"></a><h2 class="c2"><span>Boy's Clothing</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=kids_footware"><img id="abc"src="images/kf.jpg" alt="Chania"></a><h2 class="c3"><span>Kids Footware</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=school_supplies"><img id="abc"src="images/sc.jpg" alt="Chania"></a><h2 class="c1"><span>School Supplies</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=toys"><img id="abc"src="images/t.jpg" alt="Chania"></a><h2 class="c2"><span>Toys</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=baby_care"><img id="abc"src="images/care.jpg" alt="Chania"></a><h2 class="c3"><span>Baby Care</span></h2></div>
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel5" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel5" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a"> Home & Furniture</H1>
<div class="container">
  <br>
  <div id="myCarousel6" class="carousel slide" data-ride="carousel6">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel6" data-slide-to="0" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=kitchen&dining"><img id="abc"src="images/kd.jpg" alt="Chania"></a><h2 class="c1"><span>Kitchen & Dining</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=furniture"><img id="abc"src="images/fur.jpg" alt="Chania"></a><h2 class="c2"><span>Furniture</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=home_decor"><img id="abc"src="images/hd.jpg" alt="Chania"></a><h2 class="c3"><span>Home Decore</span></h2></div>
     </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel6" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel6" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<h1 id="a">Books & More</H1>
<div class="container">
  <br>
  <div id="myCarousel7" class="carousel slide" data-ride="carousel7">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel7" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel7" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div id="abc"><a href="itemcategory.php?Category=books"><img id="abc"src="images/book.jpg" alt="Chania"></a><h2 class="c1"><span>Books</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=stationaries"><img id="abc"src="images/s.jpg" alt="Chania"></a><h2 class="c2"><span>Stationaries</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=gaming"><img id="abc"src="images/g.jpg" alt="Chania"></a><h2 class="c3"><span>Gaming</span></h2></div>
     </div>

      <div class="item">
		<div id="abc"><a href="itemcategory.php?Category=automobiles"><img id="abc"src="images/a.jpg" alt="Chania"></a><h2 class="c1"><span>Automobiles</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=musical_instruments"><img id="abc"src="images/mi.jpg" alt="Chania"></a><h2 class="c2"><span>Musical Instruments</span></h2></div>
        <div id="abc"><a href="itemcategory.php?Category=fitness_accessories"><img id="abc"src="images/fa.jpg" alt="Chania"></a><h2 class="c3"><span>Fitness Accessories</span></h2></div>
      </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel7" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel7" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>			
		
  </body>
</html>
<?php
} else{
	header("Location:error_page.php");
}
?>

