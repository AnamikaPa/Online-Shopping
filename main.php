<script>
	<?php
	session_start();
	if($_SESSION["logout"]=="logout"){
		?> alert("You have Sucessfully logged out");<?php
		$_SESSION["logout"] = "loggedin";
	}
	if($_SESSION["username"]=='') $_SESSION["username"] ="username";
	$_SESSION['login']="";
	$_SESSION["abcd"]="";
	?>
</script>


<html>
	<head>
		<title>Online Shopping</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main1.css">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<style>
.mySlides {display:none;}

#main-nav{
	margin-left:-40px;
}
</style>
	</head>
	
	<body>
	
		<div id="pink">
			<div id="header">
				<a href="main.php"><img id ="left" src="logo.png" OnClick="main.php"></a>
				<div id ="right">
					<a class="abc" href="contact.php">Contact Us</a>
					<?php
						$con = mysqli_connect("localhost","root","","SubKuch");
						if (!$con){
							die('Could not connect: ' . mysqli_error());
						}
						if(isset($_SESSION["username"]) && $_SESSION["username"]!="username"){
							$result=mysqli_query($con,"SELECT * from user where name='$_SESSION[username]'");
							$row_item = mysqli_fetch_assoc($result);
							$row = mysqli_num_rows($result);	
							if($row!=0){ 
							if($row_item['admin']==1){?>
							<a class="abc" href="admin.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="logout.php">Log Out</a>
						<?php  }
							else{?>
							<a class="abc" href="welcome.php" title="Home"><?PHP echo "Welcome ".$_SESSION["username"]."!!";?></a>
							<a class="abc" href="logout.php">Log Out</a>
						<?php }}}
						if(!isset($_SESSION["username"]) || $_SESSION["username"]=="username"){ ?>
							<a class="abc" href="login.php">Sign In</a>
					<?php } ?>
				</div>
			</div>
			<DIV ID="div1">
			<UL id="main-nav">
				<LI><a href="#">Electronics
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=mobile">Mobiles</a></li>
						<li ><a href="visitor.php?Category=mobile_accessories">Mobile Accessories</a></li>
						<li ><a href="visitor.php?Category=laptop">Laptops</a></li>
						<li ><a href="visitor.php?Category=tv">TVs</a></li>
						<li ><a href="visitor.php?Category=camera_accessories">Camera Accessories</a></li>
						<li ><a href="visitor.php?Category=network_components">Network Components</a></li>
					</ul>
				</LI>
				<LI><a href="#">Appliances
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=home_entertainment">Home Entertainment</a></li>
						<li ><a href="visitor.php?Category=washing_machine">Washing Machine</a></li>
						<li ><a href="visitor.php?Category=refrigerator">Refrigerators</a></li>
						<li ><a href="visitor.php?Category=kitchen_appliances">Air Conditioners</a></li>
						<li ><a href="visitor.php?Category=air_conditioners">Kitchen Appliances</a></li>
						<li ><a href="visitor.php?Category=small_home_appliances">Small Home Appliances</a></li>
					</ul>
				</LI>
				<LI><a href="#">Men
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=men_footware">Footwear</a></li>
						<li ><a href="visitor.php?Category=men_clothing">Clothing</a></li>
						<li ><a href="visitor.php?Category=men_watches">Watches</a></li>
						<li ><a href="visitor.php?Category=men_accesories">Accessories</a></li>
						<li ><a href="visitor.php?Category=men_personal_care">Personal Care Appliances</a></li>
						<li ><a href="visitor.php?Category=mens_grooming">Men's Grooming</a></li>
					</ul>
				</LI>
				<LI><a href="#">Women
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=women_clothing">Clothing</a></li>
						<li ><a href="visitor.php?Category=women_footwear">Footwear</a></li>
						<li ><a href="visitor.php?Category=women_accessories">Accessories</a></li>
						<li ><a href="visitor.php?Category=women_watches">Watches</a></li>
						<li ><a href="visitor.php?Category=beauty&personal_care">Beauty & Personal Care</a></li>
						<li ><a href="visitor.php?Category=jewellary">Jewellery</a></li>
					</ul>
				</LI>
				<LI><a href="#">Baby & Kids
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=girls_clothing">Girl's Clothing</a></li>
						<li ><a href="visitor.php?Category=boys_clothing">Boy's Clothing</a></li>
						<li ><a href="visitor.php?Category=kids_footware">Kids Footwear</a></li>
						<li ><a href="visitor.php?Category=school_supplies">School Supplies</a></li>
						<li ><a href="visitor.php?Category=toys">Toys</a></li>
						<li ><a href="visitor.php?Category=baby_care">Baby Care</a></li>
					</ul>
				</LI>
				
				<LI><a href="#">Home & Furniture
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=kitchen&dining">Kitchen & Dining</a></li>
						<li ><a href="visitor.php?Category=furniture">Furniture</a></li>
						<li ><a href="visitor.php?Category=home_decor">Home Decor</a></li>
					</ul>
				</LI>
				<LI><a href="#">Books & More
					<span class="darrow">&#9660;</span></a>
					<ul class="sub1">
						<li ><a href="visitor.php?Category=books">Books</a></li>
						<li ><a href="visitor.php?Category=stationaries">Stationary</a></li>
						<li ><a href="visitor.php?Category=gaming">Gaming</a></li>
						<li ><a href="visitor.php?Category=musical_instruments">Musical Instruments</a></li>
						<li ><a href="visitor.php?Category=automobiles">Automobiles</a></li>
						<li ><a href="visitor.php?Category=fitness_accessories">Fitness Accessories</a></li>
					</ul>
				</LI>
			</UL>	
				
		</div>
			
			<?php 
				$result=mysqli_query($con,"SELECT * from image_items where category='pic_slider'");
				while($row = mysqli_fetch_assoc($result)){
			?>
			<div id="slides">
			<img class="mySlides" src=<?php echo $row['image']; ?> style="width:100%; height:300px;">
			</div>
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
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
		<div id="first" style="margin-left:30px;">
		<div style="float:left; width:68%; height: 250px;">
		<img src="offerpic.jpg" style="width:100%; height:250px;">
		</div>
		</div>
		<div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.623800701072!2d72.78290001417079!3d21.16736458592344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dede93ea7d1%3A0x238a612304b01088!2sSardar+Vallabhbhai+National+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1469644481263" width="96%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<br />
	<body>
</html>
<script>
<?php
	if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="yes"){
		?>alert("Successfully Deleted  :)"); <?php
		$_SESSION["delete"]="no";
	}
	else if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="error"){
		?>alert("Error!"); <?php
		$_SESSION["delete"]="no";
	}

	if(isset($_SESSION["register"]) && $_SESSION["register"]=="yes"){
		?>alert("You had Successfully created your account :)");<?php
		$_SESSION["register"]="";
	}
?>
</script>