document.addEventListener("DOMContentLoaded", () => {
    const colorBody = window.getComputedStyle(document.body).getPropertyValue("background-color");
    document.querySelectorAll("div > div").forEach((elemento) => {
        elemento.addEventListener("mouseenter", () => cambiarColor(elemento.getAttribute("id"), "entrar", colorBody));
        elemento.addEventListener("mouseleave", () => cambiarColor(elemento.getAttribute("id"), "salir", colorBody));
    });
});

function cambiarColor(div, raton, colorBody) {
    const colorDiv = window.getComputedStyle(document.getElementById(div)).getPropertyValue("background-color");
    document.body.style.setProperty("background-color", (raton == "entrar" ? colorDiv : colorBody));
}