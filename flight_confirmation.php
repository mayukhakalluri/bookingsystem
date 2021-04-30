<?php
   include('flight_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Page</title>
	<link rel="stylesheet" type="text/css" href="flight_summary.css">
</head>
<body>
	 <form method="POST">
         <div id="head-btn">   
            <button name="back"  class="logout_btn">Back</button>
            <button name="logout"  class="logout_btn">Log out</button> 
        </div><br><br>
    </form>
    <h1>Confirmation</h1>
    <main id="confirmation">
    	<h2>Flight Ticket Booked Successfully! <br><br> Please verify your email for confirmation.</h2>
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
        header("Location: flight_summary.php");
    }

?>