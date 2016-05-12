function getBooking(){
    if(ajax){
        ajax.open('POST','../PHP/booking/getBooking.php',true);
        //Send the proper header information along with the request
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.onreadystatechange = handle_return_get_booking;
        ajax.send(null);
    }
    else{
        alert("Ajax is not set!");
    }    
}
function handle_return_get_booking(){
    if((ajax.readyState == 4)&&(ajax.status == 200)){
        var booking =  ajax.responseText;
        //Write the booking table to the site
        $("#bookingsTable").html(booking);
    }
}