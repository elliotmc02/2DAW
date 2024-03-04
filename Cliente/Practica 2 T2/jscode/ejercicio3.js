document.addEventListener('DOMContentLoaded', () => {

    // boton mostrar

    document.querySelector('input[type="button"]').addEventListener('click', () => {
        const salida = document.querySelector('#salida');
        // while (salida.firstChild) {
        //     salida.removeChild(salida.firstChild)
        // }
        salida.innerHTML = '';
        fetch('https://www.jaimeweb.es/medac/getProfesores.php')
            .then(response => response.json())
            .then(data => data.forEach(mostrarDatos))
            .catch(error => console.log('error:', error))
    });

    // insertar
    document.querySelector('input[type="submit"]').addEventListener('click', (ev) => {

        const datosForm = new FormData(document.querySelectorAll('form')[1]);

        const opciones = {
            method: 'POST',
            body: datosForm
        }

        ev.preventDefault();
        fetch('http://www.jaimeweb.es/medac/setProfesores.php', opciones)
            .then(response => response.json())
            .then(data => document.querySelector('#salida').textContent = data)
            .catch(error => console.log('error:', error))
    });
});

// mostrar datos
const mostrarDatos = profesor => {
    const salida = document.querySelector('#salida');

    const div = document.createElement('div');
    div.className = 'ficha';

    const nombre = document.createElement('p');
    nombre.textContent = profesor.nombre;
    const dni = document.createElement('p');
    dni.textContent = profesor.dni;
    div.appendChild(nombre);
    div.appendChild(dni);
    // Object.values(profesor).reverse().forEach(valor => {
    //     const p = document.createElement('p');
    //     p.textContent = valor;
    //     div.appendChild(p);
    // })
    salida.appendChild(div)
}