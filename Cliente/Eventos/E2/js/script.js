document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('mousemove', (ev) => {
        const div = document.querySelector('#div1');
        // div.style.setProperty('transform', `translate(${ev.clientX + 10}px, ${ev.clientY - 20}px)`)
        div.textContent = `(${ev.clientX},${ev.clientY})`;
    });

    document.addEventListener('mousedown', (ev) => {
        const div = document.querySelector('#div2');
        switch (ev.button) {
            case 0:
                div.textContent = 'Boton izquierdo';
                break;
            case 1:
                div.textContent = 'Boton central';
                break;
            case 2:
                div.textContent = 'Boton derecho'
        }
    });

    document.addEventListener('contextmenu', (ev) => {
        ev.preventDefault();
    })

});