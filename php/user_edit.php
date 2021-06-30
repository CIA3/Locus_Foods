<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
	
    session_start();
    include "config.php";
    $uID = $_SESSION['user'];

			$fetchQuery  = mysqli_query($conn, "SELECT * FROM customer WHERE Customer_ID = '$uID'");
		
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
	
				//nested if statement to determine whether there is a upadate or a delete function
				if(isset ($_POST['Update']))
				{
					//inserting user inputs to user-define varibles using super-global variable $_post
					$u_name = $_POST['uname'];
					$f_name = $_POST['fname'];
					$c_no = $_POST['tel'];
					$address = $_POST['address'];
					$postal= $_POST['pcode'];
					$dob = $_POST['dob'];
					$email= $_POST['email'];
					$u_img= $_POST['user_img'];
		
		
					//retreive user name & email from customer table
					
					$result = mysqli_query($conn, "SELECT Customer_Username, Email FROM customer ");

						while($row = mysqli_fetch_array($result))  
						{	  
							//nested if statemented to determine whether username and email have already excisted
							if($row["Customer_Username"] === $u_name && $row["Email"]=== $email)
							{
								echo "<h1>" . "User name already exist". "</h1>";
								echo "<h1>" . "Email already exist already exist". "</h1>";
							}
			
							else if($row["Customer_Username"] === $u_name)
							{
								echo "<h1>" . "User name already exist". "</h1>";
				
							}
			
							else if($row["Email"]=== $email)
							{
								echo "<h1>" . "Email already exist already exist". "</h1>";
							}
							
							else
							{
							
                                if(empty($_POST["user_img"])){
                                    
                                    $sql = "UPDATE customer SET Customer_Username = '$u_name', Full_Name = '$f_name', Contact_Number = '$c_no' , Address = '$address', Postal_Code = '$postal',Date_of_Birth = '$dob', Email= '$email'WHERE Customer_ID = '$uID'";
                                }else{
								$sql = "UPDATE customer SET Customer_Username = '$u_name', Full_Name = '$f_name', Contact_Number = '$c_no' , Address = '$address', Postal_Code = '$postal',Date_of_Birth = '$dob', Email= '$email', Profile_Image = '$u_img' WHERE Customer_ID = '$uID'"; //where??
                                }
								if (mysqli_query($conn, $sql))
								{
									echo "Record updated successfully";
									header('Location:user_edit.php');
								} 
								
								else
								{
									echo "Error updating record: " . mysqli_error($conn);
								}

				
							}
				
						}
					

					mysqli_close($conn);
			
				}
			

		
				else if(isset ($_POST['Delete']))
				{
                    $sql = "DELETE FROM payments WHERE Customer_ID = '$uID'";
                    if(mysqli_query($conn,$sql)){
                        echo 'deleted';
                        
                    }
	
					// sql to delete a record
					$sql = "DELETE FROM customer  WHERE Customer_ID = '$uID' "; 

					if (mysqli_query($conn, $sql))
					{    
						//echo "Record deleted successfully";
                        echo "<script type='text/javascript'>window.location.href = 'Login_Page.php';</script>";
					}
					
					else 
					{
						echo "Error deleting record: " . mysqli_error($conn);
					}

					mysqli_close($conn);
	
				}
				
				
				else
				{
					mysqli_close($conn);
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
	  <title>User Profile Update</title>
	  
	  
	  <style>
	   .dform
	   {
		   height:1200px;
	   }
          .dform:hover
          {
	       transform: scale(1);
          }
            body{
            background-image: url("../images/pexels-pixabay-531880.jpg");
                background-repeat: no-repeat;
                background-size: cover;
        }
	  </style>
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
	
	<br><br>
	
	
	
	
	
		<center>
	
			<h1 class="va"> User Profile Update </h1>
			
		<div class ="dform">
		
			<div class="namebox ti" align="left">
					<?php echo '<img src = "../images/'.$us_img.'" alt = "User Image" style = "width : 200px; height : 200px;">' ?>
					 <br>
			
			</div>
			
			<br> <br>
		
		
		
		
			<form action="user_edit.php " target="_self" method="POST">
			
			
			<p> Chage Profile Picture </p>
			<input type = "file" name = "user_img">		 
			<br>
			<br>
			
				<label>User Name </label> <br>
				<div class="inputWithIcon">
					<input type="text" id="uname" name="uname" style = "width:90% ; height:45px" value="<?php echo $us_name?>"> <i class="fa fa-user" aria-hidden="true"></i>
					<br>
					<br>
				</div>

		
				<label>Full Name </label> <br>
				<div class="inputWithIcon">
					<input type="text" id="fname" name="fname" style = "width:90% ; height:45px" value="<?php echo $us_f_name?>" > <i class="fa fa-user" aria-hidden="true"></i>
					<br> <br>
				</div>
		
				<label>Contact Number</label> <br>
				<div class="inputWithIcon">
					<input type="text" id="tel" name="tel" pattern = "[0-9]{0,10}" style = "width:90% ; height:45px" value="<?php echo $us_c_no?>"> <i class="fa fa-mobile" aria-hidden="true"></i>
					<br> <br>
				</div>
				
			
				
				<label>Address </label> <br>
				<div class="inputWithIcon">
					<textarea id="w3review" name="address" rows="4" cols="50"> <?php echo $us_address ?></textarea>
					<br> <br>
				</div>
				
		
				<label>Postal Code </label> <br>
				<div class="inputWithIcon">
					<input type="text" id="pcode" name="pcode" style = "width:90% ; height:45px" value="<?php echo $us_postal?>" ><i class="fa fa-address-book-o" aria-hidden="true"></i>

					<br> <br>
				</div>
				
				
				<label>Date of Birth </label> <br>
				<div class="inputWithIcon">
					<div class = "DOB">
					
						<div class="dob2">
							<input type = "date" id = "date" name = "dob" value="<?php echo $us_dob?>" style = "background-color:transparent; border-color:transparent; border-bottom-color:#00FF00; color:black;">
						</div>
					</div>
				
				</div> <br> <br>
				
				
					<label>E mail </label> <br>
				<div class="inputWithIcon3">
					<input type="email" id="emailad" name="email" style = "width:90%; height:45px" pattern="[a-zA-Z0-9.%_+-]+@[a-z0-9]+\.[a-z]{2,3}" value="<?php echo $us_email ?>" > <i class="fa fa-envelope" aria-hidden="true"></i>
					<br>
					<br>
				</div>
		 
			
	
					
						<input type="submit" id="sbtn" formaction = "<?php echo $_SERVER['PHP_SELF']; ?> " class="ubtn" name="Update" value="Update" style = "margin-left:48% ; background-color:green">  <br> <br>
					
		
						<a href = "Change_Pw.php"><input  class="sbtn" type = "button" value = "Change Password" style = "margin-right : 5px; width : 150px;"></a>					
						<input style = "margin-left:22% ; background-color:red" class = "ubtn1" name = "Delete"  formaction = "<?php echo $_SERVER['PHP_SELF']; ?>" type = "submit" value = "Delete"  >
				
			</form>
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