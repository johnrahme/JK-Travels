function getUser(){
    if(ajax){
        ajax.open('POST','../PHP/user/getUser.php',true);
        //Send the proper header information along with the request
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.onreadystatechange = handle_return_get_user;
        ajax.send(null);
    }
    else{
        alert("Ajax is not set!");
    }    
}
function storeUser(){
    if(ajax){
        ajax.open('POST','../PHP/user/storeUser.php',true);
        //Send the proper header information along with the request
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.onreadystatechange = handle_return1;
        var data = $("#step1Form").serialize();
        ajax.send(data);
    }
    else{
        alert("Ajax is not set!");
    }
}
function handle_return1(){
    if((ajax.readyState == 4)&&(ajax.status == 200)){
        var users = JSON.parse(ajax.responseText); 
        getUser();
    }
}
function handle_return_get_user(){
    if((ajax.readyState == 4)&&(ajax.status == 200)){
        var user = JSON.parse(ajax.responseText);
        $("#firstNameP").html("");
        $("#details").html("");
        for(i = 0; i<user.length; i++){
             $("#firstNameP").append(user[i]+",");
             $("#details").append(user[i]+",");
        }
    }
}