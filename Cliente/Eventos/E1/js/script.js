document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('section').addEventListener('click', (ev) => {
        ev.target.style.setProperty('background-color', 'gray');
        console.log('section');
        ev.stopPropagation();
    }, false);
    document.querySelector('p').addEventListener('click', (ev) => {
        ev.target.style.setProperty('width', '50px');
        console.log('parrafo');
    }, false);
    document.querySelector('a').addEventListener('click', (ev) => {
        ev.preventDefault();
        console.log('enlace');
        if (confirm('ir al enlace?')) window.location.href = 'https://www.youtube.com/watch?v=xvFZjo5PgG0';
    }, false);
});