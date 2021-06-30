<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
    session_start();
    include "config.php";
   $a = $_SESSION['rest'];
    
            	/*$sql = "SELECT Restaurant_ID,Restaurant_Name, Address, Postal_Code, Cuisine_type, Restaurant_Description, Contact_number, Email, Logo_Image, Restaurant_head_img, Restaurant_img FROM restaurant";*/
                //add this later
               $sql = "SELECT Restaurant_ID,Restaurant_Name, Address, Postal_Code, Cuisine_type, Restaurant_Description, Contact_number, Email, Logo_Image, Restaurant_head_img, Restaurant_img FROM restaurant WHERE Restaurant_ID = '$a'";
			$result = mysqli_query($conn, $sql);
		
					
			if (mysqli_num_rows($result) > 0) {
				
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					
                    //incomplete session
                    $r_n = $row['Restaurant_Name'];
                    $add = $row['Address'];
                    $p_c = $row['Postal_Code'];
                    $c_t = $row['Cuisine_type'];
                    $r_d = $row['Restaurant_Description'];
                    $c_n = $row['Contact_number'];
                    $email = $row['Email'];
                    $l_img = $row['Logo_Image'];
                    $r_head_img = $row['Restaurant_head_img'];
                    $r_img = $row['Restaurant_img'];
				
                }
            }else{
                echo "Not Result Found!";
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
	  <link rel = "stylesheet"  href = "../css/RestaurantD_restside.css">
	  <?php echo ('<link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">'); ?>
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <title>Restaurant Details</title>
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

        <div class="container">
            <?php echo ('<img src="../images/'.$r_head_img.'" alt="welcome" class="image">'); ?>
	   <div class="overlay">
		<div class="text">Welcome to <?php echo $r_n;?>..!</div>
	  </div>
	</div>

<hr id="test"/>


        <?php echo ('<img src="../images/'. $l_img.'" alt="Logo" width="400px" height="400px" class="logoi">'); ?>
        <h1 id="lname"> <?php echo $r_n; ?></h1>

        <div class="row">
    <div class="column left">
  
    <div class="bio">
   
    <div class="rimage">
   
    <?php echo ('<img src="../images/'. $r_img.'" alt="Restaurant Image" width="710px" height="450px">');?>
   
        </div>

<br/>

	<h1 id="restn"> Restaurant Name: <?php echo $r_n; ?> </h1>
	


</div>
	
</div>		
  
 
		<div class="column right">
				
				
				
	<div class="description">
	
	<h2 id="restb"> Restaurant Bio</h2>
	<h1 id="des">Discover a unique experience </h1>
	<p id="descript"><?php echo $r_d; ?></p>


	<div class="restaurantData">
		<h2 id="cno">Contact Number:</h2>
		<p> <span class="cont"> <?php echo $c_n; ?> </span> </p>
	</div>

	<div class="restaurantData">
	<h2 id="radd">Address:</h2>
	<p> <span class="cont"> <?php echo  $add;?> </span> </p>
	</div>


	<div class="restaurantData">
	<h2 id="mail">Email:</h2>
	<p> <span class="cont"> <?php echo $email; ?> </span> </p>
	</div>
 
</div>

 </div>
</div>
 
 <hr id="test">	
 <?php
 	$sql = "SELECT Food_ID, Food_Name, Food_Type, Food_Description, Food_Price, Food_Image, Restaurant_ID FROM food WHERE Restaurant_ID = '$a'";
			$result = mysqli_query($conn, $sql);
			
					 echo ('<div class="wrapper">');
        
                        echo ('<div class="menu">');
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

                
                   echo ('<div class="single-menu">');
                echo ('<img src = "../images/'.$food_image.'" alt = "food image">');
                echo ('<div class="menu-content">');
                    echo ('<h4>'.$food_name.'</h4>');
					echo ('<h3 class="typ"># '.$food_type.'</h3>');
                    echo ('<p>'.$food_description.'.</p>');
					echo ('<p class="price"> Rs '.$food_price.'/=</p>');
                    //echo ('<form action = "cartprocess1.php" method = "POST">');
                                  //  echo ('<input type = "hidden"  name = "fID" value = "'.$food_id.'">');
                       // echo ('<input type = "hidden" name = "rID" value = "'.$rest_ID.'">');
                //echo ('<input type = "submit"  name = "cart" class = "Addc" value = "Add to cart">');
                                    //echo ('</form>');
                    echo $error11 = "";
                echo ('</div>');
            echo ('</div>');
				}
           echo ('</div>');
     echo ('</div>');
            }else{
                $error11 =  "Not Food Found in this Restaurant!";
            }
        
    
 ?>
        <center><a href = "Edit_Restaurant.php"><input type = "button" class = "edit" value = "Edit Restaurant"></a><a href = "add_food.php"><input type = "button" class = "edit" value = "Edit Food"></a><a href = "Add_Combo.php"><input class = "edit"type = "button"  value = "Edit Combos and Offers" ></a></center>
        <br><br>    </body>
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