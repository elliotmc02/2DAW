document.addEventListener('DOMContentLoaded', () => {
    fetchTareas();

    document.querySelector('input[type="button"]').addEventListener('click', anadirTarea);

});

const fetchTareas = async () => {
    const tareas = await fetch('https://jsonplaceholder.typicode.com/todos')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.log('error:', error))

    localStorage.setItem('tareas', JSON.stringify(tareas));
    return tareas;
}

const obtenerDatos = () => {
    const datosGuardados = localStorage.getItem('tareas')
    console.log(datosGuardados);
}

const guardarDatos = tareas => {
    localStorage.setItem('tareas', JSON.stringify(tareas));
}

const insertarLista = tareas => {
    const li = document.createElement('li');
    li.textContent = tarea.title;
    const checkbox = document.createElement('input');
    checkbox.setAttribute('type', 'checkbox');
    li.appendChild(checkbox);
    document.querySelector('ul').appendChild(li);
}

const anadirTarea = () => {
    const tarea = {
        title: document.querySelector('input[type="text"]').value,
        completed: false
    }
    insertarLista(tarea);
    guardarDatos(tarea);
}
