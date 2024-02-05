document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input').addEventListener('click', () => {
        fetch('https://fakestoreapi.com/products')
            .then(response => response.json())
            .then(data => data.forEach(meterProducto))
            .catch(error => console.log(error));
    });
});

const meterProducto = producto => {
    const p = document.createElement('p');
    p.textContent = producto.title;
    p.addEventListener('mouseover', () => mostrarImagen(producto.image));
    document.querySelectorAll('section')[0].appendChild(p);
}

const mostrarImagen = imagen => {
    const img = document.createElement('img');
    img.setAttribute('src', imagen);
    document.querySelectorAll('section')[1].innerHTML = '';
    document.querySelectorAll('section')[1].appendChild(img);
}