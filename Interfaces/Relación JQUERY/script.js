$(document).ready(function () {
    const midiv = $('div');
    $('#boton').on('click', function () {
        if (midiv.hasClass('pene')) {
            midiv.removeClass('pene')
            midiv.addClass('coño')
            // $('div').toggleClass('coño');
        } else {
            midiv.removeClass('coño')
            midiv.addClass('pene')
        }
        midiv.text('Me gustan las pichas')
    })
});