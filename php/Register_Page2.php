<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>

<?php
    session_start();
$error = "";


if(isset ($_POST['bt3'])){
	include "config.php";

		$i = $_POST['file-input'];
		$u = $_POST['uname'];
		$n = $_POST['name'];
		$e = $_POST['email'];
		$c = $_POST['no'];
		$pw = $_POST['pwd'];
		$d = $_POST['date'];
		$a = $_POST['address'];
		$g = $_POST['pcode'];
		

		$j = 0;
		$p = 0;
		$sql = "SELECT Customer_Username, Email FROM customer";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		  // output data of each row
		  while($row = $result->fetch_assoc()) 
		  {
			if($row["Customer_Username"] === $u && $row["Email"]=== $e)
			{
				$j = 1;
				$p = 1;
			}
			
			else if($row["Customer_Username"] === $u)
			{
				$j = 1;

			}
			
			else if($row["Email"]=== $e)
			{
				$p = 1;
			}

		  }
		} 

		if($j == 0 && $p == 0)
		{
			$sql = "INSERT INTO customer (Customer_Username, Customer_Password, Full_Name, Contact_Number, Address, Postal_Code, Date_of_Birth, Email, Profile_Image)
			VALUES ('$u', '$pw', '$n', '$c', '$a', '$g', '$d', '$e', '$i')";

			if ($conn->query($sql) === TRUE){
                $sql = "SELECT Customer_Username, Customer_ID  FROM customer WHERE  Customer_Username = '$u'";
		          $result = mysqli_query($conn, $sql);
			         if (mysqli_num_rows($result) > 0) {
		          // output data of each row
				while($row = mysqli_fetch_assoc($result)){ 
                        $_SESSION["user"] = $row['Customer_ID'];
					 
                }
                     }
			//mysqli_close($conn);
            
                echo "<script type='text/javascript'>window.location.href = 'payment.php';</script>";
                
                
			} 
			else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else if($j == 1 && $p == 1){
			$error = 'User name and email already exist';
		}
		
		else if($p == 1){
			$error = 'Email already exist already exist';
		}
		else if($j == 1) {
			$error = "User name already exist";
		}
		else{
			$error = "";

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
	  <link rel = "stylesheet"  href = "../css/Register_style.css">
	  
	  <script src = "../js/Register_page.js"></script>
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Customer Register Page</title>
	</head>
	<header>
	<!--<script src = "../js/"></script>-->
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_NOT_loggedin.php">HOME</a></li>
		</ul>
	
	</header>
	
	
	<body>
	
		<!--
	Enter your code here...
	don't change anything ***
	--><br><br>
	<div class = "bgimg">
		
		<form action = "Register_Page2.php"  method = "post"  onsubmit = "return checkPassword()">
		
		<div class = "myDiv1" style = "width :800px; margin-left:400px;">
		
		<h2 style = "text-align:center; font-family:Times New Roman;"><b>Give us your inforamation so we can serve you bettter.</b></h2>
            <h4 style = "color : red;"><?php echo $error ?></h4>
		<table>
			<tr>	
				<td></td>
				<td style = "padding:0px 115px;"><img src = "../images/user.png" alt = "User" style = "text-align:center;height:50px; width:50px;"></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type = "file" id = "file-input" name = "file-input" value = "Update from gallery" required> <label style = "margin-left:65px;" for = "file-input">Select a image</label></td>
			</tr>
			<tr>
				<td><input type = "text" style = "background-image:url(../images/user.png)" class = "txt" id = "uname" name = "uname" placeholder = "Enter your first name here"   required></i></td>
				<td></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td>Email</td>
			</tr>
			<tr>
				<td><input type = "text" style = "background-image:url(../images/user.png)"  class = "txt" id = "name" name = "name" required placeholder = "Enter your full name here"></td>
				<td><input type = "text" style = "background-image:url(../images/email.png)" class = "txt" id = "email" name = "email" required placeholder = "Enter your Email here" pattern = "[a-zA-Z0-9._-%+*#]+@[Aa-z0-9]+\.[a-z]{2,3}"></td>
            <tr>
			<tr>
				<td>Contact Number</td>
				<td>Password</td>
			</tr>
			<tr>
				<td><input type = "text" style = "background-image:url(../images/cell-phone.png)" class = "txt" id = "no" name = "no" required  placeholder = "Enter your Contact number here" pattern = "[0-9]{0,10}"></td>
				<td><input type = "password" style = "background-image:url(../images/password.png)" class = "txt" id = "pwd" name = "pwd" placeholder = "Enter your password here"  required></td>
			<tr>
			<tr>
				<td>Date of birth</td>
				<td>Re-enter Password</td>
			</tr>
			<tr>
				<td><input type = "date" class = "dte" id = "date" name = "date" required style = "background-color:transparent; border-color:transparent; border-bottom-color:#00FF00; color:black;"></td>
				<td><input type = "password" style = "background-image:url(../images/password.png)" class = "txt" id = "rpwd" name = "rpwd" placeholder = "Rewrite the above password"  required></td>
			<tr>
			
			<tr>
				<td>Address</td>
				<td></td>
			</tr>
			<tr>
				<td><textarea rows = "4" cols = "48px" name = "address" style = "font-size:15px;background-color:transparent; border-color:transparent;  border-bottom-color:#00FF00; color:black;" required placeholder = "Enter text here"></textarea></td>
				<td><label>Postal Code</label><br><input type = "text" style = "background-image:url(../images/mailbox.png)" class = "txt" placeholder = "Enter your postal code" id = "pcode" name = "pcode"></td>
			</tr>
			<tr>
				<td></td>
				<td><p>By clicking this checkbox you will agree to the <a href = "">Terms and Conditions. </p></a><input align = "center" type = "checkbox" id = "cb" required onclick = "enableButton(); disableButton();" style = "width:20px; height:20px;"></td>
			</tr>
			<tr>
				<td></td>
				<td style = "padding-left:80px;"><input type = "submit" id = "bt3" name = "bt3" class = "create s1" value = "Submit" disabled></td>
			</tr>
			
			
		</table></form>
		</div>
		
	</div>
	<br><center><a href = Login_Page.php><input type="button" class = "abcdd" style = "padding : 30px; width : 300px;background-color : green;"value="Login"></a></center>

		<br>
			
		<h1 id="why"> Why Locus Food Ride?</h1>

		<div class="row3">
		  <div class="column3">
			<div class="card">
			  <h3>Deliver your way</h3>
			  <p>Our offerings are flexible so you can customize them to your needs. Get started with your delivery people or ours.</p>
			</div>
		  </div>

		  <div class="column3">
			<div class="card">
			  <h3>Boost your visibility</h3>
			  <p>Stand out with in-app marketing to reach even more customers and increase sales.</p>
			</div>
		  </div>
		  
		  <div class="column3">
			<div class="card">
			  <h3>Connect with customers</h3>
			  <p>Turn customers into regulars with actionable data insights, respond to reviews or offer a loyalty program.</p>
			</div>
		  </div>
		  
		  <div class="column3">
			<div class="card">
			  <h3>Manage it all with ease</h3>
			  <p>Orders can run smoothly with Locus Food Ride restaurant software, flexible integration options, and support when you need it.</p>
			</div>
		  </div>
		</div>


		 <h1 id="how"> How Locus Food Ride works for restaurant partners </h1>

		<div class="row4">
		  <div class="column4">
		  
			  <img src = "../images/search.jpg" alt = "search" style="width:300px; height:300px;">
			  <h3>Customers order</h3>
			  <p>A customer finds your restaurant and places an order through the Locus Food Ride website.</p>
			</div>

		  <div class="column4">
			  
			  <img src = "../images/prepare.jpg" alt = "prepare" style="width:300px; height:300px;">
			  <h3>You prepare</h3>
			  <p>Your restaurant accepts and prepares the order</p>
			  
		  </div>
		  
		  <div class="column4">
			
			  <img src = "../images/delivery.jpg" alt = "delivery" style="width:300px; height:300px;">
			  <h3>Delivery people arrive</h3>
			  <p>Delivery people using the Locus Food Ride platform pick up the order from your restaurant, then deliver it to the customer.</p>
			</div>
		  
		</div>
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