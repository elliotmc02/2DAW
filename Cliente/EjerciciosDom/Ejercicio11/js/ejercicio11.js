document.addEventListener("DOMContentLoaded", () => {
    const divs = document.querySelectorAll(".div1")
    divs[0].addEventListener("mouseenter", () => cambiar("vis", "mostrar"));
    divs[0].addEventListener("mouseleave", () => cambiar("vis", "ocultar"));
    divs[1].addEventListener("mouseenter", () => cambiar("dis", "mostrar"));
    divs[1].addEventListener("mouseleave", () => cambiar("dis", "ocultar"));
});

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