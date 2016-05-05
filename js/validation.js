//Remove error or success from step 1
$('#step1Form :input').each(function(){
       $(this).keypress(function(){
            $(this).parent("div").removeClass("has-error");
            $(this).parent("div").removeClass("has-success");
            $(this).parent("div").removeClass("has-feedback"); 
       });
    });

//Remove error or success
$('#step2Form :input').each(function(){
       $(this).keypress(function(){
            $(this).parent("div").removeClass("has-error");
            $(this).parent("div").removeClass("has-success");
            $(this).parent("div").removeClass("has-feedback"); 
       });
});

function validateStep1(){
    var passed = true;
    
    //All required fields are not empty
    $('#step1Form div.form-group').each(function(){
        var required = false;
       if($(this).children("label").hasClass("required")){
           required = true;
       }
       if(required&&!$(this).children(':input').val()){
           $(this).addClass("has-error has-feedback");
           passed = false;
       }
       else if (required){
          $(this).addClass("has-success has-feedback");
       }
    });
    
    return passed;
}
function validateStep2(){
    var passed = true;
    
    //All required fields are not empty
    $('#step2Form div.form-group').each(function(){
        var required = false;
       if($(this).children("label").hasClass("required")){
           required = true;
       }
       if(required&&!$(this).children(':input').val()){
           $(this).addClass("has-error has-feedback");
           passed = false;
       }
       else if (required){
          $(this).addClass("has-success has-feedback");
       }
    });
    
    return passed;
}