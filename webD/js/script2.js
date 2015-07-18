$(function() {
  $.backstretch("images/firstgate.jpg");
    $(".border, #content").hide();
    $("#topbar").show();
    $('.line').hide();
    $('h3, h5').hide();
    $('footer').hide();
    $("#topbar").animate({width: "100%"},1000, function() {
      $("#rightbar").show();
      $("#rightbar").animate({height: "100%"},1000, function() {
        $("#bottombar").show();
        $("#bottombar").animate({width: "100%"},1000, function() {
          $("#leftbar").show();
          $("#leftbar").animate({height: "100%"},1000, function() {
            $('.border').fadeOut(1000)
            $("#content").fadeIn(1000);
            $('.line').show();
            $('.line').animate({height : '50vh'}, 1000);
            $('.left').animate({marginLeft : '10%'}, 1000, function(){
              $('hr').animate({width : '70%'}, 1000)
              $('.cont1').fadeIn(1000, function() {
                $('.cont2').fadeIn(1000, function(){
                  $('footer').fadeIn(1000);     
              });
              });
            });
          });
        });
      });
    });
});