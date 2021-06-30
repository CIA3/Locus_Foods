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
	  <script src = "../js/Restaurant_page.js"></script>
	  <link rel = "stylesheet" href = "../css/restaurent.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Discover Restaurants</title>
	<header>
	
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_REST.php">HOME</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "restaurant_pageREST.php">RESTAURANT</a></li>
			<li class = "list_property"><a class = "navigation_property" href = "Offers&CombosREST.php">ONGOING OFFERS AND COMBOS</a></li>
			<li class = "list_property1"><a class = "navigation_property navi navigation_property2" href = "Logout.php">Sign out</a></li>
            <li class = "list_property1"><a href = "Restaurant_DetailsREST.php"><img class = "navigation_property navi head_image" src = "../images/userW.png" alt = "User"></a></li>
		</ul>
	</header>
	
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&lArr;</a>
		  <a href="Restaurant_DetailsREST.php">MY RESTAURANT</a>
             <a href = "Restaurent_his.php">ORDER HISTORY</a>
		  <a href="Logout.php">SIGN OUT</a>
		</div>
		<span class = "menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		
		
		
		
	<?php
	
		include "config.php";
		
?>	
		<center>
		<div class="div">
		<h1 style=" color:white;">Restaurant History</h1>		
		<div style = "overflow-x : auto;">
			<table class="content-table">
				<thead>
				<tr>
					<th>
						Invoice_ID
					</th>
					<th>
						Item_ID
					</th>
					<th>
						Quantity
					</th>
					<th>
						Unit Price
					</th>
					<th>
						Total Price
					</th>
				</tr>
				</thead>
				<tbody>
<?php				
				
				session_start();
                $rest_id = $_SESSION["rest"];    
				$invoice = mysqli_query($conn, "SELECT * FROM invoice WHERE Restaurant_ID = '$rest_id'") or die ("Could not fetch" .mysqli_error($conn));
				$inv="0";	
				while($row = mysqli_fetch_array($invoice)){
					
					$inv = $row['Invoice_ID'];
					$itm = $row['Item_ID'];
					$qnt = $row['Quantity'];
					echo('<tr>');
					echo('<td>' .$row['Invoice_ID'].'</td>');
	 		
					$food = mysqli_query($conn, "SELECT * from food WHERE Food_ID ='$itm'") or die ("Could not fetch" .mysqli_error($conn));
						$Total="0";
						if(mysqli_num_rows($food) > 0)
						{							
							while($row = mysqli_fetch_array($food))
							{ 
									
									
										echo('<td>'.$itm.'<br></td>');
										echo('<td>'.$qnt.'<br></td>');
										echo('<td>Rs.'.$row['Food_Price'].'<br></td>');
									
									$sub_total = $qnt *  $row['Food_Price'];
									$Total = $Total + $sub_total;
									echo('<td>Rs.' .$Total.'<br></td>');
								
											
							}
						}
							else
							{
								$combo = mysqli_query($conn, "SELECT * from combo WHERE Combo_ID ='$itm'") or die ("Could not fetch" .mysqli_error($conn));
								$Total="0";
									if(mysqli_num_rows($combo) > 0)
									{
										while($row = mysqli_fetch_array($combo)) 
										{
										
											
											 echo('<td>'.$itm.'<br></td>');
											 echo('<td>'.$qnt.'<br></td>');
											 echo('<td>Rs.'.$row['Combo_Price'].'<br></td>');
															
											$sub_total = $qnt *  $row['Combo_Price'];
											$Total = $Total + $sub_total;
														
											echo('<td>Rs.' .$Total.'</td>');
											
											
										}
									}
							}
						echo('</tr>');	
				}			
					
?>				
				</tbody>
			</table>
		</div>
	</div>
	</center>		

	</body>

	<footer>
		<div class="foo">
			<div class="inner-footer">


	      	<div class="footer-items">
					<h2> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_REST.php"><li>Home</li></a>
						<a href="restaurant_pageREST.php"><li>Restaurant</li></a>
						<a href="../html/ContactUSRes.html"><li>Contact Us</li></a>
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