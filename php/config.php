<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "locus food ride";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}


	

?>

