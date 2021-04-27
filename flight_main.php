<?php
   include('flight_session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Flight Ticket Booking System!</title>
    <link rel="stylesheet" type="text/css" href="parking_main.css">

</head>
<body>
   
     <form method="POST">
         <div id="head-btn">   
            <button name="summary"  class="logout_btn">Book</button>
            <button name="logout"  class="logout_btn">Log out</button> 
        </div><br><br>
    </form>
   
    <h1>Book A Seat!</h1>
    <main>
        Filters
    </main><br><br><br><hr>
    <div id="display_table"></div>
    
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


    if(array_key_exists('summary', $_POST)) {
        summary();
    }
    
    function summary() {
        session_start();
        header("Location: flight_summary.php");
    }
   
?>
