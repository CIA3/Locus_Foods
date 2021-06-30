<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
session_start();
$error = '';
$dis = '';
 if(isset($_POST['Login1']))
 {
	 //$error = array('email_and_pas' =>'');
   include("config.php");
   //session_start();
		switch($_REQUEST['Login1']){
			
			case 'Login' :
                
			// username and password sent from form 
			  
			  $myusername = mysqli_real_escape_string($conn,$_POST['Username']);
			  $mypassword = mysqli_real_escape_string($conn,$_POST['Password']); 
			  
			  
			$sql = "SELECT Customer_ID, Customer_Username, Customer_Password FROM customer WHERE Customer_Username = '$myusername' and Customer_Password = '$mypassword'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
					//$row = mysqli_fetch_assoc($result); 
					$_SESSION["user"] = $row['Customer_ID'];	
				}
			}
			$count = mysqli_num_rows($result);
			  // If result matched $myusername and $mypassword, table row must be 1 row
				
			  if($count == 1) {

					echo "welcome!";
					header("Location: home_USER.php");
			  }else {
				  $error = 'Invalid username or password';
                  $dis = '<br><a href = "verifyEmail.php">forgotten password? </a><br>';
				// header("location : Login_Page.php");
				 //$_SESSION['message'] = "Invalid login please try again!";
			  }
			break;  
		  
		case 'Login as Restaurant' :
		

		// username and password sent from form 
		  
		  $myusername = mysqli_real_escape_string($conn,$_POST['Username']);
		  $mypassword = mysqli_real_escape_string($conn,$_POST['Password']); 
		  
		  
		$sql = "SELECT Restaurant_ID, Restaurant_Username, Restaurant_Password FROM restaurant WHERE Restaurant_Username = '$myusername' and Restaurant_Password = '$mypassword'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
					//$row = mysqli_fetch_assoc($result); 
						$_SESSION["rest"] = $row['Restaurant_ID'];
				}
			}
			$count = mysqli_num_rows($result);
		  
		  // If result matched $myusername and $mypassword, table row must be 1 row
			
		  if($count == 1) {
			  
			 //echo "welcome";
			 header("location: home_REST.php");
		  }else {
			 //$error = "Invalid login please try again!";
			 $error = 'Invalid username or password';
             $dis = '<br><a href = "verifyEmail.php">forgotten password? </a><br>';

		  }
		  break;
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
	  <link rel = "stylesheet"  href = "../css/login_style.css">
	  <script src = "../js/side_menu_java_script.js"></script>
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Locus Food Ride Login</title>
	  <script>
		function myFunction() {
			var x = document.getElementById("myInput");
				if (x.type === "password") {
					x.type = "text";
					} else {
				x.type = "password";
				}
			}
</script>
	</head>
	<header>
	<!--<script src = "../js/"></script>-->
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_NOT_loggedin.php">HOME</a></li>
			<li class = "list_property1"><a href = "Add_Restaurant.php"><button class = "headbtn">Add your Restaurant</button></a></li>
			<li class = "list_property1"><a href = "Register_Page2.php"><button class = "headbtn">Create an account</button></a></li>
		
		</ul>
	</header>
	
	
	<body>

		<center style  = "margin-bottom : 250px;">
			<table style="border:0px;">

				<tr>
					<td>

						<div class = "mydiv" >

							<form name = "form"  action = "Login_Page.php" method = "POST">

								<h3 style = "text-align:center; color:black; font-size:32px; font-family: helvetica, sans-serif; "><strong>Login</strong></h3><br>
								<h4 style = "text-align:center; color:black;margin-top:-40px; ">Welcome Back! login access to the Locus Food Ride</h4>
							<div>
	
								<input placeholder = "Username" type = "text" name = "Username" id = "uname"  class = "txt" required style = "margin-top:50px;width:400px; height:30px; font-size:18px;"><br><br>
							</div>
							<br>
							<div>
								<input placeholder = "Password" type = "password" name = "Password" id = "myInput" class = "txt" required style = "margin-top:-30px;font-size:18px; width:400px; height:30px;">
								<br><h4 style = "color : red;"><?php  echo $error; ?></h4>
							<input type="checkbox" onclick="myFunction()">Show Password<br><?php echo $dis; ?><br><br>
							</div>
						
							<div>
								<input type = "submit" name = "Login1"
								  value = "Login" id = "bt4" class = "create" style = "margin-top:20px; margin-left:110px;font-size:18px;"><br>
								
							</div>	
							<div>
								<input type = "submit" value = "Login as Restaurant" name = "Login1" 
								id = "bt4" class = "create" style = "margin-top:20px; margin-left:110px;font-size:18px;">
								
							</div>
							</form>

						</div>

					</td>
				</tr>


		</table>
	</center>
	


	</body>

	<footer>
		<div class="foo">
			<div class="inner-footer">

		

				<div class="footer-items">
					<h2> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_NOT_loggedin.php"><li>Home</li></a>
						<a href="../html/Contact%20Us.html"><li>Contact Us</li></a>
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

