$(document).ready(function(){
  $('#login-button').click(function(){
    $('#login-button').fadeOut("slow",function(){
      $("#container").fadeIn();
    });
  });
});