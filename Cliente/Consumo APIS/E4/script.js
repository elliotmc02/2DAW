document.addEventListener('DOMContentLoaded', () => {

});

const mostrarTareas = () => {
    fetch('https://jsonplaceholder.typicode.com/todos')
        .then(response => response.json())
        .then(data => {
            data.forEach()
        })
        .catch(error => console.log('Error:', error))
}