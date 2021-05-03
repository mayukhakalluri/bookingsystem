<?php
   include('rent_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
	<link rel="stylesheet" type="text/css" href="rent_summary.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	 <form method="POST">
		 <div id="head-btn">   
			<button name="back"  class="logout_btn">Back</button>
			<button name="logout"  class="logout_btn">Log out</button> 
		</div><br><br>
	</form>
	<h1>Summary</h1>
	<main>
		<div class="summary">
		<?php
			$amount = 0;
			$name = $_SESSION['login_user'];
			$car_category = $_COOKIE["car_category"];
			$car_name = $_COOKIE["car_name"];
			$rent_by = $_COOKIE["rent_by"];
			$count = $_COOKIE["count"];
			
			if($rent_by == "Hours")
			{
				$start_date = $_COOKIE["start_date"];
				$start_time = $_COOKIE["start_time"].':00';
				$end_time = $_COOKIE["end_time"].':00';
				$end_date = $_COOKIE["end_date"];
				if($car_category == "Segment A | City Car (Minicompact)"){
					$amount = 20 * $count;
				} else if($car_category == "Segment B | Supermini (Subcompact)"){
					$amount = 25 * $count;
				} else if($car_category == "Segment C | Small Family (Compact)"){
					$amount = 30 * $count;
				} else if($car_category == "Segment D | Large Family (Mid-size)"){
					$amount = 35 * $count;
				} else if($car_category == "Segment E | Executive (Full-size)"){
					$amount = 45 * $count;
				} else if($car_category == "Segment E | Executive (Mid-size)"){
					$amount = 40 * $count;
				} else if($car_category == "Segment F | Luxury Saloon (Full-size Luxury)"){
					$amount = 50 * $count;
				}

				echo "<p class='details'>Account: &#160;&#160;<span> " . $name . "</span></p>";
				echo "<p class='details'>Car Name: &#160;&#160;<span> " . $car_name . "</span></p>";
				echo "<p class='details'>Car Category: &#160;&#160;<span> " . $car_category . "</span></p>";
				echo "<p class='details'>Rent By: &#160;&#160;<span> " . $rent_by . "</span></p>";
				echo "<p class='details'>Rent Date: &#160;&#160;<span> " . $start_date . "</span></p>";
				echo "<p class='details'>No. of Hours: &#160;&#160;<span> " . $count . "</span></p>";
				echo "<p class='details'>Start Time: &#160;&#160;<span> " . $start_time . "</span></p>";
				echo "<p class='details'>End Time: &#160;&#160;<span>" . $end_time . " ( ". $end_date .")</span></p>";
				echo "<p class='details'>Amount: &#160;&#160;<span>$" . $amount . "</span></p>";

			} else if($rent_by == "Days") {

				$start_date = $_COOKIE["start_date"];
				$end_date = $_COOKIE["end_date"];
				$start_time = $_COOKIE["start_time"].':00';
				$end_time = $_COOKIE["end_time"].':00';

				if($car_category == "Segment A | City Car (Minicompact)"){
					$amount = 200 * $count;
				} else if($car_category == "Segment B | Supermini (Subcompact)"){
					$amount = 250 * $count;
				} else if($car_category == "Segment C | Small Family (Compact)"){
					$amount = 300 * $count;
				} else if($car_category == "Segment D | Large Family (Mid-size)"){
					$amount = 350 * $count;
				} else if($car_category == "Segment E | Executive (Full-size)"){
					$amount = 450 * $count;
				} else if($car_category == "Segment E | Executive (Mid-size)"){
					$amount = 400 * $count;
				} else if($car_category == "Segment F | Luxury Saloon (Full-size Luxury)"){
					$amount = 500 * $count;
				}

				echo "<p class='details'>Account: &#160;&#160;<span> " . $name . "</span></p>";
				echo "<p class='details'>Car Name: &#160;&#160;<span> " . $car_name . "</span></p>";
				echo "<p class='details'>Car Category: &#160;&#160;<span> " . $car_category . "</span></p>";
				echo "<p class='details'>Rent By: &#160;&#160;<span> " . $rent_by . "</span></p>";
				echo "<p class='details'>No. of Days: &#160;&#160;<span> " . $count . "</span></p>";
				echo "<p class='details'>Start Time: &#160;&#160;<span> " . $start_date . " ( ". $start_time .")</span></p>";
				echo "<p class='details'>End Time: &#160;&#160;<span>" . $end_date . " ( ". $end_time .")</span></p>";
				echo "<p class='details'>Amount: &#160;&#160;<span>$" . $amount . "</span></p>";
			}
		   

		?>
		</div>

			<div class="container">
			  <form method="POST">
				<div class="col-50">
					<h3>Payment</h3>
					<label for="fname">Accepted Cards</label>
					<div class="icon-container">
					  <i class="fa fa-cc-visa" style="color:navy;"></i>
					  <i class="fa fa-cc-amex" style="color:blue;"></i>
					  <i class="fa fa-cc-mastercard" style="color:red;"></i>
					  <i class="fa fa-cc-discover" style="color:orange;"></i>
					</div>
					<label for="cname">Name on Card</label>
					<input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
					<label for="ccnum">Credit card number</label>
					<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
					<label for="expmonth">Exp Month</label>
					<input type="text" id="expmonth" name="expmonth" placeholder="September" required>
					<div class="row">
					  <div class="col-50">
						<label for="expyear">Exp Year</label>
						<input type="text" id="expyear" name="expyear" placeholder="2021" required>
					  </div>
					  <div class="col-50">
						<label for="cvv">CVV</label>
						<input type="password" id="cvv" name="cvv" placeholder="352" maxlength="3" required>
					  </div>
					</div>
				</div>
				<input type="submit" name="checkout" value="Continue to checkout" class="btn">
			  </form>
			</div>	
	</main>
</body>
</html>

<?php

	if(array_key_exists('logout', $_POST)) {
		logout();
	}
	
	function logout() {
		session_start();
   
	   if(session_destroy()) {
		  header("Location: rent.php");
	   }
	}


	if(array_key_exists('back', $_POST)) {
		back();
	}
	
	function back() {
		header("Location: rent_main.php");
	}


	//enter record for booked car
	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	$name = $_SESSION['login_user'];
	$car_name = $_COOKIE["car_name"];
	$rent_by = $_COOKIE["rent_by"];
	$count = $_COOKIE["count"];
	$start_date = $_COOKIE["start_date"];
	$end_date = $_COOKIE["end_date"];
	$start_time = $_COOKIE["start_time"].':00';
	$end_time = $_COOKIE["end_time"].':00';
	
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS rentcar;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "rentcar";
		//echo "Database created successfully";

		$conn = new mysqli($servername, $username, $password, $dbname); 

		$exists = mysqli_query($conn, "select 1 from bookedcar");

		if($exists !== FALSE)
		{			
		   //echo("This table exists");
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO bookedcar (name, car_name, rent_by, count, start_date, end_date, start_time, end_time)
			VALUES ( '".$name."' , '".$car_name."', '".$rent_by."', '".$count."', '".$start_date."', '".$end_date."', '".$start_time."', '".$end_time."')";

			if ($conn->query($sql) === TRUE) {
			  //echo "Record Saved Successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
		   //echo("This table doesn't exist");
			$sql = "CREATE TABLE bookedcar (
			name VARCHAR(30) NOT NULL,
			car_name VARCHAR(20) NOT NULL,
			rent_by VARCHAR(20) NOT NULL,
			count VARCHAR(20) NOT NULL,
			start_date VARCHAR(20) NOT NULL,
			end_date VARCHAR(20) NOT NULL,
			start_time VARCHAR(20) NOT NULL,
			end_time VARCHAR(20) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY(name,car_name,start_date,reg_date)
			)";

			if ($conn->query($sql) === TRUE) {
			//  echo "Table Accounts created successfully";
			   $conn = new mysqli($servername, $username, $password, $dbname);
			   $sql = "INSERT INTO bookedcar (name, car_name, rent_by, count, start_date, end_date, start_time, end_time)
				VALUES ( '".$name."' , '".$car_name."', '".$rent_by."', '".$count."', '".$start_date."', '".$end_date."', '".$start_time."', '".$end_time."')";

				if ($conn->query($sql) === TRUE) {
				  //echo "Record Saved Successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
			  echo "Error creating bookedcar table: " . $conn->error;
			  exit();
			}
		}
		
	} else {
		echo "Error creating database: " . $conn->error;
		exit();
	}
	$conn->close();

	

if(array_key_exists('checkout', $_POST)) {
		checkout($amount);
	}
	
function checkout($amount) {
	if(isset($_POST["checkout"])) {

		$name = $_SESSION['login_user'];
		$car_category = $_COOKIE["car_category"];
		$car_name = $_COOKIE["car_name"];
		$rent_by = $_COOKIE["rent_by"];
		$count = $_COOKIE["count"];
		$start_date = $_COOKIE["start_date"];
		$end_date = $_COOKIE["end_date"];
		$start_time = $_COOKIE["start_time"].':00';
		$end_time = $_COOKIE["end_time"].':00';

		$to = $name; 
		$subject = 'Car Rental Booking Confirmation';
		$message = 'Dear User,
Greetings of the day!

Your Booking Summary: 

Car Name: '. $car_name .'
Car Category: '. $car_category .'
Rent By: '. $rent_by .'
No. of Days/Hours: '. $count .'
Start Date: ' .$start_date. '
End Date: '. $end_date .'
Start Time: '. $start_time .'
End Time: '. $end_time .'
Amount Paid: $'. $amount . '

Thank you for using our services! We hope you have a great day!


Regards,
Booking Service Team';
		$headers = 'From: bmwebprogramming@gmail.com';

		if(mail($to, $subject, $message, $headers))
		{
			echo "Mail Sent!";
		}
		} else {
			echo '<p>Something went wrong. Your confirmation email did not go through.</p>';
		}


		header("Location: rent_confirmation.php");


	$servername = "localhost";
	$username = "root";
	$password = "admin123";
	$name = $_SESSION['login_user'];
	$cardname = $_POST['cardname'];
	$cardnumber = $_POST['cardnumber'];
	$expmonth = $_POST['expmonth'];
	$expyear = $_POST['expyear'];
	
	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	$sql = "CREATE DATABASE IF NOT EXISTS rentcar;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "rentcar";
		//echo "Database created successfully";

		$conn = new mysqli($servername, $username, $password, $dbname); 

		$exists = mysqli_query($conn, "select 1 from payment");

		if($exists !== FALSE)
		{
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO payment (name, cardname, cardnumber, expmonth, expyear)
			VALUES ( '".$name."' , '".$cardname."', '".$cardnumber."', '".$expmonth."', '".$expyear."')";

			if ($conn->query($sql) === TRUE) {
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			$sql = "CREATE TABLE payment (
			name VARCHAR(30) NOT NULL,
			cardname VARCHAR(30) NOT NULL,
			cardnumber VARCHAR(20) NOT NULL,
			expmonth VARCHAR(20) NOT NULL,
			expyear VARCHAR(20) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY(name,cardnumber)
			)";

			if ($conn->query($sql) === TRUE) {
			//  echo "Table Accounts created successfully";
				   $conn = new mysqli($servername, $username, $password, $dbname);
				   $sql = "INSERT INTO payment (name, cardname, cardnumber, expmonth, expyear)
					VALUES ( '".$name."' , '".$cardname."', '".$cardnumber."', '".$expmonth."', '".$expyear."')";

					if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			} else {
			  echo "Error creating payment table: " . $conn->error;
			  exit();
			}
		}
		
	} else {
		echo "Error creating database: " . $conn->error;
		exit();
	}
		unset($_COOKIE["car_category"]);
		unset($_COOKIE["car_name"]);
		unset($_COOKIE["rent_by"]);
		unset($_COOKIE["count"]);
		unset($_COOKIE["start_date"]);
		unset($_COOKIE["end_date"]);
		unset($_COOKIE["start_time"]);
		unset($_COOKIE["end_time"]);

	$conn->close();
}

?>
