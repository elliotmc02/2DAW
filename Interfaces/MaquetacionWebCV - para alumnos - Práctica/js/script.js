import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'
$(document).ready(() => {
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
            $(':root').css('--color-secondary', '#04B4E0');
            $(':root').css('--color-title', '#222222');
            $(':root').css('--color-subtitle', '#888');
            $(':root').css('--color-text', '#555');
        }
    });
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'vertical',
        loop: true,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
      });
    
});