<?php
   include('rent_session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Car Booking System!</title>
    <meta charset="utf-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="rent_main.css" rel="stylesheet">
    <script src="rent_main.js"></script>
</head>
<body>
   
    <form method="POST">
         <div id="head-btn">   
            <button name="summary"  class="logout_btn">Book</button>
            <button name="logout"  class="logout_btn">Log out</button> 
        </div><br><br><br><br>
    </form>
    <h1>Rent A Car!</h1>
    <main>
    	<fieldset>
    		<form name="form1" id="form1">
			<label for="category"><strong>Car Category: </strong></label><select name="category" id="category" required>
			    <option value="" selected="selected">Select Category</option>
			  </select>
			  <br><br>
			<label for="car"><strong> Car: </strong></label><select name="car" id="car" required>
			    <option value="" selected="selected">Please select category first</option>
			  </select>
			  <br><br>
			<label for="rentby"><strong> Rent By: </strong></label><select name="rentby" id="rentby" required>
			    <option value="" selected="selected">Please select car first</option>
			  </select>
			  <br><br><br><br><br>
			  <input type="submit" value="Next" class="button" onclick="get_details(); return false;">  
		</form>
    		
    	</fieldset>
		
    </main><br><br><br>
    <script>
    	var car_objects = {
		  "Segment A | City Car (Minicompact)": {
		    "Chevrolet Spark": ["Days", "Hours"],
		    "Fiat 500": ["Days", "Hours"],
		    "Kia Picanto": ["Days", "Hours"],
		    "Renault Twingo": ["Days", "Hours"]    
		  },
		  "Segment B | Supermini (Subcompact)": {
		    "Ford Fiesta Spark": ["Days", "Hours"],
		    "Opel Corsa": ["Days", "Hours"],
		    "Volkswagen Polo": ["Days", "Hours"],
		    "Kia Rio": ["Days", "Hours"]
		  },
		  "Segment C | Small Family (Compact)": {
		    "Honda Civic": ["Days", "Hours"],
		    "Hyundai Elantra": ["Days", "Hours"],
		    "Ford Focus": ["Days", "Hours"],
		    "Toyota Corolla": ["Days", "Hours"],
		    "Acura ILX": ["Days", "Hours"],
		    "Audi A3": ["Days", "Hours"],
		    "BMW 1 Series": ["Days", "Hours"],
		    "Lexus CT": ["Days", "Hours"],
		    "Mercedes-Benz A-Class": ["Days", "Hours"]

		  },
		  "Segment D | Large Family (Mid-size)": {
		    "Ford Mondeo": ["Days", "Hours"],
		    "Toyota Camry": ["Days", "Hours"],
		    "Mazda 6": ["Days", "Hours"],
		    "Audi A4": ["Days", "Hours"],
		    "BMW 3 Series": ["Days", "Hours"],
		    "Audi A3": ["Days", "Hours"],
		    "BMW 1 Series": ["Days", "Hours"],
		    "Lexus IS": ["Days", "Hours"],
		    "Mercedes-Benz C-Class": ["Days", "Hours"]
		  },
		  "Segment E | Executive (Full-size)": {
		    "Chevrolet Impala": ["Days", "Hours"],
		    "Ford Taurus": ["Days", "Hours"],
		    "Holden Caprice": ["Days", "Hours"],
		    "Toyota Avalon": ["Days", "Hours"]  
		  },
		  "Segment E | Executive (Mid-size)": {
		    "Audi A6": ["Days", "Hours"],
		    "BMW 5 Series": ["Days", "Hours"],
		    "Cadilac CT5": ["Days", "Hours"],
		    "Mercedes-Benz E-Class": ["Days", "Hours"],
		    "Tesla Model S": ["Days", "Hours"]

		  },
		  "Segment F | Luxury Saloon (Full-size Luxury)": {
		    "Audi A8": ["Days", "Hours"],
		    "BMW 7 Series": ["Days", "Hours"],
		    "Jaguar XJ": ["Days", "Hours"],
		    "Mercedes-Benz S-Class": ["Days", "Hours"],
		    "Porsche Panamera": ["Days", "Hours"]
		  }

		}
		window.onload = function() {
		  var category = document.getElementById("category");
		  var car = document.getElementById("car");
		  var rentby = document.getElementById("rentby");
		  for (var x in car_objects) {
		    category.options[category.options.length] = new Option(x, x);
		  }
		  category.onchange = function() {
		    //empty Chapters- and Topics- dropdowns
		    rentby.length = 1;
		    car.length = 1;
		    //display correct values
		    for (var y in car_objects[this.value]) {
		      car.options[car.options.length] = new Option(y, y);
		    }
		  }
		  car.onchange = function() {
		    //empty Chapters dropdown
		    rentby.length = 1;
		    //display correct values
		    var z = car_objects[category.value][this.value];
		    for (var i = 0; i < z.length; i++) {
		      rentby.options[rentby.options.length] = new Option(z[i], z[i]);
		    }
		  }
		}
    </script>
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
	      header("Location: rent.php");
	   }
    }


    if(array_key_exists('summary', $_POST)) {
        summary();
    }
    
    function summary() {
        session_start();
        header("Location: rent_summary.php");
    }
   
?>
