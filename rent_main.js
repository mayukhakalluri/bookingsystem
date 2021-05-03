
var selected_category;
var selected_car;
var selected_rentby;

function get_details(){

    selected_category = document.getElementById('category').value;
    selected_car = document.getElementById('car').value;
    selected_rentby = document.getElementById('rentby').value;

    if(selected_rentby == "Hours"){
         var displayData = '';
            displayData += `<div class="slot_display">
            <fieldset id="next">
                <form id="details">
                    <label><strong>Enter the number of ${selected_rentby}: </strong></label>
                    <input type="text" name="count" id="count" size="4" required><br><br>
                    <label><strong>Rent Date:</strong></label>
                    <input type="date" name="fromdate" id="fromdate"><br><br>
                    <label><strong>From: <br><span id="msg">(Pickup between 8:00 AM to 8:00 PM)</span></strong></label>
                        <select id="start_time">
                            <option> 08:00 </option>
                            <option> 09:00 </option>
                            <option> 10:00 </option>
                            <option> 11:00 </option>
                            <option> 12:00 </option>
                            <option> 13:00 </option>
                            <option> 14:00 </option>
                            <option> 15:00 </option>
                            <option> 16:00 </option>
                            <option> 17:00 </option>
                            <option> 18:00 </option>
                            <option> 19:00 </option>
                            <option> 20:00 </option>
                        </select>
                       <br><br><br><br>
                    <input type="button" value="Next" class="button" onclick="confirm_booking();">
                </form>
            </fieldset></div>`;

        var divObject = document.getElementById("display_table"); 
        divObject.innerHTML = displayData;
        

    } else if(selected_rentby == "Days"){

        var displayData = '';
        displayData += `<div class="slot_display">
        <fieldset id="next">
            <form id="details">
                <label><strong>Enter the number of ${selected_rentby}: </strong></label>
                <input type="text" name="count" id="count" size="4" required><br><br>
                <label><strong>From:</strong></label>
                <input type="date" name="fromdate" id="fromdate"><br><br>
                <label><strong>Pickup Time:</strong></label>
                 <select id="start_time">
                    <option> 08:00 </option>
                    <option> 09:00 </option>
                    <option> 10:00 </option>
                    <option> 11:00 </option>
                    <option> 12:00 </option>
                    <option> 13:00 </option>
                    <option> 14:00 </option>
                    <option> 15:00 </option>
                    <option> 16:00 </option>
                    <option> 17:00 </option>
                    <option> 18:00 </option>
                    <option> 19:00 </option>
                    <option> 20:00 </option>
                </select><br><br>
                <label><strong>Drop Time:</strong></label>
                 <select id="end_time">
                    <option> 08:00 </option>
                    <option> 09:00 </option>
                    <option> 10:00 </option>
                    <option> 11:00 </option>
                    <option> 12:00 </option>
                    <option> 13:00 </option>
                    <option> 14:00 </option>
                    <option> 15:00 </option>
                    <option> 16:00 </option>
                    <option> 17:00 </option>
                    <option> 18:00 </option>
                    <option> 19:00 </option>
                    <option> 20:00 </option>
                </select>
                <br><br><br>
                <input type="button" value="Next" class="button" onclick="confirm_booking();">
            </form>
        </fieldset></div>`;

        var divObject = document.getElementById("display_table"); 
        divObject.innerHTML = displayData;
            
        }

}


function confirm_booking(){ 
    if(selected_rentby == 'Days'){
        var start_time = parseInt(document.getElementById('start_time').value);
        var end_time = parseInt(document.getElementById('end_time').value);
        var gap = parseInt(document.getElementById('count').value);
        var start_date = document.getElementById('fromdate').value;
        var date = new Date(start_date);
        var new_date = new Date(date);

        new_date.setDate(new_date.getDate() + gap + 1);
        var dd = new_date.getDate();
        var mm = new_date.getMonth() + 1;
        var y = new_date.getFullYear();
        var end_date = y + '-' + mm + '-' + dd;

        var ask = window.confirm("Are you sure you want to book this car?");
        if (ask) {
            createCookie("car_category", `${selected_category}`, "1");
            createCookie("car_name", `${selected_car}`, "1");
            createCookie("rent_by", `${selected_rentby}`, "1");
            createCookie("start_date", `${start_date}`, "1");
            createCookie("end_date", `${end_date}`, "1");
            createCookie("start_time", `${start_time}`, "1");
            createCookie("end_time", `${end_time}`, "1");
            createCookie("count", `${gap}`, "1");
            window.location.href = "rent_summary.php";
        }
    } else if(selected_rentby == 'Hours'){
        var gap = parseInt(document.getElementById('count').value);
        var start_time = parseInt(document.getElementById('start_time').value);
        var end_time = start_time + gap;
        var start_date = document.getElementById('fromdate').value;
        var end_date = start_date;
        if(end_time >= 24 ){
            end_time = end_time - 24;

            var date = new Date(start_date);
            var new_date = new Date(date);

            new_date.setDate(new_date.getDate() + 2);
            var dd = new_date.getDate();
            var mm = new_date.getMonth() + 1;
            var y = new_date.getFullYear();
            end_date = y + '-' + mm + '-' + dd;

        }

        if(gap <= 24){
            var ask = window.confirm("Are you sure you want to book this car?");
            if (ask) {
                createCookie("car_category", `${selected_category}`, "1");
                createCookie("car_name", `${selected_car}`, "1");
                createCookie("rent_by", `${selected_rentby}`, "1");
                createCookie("start_date", `${start_date}`, "1");
                createCookie("end_date", `${end_date}`, "1");
                createCookie("start_time", `${start_time}`, "1");
                createCookie("end_time", `${end_time}`, "1");
                createCookie("count", `${gap}`, "1");
                window.location.href = "rent_summary.php";
            }

        } else{ alert("Number of hours more than 24. Book a car by day."); }
       
    }
   
}


function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
    escape(value) + expires + "; path=/";
}
