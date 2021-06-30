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
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  
	  
	  	<link rel="stylesheet" href="../css/imgStyle2.css">
		<link rel="stylesheet" href="../css/combos.css">
<style>	 
	  .comt
	{
		margin-left:10%;
	}
	
	.comt  td 
	{
	
		width:30%;
		padding-bottom:3%;
	}

	.s1
{
	border:5px solid orange;
	border-radius:10%;
	width: 75%;
	padding: 10px 20px;
	margin-right:100px;
	background:orange;
	
}

</style>


	  
	  
	  <title>Ongoing Offers and Combos</title>
	</head>
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

	
	
	
	<h1 class="glow">Grab Your Offer Now</h1>
	
	
	<?php
        session_start();
        //$uid = $_SESSION['user'];
		 $c = 0;
        
		include "config.php";
		
		$sql = "SELECT * FROM combo";
		$result = mysqli_query($conn, $sql);
		echo('<center>');
		
		echo('<div class="comt">');	
		echo ('<table style = "border : 1px;">');
		echo ('<tr>');
		echo('<div class="up">');
		
		
		
		if (mysqli_num_rows($result) > 0)
		{
			// output data of each row
			
			while($row = mysqli_fetch_assoc($result))
			{ 
				
				
				//assigning data to variables
				$com_id = $row["Combo_ID"];
				$com_name = $row["Combo_Name"];
				$com_img = $row["Combo_Image"];
				$com_des = $row["Combo_Description"];
				$com_price = $row["Combo_Price"];           							
				$res_id = $row["Restaurant_ID"];
		
				
				
						
					$sql = "SELECT Restaurant_Name FROM restaurant WHERE Restaurant_ID = '$res_id'";	
					$result1 = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result1) > 0)
					{
						// output data of each row
						while($row = mysqli_fetch_assoc($result1))
						{ 
						$res_name=$row["Restaurant_Name"];
				
				
				
						}
					}
						
						echo ('<td>');			
						echo('<div class="s1">');
							echo('<div class="image-slider">');
								echo('<div class="image-container" id="img-con">');			
									echo ('<img src = "../images/'.$com_img.'" alt = "User Image" class = "img">');
								echo('</div>');
		
							echo('</div>');
			
							echo('<center>');	
								echo('<div class="s11">');
									echo('<h3> '.$com_name.'</h3>');
									echo ('<p> '.$com_des.'</p>'); 
									echo ('<p> Price:'.$com_price.'</p>'); 
										
												
									echo ('<p> '.$res_name.'</p>'); 
                                   // echo('<form action = "cartprocess3.php" method = "POST" >');
			                             //echo ('<input type = "hidden" name = "app" value = "'.$com_id.'">');
                                         //echo ('<input type = "hidden" name = "arID" value = "'.$res_id.'">');
										//echo('<button type="submit" class="ADC"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart </button>');
								echo('</div>');
							echo('</center>');	
			
						echo('</div>');
					
						echo('</td>');
						
						$c++;
						if($c == 2){
					
							echo ('</tr>');
							echo('</div>');
							$c = 0;
						}
				
					
			}
			
			echo ('</table>');
			echo('</div>');
			echo('</center>');
			
			
		}	
	?>



	
	 
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