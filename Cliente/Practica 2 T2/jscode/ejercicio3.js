document.addEventListener('DOMContentLoaded', () => {

    // boton mostrar

    document.querySelector('input[type="button"]').addEventListener('click', () => {
        const salida = document.querySelector('#salida');
        while (salida.firstChild) {
            salida.removeChild(salida.firstChild)
        }
        fetch('https://www.jaimeweb.es/medac/getProfesores.php')
            .then(response => response.json())
            .then(data => data.forEach(mostrarDatos))
            .catch(error => console.log('error:', error))
    });

    // insertar
    document.querySelector('input[type="submit"]').addEventListener('click', (ev) => {

        ev.preventDefault();
        fetch('http://www.jaimeweb.es/medac/setProfesores.php', {
            method: 'POST',
            body: new FormData(document.querySelectorAll('form')[1])
        })
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

    Object.values(profesor).reverse().forEach(valor => {
        const p = document.createElement('p');
        p.textContent = valor;
        div.appendChild(p);
    })
    salida.appendChild(div)
}