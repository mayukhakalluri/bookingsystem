<?php
if(isset($_POST["signup_submit"])){

	$servername = "localhost";
	$username = "root";
	$password = "admin123";
	
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS parking;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "parking";
	 	//echo "Database created successfully";

	 	$conn = new mysqli($servername, $username, $password, $dbname); 

	 	$exists = mysqli_query($conn, "select 1 from accounts");

		if($exists !== FALSE)
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$fpassword = $_POST['psw'];
			$cname = $_POST['carname'];
			$cno = $_POST['carno'];
			
		   //echo("This table exists");
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO accounts (name, email, password, car_name, car_no)
			VALUES ( '".$name."' , '".$email."', '".$fpassword."', '".$cname."', '".$cno."')";

			if ($conn->query($sql) === TRUE) {
			  //echo "Record Saved Successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
		   //echo("This table doesn't exist");
		    $sql = "CREATE TABLE accounts (
			email VARCHAR(50) PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			password VARCHAR(20) NOT NULL,
			car_name VARCHAR(30) NOT NULL,
			car_no VARCHAR(30) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";

			if ($conn->query($sql) === TRUE) {
			//  echo "Table Accounts created successfully";
			} else {
			  echo "Error creating table: " . $conn->error;
			  exit();
			}
		}
		
	} else {
	  	echo "Error creating database: " . $conn->error;
	  	exit();
	}

	$name = '';
	$email = '';
	$fpassword = '';
	$cname = '';
	$cno = '';

	$conn->close();
}
?>