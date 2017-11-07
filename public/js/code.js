//APRENDER ECMA SCRIPT 6

$(function() {
  set_active_menu();
});

$('#icon-menu').click( show_hide_menu);//Llamamos sin parentesis, porque sino se ejecuta de un solo


function show_hide_menu() {
  $('#nav-menu').slideToggle();
}

function set_active_menu() {

  var a_tags = $('#nav-menu a');//Con esto obtenemos todas la etiquetas que esten dentro de nav

// i++ (genérico), for in (iterar objetos), for of (iterar listas)
for (var i = 0; i < a_tags.length; i++) {
    if (a_tags[i].href === window.location.href) {
      a_tags[i].classList.add('active');
    }
  }
}