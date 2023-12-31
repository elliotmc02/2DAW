/**
 * 11.- Crea un formulario con los siguientes campos:
• DNI: 8 números y una letra.
• Nombre: uno o dos nombres.
• Apellidos: uno o dos apellidos.
• Fecha de nacimiento: formato dd/mm/yyyy.
• Web personal: formato https://www.algo.tresletras
• Contraseña: entre 8 y 12 caracteres.
• Un botón para resetear el formulario.
• Un botón para enviar el formulario.
Haciendo uso de JavaScript pero sin usar expresiones regulares1, cuando se pulse el
botón correspondiente, valida el formulario siguiendo las normas que se detallan a
continuación y envía el resultado a otra página que muestre un mensaje de que todo ha
salido bien.
El formulario estará correcto sí y solo sí:
• Ningún campo se queda vacío
• El DNI tiene una longitud de 9
• La fecha de nacimiento tiene el formato correcto.
• Hay una o dos palabras en los campos nombre y apellidos.
• El campo de la web debe empezar por https://
• La longitud de la contraseña es correcta.
Si algún campo se rellena de forma errónea, debe indicarse ese error usando un alert y
devolviendo el foco al elemento erróneo (o al primer elemento erróneo).
Como se ha comentado antes, debes preparar una sencilla pagina html con un mensaje
de que todo ha ido bien y enlazarla al formulario de tal modo que aparezca cuando todos
los campos sean correctos
 */

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="submit"]').addEventListener('click', comprobarCampos);
    document.querySelector('input[name="reset"]').addEventListener('click', ev => ev.target.closest('form').reset());
});

const comprobarCampos = (ev) => {
    ev.preventDefault();

};