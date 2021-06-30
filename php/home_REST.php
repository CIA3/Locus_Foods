<!DOCTYPE html>

<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<html>
  <?php
    include "config.php";
    $a = "";
    $countA = 0;
    $b = "";
    $countB = 0;
    $c = "";
    $countC = 0;
    $d = "";
    $countD = 0;
    $e = "";
    $countE = 0;
    $f = "";
    $countF = 0;
    $g = "";
    $countG = 0;
    $h = "";
    $countH = 0;

    $start = "<center> <div> <table style = 'border : 1px;'><tr>";
    $end = "</table></div></center>";

    	$sql = "SELECT * FROM food";
			$result = mysqli_query($conn, $sql);
           
			if (mysqli_num_rows($result) > 0) {
				
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
                    $food_name = $row["Food_Name"];
                    $food_ty = $row["Food_Type"];
                    $f_d = $row["Food_Description"];
                    $f_p = $row["Food_Price"];
                    $f_i = $row["Food_Image"];
                    
                          if($row["Food_Type"] == "Rice and Noodles"){
                                if($countA == 5){
                                    $a .= '</tr><tr>';
                                    $countA = 0;
                                }
                              $a .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countA++;
                                
                              
                            }else if($row["Food_Type"] == "Pizza"){
                                     if($countB == 5){
                                    $b .= '</tr><tr>';
                                    $countB = 0;
                                }
                              $b .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countB++;
                                
                            }else if($row["Food_Type"] == "Soup"){
                                    if($countC == 5){
                                    $c .= '</tr><tr>';
                                    $countC = 0;
                                }
                              $c .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countC++;
                              
                          }else if($row["Food_Type"] == "Burgers"){
                              
                                      if($countD == 5){
                                    $d .= '</tr><tr>';
                                    $countD = 0;
                                }
                              $d .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countD++;
                          
                          }else if($row["Food_Type"] == "Appertizers"){
                                        if($countE == 5){
                                    $d .= '</tr><tr>';
                                    $countE = 0;
                                }
                              $e .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countE++;
                          }else if($row["Food_Type"] == "Drinks"){
                                        if($countF == 5){
                                    $f .= '</tr><tr>';
                                    $countF = 0;
                                }
                              $f .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countF++;
                              
                          }else if($row["Food_Type"] == "Dissert"){
                                            if($countG == 5){
                                    $g .= '</tr><tr>';
                                    $countG = 0;
                                }
                              $g .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br></p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countG++;
                              
                          }
                              
                               if($countH == 5){
                                    $h .= '</tr><tr>';
                                    $countH = 0;
                                }
                              $h .= "<td><img class = 'food_iamge' src = '../images/".$f_i."'></img><ul style = 'list-style-type : none;'><li><p>".$food_name."</p></li><p>".$food_ty." | <br> </p></li><li><p> Rs ".$f_p."/= </p></li></ul></td>"; 
                              
                              $countH++;
                          
              
                }
            }
    $aa = $start.$a.$end;
    $bb = $start.$b.$end;
    $cc = $start.$c.$end;
    $dd = $start.$d.$end;
    $ee = $start.$e.$end;
    $ff = $start.$f.$end;
    $gg = $start.$g.$end;
    $hh = $start.$h.$end;
    
//echo $aa;   
   
?>
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
	  <script src = "../js/home_page_java.js"></script>
	  <script src = "../js/header.js"></script>
	  <link rel = "stylesheet" href = "../css/home_page_style.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Welcome! Locus Food Ride</title>
                <?php //echo $aa; ?>
          <script type="text/javascript">
              var allView = document.getElementById("change");
            function filterFood(name){
                
                if(name == "r_and_n"){
        
                        var txt = "<?php echo $aa; ?>";
                    document.getElementById("change").innerHTML = txt;
                }else if(name == "pizza"){
                          var txt = "<?php echo $bb; ?>";
                    document.getElementById("change").innerHTML = txt;
                    
                }else if(name == "soup"){
                    var txt = "<?php echo $cc; ?>";
                     document.getElementById("change").innerHTML = txt;
                    
                }else if(name == "bur"){
                    var txt = "<?php echo $dd; ?>";
                     document.getElementById("change").innerHTML = txt;
                
            }else if(name == "appet"){
                    var txt = "<?php echo $ee; ?>";
                     document.getElementById("change").innerHTML = txt;
                
            }else if(name == "drink"){
                var txt = "<?php echo $ff; ?>";
                document.getElementById("change").innerHTML = txt;
            }else if(name == "dis")
                {
                    var txt = "<?php echo $gg; ?>";
                    document.getElementById("change").innerHTML = txt;
                
            }else if(name == "all"){
                 var txt = "<?php echo $hh; ?>";
                document.getElementById("change").innerHTML = txt;
            }
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
		
		<div class = "container">
			<img class = "headImage" src = "../images/pexels-pixabay-248444.jpg" alt = "FOOD">
				<div class="middle">
					<div class="text">LOCUS FOOD RIDE</div>
				</div>
			
		</div>
		
		<br>
		
		<center>
			<h3>| 24/7 SERVICE | FAST DELIVERY | VERITIES OF FOODS |</h3>
			<h3> MENU </h3>
			<h4 style = "font-family : monospace;"> Our highest rated dishes </h4>			
		</center>
		  
        <center>
			<br><br>  
			 	<input type = "button"  id = "r_and_n" onclick = "filterFood('r_and_n')"class = "vbuttons" value = "Rice and Noodles">
			 	<input type = "button" id = "pizza" onclick = "filterFood('pizza')" class = "vbuttons" value = "Pizza">
			 	<input type = "button" id = "soup" onclick = "filterFood('soup')" class = "vbuttons" value = "Soup">
			 	<input type = "button" id = "bur" onclick = "filterFood('bur')"  class = "vbuttons" value = "Burgers">
			 	<input type = "button"  id = "appet" onclick = "filterFood('appet')" class = "vbuttons" value = "Appetizers">
			 	<input type = "button"  id = "drink" onclick = "filterFood('drink')" class = "vbuttons" value = "Drinks">
			 	<input type = "button" id = "dis" onclick = "filterFood('dis')" class = "vbuttons" value = "Dissert"><br><br>
            	<input type = "button" id = "all" onclick = "filterFood('all')" class = "vbuttons" value = "View All">
		
			<br><br>
			
		</center>
		<div id = "change">
		<?php
			$count = 0;
			$sql = "SELECT Food_id, Food_name, Food_type, Food_description, Food_price, food_image FROM food";
			$result = mysqli_query($conn, $sql);
			echo ('<center> <div> <table style = "border : 1px;">');
					echo ('<tr>');
					
			if (mysqli_num_rows($result) > 0) {
				
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					
					$food_image = $row['food_image'];

					
					echo ('<td>');
					echo ('<img class = "food_iamge" src = "../images/'.$food_image.'" alt = "food image"></img>');
					echo ('<ul style = "list-style-type : none;">');
									echo ('<li>');
										echo('<p>'. $row['Food_name'] .'</p>');
									echo ('</li>');
									
									echo ('<li>');
										echo('<p> |  '. $row['Food_type'] .'  |</p>');
									echo ('</li>');	
									echo ('<li>');
									echo ('<p> Rs '. $row['Food_price'] . '/= </p>');
									echo ('</li>');
									echo ('<li>');
									echo ('</li>');
								echo('</ul></td>');
					$count++;
                    if($count == 5){
                        echo '</tr><tr>';
                        $count = 0; 
                    }
					//echo ('</tr>');	
						
				}
				echo ('</table></div></center>');
		}	
			

			mysqli_close($conn);
		?>
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