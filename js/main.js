$(document).ready(function() {
  $("#modal-background").click(function () {
    if ($("#login").hasClass("active")){
      $("#login").toggleClass("active");
    }
    else if ($("#register").hasClass("active")){
        $("#register").toggleClass("active");
    }
    $("#modal-background").toggleClass("active");
  });
  $("#registerB").click(function () {
    $("#register, #modal-background").toggleClass("active");
  });
  $("#loginB").click(function () {
      $("#login, #modal-background").toggleClass("active");
  });
});
