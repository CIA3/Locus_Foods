<!DOCTYPE html>
<html><head><link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php


	session_start();
    $r = $_SESSION["rest"];
    include "config.php";

		$sql = "SELECT *  FROM restaurant WHERE Restaurant_ID= '$r'";
		$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			         $rest_id = $row["Restaurant_ID"];
			        $rest_name = $row["Restaurant_Name"];
					$rest_address = $row["Address"];
					$rest_cNumber = $row["Contact_number"];
					$rest_email = $row["Email"];
					$rest_cuisineType= $row["Cuisine_type"];           							
					$rest_pCode = $row["Postal_Code"];
					$rest_username= $row["Restaurant_Username"];
					$rest_logo= $row["Logo_Image"];
					$rest_image= $row["Restaurant_img"];
					$rest_headeri= $row["Restaurant_head_img"];
					$rest_des= $row["Restaurant_Description"];
		  }
		} else {
			
		  
		  echo "0 results";
		
		}
		
		
		
		if(isset($_POST['update'])){
			
			
			        $rest_name = $_POST['restaurantN'];
					$rest_address = $_POST['restAdd'];
					$rest_cNumber = $_POST['Pno'];
					$rest_email = $_POST['e-mail'];
					$rest_cuisineType= $_POST['ctyp'];           							
					$rest_pCode = $_POST['Pcode'];
					$rest_username = $_POST['Uname'];
					$rest_logo= $_POST['restl'];
					$rest_image= $_POST['resti'];
					$rest_headeri= $_POST['resth'];
					$rest_des= $_POST['restb'];
			
			if(empty($_POST['restl']) && !empty($_POST['resti']) && !empty($_POST['resth'])){
                
                $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username', Restaurant_img ='$rest_image', Restaurant_head_img ='$rest_headeri', Restaurant_Description ='$rest_des' WHERE Restaurant_ID = '$r'' ";
                
            }else if(!empty($_POST['restl']) && empty($_POST['resti']) && !empty($_POST['resth']))
            {
                $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username', Logo_Image ='$rest_logo', Restaurant_head_img ='$rest_headeri', Restaurant_Description ='$rest_des' WHERE Restaurant_ID = '$r'' ";

                
            }else if(!empty($_POST['restl']) && !empty($_POST['resti']) && empty($_POST['resth']))
            {
                
                $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username', Logo_Image ='$rest_logo', Restaurant_img ='$rest_image', Restaurant_Description ='$rest_des' WHERE Restaurant_ID = '$r' ";
            }
            else if(empty($_POST['restl']) && empty($_POST['resti']) && empty($_POST['resth']))
            {
                $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username',  Restaurant_Description ='$rest_des' WHERE Restaurant_ID = '$r'";
                
            }else if(empty($_POST['restl']) && empty($_POST['resti']) && !empty($_POST['resth']))
            {
                 $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username', Restaurant_head_img = '$rest_headeri', Restaurant_Description = '$rest_des' WHERE Restaurant_ID = '$r' ";
                echo "apple";
                
                
            }else if(!empty($_POST['restl']) && !empty($_POST['resti']) && !empty($_POST['resth']))
            {
                 $sql = "UPDATE restaurant SET Restaurant_Name =' $rest_name', Address='$rest_address', Contact_number ='$rest_cNumber', Email ='$rest_email', Cuisine_type ='$rest_cuisineType', Postal_Code='$rest_pCode' , Restaurant_Username='$rest_username', Logo_Image ='$rest_logo', Restaurant_img ='$rest_image', Restaurant_head_img ='$rest_headeri', Restaurant_Description ='$rest_des' WHERE Restaurant_ID = '$r' ";
            }

					if (mysqli_query($conn, $sql)) 
                    {
						//echo "Record updated successfully";
                           echo "<script type='text/javascript'>window.location.href = 'home_REST.php';</script>";
					} 
					else 	
                    {
					echo "Error updating record: " . mysqli_error($conn);
					}

				
			}

    
				else if(isset($_POST['delete']))	{
	      // echo "apple";
		// sql to delete a record
		$sql = "DELETE FROM restaurant WHERE Restaurant_ID = '$r' ";

		if (mysqli_query($conn, $sql)) {
               //echo "<script type='text/javascript'>window.location.href = 'Login_Page.php';</script>";
		  echo "Record deleted successfully";
            //
             //header("location : add_food.php");
		} else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}
                    //need to be delete food amd combo
           $sql = "DELETE FROM food WHERE Restaurant_ID = '$r'";

		if (mysqli_query($conn, $sql)) {
		  //echo "Record deleted successfully";
             //header("location : add_food.php");
		} else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}         
		//mysqli_close($conn);
	   $sql = "DELETE FROM combo WHERE Restaurant_ID = '$r'";

		if (mysqli_query($conn, $sql)) {
		  //echo "Record deleted successfully";
             //header("location : add_food.php");
		} else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}
    }
		


