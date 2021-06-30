<!DOCTYPE html>
<html><head><link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
session_start();
include "config.php";
	
		if(isset($_POST['pay'])){
			 
			 
		$Card_Type= $_POST["card_t"];
		$Card_Number = $_POST["card_no"];
		$Card_Holder_Name = $_POST["card_Hname"];
		$Expired_Date = $_POST["expired_d"];
		//$cvv = $_POST["cvv"];
	    
		$Customer_ID= $_SESSION['user'];
		
		

		$sql= "INSERT INTO payments(Card_Type, Card_Number, Card_Holder_Name, Expired_Date, Customer_ID)VALUES('$Card_Type', '$Card_Number', '$Card_Holder_Name', '$Expired_Date', '$Customer_ID')";
		
		 
		
	
	if($conn->query($sql)){
		
		echo "Inserted successfully";
	}
	
	else{
		
		echo "Error:". $conn->error;
		
	}

$conn->close();

  }
?>


<html>
	<head>
	  <meta charset = "utf - 8">
	  <meta name = "description" content = "Locus food ride">
	  <meta name = "keywords" content = "HTML,delivery">
	  <meta name = "author" content = "LFD">
	  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	  <link rel = "stylesheet"  href = "../css/header_style.css">
	  <link rel = "stylesheet"  href = "../css/footer_style.css"> 
	  <link rel = "stylesheet"  href = "../css/side_menu_style.css">
	  <script src = "../js/side_menu_java_script.js"></script>
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  <link rel = "stylesheet"  href = "../css/payment_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Payment</title>
	</head>
		<header>
	<!--<script src = "../js/"></script>-->
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_USER.php">HOME</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "restaurant_page.php">RESTAURANT</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "Offers&Combos.php">ONGOING OFFERS AND COMBOS</a></li>
			<!--<li class = "list_property"><img class = "navigation_property navi head_image" src = "../images/iii.png" alt = "Search"></li>
			<!--<li class = "list_property"><input class = "txtxt" type = "text" placeholder = "Search.." ></li>-->
			<li class = "list_property1"><a class = "navigation_property navi navigation_property2" href = "Logout.php">Sign out</a></li>
			<li class = "list_property1"><a href = "User_Page.php"><img class = "navigation_property navi head_image" src = "../images/userW.png" alt = "User"></a></li>
            <li class = "list_property1"><a href= "Food_cart.php"><img class = "navigation_property head_image" src = "../images/shooping.png" alt = "Food Cart"></a></li>
		</ul>
	
	</header>
	
	
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&lArr;</a>
		  <a href="User_Page.php">MY ACCOUNT</a>
             <a href = "Customer_his.php">ORDER HISTORY </a>
		  <a href="Payment_Detailss.php">PAYMENTS</a>

		  <a href="Logout.php">SIGN OUT</a>
		</div>
		<span class = "menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		<!--
	Enter your code here...
	don't change anything ***
	-->
	
	<div class="bg-img1">
	
	    
			<form action="payment.php" method="POST" class="paymentData">
			
				<h1 id="pay">Payment</h1>
				
				<br/>
				
					  
            
			<h3 id="accept">Accepted Cards</h3>
            
			<div class="icon-container">
			
            <i class="fa fa-cc-visa fa-5x" style="color:navy;"></i>
			
			<i class="fa fa-cc-mastercard fa-5x" style="color:red;"></i>
              
            </div>
			
			<br/><br/>
			
			    
				<label><b> Select Your Card Type</b></label><br/><br/>
				
				<i class="fa fa-cc-visa fa-3x" style="color:navy;"></i><input type ="radio" id="visa" name="card_t" <?php if (isset($Card_Type) && $Card_Type=="Visa") echo "checked";?> value="Visa" >Visa
	            <i class="fa fa-cc-mastercard fa-3x" style="color:red;"></i><input type ="radio" id="master" name="card_t" <?php if (isset($Card_Type) && $Card_Type=="Master") echo "checked";?> value="Master">Master
	
				  
			<br/><br/>
			
			
			
				<label><b>Name on Card</b></label><br/><br/>
				<input type="text" id="cname" name="card_Hname" placeholder="kasun darshana" required><br/><br/>
					
				<label><b>Credit Card Number</b></label><br/><br/>
				<input type="text" id="ccnum" name="card_no" placeholder="1111 2222 3333 4444" pattern="[0-9]{14,16}" title="Card Number should be 14 or 16 digits number" required><br/><br/>
				
				<label><b>Exp Date</b></label><br/><br/>
				<input type="date" id="expdate" name="expired_d" placeholder="01/10/2018" required><br/><br/>
              
			  
			    <br/>
        
				<input name="pay" type="submit" value="Complete" class="btn2">
      
	  </form>
  </div>
  
  
  
	</body>

	<footer>
		<div class="foo">
			<div class="inner-footer">

			

				<div class="footer-items">
					<h2 id="link"> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_USER.php"><li>Home</li></a>
						<a href="restaurant_page.php"><li>Restaurant</li></a>
						<a href="Food_cart.php"><li>Cart</li></a>
						<a href="../html/ContactUSUser.html"><li>Contact Us</li></a>
					</ul>
				</div>

				<div class="footer-items">
					<h2 id="about">About Us</h2>
					<div class="border"></div>
					<ul>
						<a href=""><li>Our Story</li></a>
						<a href=""><li>FAQ</li></a>
						<a href=""><li>Site Map</li></a>
						
					</ul>
				</div>
				

				<div class="footer-items">
					<!--<div class="border"></div>-->
					<img  id = "logoo" src="../images/logo.jpg" alt = "LOCUS FOOD RIDE">

					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>94/2 locus way colombo 7</li>
						<li><i class="fa fa-phone" aria-hidden="true"></i>+9423671245</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i>LocusFoodRide@gmail.com</li>
					</ul> 
					

				<form action = "#" target = "self" method="get">
					<h3 id="language"> Select Language </h3>
					<select class="language">
						<option> English </option>
						<option> Chinese </option>
						<option> French </option>
						<option> Spanish </option>
						<option> Latin </option>
					</select> <br> <br>
					
					<div class="social-media">
						<a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="https://www.google.com/intl/si/gmail/about/#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					</div>
				</div>
				
			</div>
			<div class="footer-bottom">
				&copy Copyright Online Food Delivery. All rights reserved.
			</div>
		</div>
	</footer>
</html>