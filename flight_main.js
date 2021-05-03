function checkval() {
    1 == $("tbody tr:visible").length && "No result found" == $("tbody tr:visible td").html() ? $("#rowcount").html("0") : $("#rowcount").html($("tr:visible").length - 1)
}
$(document).ready(function() {
    $("#rowcount").html($(".filterable tr").length - 1), $(".filterable .btn-filter").click(function() {
        var t = $(this).parents(".filterable"),
            e = t.find(".filters input"),
            l = t.find(".table tbody");
        1 == e.prop("disabled") ? (e.prop("disabled", !1), e.first().focus()) : (e.val("").prop("disabled", !0), l.find(".no-result").remove(), l.find("tr").show()), $("#rowcount").html($(".filterable tr").length - 1)
    }), $(".filterable .filters input").keyup(function(t) {
        if ("9" != (t.keyCode || t.which)) {
            var e = $(this),
                l = e.val().toLowerCase(),
                n = e.parents(".filterable"),
                i = n.find(".filters th").index(e.parents("th")),
                r = n.find(".table"),
                o = r.find("tbody tr"),
                d = o.filter(function() {
                    return -1 === $(this).find("td").eq(i).text().toLowerCase().indexOf(l)
                });
            r.find("tbody .no-result").remove(), o.show(), d.hide(), d.length === o.length && r.find("tbody").prepend($('<tr class="no-result text-center"><td colspan="' + r.find(".filters th").length + '">No result found</td></tr>'))
        }
        $("#rowcount").html($("tr:visible").length - 1), checkval()
    })
});


var flight_no;
var source_city;
var dest_city;
var time;
var date;

function book_seat(id){
    var myTab = document.getElementById('flight_list');
    var displayData = '';
    for (i = 1; i < myTab.rows.length; i++) {
        if(myTab.rows[i].id == id){
            var objCells = myTab.rows.item(i).cells;

            flight_no = objCells.item(0).innerHTML;
            source_city = objCells.item(1).innerHTML;
            dest_city = objCells.item(2).innerHTML;
            time = objCells.item(3).innerHTML;
            date = document.getElementById(`date${flight_no}`).value;

            displayData += `<div class="slot_display">`;
            displayData += `<h2>Flight No. ${flight_no}</h2><br>`;
            displayData += `<table id="slots">`;
            for (var i = 0; i < 3; i++){
                displayData += `<tr>`;
                for(var j=0; j < 7; j++)
                {
                    displayData += `
                    <td> ${i+1}${j+1} <br>                   
                    <button class="slot_select" id="${i+1}${j+1}" onclick="confirm_seat(${i+1}${j+1});">Book</button>
                    </td>`;
                }
                displayData += `</tr>`;
            }
            displayData += `</table>`;

            displayData += `<table id="slots">`;
            for (var i = 3; i < 6; i++){
                displayData += `<tr>`;
                for(var j=0; j < 7; j++)
                {
                    displayData += `
                    <td> ${i+1}${j+1} <br>                   
                    <button class="slot_select" id="${i+1}${j+1}" onclick="confirm_seat(${i+1}${j+1});">Book</button>
                    </td>`;
                }
                displayData += `</tr><br>`;
            }

            displayData += `</table>`;

            displayData += `<table id="slots">`;
            for (var i = 6; i < 9; i++){
                displayData += `<tr>`;
                for(var j=0; j < 7; j++)
                {
                    displayData += `
                    <td> ${i+1}${j+1} <br>                   
                    <button class="slot_select" id="${i+1}${j+1}" onclick="confirm_seat(${i+1}${j+1});">Book</button>
                    </td>`;
                }
                displayData += `</tr><br>`;
            }

            displayData += `</table><br><br><br><button class="confirm" onclick="confirm_booking();">Confirm</button></div>`;
            var divObject = document.getElementById("display_table"); 
            divObject.innerHTML = displayData;

        }
    }
}


var $seat_no;
function confirm_seat(seat_no)
{   
    if (
        document.hasFocus() &&
        document.activeElement !== document.body &&
        document.activeElement !== document.documentElement
    ) {
        $seat_no = document.activeElement.id;
    }

    document.getElementById(`${seat_no}`).disabled = true;
}

function confirm_booking(){ 
    var ask = window.confirm("Are you sure you want to book this seat?");
    if (ask) {
        createCookie("flight_no", `${flight_no}`, "1");
        createCookie("source_city", `${source_city}`, "1");
        createCookie("dest_city", `${dest_city}`, "1");
        createCookie("time", `${time}`, "1");
        createCookie("seat_no", $seat_no, "1");
        createCookie("date", `${date}`, "1");

        window.location.href = "flight_summary.php";
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