<?php
	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
?>
<html>
	<head>
		  <meta charset="utf-8">
  <link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" href="wellcome.css">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<title>Admin Page</title>
	</head>
	<body>
		<div id="pink">
			<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a><div id="right">
					<a class="abc" href="admin.php" title="Home">Home</a>
					<a class="abc" href="user.php"> User's Info </a>
					<a class="abc" href="ship.php">Shipping Details </a>
					<a class="abc" href="a_contact.php">Visitor's Contact </a>
					<a class="abc" href="user_page.php">Account</a>
					<a class="abc" href="logout.php">Log Out</a>
				</div>
			</div>
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
		<div id="abc"><a href="itemcategory.php?Category=school_suplies"><img id="abc"src="images/sc.jpg" alt="Chania"></a><h2 class="c1"><span>School Supplies</span></h2></div>
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
<h1 id="a"> Slider</H1>
<div class="container">
  <br>
  <div id="myCarousel8" class="carousel slide" data-ride="carousel6">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel8" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel8" data-slide-to="1"></li>
      <li data-target="#myCarousel8" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <a href="itemcategory.php?Category=pic_slider"><img style="height:300px; width:100%" src="pic.jpg" alt="Chania"></a><h2 >
       </div>
	   
      <div class="item">
		<a href="itemcategory.php?Category=pic_slider"><img style="height:300px; width:100%" src="picslider1.jpg" alt="Chania"></a>
       </div>
	  
      <div class="item">
		<a href="itemcategory.php?Category=pic_slider"><img style="height:300px; width:100%" src="picslider2.jpg" alt="Chania"></a>
       </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel8" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel8" role="button" data-slide="next">
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
