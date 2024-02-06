document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', enviarDatos);
    traerDatos();
});

const traerDatos = () => {
    fetch('consulta.php')
        .then(response => response.json())
        .then(data => data.forEach(usuario => document.body.appendChild(document.createElement('p')).textContent = usuario.nombre))
        .catch(error => console.log('Error', error))
}

const enviarDatos = () => {
    const datos = new FormData(document.querySelector('form'));
    fetch('procesar.php', {
        method: 'POST',
        body: datos
    })
        .then(response => response.text())
        .then(location.reload())
        .catch(error => console.log('Error:', error));
}