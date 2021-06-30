<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
session_start();
$error = "";

	include "config.php";
	
        if(isset($_POST['addrest'])){
		
		$Restaurant_Name= $_POST["restaurantN"];
		$Restaurant_Address = $_POST["restAdd"];
		$Contact_Number= $_POST["Pno"];
		$Email = $_POST["e-mail"];
		$Cuisine_Type = $_POST["ctyp"];
		$Postal_Code= $_POST["Pcode"];
		$Restaurant_Username = $_POST["Uname"];
		$Restaurant_Password= $_POST["pwd"];
		$Logo_Image= $_POST["restl"];
		$Restaurant_Image = $_POST["resti"];
		$Rheader_Image = $_POST["resth"];
		$Restaurant_Description	 = $_POST["restb"];
		
		
		//retreive username, email & password from customer table
		$sql_u = "SELECT * FROM restaurant WHERE Restaurant_Username ='$Restaurant_Username'";
		
		$sql_e = "SELECT * FROM restaurant WHERE Email='$Email'";
		
		$sql_p = "SELECT * FROM restaurant WHERE Restaurant_Password='$Restaurant_Password'";
		
		$result_u = $conn->query($sql_u);
		
		$result_p= $conn->query($sql_p);
		
		$result_e= $conn->query($sql_e);
		
		
		if(($result_u->num_rows > 0) && ($result_p->num_rows > 0) && ($result_p->num_rows > 0)){
		
			
		$error = "Sorry...!!! that username, password & email already taken"; 
		
		
		}else if (($result_u->num_rows > 0) && ($result_p->num_rows > 0)) {
		
		$error = "Sorry...!!! that username & password already taken"; 	
		
		}else if (($result_u->num_rows > 0) && ($result_e->num_rows > 0)) {
		
		$error =  "Sorry...!!! that username & email already taken"; 	
		
		}else if (($result_p->num_rows > 0) && ($result_e->num_rows > 0)){
		
		$error =  "Sorry...!!! that password & email already taken"; 
		
		}else if ($result_u->num_rows > 0) {
		
		$error = "Sorry...!!! that username already taken"; 	
		
		}else if ($result_e->num_rows > 0) {
			
  	    $error = "Sorry...!!! that email already taken"; 

		}else if ($result_p->num_rows > 0) {
  	  
		$error =  "Sorry...!!! that password already taken"; 

		
		}else{
		

    $sql= "INSERT INTO restaurant(Restaurant_Name, Address,Contact_number,Email,Cuisine_type,Postal_Code,Restaurant_Username,Restaurant_Password,Logo_Image,Restaurant_head_img,Restaurant_img,Restaurant_Description)
	VALUES('$Restaurant_Name','$Restaurant_Address ','$Contact_Number','$Email ','$Cuisine_Type','$Postal_Code','$Restaurant_Username','$Restaurant_Password','$Logo_Image','$Restaurant_Image','$Rheader_Image','$Restaurant_Description')";
	
	
	
		
		if($conn->query($sql)){
			
			echo "Inserted successfully";
            
				if ($conn->query($sql) === TRUE){
                $sql = "SELECT Restaurant_Username, Restaurant_ID  FROM customer WHERE  Customer_Username = '$u'";
		          $result = mysqli_query($conn, $sql);
			         if (mysqli_num_rows($result) > 0) {
		          // output data of each row
				while($row = mysqli_fetch_assoc($result)){ 
                        $_SESSION["rest"] = $row['Restaurant_ID'];
					 
                }
                     }
			//mysqli_close($conn);
            
                echo "<script type='text/javascript'>window.location.href = 'home_REST.php';</script>";
                
                
			} 
		}
		
		else{
			
			echo "Error:". $conn->error;
		
		}				

		$conn->close();
		
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
	  
	  <script src = "../js/Restaurant_Add.js"></script>
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  
	  <link rel = "stylesheet"  href = "../css/Add_Restaurant.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Add Restaurant</title>
       
	</head>
	<header>
	<!--<script src = "../js/"></script>-->
		<ul class = "navigation">
			<li class = "list_property logo_property"><img class = "logo" src = "../images/LocusLogo.png" alt = "Locus Food Ride Logo"></li>
			<li class = "list_property"><a class = "navigation_property" href = "home_NOT_loggedin.php">HOME</a></li>
		</ul>
	
	</header>
	
	
	<body>
	<br><br>
	
<div class="bg-img">

<div class="text-block">
    <h1 id="reach">A world of customers now within your reach</h1>
    <p>Locus Food Ride's platform gives you the flexibility, visibility and customer insights you need to connect with more customers. Partner with us today.</p>
  </div>
  
    <form action="Add_Restaurant.php" method="Post" class="addR" onsubmit="return formValidation1()">
	
	<h3 style = "color : red;"><?php echo $error; ?></h3>
		
		<h1 id="GetS">Get Started</h1>
<br/><br/>

	<div class="row5">
  <div class="column5">
  
  
    <label><b>Restaurant Name</b></label><br/><br/>
		<input type="text" placeholder="Restaurant Name" name="restaurantN" id="restaurantN"><br></p>
		
		<label><b>Restaurant Address</b></label><br/><br/>
		<input type="text" placeholder="Restaurant Address" name="restAdd" id="restAdd">
		
		<br>

		<br/><label><b>Phone Number</b></label><br/><br/>
		<input type="text" placeholder="Phone Number" name="Pno" id="Pno">
		
		<br/><br/><label><b>Email</b></label><br/><br/>
		<input type="email" placeholder="Email" name="e-mail" id="e-mai" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" title="must be in the following order: characters@characters.domain (characters followed by an @ sign, followed by more characters, and then a . After the . sign, add at least 2 or 3 letters from a to z" required>
		
		<br/><br/><label><b>Cuisine Type</b></label><br/><br/>
		<input type="text" placeholder="Cuisine Type" name="ctyp" id="ctyp">
		
		<br/><br/><label><b>Postal Code</b></label><br/><br/>
		<input type="text" placeholder="Postal Code" name="Pcode" id="Pcode">
		
		
	
  </div>
  
  
  <div class="column5">
    
		
		
		<label><b>Username</b></label><br/><br/>
		<input type="text" placeholder="Username" name="Uname" id="Uname">
		
		<br/><br/><label><b>Password</b></label><br/><br/>
		<input type="password" placeholder="Password" name="pwd" id="pwd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
		
		<br/><br/><label><b>Re-enter Password</b></label><br/><br/>
		<input type="password" placeholder="Re-enter Password" name="rpwd" id="rpwd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
		
		
		<br/><br/><label><b>Select Restaurant Header Image</b></label><br/><br/>
		<input type="file" id="resth" name="resth" id="resth">
		
		<br/><br/><label><b>Select Restaurant Logo</b></label><br/><br/>
		<input type="file" id="restl" name="restl" id="restl">
		
		<br/><br/><label><b>Select Restaurant Images</b></label><br/><br/>
		<input type="file" id="resti" name="resti" id="resti">
		
		
	
  </div>
</div>

<br/><br/>

    <label><b> Restaurant Bio  </b></label><br/><br/>
	<textarea id="restb" name="restb" rows="12" cols="50" style="width: 530px;"  placeholder="Restaurant Bio"></textarea><br/><br/>
		
		
		
	<label><input type="checkbox" id="T&C" name="T&C" required onclick="enableButton()">  By clicking "submit,"you agree to <mark>Locus Food Ride General Terms and Conditions</mark> and acknowledge you have read the <mark> Privacy Policy</mark>.</label><br>
		
<br/>

    <button name="addrest" type="submit" class="btn" id="btns" disabled> Add Restaurant </button>
  </form>
</div>
    <br><center><a href = Login_Page.php><input type="button" class = "abcdd" style = "padding : 30px; width : 300px;background-color : green;"value="Login"></a></center>

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
					<h2 id="link"> Links</h2>
					<div class="border"></div>
					<ul>
						<a href="home_NOT_loggedin.php"><li>Home</li></a>
						<a href="../html/Contact%20Us.html"><li>Contact Us</li></a>
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
				</form>
				
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
