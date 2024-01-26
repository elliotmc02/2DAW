$(document).ready(() => {

  // Cambiar tema al iniciar el sitio
  cambiarTema();

  // PopUp

  $('#dialog').hide();
  $('.certificates__certificate').click(() => {
    $('#dialog').dialog();
  });

  // Modo Oscuro / Claro

  $('.oscuro').click(() => {
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

  $('.hamburger-wrapper').on('click', () => {
    $('.hamburger-menu').toggleClass('animate');
    $('.mobile-menu-overlay').toggleClass('visible');
  });

  $('.mobile-menu-overlay > ul > li > a').on('click', () => {
    $('.hamburger-menu').removeClass('animate');
    $('.mobile-menu-overlay').removeClass('visible');
  });
});

const animacionLayout = () => {
  $('.layout').animate({
    top: '0',
  }, 1000);
}

const cambiarTema = () => {
  const temaOscuro = localStorage.getItem('temaOscuro') === 'true';
  $(':root').toggleClass('modo-oscuro', temaOscuro);
  $('.oscuro i').toggleClass('fa-sun', temaOscuro).toggleClass('fa-moon', !temaOscuro);
  $('.oscuro span').text(temaOscuro ? 'Modo Claro' : 'Modo Oscuro');
}