$(document).ready(function() {
  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

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
  $("#logout").click(function () {
    $.ajax({
      type: "POST",
      url: "logout.php"
    });
    alert("Sesion cerrada");
  	location.href="index.php";
  });
});
