<?php
   include('flight_session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Flight Ticket Booking System!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.4.0/paper/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="flight_main.css" rel="stylesheet">
    <script src="flight_main.js"></script>
</head>
<body>
   
    <form method="POST">
         <div id="head-btn">   
            <button name="summary"  class="logout_btn">Book</button>
            <button name="logout"  class="logout_btn">Log out</button> 
        </div><br><br><br><br>
    </form>
   
    <main>
        <div class="jquery-script-clear"></div>

        <div class="container">   
            <h1>Book A Seat!</h1>
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <button class="checkfilter btn btn-xs btn-filter"><span class="glyphicon glyphicon-filter">
                        </span>Click To Apply Filter (One At A Time)</button>
                    </h3>
                </div>
                <div class="scrollit">
                    <table class="table" id="flight_list">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Flight Number" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Source City" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Destination City" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Time" disabled></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="ab100">
                            <td>AB100</td>
                            <td>Atlanta</td>
                            <td>New York</td>
                            <td>12:00 | 02:30</td>
                            <td class="date"><input type="date" id="dateAB100" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab100`);"></td>
                        </tr>
                       <tr id="ab101">
                            <td>AB101</td>
                            <td>Atlanta</td>
                            <td>Florida</td>
                            <td>02:10 | 04:45</td>
                            <td class="date"><input type="date" id="dateAB101" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab101`);"></td>
                        </tr>
                        <tr id="ab102">
                            <td>AB102</td>
                            <td>Atlanta</td>
                            <td>Pennsylvania</td>
                            <td>06:15 | 08:55</td>
                            <td class="date"><input type="date" id="dateAB102" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab102`);"></td>
                        </tr>
                        <tr id="ab103">
                            <td>AB103</td>
                            <td>Atlanta</td>
                            <td>Chicago</td>
                            <td>07:45 | 10:30</td>
                            <td class="date"><input type="date" id="dateAB103" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab103`);"></td>
                        </tr>
                        <tr id="ab104">
                            <td>AB104</td>
                            <td>Atlanta</td>
                            <td>Boston</td>
                            <td>07:15 | 11:30</td>
                            <td class="date"><input type="date" id="dateAB104" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab104`);"></td>
                        </tr>
                        <tr id="ab105">
                            <td>AB105</td>
                            <td>Atlanta</td>
                            <td>New Jersey</td>
                            <td>13:00 | 15:30</td>
                            <td class="date"><input type="date" id="dateAB105" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab105`);"></td>
                        </tr>
                        <tr id="ab200">
                            <td>AB200</td>
                            <td>Florida</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB200" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab200`);"></td>
                        </tr>
                        <tr id="ab201">
                            <td>AB201</td>
                            <td>Florida</td>
                            <td>Pennsylvania</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB201" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab201`);"></td>
                        </tr>
                        <tr id="ab202">
                            <td>AB202</td>
                            <td>Florida</td>
                            <td>New York</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB202" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab202`);"></td>
                        </tr>
                         <tr id="ab203">
                            <td>AB203</td>
                            <td>Florida</td>
                            <td>Chicago</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB203" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab203`);"></td>
                        </tr>
                         <tr id="ab204">
                            <td>AB204</td>
                            <td>Florida</td>
                            <td>Boston</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB204" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab204`);"></td>
                        </tr>
                         <tr id="ab205">
                            <td>AB205</td>
                            <td>Florida</td>
                            <td>New Jersey</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB205" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab205`);"></td>
                        </tr>
                        <tr id="ab300">
                            <td>AB300</td>
                            <td>Pennsylvania</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB300" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab300`);"></td>
                        </tr>
                        <tr id="ab301">
                            <td>AB301</td>
                            <td>Pennsylvania</td>
                            <td>Florida</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB301" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab301`);"></td>
                        </tr>
                       <tr id="ab302">
                            <td>AB302</td>
                            <td>Pennsylvania</td>
                            <td>New York</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB302" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab302`);"></td>
                        </tr>
                         <tr id="ab303">
                            <td>AB303</td>
                            <td>Pennsylvania</td>
                            <td>Chicago</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB303" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab303`);"></td>
                        </tr>
                         <tr id="ab304">
                            <td>AB304</td>
                            <td>Pennsylvania</td>
                            <td>Boston</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB304" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab304`);"></td>
                        </tr>
                        <tr id="ab305">
                            <td>AB305</td>
                            <td>Pennsylvania</td>
                            <td>New Jersey</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB305" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab305`);"></td>
                        </tr>
                        <tr id="ab400">
                            <td>AB400</td>
                            <td>New York</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB400" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab400`);"></td>
                        </tr>
                        <tr id="ab401">
                            <td>AB401</td>
                            <td>New York</td>
                            <td>Florida</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB401" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab401`);"></td>
                        </tr>
                         <tr id="ab402">
                            <td>AB402</td>
                            <td>New York</td>
                            <td>Pennsylvania</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB402" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab402`);"></td>
                        </tr>
                         <tr id="ab403">
                            <td>AB403</td>
                            <td>New York</td>
                            <td>Chicago</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB403" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab403`);"></td>
                        </tr>
                        <tr id="ab404">
                            <td>AB404</td>
                            <td>New York</td>
                            <td>Boston</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB404" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab404`);"></td>
                        </tr>
                        <tr id="ab405">
                            <td>AB405</td>
                            <td>New York</td>
                            <td>New Jersey</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB405" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab405`);"></td>
                        </tr>
                        
                        <tr id="ab500">
                            <td>AB500</td>
                            <td>Chicago</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB500" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab500`);"></td>
                        </tr>
                        <tr id="ab501">
                            <td>AB501</td>
                            <td>Chicago</td>
                            <td>Florida</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB501" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab501`);"></td>
                        </tr>
                        <tr id="ab502">
                            <td>AB502</td>
                            <td>Chicago</td>
                            <td>Pennsylvania</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB502" name="date"></td>
                            <td><input type="button" nam id="ab500"e="book" value="Book" onclick="return book_seat(`ab502`);"></td>
                        </tr>
                        <tr id="ab503">
                            <td>AB503</td>
                            <td>Chicago</td>
                            <td>New York</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB503" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab503`);"></td>
                        </tr>
                        <tr id="ab504">
                            <td>AB504</td>
                            <td>Chicago</td>
                            <td>Boston</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB504" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab504`);"></td>
                        </tr>
                        <tr id="ab505">
                            <td>AB505</td>
                            <td>Chicago</td>
                            <td>New Jersey</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB505" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab505`);"></td>
                        </tr>
                       
                        <tr id="ab600">
                            <td>AB600</td>
                            <td>Boston</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB600" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab600`);"></td>
                        </tr>
                        <tr id="ab601">
                            <td>AB601</td>
                            <td>Boston</td>
                            <td>Florida</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB601" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab601`);"></td>
                        </tr>
                         <tr id="ab602">
                            <td>AB602</td>
                            <td>Boston</td>
                            <td>Pennsylvania</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB602" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab602`);"></td>
                        </tr>
                         <tr id="ab603">
                            <td>AB603</td>
                            <td>Boston</td>
                            <td>New York</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB603" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab603`);"></td>
                        </tr>
                         <tr id="ab604">
                            <td>AB604</td>
                            <td>Boston</td>
                            <td>Chicago</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB604" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab604`);"></td>
                        </tr>
                        <tr id="ab605">
                            <td>AB605</td>
                            <td>Boston</td>
                            <td>New Jersey</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB605" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab605`);"></td>
                        </tr>
                        
                        <tr id="ab700">
                            <td>AB700</td>
                            <td>New Jersey</td>
                            <td>Atlanta</td>
                            <td>14:15 | 17:55</td>
                            <td class="date"><input type="date" id="dateAB700" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab700`);"></td>
                        </tr>
                        <tr id="ab701">
                            <td>AB701</td>
                            <td>New Jersey</td>
                            <td>Florida</td>
                            <td>17:05 | 19:30</td>
                            <td class="date"><input type="date" id="dateAB701" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab701`);"></td>
                        </tr>
                        <tr id="ab702">
                            <td>AB702</td>
                            <td>New Jersey</td>
                            <td>Pennsylvania</td>
                            <td>18:30 | 20:45</td>
                            <td class="date"><input type="date" id="dateAB702" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab702`);"></td>
                        </tr>
                         <tr id="ab703">
                            <td>AB703</td>
                            <td>New Jersey</td>
                            <td>New York</td>
                            <td>19:20 | 21:55</td>
                            <td class="date"><input type="date" id="dateAB703" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab703`);"></td>
                        </tr>
                         <tr>
                            <td>AB704</td>
                            <td>New Jersey</td>
                            <td>Chicago</td>
                            <td>20:45 | 1:30</td>
                            <td class="date"><input type="date" id="dateAB704" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab704`);"></td>
                        </tr>
                        <tr  id="ab705">
                            <td>AB705</td>
                            <td>New Jersey</td>
                            <td>Boston</td>
                            <td>22:00 | 00:30</td>
                            <td class="date"><input type="date" id="dateAB705" name="date"></td>
                            <td><input type="button" name="book" value="Book" onclick="return book_seat(`ab705`);"></td>
                        </tr>
                    </tbody>
                </table>
                    
                </div>
               
                <p id="count">Number of Flights Available: <span id="rowcount"></span></p>
            </div>
                   
        </div>
                <script>
                try {
                  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
                    return true;
                  }).catch(function(e) {
                    var carbonScript = document.createElement("script");
                    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                    carbonScript.id = "_carbonads_js";
                    document.getElementById("carbon-block").appendChild(carbonScript);
                  });
                } catch (error) {
                  console.log(error);
                }
                </script>
                <script type="text/javascript">

                  var _gaq = _gaq || [];
                  _gaq.push(['_setAccount', 'UA-36251023-1']);
                  _gaq.push(['_setDomainName', 'jqueryscript.net']);
                  _gaq.push(['_trackPageview']);

                  (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                  })();

                </script>
       
    </main><br><br><br>
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
