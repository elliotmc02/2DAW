function cambiar(prop, estado) {
    const div = document.querySelectorAll(".div2");
    switch (prop) {
        case "vis":
            div[0].style.setProperty("visibility", estado == "mostrar" ? "visible" : "hidden");
            break;
        case "dis":
            div[1].style.setProperty("display", estado == "mostrar" ? "flex" : "none");
            break;
        default:
            console.log("Error, propiedad no encontrada");
    }
}

// function mostrar(prop) {
//     document.querySelectorAll(".div2")[prop == "vis" ? 0 : 1].style.setProperty(prop == "vis" ? "visibility" : "display", prop == "vis" ? "visible" : "flex")
// }

// function ocultar(prop) {
//     document.querySelectorAll(".div2")[prop == "vis" ? 0 : 1].style.setProperty(prop == "vis" ? "visibility" : "display", prop == "vis" ? "hidden" : "none")
// }