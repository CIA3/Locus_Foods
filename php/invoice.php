<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
    session_start();
    include "config.php";
    $uID = $_SESSION['user'];
    $total = $_SESSION["total_Amount"]; 
    //$uID = 32514;
    //$total = 2000;
		
    $sql = "SELECT * FROM customer WHERE Customer_ID = '$uID'";
    $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                $name = $row["Full_Name"];
                $cn = $row["Contact_Number"];
                $addr = $row["Address"];
                $pc = $row["Postal_Code"];
                $email = $row["Email"];
            }
        }
    //mysqli_close($conn);
    //creating random generated id for the invoice
    $inID = 0;
    $flag = "";
    while($flag == 0){
    $invoice_ID = rand(50,9999999);

        $sql = "SELECT * FROM invoice WHERE Invoice_ID = '$invoice_ID'";
        $resultgg = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultgg) == 0)
        {   
            $sql = "SELECT * FROM orders WHERE User_ID = '$uID'";
		$result45 = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result45) > 0) {
		// output data of each row
				while($row = mysqli_fetch_assoc($result45)){ 
					 $o_ID = $row["Order_ID"];
					 $i_ID = $row["Item_ID"];
					 $u_ID = $row["User_ID"];
					 $r_ID = $row["Restaurant_ID"];
					 $qty2 = $row["Quantity"];
                    $inID = $invoice_ID;
            $sql = "INSERT INTO invoice (Invoice_ID, Item_ID, User_ID, Restaurant_ID, Quantity)
			VALUES ('$invoice_ID', '$i_ID', '$u_ID', '$r_ID', '$qty2')";
			
			if(mysqli_query($conn,$sql))
			{
				//echo "Added Successfully!";
			}else{
				echo "Error : " .$sql. "<br>" . mysqli_error($conn);
				//$error = "unccessfully try again!";
			}
					 
				}
			} else {
				//$error =  "No Food Found ,Please try again!";
			}
            $flag = 1;
        }else{
            $flag = 0;
        }

    }



    $sql = "SELECT * FROM invoice WHERE Invoice_ID = '$inID'";
    $newResult = mysqli_query($conn, $sql);
    if(mysqli_num_rows($newResult) > 0){
        while($row = mysqli_fetch_assoc($newResult)){
            $date = $row["Invoice_date"];
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
	  <script src = "../js/side_menu_java_script.js"></script>
	  <!--<script src = "../js/home_page_java.js"></script>
	  <script src = "../js/header.js"></script>-->
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
        <title>Your Invoice thank you!</title>
        <style>
            table table, th , td{
                border : 3px solid black;
                padding : 20px;
                border-collapse: collapse;
            }
            .btnn{
                width : 250px;
                height: 50px;
                border-radius: 5px;
                background-color: greenyellow;
                color : black;
                
            }
            .btnn:hover{
                background-color: yellow;
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
        
        
        
<body>
    <br><br>
    <center>
        <img src = "../images/logo.jpg" width= "200px;">
        <h1><u>INVOICE</u></h1>
    </center>   
    <h2 style = "color : greenyellow;">ORDER PLACED SUCCESSFULLY!</h2>
    <h2>INVOICE NO : <?php echo $inID; ?></h2><center><table><tr><td style = "padding: 20px;">
    <h2 style="color : blue;">RECEIVER DETAILS</h2>
    <h4><?php echo $addr; ?><br> <?php echo $pc; ?></h4>
    <ul>
        <li><h3><?php echo $name; ?></h3></li>
    <li><h3>+94<?php echo $cn; ?></h3></li>
        <li><h3><u><?php echo $email; ?></u></h3></li>
        <br><br>
        <h3>| ORDER TYPE | DATE TIME |</h3>
        <h4>| Delivery | <?php echo $date; ?> |</h4>
    </ul><br></td><td style="padding-left: 150px;"><table class = "tb"><tr><th class= "tb">Description</th><th class = "tb">Unit Price</th>
    <th class = "tb">Qty</th><th class = "tb">Amount</th></tr>
    	
       	<?php 		
                    $result1 = mysqli_query($conn, "select * from orders WHERE User_ID = '$uID'") or die ("Could not fetch. " .mysqli_error($conn));
					while($row = mysqli_fetch_array($result1)) { 
						$unit_price = 0 ; 
						$qty = $row["Quantity"];
						$Item_Id = $row["Item_ID"];
						
						$food = mysqli_query($conn, "select*from food where Food_ID = '$Item_Id'") or die("Value not found". mysqli_error($conn));
						if(mysqli_num_rows($food) > 0){
							while($row = mysqli_fetch_array($food)){
					?>
				                
								<?php      
                                $aa = $qty * $row["Food_Price"]; 
                        echo '<tr>';
                        echo  '<td>';
                                echo $row['Food_Name']; 
                            echo '</td><td>'.$row['Food_Price'].'</td><td>'.$qty.'</td><td>'.$aa.'</td>';
                        echo '</tr>';
                                $aa = 0;
									?>

						 
						<?php } }
							else{  
							
							$combo = mysqli_query($conn, "select*from combo where Combo_ID = '$Item_Id'") or die("Value not found". mysqli_error($conn));
							if(mysqli_num_rows($combo) > 0){
								while($row = mysqli_fetch_array($combo)){
                                        
                                        $aa = $qty * $row["Combo_Price"];
                                          echo  '<tr>';
                                            echo  '<td>';
                                            echo $row['Combo_Name']; 
                                            echo '</td><td>'.$row['Combo_Price'].'</td><td>'.$qty.'</td><td>'.$aa.'</td>';
                                            echo '</tr>';
				
								$aa = 0;
					
										
							 } }  
							}
					} 
    
        ?>
 
    
    
    </table><br><br><h2 style = "color : blue;">Total Amount : LKR <?php echo $total;?> /=</h2></td>
    </tr></table></center>
    <center style = "color : firebrick;"><h2>All amounts are in Sri Lankan Rupees(LKR)</h2>
        <h3>This receipt is the invoice for your transaction.</h3><a href="home_USER.php"><input class = "btnn" type = "button" value = "BACK HOME"></a></center>
        <br><br>
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
                    </select> <br> <br></form>
					
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
    <?php 
    
           //deleting tempory items in the order table
    $uID = $_SESSION['user'];

    	// sql to delete a record
		$sql = "DELETE FROM orders WHERE User_ID = '$uID'";

		if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
             //header("location : add_food.php");
		} else {
			$error = "Error deleting record: " . mysqli_error($conn);
		}

    mysqli_close($conn);
    ?>