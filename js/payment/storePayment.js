function getPayment(){
    if(ajax){
        ajax.open('POST','../PHP/payment/getPayment.php',true);
        //Send the proper header information along with the request
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.onreadystatechange = handle_return_get_payment;
        ajax.send(null);
    }
    else{
        alert("Ajax is not set!");
    }    
}
function storePayment(){
    if(ajax){
        ajax.open('POST','../PHP/payment/storePayment.php',true);
        //Send the proper header information along with the request
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.onreadystatechange = handle_return2;
        var data = $("#step2Form").serialize();
        ajax.send(data);
    }
    else{
        alert("Ajax is not set!");
    }
}
function handle_return2(){
    if((ajax.readyState == 4)&&(ajax.status == 200)){
        var payment = JSON.parse(ajax.responseText); 
        getPayment();
    }
}
function handle_return_get_payment(){
    if((ajax.readyState == 4)&&(ajax.status == 200)){
        var payment = JSON.parse(ajax.responseText);
        $("#payment").html("Payment details provided");
        
        /*for(i = 0; i<payment.length; i++){
             $("#payment").append(payment[i]+",");
        }*/
        //Print bookings also
        getBooking();
    }
}