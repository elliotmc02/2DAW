document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', enviarDatos);
    // Ejecuto la funcion traerDatos una vez cargue el DOM (puedes poner el defer en el html tambien)
    traerDatos();
});

// Funcion para mostrar los datos de la BBDD
function traerDatos() {
    // En el fetch ponemos el nombre del archivo.php, en este caso queremos mostrar los datos por lo que haremos un fetch a consulta.php
    fetch('consulta.php')
        .then(response => response.json())
        // Hago un forEach de data (en este caso es un array)
        .then(data => data.forEach(insertarFilas))
        // Otra forma de hacerlo para que se entienda mejor (espero)
        // .then(data => data.forEach(alumno => {
        //     insertarFilas(alumno);
        // }))
        // El catch por si sale algun error
        .catch(error => console.log('Error', error))
}

function enviarDatos() {
    const datos = new FormData(document.querySelector('form'));
    fetch('procesar.php', {
        method: 'POST',
        body: datos
    })
        .then(response => response.text())
        .then(data => console.log('Datos insertados:', data))
        .catch(error => console.log('Error:', error));
}

// Insertar los TR en el TBODY y le paso el objeto alumno por parametro
function insertarFilas(alumno) {
    // Creo el tr
    const tr = document.createElement('tr');

    // Uso for in para recorrer los campos
    for (const campo in alumno) {
        // Creo el TD
        const td = document.createElement('td');
        // Pongo de texto el valor del campo
        td.textContent = alumno[campo];
        // Meto el td en el tr
        tr.appendChild(td);
    }
    // Meto el tr en el tbody
    document.querySelector('tbody').appendChild(tr);
}