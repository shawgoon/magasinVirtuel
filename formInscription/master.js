// formulaire d'inscription
$(function(){
  var form = $('#signup');
  var firstname = $('#prenom');
  var lastname = $('#nom');
  var mail = $('#mail');
  var pass = $('#pass');
  var adresse = $('#adresse');
  var ville = $('#ville');
  var cp = $('#cp');


  form.on('submit', function(e){
    e.preventDefault();

    var hasError = false;

    if (firstname.val() === '') {
      firstname.addClass('error');
      hasError = true;
    }

    if (lastname.val() === '') {
      lastname.addClass('error');
      hasError = true;
    }

    if (mail.val() === '') {
      mail.addClass('error');
      hasError = true;
    }
    if (pass.val() === '') {
      pass.addClass('error');
      hasError = true;
    }
    if (adresse.val() === '') {
      adresse.addClass('error');
      hasError = true;
    }
    if (ville.val() === '') {
      ville.addClass('error');
      hasError = true;
    }
    if (cp.val() === '') {
      cp.addClass('error');
      hasError = true;
    }
    if (!hasError) {
      (this).submit();
    }
  });

  firstname.on('change',onChange);
  lastname.on('change',onChange);
  mail.on('change',onChange);
  pass.on('change',onChange);
  adresse.on('change',onChange);
  ville.on('change',onChange);
  cp.on('change',onChange);

});

function onChange(){
  var texte = $(this);

  if (texte.val() === '') {
    texte.addClass('error');
  } else {
    texte.removeClass('error');
  }
}

// formulaire de connection
$(function(){

  var formlog =$('#login');
  var maillog = $('#maillog');
  var passlog = $('#passlog');

formlog.on('submit', function(e){
  e.preventDefault();

  var hasError = false;

  if (maillog.val() === '') {
    maillog.addClass('error');
    hasError = true;
  }
  if (passlog.val() === '') {
    passlog.addClass('error');
    hasError = true;
  }

  if (!hasError) {
    (this).submit();
  }
});
  maillog.on('change',onChange);
  passlog.on('change',onChange);

});
