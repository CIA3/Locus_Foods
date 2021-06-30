<?php
    //session_start();
    include "config.php";
	

		
		$First_Name= $_POST["fname"];
		$Last_Name = $_POST["lname"];
		$Email_Address= $_POST["emailAdd"];
		$Mobile_Number = $_POST["mobile"];
		$Comments = $_POST["cmnt"];


    $sql= "INSERT INTO contact(First_Name,Last_Name,Email_Address,Mobile_Number,Comments)
	VALUES('$First_Name','$Last_Name','$Email_Address','$Mobile_Number','$Comments')";
	
	if($conn->query($sql)){
		echo "Inserted successfully";
        echo "<script type='text/javascript'>window.location.href = '../html/Contact Us.html';</script>";
	}
	else{
		echo "Error:". $conn->error;
		
	}

$conn->close();
?>






