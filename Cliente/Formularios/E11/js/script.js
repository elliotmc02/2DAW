document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="submit"]').addEventListener('click', comprobarCampos);
    // document.querySelector('input[name="resetButton"]').addEventListener('click', ev => ev.target.closest('form').reset());
});

const comprobarCampos = (ev) => {
    ev.preventDefault();
    const form = ev.target.closest('form');
    const campos = ['dni', 'nombre', 'apellido', 'fecha', 'web', 'contrasena'];
    for (const elem of campos) {
        const campo = form.elements[elem];
        switch (elem) {
            case 'dni':
                if ([...campo.value.substring(0, 8)].some(elem => isNaN(elem)) || !isNaN(campo.value[8]) || campo.value.length != 9) {
                    alerta(campo, 'El DNI debe tener 9 caracteres, y contener 1 letra al final');
                    return;
                }
                break;
            case 'nombre':
            case 'apellido':
                if (campo.value.split(' ').length > 2 || campo.value.length == 0) {
                    alerta(campo, `El ${campo} debe tener 1 o 2 palabras`)
                    return;
                }
                break;
            case 'fecha':
                const fechaSplit = campo.value.split('/');
                if (fechaSplit.length != 3 || fechaSplit[2].length != 4 || fechaSplit.some(elem => isNaN(elem))) {
                    alerta(campo, 'La fecha debe tener formato dd/mm/yyyy');
                    return;
                }
                break;
            case 'web':
                if (!campo.value.startsWith('https://') || campo.value.substring(campo.value.lastIndexOf('.') + 1, campo.value.length).length != 3) {
                    alerta(campo, 'La web debe empezar por https:// y acabar con tres letras');
                    return;
                }
                break;
            case 'contrasena':
                if (campo.value.length < 8 || campo.value.length > 12) {
                    alerta(campo, 'La contraseña debe tener entre 8 y 12 caraceteres');
                    return;
                }
        }
    }

    window.location.href = 'correcto.html';
};

const alerta = (elem, msg) => {
    alert(msg);
    elem.focus();
    elem.value = '';
}