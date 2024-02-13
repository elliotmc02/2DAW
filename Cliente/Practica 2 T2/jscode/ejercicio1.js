document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input')[0].addEventListener('click', () => {
        fetch('https://randomuser.me/api')
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log('error:', error))
    });

    document.querySelectorAll('input')[1].addEventListener('click', () => {
        fetch('https://randomuser.me/api')
            .then(response => response.json())
            .then(data => data.results.forEach(mostrarDatos))
            .catch(error => console.log('error:', error))
    });
});

const mostrarDatos = (usuario) => {
    const { name, dob, picture } = usuario;
    const article = document.createElement('article');
    article.className = 'usuario'
    const span = document.createElement('span');
    span.textContent = `${name.first} ${name.last}: ${dob.age} años`;

    const img = document.createElement('img');
    img.setAttribute('src', picture.medium);
    article.appendChild(span);
    article.appendChild(img);
    document.querySelector('div').appendChild(article);
}