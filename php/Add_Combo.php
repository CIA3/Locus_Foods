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
	   <link rel = "stylesheet"  href = "../css/add_food_style.css">
	  <script src = "../js/side_menu_java_script.js"></script>
	  <script src = "../js/home_page_java.js"></script>
	  <script src = "../js/header.js"></script>
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Add Your Combo</title>
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
		
		<?php
		
		session_start();
	
		include "config.php";
		$res_ID = $_SESSION["rest"];
    
	
		$combo_id = "";
        $combo_name = "";
        $combo_des = "";
        $combo_price = "";
        $combo_img = "";
	
	$fetchQuery  = mysqli_query($conn, "SELECT Combo_ID, Combo_Name, Combo_Description, Combo_Price, Combo_Image  FROM combo WHERE Restaurant_ID = '$res_ID'");
	
	//echo $res_ID;
    $error = "";
	if(isset ($_POST['submit'])){
		
			$Combo_name = $_POST['combo_name'];
			$Combo_des = $_POST['combo_des'];
			$Combo_price = $_POST['combo_price'];
			$Combo_img = $_POST['combo_img1'];
			
			$sql = "INSERT INTO combo (Combo_Name, Combo_Description, Combo_Price, Combo_Image, Restaurant_ID)
			VALUES ('$Combo_name', '$Combo_des', '$Combo_price', '$Combo_img', '$res_ID')";
			
			if(mysqli_query($conn,$sql))
			{
				echo "Combo Added Successfully!";
			}
			else{
				echo "Error : " .$sql. "<br>" . mysqli_error($conn);
				$error = "Unable to add the combo.";
			}
			mysqli_close($conn);
	}
			
		
	if(isset ($_POST['search'])){
            
		$Combo_name = $_POST['combo_name'];

		$fetchQuery  = mysqli_query($conn, "SELECT Combo_ID, Combo_Name, Combo_Description, Combo_Price, Combo_Image  FROM combo WHERE Restaurant_ID = '$res_ID' and Combo_Name = '$Combo_name'");
		
		while($row = mysqli_fetch_array($fetchQuery)) { 
			$combo_id = $row["Combo_ID"];
			$combo_name = $row["Combo_Name"];
			$combo_des = $row["Combo_Description"];
			$combo_price = $row["Combo_Price"];
			$combo_img = $row["Combo_Image"];
				
		}
	}	
	
	
    if(isset ($_POST['update'])){   
            //echo $fd_ou_img;
            $check = "";
			$Combo_name = $_POST['combo_name'];
			$Combo_des = $_POST['combo_des'];
			$Combo_pri = $_POST['combo_price'];
			$Combo_img = $_POST['combo_img1'];
			
            $sql = "UPDATE combo SET Combo_Name = '$Combo_name', Combo_Description = '$Combo_des' , Combo_Price = '$Combo_pri', Combo_Image = '$Combo_img' WHERE Combo_Name = '$Combo_name' and Restaurant_ID = '$res_ID'";
           

		if (mysqli_query($conn, $sql)) {
			//echo "Record updated successfully";
            //header("location : add_food.php");
		} 
		else {
			$error =  "Error updating record: " . mysqli_error($conn);
		}
		mysqli_close($conn);

	}

    

		if(isset ($_POST['delete'])){  
		// sql to delete a record
		$Combo_name = $_POST['combo_name'];
		
		$sql = "DELETE FROM combo WHERE Combo_Name = '$Combo_name' and Restaurant_ID = '$res_ID'";

		if (mysqli_query($conn, $sql)) {
		//echo "Record deleted successfully";
             //header("location : add_food.php");
		} 
		else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
    }
	
	
?>
		
		<center><h1>Add Your Combo!</h1></center>
		<div class="card">
			<img class = "card_image" src="../images/slide1.jpeg" alt="food_sample_image" style="width:100%; border-radius : 8px;">
				<div class="container">
				
				
					<form method = "POST" action="Add_Combo.php">
					
						<input class = "txt" id = "combo_name" name = "combo_name" value = "<?php  echo $combo_name; ?>" type = "text" placeholder = "Combo Name or Find Combo"  required><br><br>
						<input  class = "txt" id = "combo_des" name = "combo_des" value = "<?php  echo $combo_des; ?>" type = "text"  placeholder = "Combo Description" ><br><br>
						<input class = "txt" name = "combo_price" value = "<?php  echo $combo_price; ?>" type = "text" pattern = "[0-9]+" placeholder = "Combo Price" ><br><br>
						<center>
						<input type = "file" name = "combo_img1"> <br><br>
						<center><img src = "../images/<?php  echo $combo_img; ?>" style = "width:200px; height:200px; "></center>
						<br><br>
						<input class = "create" type = "submit" name = "submit" value = "Submit Food" ><input name = "search"  onclick = "updatetxt()" class="create" type = "submit" value = "Search Food">
						<br><br>
						<input class="create" type = "submit" name = "delete" value = "Delete"><input  name = "update" class = "create"  type = "submit" value = "Update">
						<br><br>
                            <a href="home_REST.php">    <input class="create" type = "button" value = "Back"></a></center>
						
					
				</form></div>
		</div>
		
			<br><br>
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