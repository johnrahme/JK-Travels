//Remove error or success from step 1
/*$('#step1Form :input').each(function(){
       $(this).keypress(function(){
            $(this).parent("div").removeClass("has-error");
            $(this).parent("div").removeClass("has-success");
            $(this).parent("div").removeClass("has-feedback"); 
       });
    });
*/
//Remove error or success
$('input').each(function(){
       $(this).keypress(function(){
            $(this).parents("div").removeClass("has-error");
            $(this).parents("div").removeClass("has-success");
            $(this).parents("div").removeClass("has-feedback");
           
       });
});
//Remove for textarea
$('textarea').each(function(){
       $(this).keypress(function(){
            $(this).parents("div").removeClass("has-error");
            $(this).parents("div").removeClass("has-success");
            $(this).parents("div").removeClass("has-feedback");
           
       });
});

function validateStep1(){
    var passed = true;
    var fieldsEmpty = false;
    var errorResponse = "The following errors occured: \n";
    //All required fields are not empty
    $('#step1Form div.form-group').each(function(){
        var required = false;
       if($(this).children("label").hasClass("required")){
           required = true;
       }
       if(required&&!$(this).children(':input').val()){
           $(this).addClass("has-error has-feedback");
           fieldsEmpty = true;
           passed = false;
       }
       else if (required){
          $(this).removeClass("has-error");
          $(this).addClass("has-success has-feedback");
       }
    });
    //Check email field
    var emailStr = $('#email').val();
    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    
    if(!filter.test(emailStr)){
        $('#email').parent('div').removeClass("has-success has-feedback");
        $('#email').parent('div').addClass("has-error");
        errorResponse = errorResponse + "Please enter a valid email address \n";
        passed = false;
    }
    
    //Check postcode field
    var countryFilter = "";
    if($('#country').val()=='australia'){
        countryFilter = /(^\d{4}$)/;
    }
    /*else if($('#country').val()=='newZealand'){
        countryFilter = /(^\d{4}$)/;
        
    }
    else if($('#country').val()=='us'){
        countryFilter = /(^\d{5}$)/;     
    }*/
    
    if($('#country').val()=='australia'&&!countryFilter.test($("#postcode").val())){
        errorResponse += "Postcode in wrong format\n";
        passed = false;
        $('#postcode').parent('div').removeClass("has-success has-feedback");
        $('#postcode').parent('div').addClass("has-error");
    }
    
    if(fieldsEmpty){
        errorResponse += "One or more required fields are empty \n";
    }
    if(!passed){
        alert(errorResponse);
    }
    return passed;
}
function validateStep2(){
    var passed = true;
    var fieldsEmpty = false;
    var errorResponse = "The following errors occured: \n";
    
    //All required fields are not empty
    $('#step2Form div.form-group').each(function(){
        var required = false;
       if($(this).children("label").hasClass("required")){
           required = true;
       }
       if(required&&!$(this).children(':input').val()){
           $(this).addClass("has-error has-feedback");
           passed = false;
           fieldsEmpty = true;
       }
       else if (required){
          $(this).removeClass("has-error");
          $(this).addClass("has-success has-feedback");
       }
    });
    
    //Validate Card number
    
    var cardNumberFilter = /(^\d{12}$)/;
    if(!cardNumberFilter.test($("#number").val())){
        passed = false;
       errorResponse += "Credit card number is invalid \n";
       $('#number').parent('div').removeClass("has-success has-feedback");
        $('#number').parent('div').addClass("has-error");
           
    }
    //Validate exp
    var today = new Date();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var expired = false;
    if($("#expYear").val()<yyyy){
        expired = true;
    }
    else if($("#expYear").val()<=yyyy&&$("#expMonth").val()<=mm){
        expired = true;
    }
    if(expired){
        passed = false;
       errorResponse += "Card has expired! \n";
       $('#expMonth').parent('div').removeClass("has-success has-feedback");
        $('#expMonth').parent('div').addClass("has-error");
        $('#expYear').parent('div').removeClass("has-success has-feedback");
        $('#expYear').parent('div').addClass("has-error");
    }
    //Validate security number
    var cardNumberFilter = /(^\d{3}$)/;
    if(!cardNumberFilter.test($("#secCode").val())){
        passed = false;
       errorResponse += "Security code has an invalid format \n";
       $('#secCode').parent('div').removeClass("has-success has-feedback");
        $('#secCode').parent('div').addClass("has-error");      
    }
    
    if(fieldsEmpty){
        errorResponse += "One or more required fields are empty \n";
    }
    if(!passed){
        alert(errorResponse);
    }
    
    return passed;
}
function validateContact(){
    passed = true;
     $('#contactForm div.form-group').each(function(){
        var required = false;
       if($(this).children("label").hasClass("required")){
           required = true;
       }
       if(required&&!$(this).children().children(':input').val()){
           $(this).removeClass("has-success ");
           $(this).addClass("has-error has-feedback");
           passed = false;
           
       }
       else if (required){
           $(this).removeClass("has-error");
          $(this).addClass("has-success has-feedback");
       }
    });
    return passed;
}