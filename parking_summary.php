<?php
   include('parking_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
	<link rel="stylesheet" type="text/css" href="parking_summary.css">
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
			$slot = $_COOKIE["focused_element"];
			$hours = $_COOKIE["selected"];
			$name = $_SESSION['login_user'];

			if($hours < 9)
			{
				$amount = 10 * $hours;
			} else if($hours == 9)
			{
				$amount = 100;
				$hours = "More than 8.";
			}
			

			echo "<p class='details'>Account: &#160;&#160;<span> " . $name . "</span></p>";
		    echo "<p class='details'>Booked Slot: &#160;&#160;<span> " . $slot . "</span></p>";
		    echo "<p class='details'>Number of hours: &#160;&#160;<span>" . $hours . "</span></p>";
		    echo "<p class='details'>Amount To Pay (10$/hour): &#160;&#160;<span>" . $amount . "</span></p>";
		    echo '<br><br><br><br><br><p id="note">Note: Slot number: abc => "a" Row, "b" Slot, "c" Floor</p>';

		    $slot = '';
		    $hours = '';
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
	      header("Location: parking.php");
	   }
    }


    if(array_key_exists('back', $_POST)) {
        back();
    }
    
    function back() {
        header("Location: parking_main.php");
    }

   

    //enter record for booked slot
	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	$name = $_SESSION['login_user'];
	$slot = $_COOKIE["focused_element"];
	$hours = $_COOKIE["selected"];
	
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

	 	$exists = mysqli_query($conn, "select 1 from bookedslots");

		if($exists !== FALSE)
		{			
		   //echo("This table exists");
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   $sql = "INSERT INTO bookedslots (name, slot, hours)
			VALUES ( '".$name."' , '".$slot."', '".$hours."')";

			if ($conn->query($sql) === TRUE) {
			  //echo "Record Saved Successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
		   //echo("This table doesn't exist");
		    $sql = "CREATE TABLE bookedslots (
			name VARCHAR(30) NOT NULL,
			slot VARCHAR(30) NOT NULL,
			hours VARCHAR(20) NOT NULL,
			start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY(name,start_date)
			)";

			if ($conn->query($sql) === TRUE) {
			//  echo "Table Accounts created successfully";
			   $conn = new mysqli($servername, $username, $password, $dbname);
			   $sql = "INSERT INTO bookedslots (name, slot, hours)
				VALUES ( '".$name."' , '".$slot."', '".$hours."')";

				if ($conn->query($sql) === TRUE) {
				  //echo "Record Saved Successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
			  echo "Error creating bookedslots table: " . $conn->error;
			  exit();
			}
		}
		
	} else {
	  	echo "Error creating database: " . $conn->error;
	  	exit();
	}
	$conn->close();
	$slot = '';
	$hours = '';




 if(array_key_exists('checkout', $_POST)) {
        checkout($amount);
    }
    
function checkout($amount) {
    if(isset($_POST["checkout"])) {
		$name = $_SESSION['login_user'];
		$slot = $_COOKIE["focused_element"];
		$hours = $_COOKIE["selected"];

		$to = $name; 
		$subject = 'Parking Slot Booking Confirmation';
		$message = 'Dear User,
Greetings of the day!

Your Booking Summary: 

Slot No: '. $slot .'
Hours: '. $hours .'
Amount Paid: '. $amount . '

Thank you for using our services! We hope you have a great day!


Regards,
Booking Service Team';
		$headers = 'From: bmwebprogramming@gmail.com';

		if(mail($to, $subject, $message, $headers))
		{
			echo "Mail Sent!";
		}
		} else {
		    echo '<p>Something went wrong</p>';
		}

		unset($_COOKIE["focused_element"]);
		unset($_COOKIE["selected"]);
        header("Location: parking_confirmation.php");




    $servername = "localhost";
	$username = "root";
	$password = "admin123";
	
	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	  exit();
	}

	$sql = "CREATE DATABASE IF NOT EXISTS parking;";
	if ($conn->query($sql) === TRUE) {
		$dbname = "parking";
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
		} else {
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
	
	$cardname = '';
	$cardnumber = '';
	$expmonth = '';
	$expyear = '';
}


?>
