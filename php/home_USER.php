
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
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
        <title>Welcome! Locus Food Ride</title>

    
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
		
		
         <div id = "change">
    
           <?php
			include "config.php";
            $count = 0;
           
			$sql = "SELECT Food_ID, Food_Name, Food_Type, Food_Description, Food_Price, Food_Image, Restaurant_ID FROM food";
			$result = mysqli_query($conn, $sql);
           
			echo ('<center> <div> <table style = "border : 1px;">');
					echo ('<tr>');
					
			if (mysqli_num_rows($result) > 0) {
				
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$food_id = $row['Food_ID'];
					$food_name = $row['Food_Name'];
					$food_type = $row['Food_Type'];
					$food_description = $row['Food_Description'];
					$food_price = $row['Food_Price'];
					$food_image = $row['Food_Image'];
                    $rest_ID = $row['Restaurant_ID']; 
					//echo "$food_name";
					//echo $row['food_name'];
					
					echo ('<td>');
					echo ('<img class = "food_iamge" src = "../images/'.$food_image.'" alt = "food image"></img>');
					echo ('<ul style = "list-style-type : none;">');
									echo ('<li>');
										echo('<p>'. $row['Food_Name'] .'</p>');
									echo ('</li>');
									
									echo ('<li>');
										echo('<p> |  '. $food_type .'  | </p>');
									echo ('</li>');	
									echo ('<li>');
									echo ('<p> Rs '. $food_price . '/= </p>');
									echo ('</li>');
									echo ('<li>'); 
                                    echo ('<form action = "cartprocess.php" method = "POST">');
                                    echo ('<input type = "hidden"  name = "fID" value = "'.$food_id.'">');
                                    echo ('<input type = "hidden" name = "rID" value = "'.$rest_ID.'">');
								    echo ('<input type = "submit"  name = "cart" class = "cart" value = "Add to cart">');
                                    echo ('</form>');
									echo ('</li>');
								echo('</ul></td>');
                    $count++;
                    if($count == 5){
					
					echo ('</tr><tr>');	
                        $count = 0;
                    }
						
				}
				echo ('</table></div></center>');
		}	
			

			
    ?>
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