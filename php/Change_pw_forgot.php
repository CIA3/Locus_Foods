<!DOCTYPE html>
<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php  
	session_start();
	$error_pw = "";
	$error = "";
    include "config.php";
    $em = $_SESSION['uEmail'];
if(isset ($_POST['sbtn'])){
		
		
		$new_pw = $_POST['pwd'];
		$re_pw = $_POST['rpwd'];

		
			
	if($new_pw === $re_pw)
	{
		$error_pw = "";
		$sql = "UPDATE customer SET Customer_Password = '$new_pw' WHERE Email = '$em' ";
			if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
            //header("location : add_food.php");
                echo "<script type='text/javascript'>window.location.href = 'Login_Page.php';</script>";
		} else {
			$sql = "UPDATE customer SET Restaurant_Password = '$new_pw' WHERE Email = '$em' ";
                if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
            //header("location : add_food.php");
                echo "<script type='text/javascript'>window.location.href = 'Login_Page.php';</script>";
		}
		
	}
	
    }else
	{
		$error_pw = "Invalid Password";
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
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	  <link rel = "stylesheet"  href = "../css/Change_pw.css">
	  
	  <script src = "../js/Change_pw.js"></script>
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>New Password</title>
	</head>
	
	
	<body>
        <center><h1 style = "color : blue;">Locus Food Ride</h1><h2>Enter your New Password!</h2></center>
	<br><br>
	
	
	
	<center>
	<div class="pwform">	
	
		<form action="Change_pw_forgot.php" target="_self" method="POST" onsubmit="return checkPassword()">
	
		<?php echo $error; ?>
		
		
		
	
			<div class="inputWithIcon4">
			<input type="password" id="pwd" name="pwd" style = "width:90% ; height:45px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"placeholder="New Password" required> <i class="fa fa-unlock-alt" aria-hidden="true"></i> 
			<br> <br>
		</div>
		
		<div class="inputWithIcon4">
			<input type="password" id="rpwd" name="rpwd" style = "width:90% ; height:45px"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Re enter Password" required> <i class="fa fa-unlock-alt" aria-hidden="true"></i> 
			<br> <br>
		</div>
		
		      <div style = "margin-right : 50px;"align = "right">
                  <input  type="submit" id="sbtn" class="sbtn" name="sbtn" value="Change!" ></div> <br>
		  
	
	
	
        
        
        </form></div>
        </center>
	</body>

</html>












































































































