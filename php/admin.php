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
	  <script src = "../js/side_menu_java_script.js"></script>
	  <script src = "../js/Restaurant_page.js"></script>
	  <link rel = "stylesheet" href = "../css/admin.css">
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Admin Page</title>
	</head>

		
		
	<form action="admin.php" method="post" enctype="multipart/form-data">		
	<table style="border:0px; width:100%; height:80%; margin-top:10px; margin-right:0px; margin-bottom:100px; margin-left:0px;">
		<tr><td>	
			<input type="button" class="b1" name="bt1" value="Order History"  onclick="document.getElementById('p1').style.display='block' ; document.getElementById('p2').style.display='' ;document.getElementById('p3').style.display='' ; document.getElementById('p4').style.display=''">
			<input type="button" class="b1" name="bt2" value="Customer List"  onclick="document.getElementById('p2').style.display='block' ; document.getElementById('p1').style.display='' ;document.getElementById('p3').style.display='' ; document.getElementById('p4').style.display=''">
			<input type="button" class="b1" name="bt3" value="Restaurant List"  onclick="document.getElementById('p3').style.display='block' ; document.getElementById('p1').style.display='' ;document.getElementById('p2').style.display='' ; document.getElementById('p4').style.display=''">
			<input type="button" class="b1" name="bt4" value="Comments"  onclick="document.getElementById('p4').style.display='block' ; document.getElementById('p1').style.display='' ;document.getElementById('p2').style.display='' ; document.getElementById('p3').style.display=''"></td></tr>
		<tr><td>
			<div id="p1">
			<button class = "b2" onclick="document.getElementById('p1').style.display=''"><i class="fa fa-times" aria-hidden="true"></i></button>	
			<br><br>
			<table style="border:0px solid black; margin-top:0px; margin-bottom:0px; background-color:orange; width:100%">
			<tr>
				<th>
					<p style = "font-size:28px;color:black"><b>Order History</b></p>
				</th>
			</tr>
			</table >
		
		
			<?php

			require_once("config.php");
					
			$result = mysqli_query($conn, "SELECT * FROM invoice") or die ("Could not fetch" .mysqli_error($conn));
					
				if (mysqli_num_rows($result) > 0) 
				{
					echo ('<center>');
					echo ('<div style = "overflow-x : auto;">');
					echo('<table style="border:0px solid black; margin-top:2px; margin-bottom:20px; background-color:blue; width:100%">');
					echo('<tr>');
					
						$i = 0;
						
							while($row = mysqli_fetch_array($result)) 
							{
								echo('<td>');
									echo('<div class="d1">');
										//echo('<img class = "image" src="../images/'.$row['Logo_Image'].'" alt = "Restaurant image"><br>');
										echo('<h2 style="color:black">' .$row['Invoice_ID']. '</h2>');
										echo('<p>');
											echo('<label style="color:black"> Restaurant_ID : </label>' .$row['Restaurant_ID']. '<br>');
											echo('<label style="color:black">Customer ID : </label>' .$row['User_ID']. '<br>');
											//echo('<label style="color:black">Restaurant Name : </label>' .$row['Restaurant_Name']. '<br>');
											echo('<label style="color:black">Quantity: </label>' .$row['Quantity']. '<br>');
											echo('<label style="color:black">Date : </label>' .$row['Invoice_date']. '<br>');
										echo('</p>');	
									echo('</div>');	
								echo('</td>');
								
											$i = $i+1;
										
										if($i==3)
										{
											echo('</tr>');
											echo('<tr>');
											$i = 0;
										}			
								}
						}
					
					
					
								echo('</table>');
							
					echo ('</center>');			
					
				?>	
	</div>				
			<div id="p2">
			<button class = "b2" onclick="document.getElementById('p2').style.display=''"><i class="fa fa-times" aria-hidden="true"></i></button>	
			<br><br>
			<table class="content-table">
					<thead>
					<tr >
						<th>
							Profile Pic
						</th><th>
							Customer Name
						</th><th>
							ID
						</th><th>
							Contact Number
						</th><th>
							Address
						</th><th>
							Registered Date
						</th>
					</tr>
					</thead>	
					<tbody>
					<?php	

					$result = mysqli_query($conn, "SELECT * FROM customer") or die ("Could not fetch" .mysqli_error($conn));
								
					while($row = mysqli_fetch_array($result))
					{	
						echo('<tr>');
							echo('<td><img class="i" src="../images/' .$row['Profile_Image']. '" alt = "Pizza"></td>');
								echo('<td>' .$row['Full_Name'].' </td>');
								echo('<td>' .$row['Customer_ID'].' </td>');
								echo('<td>' .$row['Contact_Number'].' </td>');
								echo('<td>' .$row['Address'].' </td>');
								echo('<td>' .$row['Register_Date'].' </td>');
						echo('</tr>');
					}	
					?>			
					</tbody>
			</table>
		</div>	
						
			<div id="p3">
			<button class = "b2" onclick="document.getElementById('p3').style.display=''"><i class="fa fa-times" aria-hidden="true"></i></button>	
			<br><br>
				
				<table class="content-table">
					<thead>
					<tr>
						<th>
							Restaurant Logo
						</th><th>
							Restaurant Name
						</th><th>
							ID
						</th><th>
							Contact Number
						</th><th>
							Address
						</th><th>
							Registered Date
						</th>
					</tr>
					</thead>
					<tbody>

					<?php	

					
							
					$result = mysqli_query($conn, "SELECT * FROM restaurant") or die ("Could not fetch" .mysqli_error($conn));
								
					while($row = mysqli_fetch_array($result))
					{
						echo('<tr>');
							echo('<td><img class="i" src="../images/' .$row['Logo_Image']. '" alt = "Pizza"></td>');
							echo('<td>' .$row['Restaurant_Name'].' </td>');
							echo('<td>' .$row['Restaurant_ID'].' </td>');
							echo('<td>' .$row['Contact_number'].' </td>');
							echo('<td>' .$row['Address'].' </td>');
							echo('<td>' .$row['Register_date'].' </td>');
						echo('</tr>');
					}					
					?>		
					</tbody>
					</tr>
					
				</table>
			</div>	
			
			<div id="p4">
			<button class = "b2" onclick="document.getElementById('p4').style.display=''"><i class="fa fa-times" aria-hidden="true"></i></button>	
			<br><br>

			<?php	

			$result = mysqli_query($conn, "SELECT * FROM contact") or die ("Could not fetch" .mysqli_error($conn));
						
				while($row = mysqli_fetch_array($result))
				{
					echo('<p>' .$row['Comment_ID'].' </p></br>');
					echo('<p>' .$row['First_Name'].' </p></br>');
					echo('<p>' .$row['Last_Name'].' </p></br>');
					echo('&nbsp &nbsp' .$row['Comments']. '<hr>');							
				}
			?>			
			</div>
			
		</td></tr>
	</table>	
	</form>
	
	</body>

	
</html>