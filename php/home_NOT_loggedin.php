<!DOCTYPE html>
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
	  <script src = "../js/home_page_java.js"></script>
	  <script src = "../js/header.js"></script>
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Welcome! Locus Food Ride</title>
	</head>
	<header>
	
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "#">HOME</a></li>
				<li class = "list_property1"><a href = "Add_Restaurant.php"><button class = "headbtn">Add your Restaurant</button></a></li>
				<li class = "list_property1"><a href = "Register_Page2.php"><button class = "headbtn">Create an account</button></a></li>
			</li>
		
		</ul>
	
	</header>
	
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&lArr;</a>
		  <a href="Register_Page2.php">CREATE AN ACCOUNT</a>
            <a href="Add_Restaurant.php">ADD YOUR RESTAURANT</a>
		</div>
		<span class = "menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		
		<div class = "container">
			<img class = "headImage" src = "../images/pexels-pixabay-248444.jpg" alt = "FOOD">
				<div class="middle">
					<div class="text">LOCUS FOOD RIDE</div>
				</div>
			</img>
		</div>
		
		<br>
		
		<center>
			<h3>| 24/7 SERVICE | FAST DELIVERY | VERITIES OF FOODS |</h3>
			<h3> MENU </h3>
			<h4 style = "font-family : monospace;"> Our highest rated dishes </h4>			
		</center>
		
		<center>
			<table>
				<tr>
					<td>
                        <a href = "Register_Page2.php"><input name = "userCreate" type = "button" value = "Create an account" onclick = "" class = "create"></a></td>
                    <td><a href = "Add_Restaurant.php"><input name = "RestaurantCreate" type = "button"  onclick = "" value = "Add your restaurant"class = "create" ></a></td>
                    <td><a href = "Login_Page.php"><input name = "" type = "button"  onclick = "" value = "Login" class = "create" ></a></td>
				</tr>
		 	</table>
			<br><br>  
		
			<br><br>
			
		</center>
		<?php
			include "config.php";
			$sql = "SELECT Food_id, Food_name, Food_type, Food_description, Food_price, food_image FROM food";
			$result = mysqli_query($conn, $sql);
			echo ('<center> <div style= "overflow-x:auto;"> <table style = "border : 1px;">');
					echo ('<tr>');
					
			if (mysqli_num_rows($result) > 0) {
				
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					
					/*$food_name = $row['food_name'];
					$food_type = $row['food_type'];
					$food_description = $row['food_description'];
					$food_price = $row['food_price'];*/
					$food_image = $row['food_image'];
					//echo "$food_name";
					//echo $row['food_name'];
					
					echo ('<td>');
					echo ('<img class = "food_iamge" src = "../images/'.$food_image.'" alt = "food image"></img>');
					echo ('<ul style = "list-style-type : none;">');
									echo ('<li>');
										echo('<p>'. $row['Food_name'] .'</p>');
									echo ('</li>');
									
									echo ('<li>');
										echo('<p> |  '. $row['Food_type'] .'  |</p>');
									echo ('</li>');	
									echo ('<li>');
									echo ('<p> Rs '. $row['Food_price'] . '/= </p>');
									echo ('</li>');
									echo ('<li>');
										
									echo ('</li>');
								echo('</ul></td>');
					
					//echo ('</tr>');	
						
				}
				echo ('</table></div></center>');
		}	
			

			mysqli_close($conn);
		?>
			</body>

	<footer>
		<div class="foo">
			<div class="inner-footer">

		

				<div class="footer-items">
					<h2> Links</h2>
					<div class="border"></div>
					<ul>
						<a href= "home_NOT_loggedin.php"><li>Home</li></a>
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