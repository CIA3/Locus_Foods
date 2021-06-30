<!DOCTYPE html>
<head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head> 
<?php 
    session_start();
		include "config.php";
		$uID = $_SESSION['user'];
			
			$fetchQuery  = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_ID = '$uID' ");
		
			while($row = mysqli_fetch_array($fetchQuery)) { 
					$us_id = $row["Customer_ID"];
					$us_name = $row["Customer_Username"];
					$us_pw = $row["Customer_Password"];
					$us_f_name = $row["Full_Name"];
					$us_c_no = $row["Contact_Number"];           							
					$us_address = $row["Address"];
					$us_postal= $row["Postal_Code"];
					$us_dob= $row["Date_of_Birth"];
					$us_email= $row["Email"];
					$us_img = $row["Profile_Image"]; 
			}


		mysqli_close($conn);





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
	
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  
	
	<link rel="stylesheet" href="../css/imgStyle1.css">
	
	<style>
	
		.ti img
	{
			border-radius:50%;
			height:150px;
			width:100px;
			margin-left:10%;


	
	}

.ti
{
	width: 25%;
	box-sizing:border-box;
	text-align:right;
	padding-top:50px;
	margin-right:70%;
}

.m1
{
	
	box-sizing:border-box;
	
	margin-left:2%;
	
	
	
}

.mid
{
	width:45%;
	margin:auto;
	padding: 30px 10px;
		display :flex;
	flex-wrap:wrap;
	box-sizing:border-box;
	justify-content:center;
	border:5px solid black;
	border-radius:2%;
	background: lightblue;
	
}

        body{
            background-image: url("../images/pexels-pixabay-531880.jpg");
        }

.sobtn1
{
	background-color: grey;
	font-size:12px;
	padding:10px 24px;
	border-radius:8px;
	color:white;
	cursor:pointer;
	font-weight:bold;
	margin:10px 2px;
	margin-left:75%;
}

.sobtn1:hover
{ 
	background-color:red;
	color:black;
	transform: scale(1.15);
	 cursor:pointer;
}

.sobtn1:active
{
	 background-color: green;
  box-shadow: white;
  transform: translateY(4px);
}

.mainpage
{
	background:none;
}

.mid:hover {
  transform: scale(1.03);
  box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
  cursor:pointer;
}

.ti img:hover
{
	transform: scale(1.15);
	box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
	 cursor:pointer;
}

.disc
{
	color:#00fc04;
}

.m1 li
{
	color:black;
	font-size:18px;
	font-weight:bold;
}

.sobtn1 a
{
	font-weight:bold;
	font-size:16px;
	color:white;
	text-decoration:none;
	
}

.m1 h3
{
	color:blue;
}

.ti p
{
	font-size:18px;
	font-weight:bold;
}

.m1 p
{
	font-size:18px;
	font-weight:bold;
	color:black;
}	
	</style>
	
	  
	  <title> User Account Page</title>
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
	<div class="mainpage"> 
		<div class="mid">
			<div class="namebox ti" align="left">
					<center><?php echo '<img src = "../images/'.$us_img.'" alt = "User Image" style = "width : 200px; height : 200px;">' ?>
                </center><br>
					
					<br>
			</div>
	
			<div class = "m1">
			
			<p> Name  			: <?php echo $us_name?> </p>
			<br> 
			<p> Address  		: <?php echo $us_address?>  </p>
			<br> 
			<p> Postal Code  	: <?php echo $us_postal?> </p>
			<br> 
			<p> Date of birth  	: <?php echo $us_dob?>	</p>
			<br>  
			<p> Email  			: <?php echo $us_email?> </p>
			<br> 
			<p> Contact Number 	: +94<?php echo $us_c_no?> </p>
			<br> 
			
			</div>
		
		</div>

		<form  method = "POST" action="user_edit.php">
			<br> <a href="user_edit.php"> <input type="button" class="sobtn1" id="so" name="user_de" value="Edit Profile"> </a>  
		</form>
	</div>
	
	</body>

	<footer>
		<div class="foo">
			<div class="inner-footer">

			

				<div class="footer-items">
					<h2> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_USER.php"><li>Home</li></a>
						<a href="restaurant_page.php"><li>Restaurant</li></a>
						<a href="Food_cart.php"><li>Cart</li></a>
						<a href="../html/ContactUSUser.html"><li>Contact Us</li></a>
					</ul>
				</div>

				<div class="footer-items">
					<h2>About Us</h2>
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
					<h3 > Select Language </h3>
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