$conn->close();		
	 
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
	  
	  <link rel = "stylesheet"  href = "../css/Edit_Restaurant.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Edit Your Restaurant</title>
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
		<!--
	Enter your code here...
	don't change anything ***
	-->
	
	
	
<div class="bg-img1">
  
    <form action="" method="Post" class="editR">
	
	
		
		<h1 id="EditR">Edit Your Restaurant</h1>
<br/><br/>

	<div class="row8">
    <div class="column8">
  
  
        <label><b>Restaurant Name</b></label><br/><br/>
		<input type="text" placeholder="Restaurant Name" name="restaurantN" id="restaurantN" value="<?php echo $rest_name; ?>" required><br>
		
		<label><b>Restaurant Address</b></label><br/><br/>
		<input type="text" placeholder="Restaurant Address" name="restAdd" id="restAdd" value="<?php echo $rest_address; ?>" required >
		
		<br>

		<br/><label><b>Phone Number</b></label><br/><br/>
		<input type="text" placeholder="Phone Number" name="Pno" id="Pno" value="<?php echo $rest_cNumber; ?>" required>
		
		<br/><br/><label><b>Email</b></label><br/><br/>
		<input type="email" placeholder="Email" name="e-mail" id="e-mai" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" value="<?php echo $rest_email; ?>" required>
		
		<br/><br/><label><b>Cuisine Type</b></label><br/><br/>
		<input type="text" placeholder="Cuisine Type" name="ctyp" id="ctyp" value="<?php echo $rest_cuisineType; ?>" required>
		
		
		<br/><br/><label><b>Postal Code</b></label><br/><br/>
		<input type="text" placeholder="Postal Code" name="Pcode" id="Pcode" value="<?php echo $rest_pCode; ?>" required>
		
		<br/><br/><label><b>Username</b></label><br/><br/>
		<input type="text" placeholder="Username" name="Uname" id="Uname" value="<?php echo $rest_username; ?>" required>
		
		<br/><br/><label><b>Change Password</b></label><br/><br/>
	    
        <a href="Change_pwREST.php"> <input type = "button" value = "Change Password"></a>
		
		<br/><br/><label><b> Restaurant Bio  </b></label><br/><br/>
		<textarea id="restb" name="restb" rows="15" cols="50"  placeholder="Restaurant Bio"><?php echo $rest_des; ?></textarea><br/><br/>
		
		<br/><br/>
		

		<button name ="update" type="submit" class="update" value="update"> Update </button>
	
		<button name ="delete" type="submit" class="delete" value="delete"> Delete </button>
			
	
	
  </div>
  
  
  <div class="column8">
    
		<label><b>Select Restaurant Header Image</b></label><br/><br/>
		<input type="file" id="resth" name="resth" id="resth"><br/>
		<?php echo '<div><img src = "../images/'.$rest_headeri.'" alt = "food image" style = "width : 200px; height : 200px;"></div>' ?>
		<br/>
		
		
		<br/><br/><label><b>Select Restaurant Logo</b></label><br/><br/>
		<input type="file" id="restl" name="restl" id="restl"><br/>
		<?php echo '<div><img src = "../images/'.$rest_logo.'" alt = "food image" style = "width : 200px; height : 200px;"></div>' ?>
		<br/>
		
		<br/><br/><label><b>Select Restaurant Image</b></label><br/><br/>
		<input type="file" id="resti" name="resti" id="resti"><br/>
		
		<?php echo '<div><img src = "../images/'.$rest_image.'" alt = "food image" style = "width : 200px; height : 200px;"></div>' ?>
		<br/>
		<br/><br/>
		
		
	<br/><br/>
		
  </div>
</div>

<br/><br/>

  
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
						<a href="home_REST.php"><li>Home</li></a>
						<a href="restaurant_pageREST.php"><li>Restaurant</li></a>
						<a href="../html/ContactUSRes.html"><li>Contact Us</li></a>
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