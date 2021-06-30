
<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php include ("config.php") ?>
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
	  <link rel = "stylesheet"  href = "../css/Food_cart1.css">
	  
	  <script src = "../js/Food cart_page.js"></script>
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Your Cart</title>
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
	
	<?php
	

		//$_SESSION["total_Amount"];
		session_start();
		//$uid = $_SESSION['user'];
        $uid = $_SESSION['user'];
        $name = "";
        $address = "";
        $number = "";
		$customer = mysqli_query($conn, "SELECT *FROM customer WHERE Customer_ID = '$uid'") or die ("Request denied". mysqli_error($conn));
		
		while($row = mysqli_fetch_array($customer)) { 
			
			$name = $row["Customer_Username"];
			$address = $row["Address"];
			$number = $row["Contact_Number"];
				
		}
		
		
		$fetchQuery = mysqli_query($conn, "select * from orders") or die ("Could not fetch. " .mysqli_error($conn));
		
		if(isset ($_POST['delete'])){
			$key = $_POST['key'];
			
			//$check = mysqli_query($conn, "select*from orders where Item_ID = '$key' ") or die("Value not found". mysqli_error($conn));
			
			//if(mysqli_num_rows($check) > 0){
				$queryDelete = mysqli_query($conn, "DELETE FROM orders WHERE Item_ID = '$key' ") or die ("Not deleted" .mysqli_error($conn));
				header('Location:Food_cart.php');
			//}

		
				
		}
			
		if(isset ($_POST['change'])){
			$key = $_POST['key'];
			$unit = $_POST['qty'];
			
			$check = mysqli_query($conn, "select*from orders where Item_ID = '$key' ") or die("Value not found". mysqli_error($conn));
		
		
			if(mysqli_num_rows($check) > 0){
				$queryUpdate = mysqli_query($conn, "UPDATE orders SET Quantity = '$unit' WHERE Item_ID = '$key' ") or die ("Not updated" .mysqli_error($conn));
				header('Location:Food_cart.php');
			}
		
		}
	
	?>
	<br>
	
	
		<img src = "../images/shopping-cart.png" style = "width:50px; height:50px; margin-left:50px;">
		<h1 style = "margin-left:120px; margin-top:-45px;color:black;">Food cart</h1>
		<br>
		<div style = "margin-left:800px; margin-right:20px; margin-top:-90px;width:480px; " class = "myDiv1">
			<img src = "../images/shopping-cart.png" style = "width:50px; height:50px; margin-left:10px; margin-top:20px;">
			<!--
			<h3 style = "margin-left:80px; margin-top:-65px;">Name :</h3><br>
			<h3 style = "margin-left:80px; margin-top:-37px;">Address :</h3><br>
			<h3 style = "margin-left:80px; margin-top:-37px;">Contact-No :</h3><br>
			-->
			<h3 style = "margin-left:80px; margin-top:-65px;background-color">Name : <?php  echo $name; ?><br>Address : <?php  echo $address; ?> <br>Contact No : +94<?php  echo $number; ?></h3>
		
		</div>
		
		<div class = "myDiv1" style = "margin-left:60px; width:78%;" >
			<table >
			
				<tr>
						<th>Image Details</th>
						<th>Product Details</th>
						<th>Price Details</th>
						<th>Quantity Details</th>
						<th>Whole price</th>
						
				</tr>
			
			</table>
		</div>
		
		<div>
		<div style = "overflow-y : auto; height:500px; margin-left:60px;background-color:white;" class = "myDiv1" >
			
				<table>
				
					<?php 		
					$tot = 0;
					while($row = mysqli_fetch_array($fetchQuery)) { 
						$unit_price = 0 ; 
						$qty = $row["Quantity"];
						$keyId = $row["Item_ID"];
						
						$food = mysqli_query($conn, "select*from food where Food_ID = '$keyId'") or die("Value not found". mysqli_error($conn));
						if(mysqli_num_rows($food) > 0){
							while($row = mysqli_fetch_array($food)){
					?>
				
								<tr>
									

									<form action = "Food_cart.php" method = "POST">
										<td><img src = "../images/<?php echo $row['Food_Image']; ?>" style = "width:200px; height:200px; border-radius:20%;"></td>
										<td><?php echo $row['Food_Name']; ?><br><?php echo $row['Food_Description']; ?></td>
										<td><?php echo $row['Food_Price']; ?></td>
										<td><input type = "textbox" name = "qty" value = "<?php echo $qty; ?>" ></td>
										
										<?php 
										$unit_price = $row['Food_Price'] * $qty ;
										$tot = $tot + $unit_price;?>
										
										<td><?php echo  "$unit_price"; ?></td>
										<td><input type = "hidden" name = "key" value = "<?php echo $keyId; ?>" required><input type = "Submit" class = "submit" style = "margin-bottom:20px;" name = "change" value = "Update"> <input type = "Submit" class = "submit" name = "delete" value = "Remove"></td>
										
										
									</form>
								</tr>
						 
						<?php } }
							else{  
							
							$combo = mysqli_query($conn, "select*from combo where Combo_ID = '$keyId'") or die("Value not found". mysqli_error($conn));
							if(mysqli_num_rows($combo) > 0){
								while($row = mysqli_fetch_array($combo)){
							?>
								
								<tr>
								<form action = "Food_cart.php" method = "POST">
								<td><img src = "../images/<?php echo $row['Combo_Image']; ?>" style = "width:200px; height:200px; border-radius:20%;"></td>
								<td><?php echo $row['Combo_Name']; ?><br><?php echo $row['Combo_Description']; ?></td>
								<td><?php echo $row['Combo_Price']; ?></td>
								<td><input type = "textbox" name = "qty" value = "<?php echo $qty; ?>" ></td>
								
								<?php 
								$unit_price = $row['Combo_Price'] * $qty;
                                   
								$tot = $tot + $unit_price;?>
								
								<td><?php echo  "$unit_price"; ?></td>
								<td><input type = "hidden" name = "key" value = "<?php echo $keyId; ?>" required><input type = "Submit" class = "submit" style = "margin-bottom:20px;" name = "change" value = "Update"> <input type = "Submit" class = "submit" name = "delete" value = "Remove"></td>
								
								
							</form>
						</tr>
										
							<?php } }  
							}
					} 
					
					$_SESSION["total_Amount"] = $tot;
                    ?>
					
						
				
				</table>
		</div>
		<div style = "background-color:black; margin-left:60px;" class = "myDiv1">
		
			<h2 style = "margin-left: 850px;color:white;">Total Amount  =  LKR <?php echo "$tot" ; ?>/=</h2><br>
			<a href = "home_USER.php"><input type = "button" style = "margin-left:20px;margin-bottom: -5px; " class = "bt1" value = "Continue shopping"></a><a href="payment_ret.php"><input class = "bt1" style = "margin-left:950px; margin-top : -40px;margin-bottom:10px; "type = "button" value = "Proceed Checkout"></a>
		</div>
		
		</div>
		<br><br>
		
	</body>

	<footer style = "margin-top:100px;">
		<div class="foo">
			<div class="inner-footer" >

		

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