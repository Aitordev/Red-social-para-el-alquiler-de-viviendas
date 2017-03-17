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
  if (password !== null && confirm_password !== null){
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  }
  $("#modal-background").click(function () {
    if ($("#login").hasClass("active")){
      $("#login").toggleClass("active");
    }
    else if ($("#register").hasClass("active")){
        $("#register").toggleClass("active");
    }
    $("#modal-background").toggleClass("active");
  });
  $("#registerB, #registerL").click(function () {
    $("#register, #modal-background").toggleClass("active");
  });
  $("#loginB, #loginL").click(function () {
      $("#login, #modal-background").toggleClass("active");
  });
  $("#admin").click(function () {
      window.location.href= "admin.php";
  });
  $("#search").click(function () {
      //window.location.href= "index.php";
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
        $( ".logo, #title, #free, #loginB, #registerB, #sep, #green" ).addClass("nodisplay");
        $( "#menu" ).removeClass("nodisplay");
        var html= '<div class="cards">'
            + '<article class="card card_size-m">'
            +    '<header class="card__header">'
            +      '<img class="card__preview" src="https://i.ytimg.com/vi/qvK5M2W2TRU/maxresdefault.jpg" alt="Preview img">'
            +    '</header>'
            +      '<div class="card__body">'
            +         '<div class="card__content">'
            +         '<h3 class="card__title"><a href="#0" class="card__showmore">Casa moderna y sosegada</a></h3>'
            +         '<div class="card__description">'
            +           '<p>Madrid, 28080</p>'
            +         '</div>'
            +      '</div>'
            +      '<footer class="card__footer">'
            +         '<span class="card__author">Alquilado</span>'
            +         '<div class="card__meta">'
            +           '<div class="card__meta-item">'
            +             '<i class="card__meta-icon card__meta-likes"></i>'
            +             '<i class="card__meta-icon card__meta-likes"></i>'
            +             '<i class="card__meta-icon card__meta-likes"></i>'
            +             '<i class="card__meta-icon card__meta-likes"></i>'
            +           '</div>'
            +         '</div>'
            +       '</footer>'
            +     '</div>'
            + '</article>'
            +'</div>';

        $("#h").append(html);
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

  //admin window
  $("#housesB").click(function () {
      $("#houses").removeClass("nodisplay");
      $("#new").addClass("nodisplay");
      $("#sol").addClass("nodisplay");
  });
  $("#newB").click(function () {
      $("#new").removeClass("nodisplay");
      $("#houses").addClass("nodisplay");
      $("#sol").addClass("nodisplay");
  });
  $("#solB").click(function () {
      $("#sol").removeClass("nodisplay");
      $("#new").addClass("nodisplay");
      $("#houses").addClass("nodisplay");
  });

  var uploadfiles = document.querySelector('#fileinput');
  if (null !== uploadfiles){
    uploadfiles.addEventListener('change', function () {
      var files = this.files;
      var galleryId = "gallery";
      var gallery = document.getElementById(galleryId);
      gallery.innerHTML = "";
      for(var i=0; i<files.length; i++){
          previewImage(this.files[i],gallery);
      }
    }, false);
  }
  function previewImage(file,gallery) {
    var thumb = document.createElement("div");
    thumb.classList.add('thumbnail'); // Add the class thumbnail to the created div
    var img = document.createElement("img");
    img.file = file;
    thumb.appendChild(img);
    gallery.appendChild(thumb);

    // Using FileReader to display the image content
    var reader = new FileReader();
    reader.onload = (function(aImg) {
       return function(e) {
          aImg.src = e.target.result;
        };
    })(img);
    reader.readAsDataURL(file);
  }
});
