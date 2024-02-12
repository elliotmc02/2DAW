document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', enviarDatos);
    traerDatos();
});

// Funcion para mostrar los datos de la BBDD
function traerDatos() {
    // En el fetch ponemos el nombre del archivo.php, en este caso queremos mostrar los datos por lo que haremos un fetch a consulta.php
    fetch('consulta.php')
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.log('Error', error))
}

function enviarDatos() {
    const datos = new FormData(document.querySelector('form'));
    fetch('procesar.php', {
        method: 'POST',
        body: datos
    })
        .then(response => response.text())
        .then(location.reload())
        .catch(error => console.log('Error:', error));
}