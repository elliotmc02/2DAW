$(document).ready(() => {

  $('#dialog').hide();
  $('.certificates__certificate').click(() => {
    $('#dialog').dialog();
  });

  // fecha
  $('#fecha').datepicker();

  // modo oscuro
  $('#oscuro').click(() => {
    if ($(':root').css('--color-principal') == '#FFFFFF') {
      $(':root').css('--color-principal', '#333333');
      $(':root').css('--color-secondary', '#cacaca');
      $(':root').css('--color-title', '#FFFFFF');
      $(':root').css('--color-subtitle', '#FFFFFF');
      $(':root').css('--color-text', '#FFFFFF');
    } else {
      $(':root').css('--color-principal', '#FFFFFF');
      $(':root').css('--color-secondary', 'burlywood');
      $(':root').css('--color-title', '#222222');
      $(':root').css('--color-subtitle', '#888');
      $(':root').css('--color-text', '#555');
    }
  });

  // Tabs
  $('#tabs').tabs();

  slideDown();
  // Obtén el elemento
  // var miElemento = $('.layout');

  // // Define el radio y el ángulo inicial
  // var radio = 100;
  // var angulo = 0;
  // var iteracionActual = 0;

  // // Posición inicial fuera del área visible (izquierda)
  // miElemento.css({
  //   'left': '0',
  // });

  // function animarCirculo() {
  //   angulo += 0.5;
  //   var posX = 50 + radio * Math.cos(angulo);

  //   var rotacion = angulo * (180 / Math.PI);

  //   // Anima la propiedad 'left' para mover el elemento hacia el centro
  //   miElemento.animate({
  //     'left': posX + 'px',
  //     'transform': 'rotate(' + rotacion + 'deg)'
  //   }, 50, function () {
  //     iteracionActual++;
  //     animarCirculo();
  //   });
  // }

  // animarCirculo();

});

const slideDown = () => {
  $('.layout').css({
    'top': '0',
  });
}