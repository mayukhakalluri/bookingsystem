<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Parking Slot Booking!</title>
</head>
<body>
<h1>Main Page</h1>

<form method="POST">
	<button name="logout">Log out</button>
	
</form>

</body>
</html>

<?php
    if(array_key_exists('logout', $_POST)) {
        logout();
    }
    
    function logout() {
        echo "This is Button1 that is selected";
        session_start();
   
	   if(session_destroy()) {
	      header("Location: parking.php");
	   }
    }
   
?>