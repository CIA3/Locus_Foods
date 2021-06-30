<?php

    session_start();
    include "config.php";

    $combo_ID = $_POST["app"];
    //echo $combo_ID; 
    $Rest_ID = $_POST["arID"];
    $User_ID = $_SESSION['user'];
		
			$sql = "INSERT INTO orders (Item_ID, User_ID, Restaurant_ID)
			VALUES ('$combo_ID', '$User_ID', '$Rest_ID')";
			
			if(mysqli_query($conn,$sql))
			{
                echo 'a';
				
			}else{
				echo "Error : " .$sql. "<br>" . mysqli_error($conn);
			    
			}
			//header("location : add_food.php");
			echo "<script type='text/javascript'>window.location.href = 'Offers&Combos.php';</script>";
			mysqli_close($conn);
    


?>