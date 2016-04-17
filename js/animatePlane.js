function animateFirst(){
    var toLabelRight = document.getElementById('fromLabel').getBoundingClientRect().left;
    var toLabelLeft2 =   $("#toLabel").offset().left;
    var fromLabelLeft2 = $("#fromLabel").offset().left;
    var divWidth = $("#toDiv").width();
    var planeWidth = $("#plane").width();
    alert(toLabelLeft2);
    alert(fromLabelLeft2);
    var x = (toLabelLeft2/2-fromLabelLeft2+divWidth/2-planeWidth/2-45);
    //var x = $(window).width() / 2 - toLabelRight - 70;
  $( "#book" ).animate({
   // opacity: 0.25,
    left: "+="+(x),
    bottom: "+=50"
    //height: "toggle"
  }, 5000, function() {
    animateSecond();
  });

}
function animateSecond(){
    var toLabelLeft2 =   $("#toLabel").offset().left;
    var fromLabelLeft2 = $("#fromLabel").offset().left; 
    var toLabelLeft = document.getElementById('toLabel').getBoundingClientRect().left;    
    var toLabelRight = document.getElementById('fromLabel').getBoundingClientRect().left; 
    var divWidth = $("#toDiv").width();
        var planeWidth = $("#plane").width();
    //var x = $(window).width() / 2 - toLabelRight -70;
    var x = (toLabelLeft2/2-fromLabelLeft2+divWidth/2 -planeWidth/2-45);
    $( "#book" ).animate({
   // opacity: 0.25,
    left: "+="+(x),
    bottom: "-=40"
    //height: "toggle"
  }, 5000, function() {
  });
}

animateFirst();