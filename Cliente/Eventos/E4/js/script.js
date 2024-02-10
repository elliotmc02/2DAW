document.addEventListener('DOMContentLoaded', () => {
    randomPos(document.querySelector('div'));
    document.addEventListener('keydown', (ev) => teclaPulsada(ev))
});

function randomPos(elem) {
    const h = Math.round(Math.random() * (window.innerHeight - window.getComputedStyle(elem).getPropertyValue('width').split('px')[0]));
    const w = Math.round(Math.random() * (window.innerWidth - window.getComputedStyle(elem).getPropertyValue('height').split('px')[0]));
    elem.style.top = `${h}px`;
    elem.style.left = `${w}px`;
}

function teclaPulsada(ev) {
    let pos;

    switch (ev.key) {
        case 'ArrowUp':
            pos = 'top';
        case 'ArrowDown':
            pos = 'top';
            break;
        case 'ArrowLeft':
            pos = 'left';
        case 'ArrowRight':
            pos = 'left';
    }

    if (pos) {
        mover(pos);
    }

    function mover(pos) {
        const suma = ev.key === 'ArrowUp' || ev.key === 'ArrowLeft' ? -1 : 1;

        const div = document.querySelector('div');
        const divStyle = window.getComputedStyle(div);
        const valorActual = parseInt(divStyle.getPropertyValue(pos).split("px")[0]);

        div.style.setProperty(pos, valorActual + suma + 'px');

        if ((ev.key == "ArrowDown" && valorActual + suma > window.innerHeight - Math.round(parseFloat(divStyle.getPropertyValue("height")))) ||
            (ev.key == "ArrowUp" && valorActual + suma < 0) || (ev.key == "ArrowRight" && valorActual + suma > window.innerWidth - Math.round(parseFloat(divStyle.getPropertyValue("width")))) ||
            (ev.key == "ArrowLeft" && valorActual + suma < 0)) {
            return;
        }
        requestAnimationFrame(() => mover(pos));
    }
}