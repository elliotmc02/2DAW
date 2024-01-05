document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('section').addEventListener('click', (ev) => {
        ev.target.style.setProperty('background-color', 'grey');
    }, true);
    document.querySelector('p').addEventListener('click', (ev) => {
        ev.target.style.setProperty('width', '50px');
        ev.stopPropagation();
    }, true);
    document.querySelector('a').addEventListener('click', (ev) => {
        ev.preventDefault();
        if (confirm('ir al enlace?')) window.location.href = 'https://www.youtube.com/watch?v=xvFZjo5PgG0';
    })
});