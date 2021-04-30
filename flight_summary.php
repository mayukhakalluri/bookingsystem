<?php
   include('flight_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
	<link rel="stylesheet" type="text/css" href="flight_summary.css">
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
			$seat_no = $_COOKIE["seat_no"];
			$flight_no = $_COOKIE["flight_no"];
			$source_city = $_COOKIE["source_city"];
			$dest_city = $_COOKIE["dest_city"];
			$time = $_COOKIE["time"];
			$date = $_COOKIE['date'];
			$class = '';
			


			if( $seat_no <= 17 && $seat_no >= 11 || $seat_no <= 27 && $seat_no >= 21 || $seat_no <= 37 && $seat_no >= 31 ) {
				$class = "Business";
				if($source_city == "Atlanta" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Atlanta"){$amount = 180*3;}
				elseif($source_city == "Atlanta" && $dest_city == "Florida" || $source_city == "Florida" && $dest_city == "Atlanta"){$amount = 100*3;}
				elseif($source_city == "Atlanta" && $dest_city == "Pennsylvania" || $source_city == "Pennsylvania" && $dest_city == "Atlanta"){$amount = 225*3;}
				elseif($source_city == "Atlanta" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Atlanta"){$amount = 97*3;}
				elseif($source_city == "Atlanta" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Atlanta"){$amount = 186*3;}
				elseif($source_city == "Atlanta" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Atlanta"){$amount = 161*3;}
				elseif($source_city == "Florida" && $dest_city == "Pennsylvania" || $source_city == "Pennsylvania" && $dest_city == "Florida"){$amount = 260*3;}
				elseif($source_city == "Florida" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Florida"){$amount = 195*3;}
				elseif($source_city == "Florida" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Florida"){$amount = 175*3;}
				elseif($source_city == "Florida" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Florida"){$amount = 241*3;}
				elseif($source_city == "Florida" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Florida"){$amount = 103*3;}
				elseif($source_city == "Pennsylvania" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Pennsylvania"){$amount = 173*3;}
				elseif($source_city == "Pennsylvania" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Pennsylvania"){$amount = 392*3;}
				elseif($source_city == "Pennsylvania" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Pennsylvania"){$amount = 265*3;}
				elseif($source_city == "Pennsylvania" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Pennsylvania"){$amount = 225*3;}
				elseif($source_city == "New York" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "New York"){$amount = 167*3;}
				elseif($source_city == "New York" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "New York"){$amount = 117*3;}
				elseif($source_city == "New York" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "New York"){$amount = 100*3;}
				elseif($source_city == "Chicago" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Chicago"){$amount = 196*3;}
				elseif($source_city == "Chicago" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Chicago"){$amount = 213*3;}
				elseif($source_city == "Boston" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Boston"){$amount = 138*3;}
			} else if($seat_no <= 47 && $seat_no >= 41 || $seat_no <= 57 && $seat_no >= 51 || $seat_no <= 67 && $seat_no >= 61 || $seat_no <= 77 && $seat_no >= 71 
				|| $seat_no <= 87 && $seat_no >= 81 || $seat_no <= 97 && $seat_no >= 91) {
				 $class = "Economy";
				if($source_city == "Atlanta" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Atlanta"){$amount = 180;}
				elseif($source_city == "Atlanta" && $dest_city == "Florida" || $source_city == "Florida" && $dest_city == "Atlanta"){$amount = 100;}
				elseif($source_city == "Atlanta" && $dest_city == "Pennsylvania" || $source_city == "Pennsylvania" && $dest_city == "Atlanta"){$amount = 225;}
				elseif($source_city == "Atlanta" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Atlanta"){$amount = 97;}
				elseif($source_city == "Atlanta" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Atlanta"){$amount = 186;}
				elseif($source_city == "Atlanta" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Atlanta"){$amount = 161;}
				elseif($source_city == "Florida" && $dest_city == "Pennsylvania" || $source_city == "Pennsylvania" && $dest_city == "Florida"){$amount = 260;}
				elseif($source_city == "Florida" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Florida"){$amount = 195;}
				elseif($source_city == "Florida" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Florida"){$amount = 175;}
				elseif($source_city == "Florida" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Florida"){$amount = 241;}
				elseif($source_city == "Florida" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Florida"){$amount = 103;}
				elseif($source_city == "Pennsylvania" && $dest_city == "New York" || $source_city == "New York" && $dest_city == "Pennsylvania"){$amount = 173;}
				elseif($source_city == "Pennsylvania" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "Pennsylvania"){$amount = 392;}
				elseif($source_city == "Pennsylvania" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Pennsylvania"){$amount = 265;}
				elseif($source_city == "Pennsylvania" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Pennsylvania"){$amount = 225;}
				elseif($source_city == "New York" && $dest_city == "Chicago" || $source_city == "Chicago" && $dest_city == "New York"){$amount = 167;}
				elseif($source_city == "New York" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "New York"){$amount = 117;}
				elseif($source_city == "New York" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "New York"){$amount = 100;}
				elseif($source_city == "Chicago" && $dest_city == "Boston" || $source_city == "Boston" && $dest_city == "Chicago"){$amount = 196;}
				elseif($source_city == "Chicago" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Chicago"){$amount = 213;}
				elseif($source_city == "Boston" && $dest_city == "New Jersey" || $source_city == "New Jersey" && $dest_city == "Boston"){$amount = 138;}

			}
			

			echo "<p class='details'>Account: &#160;&#160;<span> " . $name . "</span></p>";
		    echo "<p class='details'>Flight No: &#160;&#160;<span> " . $flight_no . "</span></p>";
		    echo "<p class='details'>Seat No: &#160;&#160;<span> " . $seat_no . "</span></p>";
		    echo "<p class='details'>Class: &#160;&#160;<span> " . $class . "</span></p>";
		    echo "<p class='details'>Time: &#160;&#160;<span> " . $time . "</span></p>";
		    echo "<p class='details'>Source City: &#160;&#160;<span>" . $source_city . "</span></p>";
		    echo "<p class='details'>Destination City: &#160;&#160;<span>" . $dest_city . "</span></p>";
		    echo "<p class='details'>Amount: &#160;&#160;<span>$" . $amount . "</span></p>";
		    echo "<p class='details'>Date: &#160;&#160;<span>" . $date . "</span></p>";
		   

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
		                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
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
	      header("Location: flight.php");
	   }
    }


    if(array_key_exists('back', $_POST)) {
        back();
    }
    
    function back() {
        header("Location: flight_main.php");
    }

   

    //enter record for booked seat
	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	$name = $_SESSION['login_user'];
	$seat_no = $_COOKIE["seat_no"];
	$flight_no = $_COOKIE["flight_no"];
	$source_city = $_COOKIE["source_city"];
	$dest_city = $_COOKIE["dest_city"];
	$time = $_COOKIE["time"];
	$date = $_COOKIE["date"];
	
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

	 	$exists = mysqli_query($conn, "select 1 from bookedseats");

		if($exists !== FALSE)
		{			
		   //echo("This table exists");
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO bookedseats (name, seat_no, flight_no, source_city, dest_city, timeslot, travel_date, amount_paid, class)
			VALUES ( '".$name."' , '".$seat_no."', '".$flight_no."', '".$source_city."', '".$dest_city."', '".$time."', '".$date."', '".$amount."', '".$class."')";

			if ($conn->query($sql) === TRUE) {
			  //echo "Record Saved Successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
		   //echo("This table doesn't exist");
		    $sql = "CREATE TABLE bookedseats (
			name VARCHAR(30) NOT NULL,
			seat_no VARCHAR(30) NOT NULL,
			flight_no VARCHAR(20) NOT NULL,
			source_city VARCHAR(20) NOT NULL,
			dest_city VARCHAR(20) NOT NULL,
			timeslot VARCHAR(20) NOT NULL,
			travel_date VARCHAR(20) NOT NULL,
			amount_paid VARCHAR(20) NOT NULL,
			class VARCHAR(20) NOT NULL,
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY(name,flight_no,travel_date)
			)";

			if ($conn->query($sql) === TRUE) {
			//  echo "Table Accounts created successfully";
			   $conn = new mysqli($servername, $username, $password, $dbname);
			   $sql = "INSERT INTO bookedseats (name, seat_no, flight_no, source_city, dest_city, timeslot, travel_date, amount_paid, class)
				VALUES ( '".$name."' , '".$seat_no."', '".$flight_no."', '".$source_city."', '".$dest_city."', '".$time."', '".$date."', '".$amount."', '".$class."')";

				if ($conn->query($sql) === TRUE) {
				  //echo "Record Saved Successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
			  echo "Error creating bookedseats table: " . $conn->error;
			  exit();
			}
		}
		
	} else {
	  	echo "Error creating database: " . $conn->error;
	  	exit();
	}
	$conn->close();

	$name = '';
	$seat_no = '';
	$flight_no = '';
	$source_city = '';
	$dest_city = '';
	$time = '';
	$date = '';

if(array_key_exists('checkout', $_POST)) {
        checkout($amount, $class);
    }
    
function checkout($amount, $class) {
    if(isset($_POST["checkout"])) {
		$name = $_SESSION['login_user'];
		$seat_no = $_COOKIE["seat_no"];
		$flight_no = $_COOKIE["flight_no"];
		$source_city = $_COOKIE["source_city"];
		$dest_city = $_COOKIE["dest_city"];
		$time = $_COOKIE["time"];
		$date = $_COOKIE["date"];

		$to = $name; 
		$subject = 'Flight Ticket Booking Confirmation';
		$message = 'Dear User,
Greetings of the day!

Your Booking Summary: 

Seat No: '. $seat_no .'
Class: '. $class .'
Flight No: '. $flight_no .'
Source City: '. $source_city .'
Destination City: ' .$dest_city. '
Time: '. $time .'
Date: '. $date .'
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

		unset($_COOKIE["seat_no"]);
		unset($_COOKIE["flight_no"]);
		unset($_COOKIE["source_city"]);
		unset($_COOKIE["dest_city"]);
		unset($_COOKIE["time"]);
		unset($_COOKIE["date"]);

        header("Location: flight_confirmation.php");




    $servername = "localhost";
	$username = "root";
	$password = "admin123";
	
	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	$sql = "CREATE DATABASE IF NOT EXISTS flight;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "flight";
	 	//echo "Database created successfully";

	 	$conn = new mysqli($servername, $username, $password, $dbname); 

	 	$exists = mysqli_query($conn, "select 1 from payment");

		if($exists !== FALSE)
		{
			$name = $_SESSION['login_user'];
			$cardname = $_POST['cardname'];
			$cardnumber = $_POST['cardnumber'];
			$expmonth = $_POST['expmonth'];
			$expyear = $_POST['expyear'];
			
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
	$conn->close();
}


?>
