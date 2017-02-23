$(document).ready(function() {
  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");
  var request;

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
  $("#search").submit(function(event){
      event.preventDefault();
      // Abort any pending request
      if (request) {
          request.abort();
      }
      // setup some local variables
      var $form = $(this);
      // Let's select and cache all the fields
      var $inputs = $form.find("input, select, button, textarea");
      // Serialize the data in the form
      var serializedData = $form.serialize();
      // Let's disable the inputs for the duration of the Ajax request.
      // Note: we disable elements AFTER the form data has been serialized.
      // Disabled form elements will not be serialized.
      $inputs.prop("disabled", true);
      // Fire off the request to /form.php
      request = $.ajax({
          url: "search.php",
          type: "post",
          data: serializedData
      });

      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
      // Log a message to the console
        console.log("Hooray, it worked! "+response);
        $( "#h" ).addClass("resize");
        $( "#title" ).addClass("nodisplay");
      });
      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });
      // Callback handler that will be called regardless
      // if the request failed or succeeded
      request.always(function () {
          // Reenable the inputs
      $inputs.prop("disabled", false);
      });

  });
});
