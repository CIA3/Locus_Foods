<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php  
    session_start();
    $rID = $_SESSION['rest'];
	include "config.php";
	$error_pw = "";
	$error = "";

if(isset ($_POST['sbtn'])){
	
		
		$cu_pw = $_POST['ppwd'];
		$new_pw = $_POST['pwd'];
		$re_pw = $_POST['rpwd'];

	$sql = "SELECT Customer_Password FROM restaurant WHERE Restaurant_ID = '$rID'";
	
	$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
		// output data of each row
				while($row = mysqli_fetch_assoc($result)){ 
					 $us_pw = $row["Restaurant_Password"];

					 
				}
			}	
			
	if($us_pw === $cu_pw)
	{
		$error_pw = "";
		$sql = "UPDATE customer SET Restaurant_Password = '$new_pw' WHERE Restaurant_ID = '$rID'";
			if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
            //header("location : add_food.php");
		} else {
			$error =  "Error updating record: " . mysqli_error($conn);
		}
		
	}
	
	else
	{
		$error_pw = "Invalid Password";
	}
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
	  <link rel = "stylesheet"  href = "../css/Change_pw.css">
	  
	  <script src = "../js/Change_pw.js"></script>
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Change Password</title>
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
	
	<br><br>
	
	
	
	<center>
	<div class="pwform">	
	
		<form action="Change_pw.php" target="_self" method="POST" onsubmit="return checkPassword()">
	
		<?php echo $error; ?>
		
			<div class="inputWithIcon4">
			<input type="password" id="ppwd" name="ppwd" style = "width:90% ; height:45px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Current Password" > <i class="fa fa-unlock-alt" aria-hidden="true"></i>
				<div class="kgb">
				<?php echo  "<p>". $error_pw . "</p>"?>
				</div>
			<br> <br>
		</div>
		
	
			<div class="inputWithIcon4">
			<input type="password" id="pwd" name="pwd" style = "width:90% ; height:45px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password" required> <i class="fa fa-unlock-alt" aria-hidden="true"></i> 
			<br> <br>
		</div>
		
		<div class="inputWithIcon4">
			<input type="password" id="rpwd" name="rpwd" style = "width:90% ; height:45px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Re enter Password" required> <i class="fa fa-unlock-alt" aria-hidden="true"></i> 
			<br> <br>
		</div>
		
		
		<input type="submit" id="sbtn" class="sbtn" name="sbtn" value="Update" > <br>
		
	</div>
	</center>
	</form>
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












































































































