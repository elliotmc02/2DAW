document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('[name="dni"]').addEventListener('blur', comprobarDNI);
});

function comprobarDNI() {
    const dni = document.querySelector('[name="dni"]').value;
    const patron = /^\d{8}[A-HJ-NP-TV-Z]$/;
    const span = document.querySelector('span');
    if (patron.test(dni)) {
        const letrasPosibles = 'TRWAGMYFPDXBNJZSQVHLCKE';
        span.textContent = letrasPosibles.charAt(dni.substring(0, dni.length - 1) % 23) == dni.charAt(dni.length - 1).toUpperCase() ? 'El DNI es válido' : 'El DNI no es válido';
    } else {
        span.textContent = 'El DNI debe tener 8 numeros y una letra válida (no puede ser ni la I, O, U, Ñ)';
    }
}