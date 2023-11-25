/**
 * Ejercicio 4: A través de un prompt, pide el nombre al usuario y saludalo con un alert de
la siguiente forma: “Bienvenid@ a mi página XXXXXX” (siendo XXXXXX el nombre
que ha introducido el usuario).
 */

function pedirNombre() {
    let nombre = prompt("Nombre:");

    return nombre;
}

function saludar() {
    let nombre = pedirNombre();
    document.getElementById("texto").innerHTML = "Bienvenido a mi pagina " + nombre;
}