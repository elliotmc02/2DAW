/**
 * Cada vez que se pulse mueva la alineacion de la tabla siguiendo el orden izq centro der
 * Creo 2 clases en css: pakita, manolo boton que al pulsarlo cambie entre esas 2 clases
 */

let tabla = document.getElementsByClassName("pakita")[0];

function pedirDimensiones() {
    tabla.setAttribute("height", prompt("Altura: "));
    tabla.setAttribute("width", prompt("Ancho: "));
}

function pedirDimensionesQueQuiera() {
    let opcion = prompt("altura o anchura");
    let n = parseInt(prompt("dimensiones"));
    tabla.setAttribute((opcion == "altura" ? "height" : "width"), n);

}

function pedirBorde() {
    tabla.setAttribute("border", prompt("dame borde"));
}


function cambiarCSS() {
    tabla.setAttribute("class", (tabla.getAttribute("class") == "pakita" ? "manolo" : "pakita"));
}

function mover() {

    // hacer con case


}