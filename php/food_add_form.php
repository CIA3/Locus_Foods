<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
	session_start();
	
	include "config.php";


	$res_ID = $_SESSION["rest"];


        $fd_id = "";
        $fd_ou_name = "";
        $fd_ou_type = "";
        $fd_ou_des = "";
        $fd_ou_price = "";
        $fd_ou_img = "";
					 
	//echo $res_ID;
    $error = "";
	switch($_REQUEST['food_agr']){
	
		case 'Submit Food':
			$FD_name = $_POST['food_name'];
			$FD_type = $_POST['food_type'];
			$FD_des = $_POST['food_des'];
			$FD_pri = $_POST['food_price'];
			$FD_img = $_POST['food_image'];
			
			$sql = "INSERT INTO food (Food_Name, Food_Type, Food_Description, Food_Price, Food_Image, Restaurant_ID)
			VALUES ('$FD_name', '$FD_type', '$FD_des', '$FD_pri', '$FD_img', '$res_ID')";
			
			if(mysqli_query($conn,$sql))
			{
				echo "Food Added Successfully!";
			}else{
				echo "Error : " .$sql. "<br>" . mysqli_error($conn);
				$error = "Food adding is unccessfully try again!";
			}
			//header("location : add_food.php");
			echo "<script type='text/javascript'>window.location.href = 'add_food.php';</script>";
			mysqli_close($conn);
			
			break;
		
	case 'Search Food' :
            $FD_name = $_POST['food_name'];
	
		$sql = "SELECT Food_ID,Food_Name, Food_Type, Food_Description, Food_Price, Food_Image  FROM food WHERE Restaurant_ID = '$res_ID' and Food_Name = '$FD_name'";
		$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
		// output data of each row
				while($row = mysqli_fetch_assoc($result)){ 
					 $_SESSION['fid'] = $row["Food_ID"];
					 $fd_ou_name = $row["Food_Name"];
					 $fd_ou_type = $row["Food_Type"];
					 $fd_ou_des = $row["Food_Description"];
					 $fd_ou_price = $row["Food_Price"];
					 $fd_ou_img = $row["Food_Image"];
                    // $_SESSION['fdi'] = $row["Food_Image"];
					 
				}
			} else {
				$error =  "No Food Found ,Please try again!";
			}
			mysqli_close($conn);
			break;
			
	case 'Update' :
        $fID = $_SESSION['fid'];
            //echo $fd_ou_img;
            //$check = "";
			$FD_name = $_POST['food_name'];
			$FD_type = $_POST['food_type'];
			$FD_des = $_POST['food_des'];
			$FD_pri = $_POST['food_price'];
			//$FD_img = $_POST['food_image'];
			if(empty($_POST['food_img1']))
            {
                $sql = "UPDATE food SET Food_Name = '$FD_name', Food_Type = '$FD_type', Food_Description = '$FD_des' , Food_Price = '$FD_pri' WHERE Food_ID = '$fID' and Restaurant_ID = '$res_ID'";
                
            }else{
                 $FD_img = $_POST['food_img1'];
                $sql = "UPDATE food SET Food_Name = '$FD_name', Food_Type = '$FD_type', Food_Description = '$FD_des' , Food_Price = '$FD_pri', Food_Image = '$FD_img' WHERE Food_ID = '$fID' and Restaurant_ID = '$res_ID'";
            }

		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
            //header("location : add_food.php");
		} else {
			$error =  "Error updating record: " . mysqli_error($conn);
		}

		echo "<script type='text/javascript'>window.location.href = 'add_food.php';</script>";
        mysqli_close($conn);
		break;
    
	case 'Delete' :	
	$fID1 = $_SESSION['fid'];
		// sql to delete a record
		$sql = "DELETE FROM food WHERE Food_ID = '$fID1' and Restaurant_ID = '$res_ID'";

		if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
             //header("location : add_food.php");
		} else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}

		echo "<script type='text/javascript'>window.location.href = 'add_food.php';</script>";
        mysqli_close($conn);
		break;
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
	   <link rel = "stylesheet"  href = "../css/add_food_style.css">
	  <script src = "../js/side_menu_java_script.js"></script>
	  <script src = "../js/home_page_java.js"></script>
	  <script src = "../js/header.js"></script>
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Add Your Food</title>
		<script>
			function myFunction() {
				 alert("You have unsaved changes; are you sure you want to leave this page?");
			}
		</script>
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
		<center><h1>Add Your Food!</h1></center>
		<div class="card">
			<img class = "card_image" src="../images/pexels-valeria-boltneva-684965.jpg" alt="food_sample_image" style="width:100%; border-radius : 8px;">
				<div class="container"><?php $fd_ou_img1 = ""; 
                    $fd_ou_img1 = $fd_ou_img; ?>
					<form  method = "POST" action = "food_add_form.php">
						<p style = "color : red;"><?php echo $error; ?></P>
						<input class = "txt" name = "food_name"type = "text" placeholder = "Food Name"  value = "<?php  echo $fd_ou_name; ?>"required><br><br>
						<input class = "txt" name = "food_type" type = "text" placeholder = "Food Type"  value = "<?php  echo $fd_ou_type; ?>" required><br><br>
						<input  class = "txt" name = "food_des" type = "text" placeholder = "Food Description" value = "<?php  echo $fd_ou_des; ?>" ><br><br>
						<input class = "txt" name = "food_price" type = "text" pattern = "[0-9]+" placeholder = "Food Price" value = "<?php  echo $fd_ou_price; ?>" required><br><br>
						<center><input type = "file" name = "food_img1" class = "img1"> </center>
						<center><br>
                            <?php echo '<div><img src = "../images/'.$fd_ou_img.'" alt = "food image" style = "width : 200px; height : 200px;"></div>' ?>
						</center>
						<br><br>
						<a href = "add_food.php"><input onclick = "unsubmit_error();" class="create" type = "button" value = "Back" style = "margin-left : 150px;"></a><br><br><input  name = "food_agr" class = "create" type = "submit" value = "Update" style = "margin-left : 150px;"><br><br>
						<input class = "create" name = "food_agr" style = "background-color : #FF0000; margin-left : 150px;" type = "submit" value = "Delete">
						
                    </form>
                </div>
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