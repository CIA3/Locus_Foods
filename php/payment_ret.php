<!DOCTYPE html>
<head>	  
    <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
</head>
<?php
    session_start();
    include "config.php";
	
	
	$Customer_ID = $_SESSION['user'];
    $ta = $_SESSION['total_Amount'];
	
    $sql= "SELECT Card_Type, Card_Number, Card_Holder_Name, Expired_Date FROM payments WHERE Customer_ID = '$Customer_ID' ";
	
	$result = $conn->query($sql);
			
					
		if ($result->num_rows > 0) {
		  // output data of each row
		while($row = $result->fetch_assoc()) {
			
			
		$c_type= $row["Card_Type"];
		$c_no = $row["Card_Number"];
		$c_hname = $row["Card_Holder_Name"];
		$e_date = $row["Expired_Date"];
		//$cvv = $row["cvv"];

	
	 }
		} else {
			
		  $c_type= "";
		$c_no = "";
		$c_hname = "";
		$e_date = "";
		  //echo "0 results";
		
		}

$conn->close();

		 
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
	
	    <div class = "paymentData">
	
				<h1 id="pay">Payment</h1>
				
				<br/>
				
				<h2 id="total"> Total Amount: LKR <?php echo $ta; ?>/= </h2>	
            
			<h3 id="accept">Accepted Cards</h3>
            
			<div class="icon-container">
			
            <i class="fa fa-cc-visa fa-5x" style="color:navy;"></i>
			
			<i class="fa fa-cc-mastercard fa-5x" style="color:red;"></i>
              
            </div>
			
			<br/><br/>
			
			    
				<label><b> Select Your Card Type</b></label><br/><br/>
				
				<i class="fa fa-cc-visa fa-3x" style="color:navy;"></i><input type ="radio" id="visa" name="card_t" <?php if($c_type=="Visa"){?> checked="true" <?php } ?> />Visa
	            <i class="fa fa-cc-mastercard fa-3x" style="color:red;"></i><input type ="radio" id="master" name="card_t" <?php if($c_type=="Master"){?> checked="true" <?php } ?> />Master
	
				  
			<br/><br/>
			
			
				  	  
				
				
				<label><b>Name on Card</b></label><br/><br/>
				<input type="text" id="cname" name="card_Hname" placeholder="kasun darshana" value="<?php echo $c_hname; ?>" required><br/><br/>
					
				<label><b>Credit Card Number</b></label><br/><br/>
				<input type="text" id="ccnum" name="card_no" placeholder="1111-2222-3333-4444" value="<?php echo $c_no; ?>" required><br/><br/>
				
				<label><b>Exp Date</b></label><br/><br/>
				<input type="text" id="expdate" name="expired_d" placeholder="01/10/2018" value="<?php echo $e_date ; ?>" required><br/><br/>
              
              
                <label><b>CVV</b></label><br/><br/>
                <input type="text" id="cvv" name="cvv" placeholder="Enter your cvv" value="" required><br/><br/>
              
			  
			    <br/>
        
                <a href="invoice.php"><input name="pay" type="submit" value="Pay Now" class="btn2"></a>
        </div>
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