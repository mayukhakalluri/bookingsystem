<!DOCTYPE html>
<html>
<head>
	<title>Book A Parking Slot!</title>
	<link rel="stylesheet" type="text/css" href="parking.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="parking.js"></script>
</head>
<body>
	<h1>Welcome to GSU Parking Slot Booking System!</h1>
	<main>
		<button class="button" onclick="document.getElementById('login_form').style.display='block'">Already have an account? &#160; <a class="site"><span>Login</span></a></button> 
		&#160;&#160;&#160;&#160;&#160;
		<button class="button" onclick="document.getElementById('signup_form').style.display='block'">New User? &#160;<a class="site"><span>Signup</span></a></button>
		<br><br><br><br><br><br>
		<button class="button"  id="footer"><a href="bookingindex.php" class="site"><span>Back to Front Page</span></a></button>		
	</main>
	

	<div id="signup_form" class="modal">
	 
	  <fieldset>
	  		<form class="modal-content" method="POST">
		    <div class="container">
		      <h1>Sign Up</h1>
		      <p id="msg">Please fill in this form to create an account.</p>
		      <hr>
		      <label for="name"><strong>Name</strong></label>
		      <input type="text" placeholder="Enter Full Name" id="name" name="name" required><br><br>

		      <label for="email"><strong>Email</strong></label>
		      <input type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

		      <label for="psw"><strong>Password</strong></label>
		      <input type="password" placeholder="Enter Password" id="pass1" name="psw" onkeyup="check();" required><br><br>

		      <label for="psw-repeat"><strong>Confirm Password</strong></label>
		      <input type="password" placeholder="Repeat Password" id="pass2" name="psw-repeat" onkeyup="check();" required><span id="message"></span><br><br>

		      <label for="carname"><strong>Car Name</strong></label>
		      <input type="text" placeholder="Enter Car Name. Ex: Mazda 6" name="carname" required><br><br>
		      
		      <label for="carno"><strong>Car Registration No.</strong></label>
		      <input type="text" placeholder="Enter Car Registration Number. Ex: CFQ6708" maxlength="10" name="carno" required><br><br>

		      <label><strong><input type="checkbox" checked="checked" name="remember"/ style="height: 20px; width: 20px;"> Remember me</strong></label><br><br><br>
		      <label id="terms">By creating an account you agree to our <a href="#" style="color: #11557d;">Terms & Privacy</a>.</label>
		      <br><br><br><br>
		    
		      <button type="button"  onclick="location.reload();" class="cancelbtn formbutton"><span>Cancel</span></button>
		      &#160;&#160;&#160;&#160;
		      <button type="submit" name="signup_submit" class="signupbtn formbutton"><span>Sign Up</span></button><br><br>
			  
		    </div>
		  </form>
	  </fieldset>
	 
	</div>
	<script>
		var check = function() {
		  if (document.getElementById('pass1').value ==  document.getElementById('pass2').value) {
		    document.getElementById('message').style.color = 'green';
		    document.getElementById('message').innerHTML = 'Matched';
		  } else {
		    document.getElementById('message').style.color = 'red';
		    document.getElementById('message').innerHTML = 'Not Matched';
		  }
		}
	</script>

	<div id="login_form" class="modal">
	  <fieldset>
	  		<form class="modal-content" action="/action_page.php" method="POST">
		    <div class="container">
		      <h1>Login</h1>
		      <p id="msg">Please fill in this form to log into your account.</p>
		      <hr>
		      <label for="name"><strong>Name</strong></label>
		      <input type="text" placeholder="Enter Full Name" name="name" required><br><br>

		      <label for="psw"><strong>Password</strong></label>
		      <input type="password" placeholder="Enter Password" id="pass1" name="psw" required><br><br><br><br>

		      <button type="button" onclick="location.reload();" class="cancelbtn formbutton"><span>Cancel</span></button>
		      &#160;&#160;&#160;&#160;
		      <button type="submit" class="signupbtn formbutton" ><span>Login</span></button><br><br>
		    </div>
		  </form>
	  </fieldset>
	</div>

<br><br><br>
</body>
</html>

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

	$conn->close();
	$name = '';
	$email = '';
	$fpassword = '';
	$cname = '';
	$cno = '';
}
?>