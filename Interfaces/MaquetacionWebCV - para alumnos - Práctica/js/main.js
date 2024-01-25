$(document).ready(() => {

  cambiarTema();
  // PopUp
  $('#dialog').hide();
  $('.certificates__certificate').click(() => {
    $('#dialog').dialog();
  });

  // Modo Oscuro / Claro
  $('#oscuro').click(() => {
    localStorage.setItem('temaOscuro', !$(':root').hasClass('modo-oscuro'));
    cambiarTema();
  });

  // Animacion del layout

  animacionLayout();

  $('.menu__link').on('click', function (ev) {
    ev.preventDefault();

    $('.layout').animate({
      top: '1500px',
    }, 600, () => {
      location.href = $(this).attr('href');
    });
  });

  // Menu hamburguesa
  $('.hamburger-wrapper').on('click', function () {
    $('.hamburger-menu').toggleClass('animate');
    $('.mobile-menu-overlay').toggleClass('visible');
  })
  $('.mobile-menu-overlay > ul > li > a').on('click', function () {
    $('.hamburger-menu').removeClass('animate');
    $('.mobile-menu-overlay').removeClass('visible');
  })

});

const animacionLayout = () => {
  $('.layout').animate({
    top: '0',
  }, 1000);
}

const cambiarTema = () => {
  if (!localStorage.getItem('temaOscuro') || localStorage.getItem('temaOscuro') === 'false') {
    $(':root').removeClass('modo-oscuro');
    $('#oscuro i').addClass('fa-moon').removeClass('fa-sun');
    $('#oscuro span').text('Modo Oscuro');
  } else {
    $(':root').addClass('modo-oscuro');
    $('#oscuro i').addClass('fa-sun').removeClass('fa-moon');
    $('#oscuro span').text('Modo Claro');
  }
}