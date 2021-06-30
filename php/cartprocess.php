<?php

    session_start();
    include "config.php";

    $Food_ID = $_POST['fID'];
    $Rest_ID = $_POST['rID'];
    $User_ID = $_SESSION['user'];
    
		
			$sql = "INSERT INTO orders (Item_ID, User_ID, Restaurant_ID)
			VALUES ('$Food_ID', '$User_ID', '$Rest_ID')";
			
			if(mysqli_query($conn,$sql))
			{
				
			}else{
				echo "Error : " .$sql. "<br>" . mysqli_error($conn);
			    
			}
			//header("location : add_food.php");
			echo "<script type='text/javascript'>window.location.href = 'home_USER.php';</script>";
			mysqli_close($conn);
    


?>