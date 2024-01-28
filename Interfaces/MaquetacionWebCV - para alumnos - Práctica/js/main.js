$(document).ready(() => {

  // Cambiar tema al iniciar el sitio
  cambiarTema();

  // PopUp

  $('#dialog').hide();
  $('.certificates__certificate').on('click', () => {
    $('#dialog').dialog();
  });

  // Modo Oscuro / Claro

  $('.oscuro').on('click', () => {
    localStorage.setItem('temaOscuro', !$(':root').hasClass('modo-oscuro'));
    cambiarTema();
  });

  // Animacion del layout

  animacionLayout();

  $('.menu__link').on('click', function (ev) {
    ev.preventDefault();
    $('.layout__aside').removeClass('visible');
    $('.layout').animate({
      top: '1500px',
    }, 600, () => {
      location.href = $(this).attr('href');
    });
  });

  // Menu hamburguesa

  $('.hamburger-wrapper').on('click', () => {
    $('.hamburger-menu').toggleClass('animate');
    $('.layout__aside').toggleClass('visible');
  });

  // Scroll
  $('.scroll').on('click', () => {
    $('.content__page').animate({
      scrollTop: 0,
    }, 750);
  });

  // Visibilidad del scroll al bajar
  $('.layout__menu-abajo_resp .scroll').hide();
  $('.content__page').on('scroll', () => {
    $('.content__page').scrollTop() > 100 ? $('.layout__menu-abajo_resp .scroll').fadeIn() : $('.layout__menu-abajo_resp .scroll').fadeOut();
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