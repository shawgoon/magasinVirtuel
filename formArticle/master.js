$(function(){
  var form = $('#ajout');
  var nom = $('#nom');
  var description = $('#description');
  var prix = $('#prix');
  var image = $('#image');

  form.on('submit', function(e){
    e.preventDefault();

    var hasError = false;

    if (nom.val() === '') {
      nom.addClass('error');
      hasError = true;
    }

    if (description.val() === '') {
      description.addClass('error');
      hasError = true;
    }

    if (prix.val() === '') {
      prix.addClass('error');
      hasError = true;
    }
    if (image.val() === '') {
      image.addClass('error');
      hasError = true;
    }

    if (!hasError) {
      (this).submit();
    }
    });

    nom.on('change',onChange);
    description.on('change',onChange);
    prix.on('change',onChange);
    image.on('change',onChange);

  });

  function onChange(){
    var texte = $(this);

    if (texte.val() === '') {
      texte.addClass('error');
    } else {
      texte.removeClass('error');
    }
  }
