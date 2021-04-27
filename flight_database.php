<?php
//create user profile 
if(isset($_POST["signup_submit"])){

	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$fpassword = $_POST['psw'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS flight;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "flight";
	 	//echo "Database created successfully";

	 	$conn = new mysqli($servername, $username, $password, $dbname); 

	 	$exists = mysqli_query($conn, "select 1 from accounts");

		if($exists !== FALSE)
		{			
		   //echo("This table exists");
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO accounts (name, email, password, age, gender, date_of_birth, phone_no)
			VALUES ( '".$name."' , '".$email."', '".$fpassword."', '".$age."', '".$gender."', '".$dob."', '".$contact."')";

			if ($conn->query($sql) === TRUE) {
			 // echo "Record Saved Successfully";
			} else {
			 // echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
		   //echo("This table doesn't exist");
		    $sql = "CREATE TABLE accounts (
			email VARCHAR(50) PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			password VARCHAR(20) NOT NULL,
			age VARCHAR(30) NOT NULL,
			gender VARCHAR(30) NOT NULL,
			date_of_birth VARCHAR(30) NOT NULL,
			phone_no VARCHAR(30) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";

			if ($conn->query($sql) === TRUE) {
			 // echo "Table Accounts created successfully";
				$conn = new mysqli($servername, $username, $password, $dbname);
			    $sql = "INSERT INTO accounts (name, email, password, age, gender, date_of_birth, phone_no)
				VALUES ( '".$name."' , '".$email."', '".$fpassword."', '".$age."', '".$gender."', '".$dob."', '".$contact."')";

				if ($conn->query($sql) === TRUE) {
				 // echo "Record Saved Successfully";
				} else {
				 echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
			  echo "Error creating accounts table: " . $conn->error;
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
	$age = '';
	$gender = '';
	$dob = '';
	$contact = '';

	
	$conn->close();
}

?>