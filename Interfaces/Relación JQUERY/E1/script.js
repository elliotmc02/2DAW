$(document).ready(() => {

    $('#mostrar').on('click', () => {
        $('img').each((i, elem) => {
            $(elem).delay(1000 * i).fadeTo(0, 1);
        });
    });

    $('#ocultar').on('click', () => {
        $('img').fadeTo(0, 0.1);
    });

    $('img').on('click', function () {
        $(this).fadeTo(0, 0.1);
    });
    
});