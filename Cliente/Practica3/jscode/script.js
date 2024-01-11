document.addEventListener('DOMContentLoaded', () => {

    const formu = document.querySelector('#formu');
    document.querySelector('input[type="submit"]').addEventListener('click', validar);

    formu.email.addEventListener('keyup', () => {
        formu.remail.value = formu.email.value;
    });

    const checkboxes = ['af1', 'af2', 'af3'];
    for (elem of checkboxes) {
        formu.elements[elem].addEventListener('change', () => {
            document.querySelector("#afiText").value =
                [
                    ...document.querySelectorAll('input[type="checkbox"]:checked')
                ].map((v) => v.value).join('\n').replace('on', '');
        });
    }
});


const validar = (ev) => {
    ev.preventDefault();
    document.querySelector('#errores').innerHTML = '';
    let errores = [];
    let error = false;

    if ([...document.querySelectorAll('input[type="text"]')].some(elem => elem.value.trim().length == 0) || [...document.querySelectorAll('input[type="password"]')].some(elem => elem.value.trim().length == 0)) {
        errores.push('Todos los campos de texto son obligatorios');
    }

    if (formu.clave.value.length < 8) {
        errores.push('La clave debe ser minimo de 8 caracteres');
        formu.clave.value = '';
        foco(formu.clave, error);
        error = true;
    }

    if (formu.clave.value != formu.rclave.value) {
        errores.push('La clave debe coincidir con el campo de repetir clave');
        formu.clave.value = '';
        formu.rclave.value = '';
        foco(formu.rclave, error);
        error = true;
    }

    if (formu.clave.value == formu.nombre.value) {
        errores.push('La clave no puede ser la misma que tu nombre');
        foco(formu.clave, error);
        error = true;
    }

    if (formu.pregunta.value == 0) {
        errores.push('Debes seleccionar una pregunta');
        foco(formu.pregunta, error);
        error = true;
    }

    if (formu.respuesta.value < 6) {
        errores.push('La longitud minima de la respuesta debe ser de 6 caracteres');
        foco(formu.respuesta, error);
        error = true;
    }
    if (![...formu.sexo].some(elem => elem.checked)) {
        errores.push('Debes elegir el sexo');
    }

    if (isNaN(formu.edad.value) || (formu.edad.value < 3 || formu.edad.value > 99)) {
        errores.push('La edad debe contener numeros y solo desde 3 hasta 99');
        foco(formu.edad, error);
        error = true;
    }

    const captcha = document.querySelectorAll('input[type="text"]')[5];
    if (captcha.value != 'QGPHJD') {
        errores.push('La palabra de seguridad no coincide con el codigo');
        foco(captcha, error);
        error = true;
    }

    if (!document.querySelectorAll('input[type="checkbox"]')[3].checked) {
        errores.push('Debes aceptar las condiciones de registro');
    }

    const lista = document.createElement('ul');
    errores.forEach(elem => lista.appendChild(document.createElement('li')).textContent = elem);
    document.querySelector('#errores').appendChild(lista);

    if (errores.length == 0) {
        formu.setAttribute('method', 'get');
        formu.setAttribute('action', 'resultado.html');
        formu.submit();
    }
}

const foco = (elem, error) => {
    if (!error) {
        elem.focus();
    }
    elem.style.setProperty('border', '2px solid red');
}