$(document).ready(function() {
  var currenthouseremove = 0;
  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
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
  function searchMyHousesOnServer(){
    var parametros = {
      "submit" : "1"
    };
    $.ajax({
      data:  parametros,
      url:   'userHouses.php',
      type:  'post',
      beforeSend: function () {
        $("#loadingHouses").removeClass("nodisplay");
      },
      success:  function (response) {
        $("#loadingHouses").addClass("nodisplay");
        $("#userHouses").html(paintCardHouses(response,true));
        $(".removehouse").click(function () {
          $("#confirmremove, #modal-background").toggleClass("active");
          currenthouseremove = this.dataset.houseid;
        });
        $(".edithouse").click(function () {
          $("#newB").click();
          $('#nuevacasa').html("Editar Casa");
          $('input[name=name]').val(this.dataset.name);
          $('input[name=description]').val(this.dataset.description);
          $('input[name=place]').val(this.dataset.place);
          $('input[name=street]').val(this.dataset.street);
          $('input[name=rooms]').val(this.dataset.rooms);
          $('input[name=squaremeters]').val(this.dataset.squaremeters);
          $('input[name=type]').val(this.dataset.type);
          $('input[name=extras]').val(this.dataset.extras);
          $('input[name=floor]').val(this.dataset.floor);
        });
      },
      error: function (jqXHR, exception) {
        $("#loadingHouses").addClass("nodisplay");
        alert('Error.\n' + jqXHR.responseText);
      },
    });
  }

  var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password")
    , userHouses = document.getElementById("userHouses");
  var uploadfiles = document.querySelector('#fileinput');
  var request;

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

  if (null !== password && null !== confirm_password){
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  }
  if (null !== userHouses){
    searchMyHousesOnServer();
  }

  $("#modal-background").click(function () {
    if ($("#login").hasClass("active")){
      $("#login").toggleClass("active");
    }
    else if ($("#register").hasClass("active")){
        $("#register").toggleClass("active");
    }
    else if ($("#confirmremove").hasClass("active")){
      $("#confirmremove").toggleClass("active");
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
        $( "#h" ).addClass("resize");
        $( ".logo, #title, #free, #loginB, #registerB, #sep, #green" ).addClass("nodisplay");
        $( "#menu" ).removeClass("nodisplay");
        console.log(response);
        $("#mainHouses").html(paintCardHouses(response,false));
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
      $("#ajustes").addClass("nodisplay");
  });
  $("#newB").click(function () {
      $("#new").removeClass("nodisplay");
      $("#houses").addClass("nodisplay");
      $("#sol").addClass("nodisplay");
      $("#ajustes").addClass("nodisplay");
  });
  $("#solB").click(function () {
      $("#sol").removeClass("nodisplay");
      $("#new").addClass("nodisplay");
      $("#houses").addClass("nodisplay");
      $("#ajustes").addClass("nodisplay");
  });
  $("#ajustesB").click(function () {
      $("#ajustes").removeClass("nodisplay");
      $("#new").addClass("nodisplay");
      $("#houses").addClass("nodisplay");
      $("#sol").addClass("nodisplay");
  });
  $('input[name=rented]').change(function(){
    if($(this).is(':checked')){
        $('#userlist').removeClass('nodisplay');
    }
    else{
      $('#userlist').addClass('nodisplay');
    }
  });
  $("#confirmremove").click(function () {
    removehouseserver(currenthouseremove);
    searchMyHousesOnServer();
    $("#confirmremove, #modal-background").toggleClass("active");
  });
  $("#removeuser").click(function () {
    removeuserserver(currenthouseremove);
    $("#home").click();
    alert("Usuario eliminado")
  });
});

function removehouseserver(id){
  var parametros = {
    "id" : id
  };
  $.ajax({
    data:  parametros,
    url:   'removeHouses.php',
    type:  'post',
    success:  function (response) {
      $("#userHouses").html("");
    },
  });
}

function removeuserserver(id){
  var parametros = {
    "id" : id
  };
  $.ajax({
    data:  parametros,
    url:   'removeUser.php',
    type:  'post',
    success:  function (response) {
      //$("#userHouses").html("");
      alert("Usuario eliminado");
    },
  });
}

function paintCardHouses(json, edit){
  var html= '<div class="cards">';
  console.log(json);
  $.each($.parseJSON(json).results, function(k, v) {
    html+='<article class="card card_size-m">'
        +    '<header class="card__header">'
        +      '<img class="card__preview" src="'+v.houseFolder[0]+'" alt="Preview img">'
        +    '</header>'
        +      '<div class="card__body">'
        +         '<div class="card__content">'
        +         '<h3 class="card__title">'
        +           '<a href="casainfo.php?id='+v.id+'"target="_blank" class="card__showmore">'+ v.name +'</a>';
    if (edit){
      html+=          '<button class="removehouse btn-card glyphicon glyphicon-trash" data-houseid="'+v.id+'"></button>'
          +           '<button class="edithouse btn-card glyphicon glyphicon-pencil" data-name="'+v.name+'" data-description="'+v.description+'" data-place="'+v.place+'" data-street="'+v.street+'" data-rooms="'+v.rooms+'" data-squaremeters="'+v.squaremeters+'" data-type="'+v.type+'" data-extras="'+v.extras+'" data-floor="'+v.floor+'"></button>';
    }
    html+=         '</h3>'
        +         '<div class="card__description">'
        +           '<p>'+v.description.substr(0,21) +'...</p>'
        +           '<p>'+v.place +'. '+ v.street+', '+ v.number +'</p>'
        +         '</div>'
        +      '</div>'
        +      '<footer class="card__footer">';
    if ("" !== v.user){
      if (1 === v.rented){
        html+=     '<span class="card__author">Alquilado</span>';
      }
      else{
        html+=     '<span class="card__author">Sin alquilar</span>';
      }
    }
    else{
      html+=     '<span class="card__author"></span>';
    }
    html+=        '<div class="card__meta">'
        +           '<div class="card__meta-item">'
        +             '<i class="card__meta-icon card__meta-likes"></i>'
        +             '<i class="card__meta-icon card__meta-likes"></i>'
        +             '<i class="card__meta-icon card__meta-likes"></i>'
        +             '<i class="card__meta-icon card__meta-likes"></i>'
        +           '</div>'
        +         '</div>'
        +       '</footer>'
        +     '</div>'
        + '</article>';
  });
  html += '</div>';
  return html;
}
