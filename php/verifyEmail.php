<html><head> <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico"></head></html>
<?php
    $error = "";
    $email = "";
        session_start();
        include "config.php";
    
    if(isset($_POST['sendEmail'])){
        $email = $_POST['email'];
        $randomcode = mt_rand(0,99999999);
        $_SESSION['random'] = $randomcode;
        $message = "Locus Food Ride :: Your Password reset code is ".$randomcode;
        $subject = "Password Rest Code";
        $to = $email;
        $header = "From:uchiru123326@gmail.com";
        $result = mail($to, $subject,$message,$header);
        
        $_SESSION['uEmail'] = $email;
        
    
        
    }else if(isset($_POST['verifyCode']))
    {
        $email = $_SESSION['uEmail'];

        $code = $_POST['code'];
        $correctCode = $_SESSION['random'];
        if($correctCode == $code)
        {
            $sql = "SELECT Email FROM customer";
            $result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
                	while($row = mysqli_fetch_assoc($result)){
                        
                        if($row['Email'] == $email)
                        {
                           
                          echo "<script type='text/javascript'>window.location.href = 'Change_pw_forgot.php';</script>";    
                        }else{
                            $error =  "Invalid email!";
                        }
                
				}
                
            }
        } else {    
            $error = "Wrong code! Try again!";
			   }
			mysqli_close($conn);
           //echo "<script type='text/javascript'>window.location.href = 'Change_pw_forgot.php';</script>";
        }
        

    

?>
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
	  <!--<link rel = "stylesheet" href = "../css/"> your css file "your wireframe name_style.css"-->
	
	  
	  <link rel = "icon" type="image/gif/png" href = "../images/iccccc_g6c_icon.ico">
	  <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet">
	  <title>Reset Password</title>
	</head>
    <body>
        <center><h1>Locus Food Ride</h1><h2>Reset Password</h2><h3><?php echo $error; ?></h3><br><br>
            <form action = "verifyEmail.php" method = "POST">
            <table>
                <tr>
                    <td><label>Your email Address :<input style = "width : 200px;"type = "text" name = "email"></label></td>
                </tr><tr><td align = "right"><input type = "submit" name = "sendEmail" value = "send code"></td></tr>
                <tr><td><label>Enter verification code :<input style = "width : 180px;" type = "text" name = "code"></label></td></tr>
                 <tr><td align = "right"><input type = "submit" name = "verifyCode" value = "verify"> </td> </tr>
            </table>
            </form>
            <a href = "Login_Page.php"><input type = "button" value = "Login"></a>
        </center>
    </body>
</html>