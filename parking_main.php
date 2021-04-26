<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Parking Slot Booking!</title>
    <link rel="stylesheet" type="text/css" href="parking_main.css">

</head>
<body>
   
     <form method="POST">
         <div id="head-btn">   
            <button name="summary"  class="logout_btn">Book</button>
            <button name="logout"  class="logout_btn">Log out</button> 
        </div><br><br>
    </form>
   
    <h1>Book A Slot!</h1>
    <main>
        <button class="floor" id="0">Ground Floor</button> &#160;&#160;&#160;&#160; <button id="1" class="floor">First Floor</button>
        <br><br><br>
        <button id="2" class="floor">Second Floor</button> &#160;&#160;&#160;&#160; <button id="3" class="floor">Third Floor</button>
    </main><br><br><br><hr>
    <script src="parking_main.js"></script>
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
	      header("Location: parking.php");
	   }
    }


    if(array_key_exists('summary', $_POST)) {
        summary();
    }
    
    function summary() {
        session_start();
        header("Location: parking_summary.php");
    }
   
?>

