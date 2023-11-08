document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("input")[0].addEventListener("click", () => insertarImagen());

    document.querySelectorAll("input")[1].addEventListener("click", () => {
        limpiar()
    });
});

function insertarImagen() {
    document.querySelectorAll("input")[1].removeAttribute("disabled");
    const nombreImg = prompt("ruta de imagen") || "terra";
    const rutaEntera = `img/${nombreImg}.jpg`;
    const img = document.createElement("img");
    img.setAttribute("src", rutaEntera);
    img.className = "foto";
    document.querySelector("#contenedor").appendChild(img);
}

function limpiar() {
    document.querySelectorAll("input")[1].setAttribute("disabled", true);
    const contenedor = document.querySelector("#contenedor");
    while (contenedor.firstChild) {
        contenedor.removeChild(contenedor.firstChild);
    }
}