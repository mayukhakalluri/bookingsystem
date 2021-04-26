document.getElementById('0').onclick = function() {
    var displayData = '';
    displayData += `<div class="slot_display">`;
    displayData += `<table id="slots">`
    for (var i = 0; i < 2; i++){
        displayData += `<tr>`;
        for(var j=0; j < 5; j++)
        {
            displayData += `
            <td>Ground Floor <br> Row ${i+1} <br> Slot ${j+1} <br><br>
            Hours: <select id="${i+1}${j+1}0_hours">
            <option value="1"> 1 hour </option>
            <option value="2"> 2 hours </option>
            <option value="3"> 3 hours </option>
            <option value="4"> 4 hours </option>
            <option value="5"> 5 hours </option>
            <option value="6"> 6 hours </option>
            <option value="7"> 7 hours </option>
            <option value="8"> 8 hours </option>
            <option value="9"> More than 8 Hours </option>
            </select><br><br>
            <button class="slot_select" id="${i+1}${j+1}0" onclick="book_slot();">Book Slot</button><br><br>
            <button class="confirm" onclick="release_slot(${i+1}${j+1}0);">Release Slot</button><br><br>
            </td>`;
        }
        displayData += `</tr>`;
    }
    displayData += `</table><br><br><br><button class="confirm" onclick="confirm_booking();">Confirm</button></div>`;
    var divObject = document.getElementById("display_table"); 
    divObject.innerHTML = displayData;
}


document.getElementById('1').onclick = function() {
    var displayData = '';
    displayData += `<div class="slot_display">`;
    displayData += `<table id="slots">`
    for (var i = 0; i < 2; i++){
        displayData += `<tr>`;
        for(var j=0; j < 5; j++)
        {
            displayData += `
            <td>First Floor <br> Row ${i+1} <br> Slot ${j+1} <br><br>
            Hours: <select id="${i+1}${j+1}1_hours">
            <option value="1"> 1 hour </option>
            <option value="2"> 2 hours </option>
            <option value="3"> 3 hours </option>
            <option value="4"> 4 hours </option>
            <option value="5"> 5 hours </option>
            <option value="6"> 6 hours </option>
            <option value="7"> 7 hours </option>
            <option value="8"> 8 hours </option>
            <option value="9"> More than 8 Hours </option>
            </select><br><br>
            <button class="slot_select" id="${i+1}${j+1}1" onclick="book_slot();">Book Slot</button><br><br>
            <button class="confirm" onclick="release_slot(${i+1}${j+1}1);">Release Slot</button><br><br>
            </td>`;
        }
        displayData += `</tr>`;
    }
    displayData += `</table><br><br><br><button class="confirm" onclick="confirm_booking();">Confirm</button></div>`;
    var divObject = document.getElementById("display_table"); 
    divObject.innerHTML = displayData;
}

document.getElementById('2').onclick = function() {
    var displayData = '';
    displayData += `<div class="slot_display">`;
    displayData += `<table id="slots">`
    for (var i = 0; i < 2; i++){
        displayData += `<tr>`;
        for(var j=0; j < 5; j++)
        {
            displayData += `
            <td>Second Floor <br> Row ${i+1} <br> Slot ${j+1} <br><br>
            Hours: <select id="${i+1}${j+1}2_hours">
            <option value="1"> 1 hour </option>
            <option value="2"> 2 hours </option>
            <option value="3"> 3 hours </option>
            <option value="4"> 4 hours </option>
            <option value="5"> 5 hours </option>
            <option value="6"> 6 hours </option>
            <option value="7"> 7 hours </option>
            <option value="8"> 8 hours </option>
            <option value="9"> More than 8 Hours </option>
            </select><br><br>
            <button class="slot_select" id="${i+1}${j+1}2" onclick="book_slot();">Book Slot</button><br><br>
            <button class="confirm" onclick="release_slot(${i+1}${j+1}2);">Release Slot</button><br><br>
           
            </td>`;
        }
        displayData += `</tr>`;
    }
    displayData += `</table><br><br><br><button class="confirm" onclick="confirm_booking();">Confirm</button></div>`;
    var divObject = document.getElementById("display_table"); 
    divObject.innerHTML = displayData;
}

document.getElementById('3').onclick = function() {
    var displayData = '';
    displayData += `<div class="slot_display">`;
    displayData += `<table id="slots">`
    for (var i = 0; i < 2; i++){
        displayData += `<tr>`;
        for(var j=0; j < 5; j++)
        {
            displayData += `
            <td>Third Floor <br> Row ${i+1} <br> Slot ${j+1} <br><br>
            Hours: <select id="${i+1}${j+1}3_hours">
            <option value="1"> 1 hour </option>
            <option value="2"> 2 hours </option>
            <option value="3"> 3 hours </option>
            <option value="4"> 4 hours </option>
            <option value="5"> 5 hours </option>
            <option value="6"> 6 hours </option>
            <option value="7"> 7 hours </option>
            <option value="8"> 8 hours </option>
            <option value="9"> More than 8 Hours </option>
            </select><br><br>
            <button class="slot_select" id="${i+1}${j+1}3" onclick="book_slot();">Book Slot</button><br><br>
            <button class="confirm" onclick="release_slot(${i+1}${j+1}3);">Release Slot</button><br><br>
            </td>`;
        }
        displayData += `</tr>`;
    }
    displayData += `</table><br><br><br><button class="confirm" onclick="confirm_booking();">Confirm</button></div>`;
   
    var divObject = document.getElementById("display_table"); 
    divObject.innerHTML = displayData;
}

var focused_element;
var selected;
function book_slot()
{   
    if (
        document.hasFocus() &&
        document.activeElement !== document.body &&
        document.activeElement !== document.documentElement
    ) {
        focused_element = document.activeElement.id;
       // alert("focused_element: " + focused_element);
    }

    selected = document.getElementById(`${focused_element}_hours`).value;
    document.getElementById(`${focused_element}`).disabled = true;  
}

function release_slot(focused_element)
{
    document.getElementById(`${focused_element}`).disabled = false;
}

function confirm_booking(){ 
    var ask = window.confirm("Are you sure you want to book this spot?");
    if (ask) {
        createCookie("selected", `${selected}`, "1");
        createCookie("focused_element", `${focused_element}`, "1");
        window.location.href = "parking_summary.php";
    }
}


// Function to create the cookie
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
  