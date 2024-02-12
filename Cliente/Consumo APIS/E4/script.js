document.addEventListener('DOMContentLoaded', () => {
    mostrarTareas();
});

const mostrarTareas = () => {
    // fetch('https://jsonplaceholder.typicode.com/todos')
    fetch('test.json')
        .then(response => response.json())
        .then(data => {
            for (const tarea of data) {
                console.log(tarea);
                const li = document.createElement('li');
                li.textContent = tarea;
                document.querySelector('ul').appendChild(li);
            }
        })
        .catch(error => console.log(`Error:${error}`))
}

