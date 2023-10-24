const colorBody = window.getComputedStyle(document.body).getPropertyValue("background-color")
function cambiarColor(div, raton) {
    const colorDiv = window.getComputedStyle(document.getElementById(div)).getPropertyValue("background-color");
    document.body.style.setProperty("background-color", (raton == "entrar" ? colorDiv : colorBody));
}