document.addEventListener("DOMContentLoaded", () => {
    const colorBody = window.getComputedStyle(document.body).getPropertyValue("background-color");
    document.querySelectorAll("div > div").forEach((elemento) => {
        elemento.addEventListener("mouseenter", () => cambiarColor(window.getComputedStyle(elemento).getPropertyValue("background-color")));
        elemento.addEventListener("mouseleave", () => cambiarColor(colorBody));
    });
});

function cambiarColor(color) {
    document.body.style.setProperty("background-color", color);
}