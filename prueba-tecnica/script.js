document.addEventListener('DOMContentLoaded', () => {
    cargarLibros();
});

const mostrarLibros = () => {
    const div_libros_disponibles = document.querySelector('.libros-disponibles');
    libros.librosDisponibles.forEach(libro => {
        div_libros_disponibles.innerHTML += ``;
    });
}

const cargarLibros = async () => {
    const librosJSON = await fetch('books.json');
    libros.librosDisponibles = await librosJSON.json().then(data => data.library);
}

const subirLibros = async () => {
    localStorage.setItem('listaLectura', JSON.stringify(libros.listaLectura));
}

const libros = {
    librosDisponibles: [],
    listaLectura: []
};
