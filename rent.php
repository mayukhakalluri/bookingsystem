<?php
   
    session_start();

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
	$sql = "CREATE DATABASE IF NOT EXISTS rentcar;";
	if ($conn->query($sql) === TRUE) {
	 	//echo "Database created successfully";
	} else {
	  	echo "Error creating database: " . $conn->error;
	  	exit();
	}
	
	$conn->close();

	include("rent_config.php");
   
    if(isset($_POST["login_submit"])){
   		if($_SERVER["REQUEST_METHOD"] == "POST") {
	      
		    $myusername = mysqli_real_escape_string($db,$_POST['lemail']);
		    $mypassword = mysqli_real_escape_string($db,$_POST['lpsw']); 
		      
		    $sql = "SELECT * FROM accounts WHERE email = '$myusername' and password = '$mypassword'";
		    $result = mysqli_query($db, $sql);
		    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	       
		    $count = mysqli_num_rows($result); 
		    
	        if($count == 1) {
		        $_SESSION['login_user'] = $myusername;
		        header("location: rent_main.php");
		    }else {
		    	echo "Invalid Email ID and/or Password. Please try again!";
		    }
	    }

    }
   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book A Car on Rent!</title>
	<link rel="stylesheet" type="text/css" href="rent.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
	<h1>Welcome to GSU Car Booking System!</h1>
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

		      <label for="dl"><strong>License No.</strong></label>
		      <input type="text" placeholder="Enter DL Number" id="dl" name="dl" maxlength="9" required><br><br>

		      <label for="contact"><strong>Contact No.</strong></label>
		      <input type="text" placeholder="Enter Phone Number" id="contact" name="contact" maxlength="10" required><br><br>

		      <label for="email"><strong>Email</strong></label>
		      <input type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

		      <label for="dob"><strong>Date of Birth</strong></label>
		      <input type="date" placeholder="Enter DOB as MM-DD-YYYY" id="dob" name="dob" required><br><br>

		      <label for="age"><strong>Age</strong></label>
		      <input type="text" placeholder="Enter Age" name="age" required><br><br>
		      
		      <label for="gender"><strong>Gender</strong></label>
		      <input type="text" placeholder="Enter Gender as M OR F" maxlength="1" name="gender" required><br><br>

		      <label for="psw"><strong>Password</strong></label>
		      <input type="password" placeholder="Enter Password" id="pass1" name="psw" onkeyup="check();" required><br><br>

		      <label for="psw-repeat"><strong>Confirm Password</strong></label>
		      <input type="password" placeholder="Repeat Password" id="pass2" name="psw-repeat" onkeyup="check();" required>&#160;&#160;
		      <span id="message"></span><br><br><br><br>

		      <label><strong><input type="checkbox" checked="checked" name="remember"/ style="height: 20px; width: 20px;"> Remember me</strong></label><br><br><br>
		      <label id="terms">By creating an account you agree to our <a href="#" style="color: #11557d;">Terms & Privacy</a>.</label>
		      <br><br><br><br>
		    
		      <button type="button"  onclick="location.reload();" class="btn formbutton"><span>Cancel</span></button>
		      &#160;&#160;&#160;&#160;
		      <button type="submit" name="signup_submit" class="btn formbutton"><span>Sign Up</span></button><br><br>
			  
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

	<?php
		include("rent_database.php");
	?>

	<div id="login_form" class="modal">
	  <fieldset>
	  		<form class="modal-content" method="POST">
		    <div class="container">
		      <h1>Login</h1>
		      <p id="msg">Please fill in this form to log into your account.</p>
		      <hr>
		       <label for="email"><strong>Email</strong></label>
		      <input type="email" placeholder="Enter Email" id="lemail" name="lemail" required><br><br>

		      <label for="psw"><strong>Password</strong></label>
		      <input type="password" placeholder="Enter Password" id="lpassword" name="lpsw" required><br><br><br><br>

		      <button type="button" onclick="location.reload();" class="btn formbutton"><span>Cancel</span></button>
		      &#160;&#160;&#160;&#160;
		      <button type="submit" name="login_submit" class="btn formbutton" ><span>Login</span></button><br><br>
		    </div>
		  </form>
	  </fieldset>
	</div>

<br><br><br>
</body>
</html>

