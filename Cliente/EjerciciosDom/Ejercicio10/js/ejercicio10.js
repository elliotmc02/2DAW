const colorBody = window.getComputedStyle(document.body).getPropertyValue("background-color")
function cambiarColor(divN, raton) {
    let div = document.getElementById(divN);
    let colorDiv = window.getComputedStyle(div).getPropertyValue("background-color");
    document.body.style.setProperty("background-color", (raton == "entrar" ? colorDiv : colorBody));
}