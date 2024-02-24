$(document).ready(() => {
    $('#enviar').on('click', function () {
        // $.ajax({
        //     url: 'procesar.php',
        //     method: 'POST',
        //     data: $('form').serializeArray(),
        //     success: function (data) {
        //         console.log('Exito', data);
        //     },
        //     error: function (_, textStatus, errorThrown) {
        //         console.log('Error:', textStatus, errorThrown);
        //     },
        // });
        const datos = $('form').serializeArray();
        $.post("procesar.php", datos, function (response) {
            console.log(response);
        });
    });
    $.get('cursos.php', function (data) {
        $.each(JSON.parse(data), function (i, curso) {
            $('select').append($('<option>', {
                value: curso.expediente,
                text: curso.nombre
            }))
        })
    })
    $.get({
        url: 'consulta.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, alumno) {
                $('tbody').append('<tr>')
                $.each(alumno, function (prop, valor) {
                    $('tbody').append($('<td>').text(valor))
                })
            })
        }
    })
});
