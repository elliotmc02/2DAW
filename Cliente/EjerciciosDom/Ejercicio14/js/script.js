document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("body > ul > li").forEach((elemento) => {
        elemento.addEventListener("mouseenter", () => desplegar(elemento.firstElementChild));
        elemento.addEventListener("mouseleave", () => cerrar());
    });
});

function desplegar(ul) {
    if (ul) {
        if (window.getComputedStyle(ul).getPropertyValue("display") == "block") {
            ul.style.setProperty("display", "none");
        } else {
            document.querySelectorAll(".submenus").forEach((elemento) => {
                elemento.style.setProperty("display", "none");
            });
            ul.style.setProperty("display", "block");
        }
    }
}

function cerrar() {
    document.querySelectorAll(".submenus").forEach((elemento) => {
        elemento.style.setProperty("display", "none");
    });
}