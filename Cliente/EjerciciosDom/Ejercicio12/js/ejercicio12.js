function mover(mouse) {
    const div = document.querySelector("div");
    const divStyle = window.getComputedStyle(div);
    let direccion;
    switch (mouse) {
        case "top":
        case "bottom":
            direccion = "top";
            break;
        case "left":
        case "right":
            direccion = "left";
            break;
        default:
            console.log("Error");
            return;
    }
    const valorActual = parseInt(divStyle.getPropertyValue(direccion).split("px")[0]);
    const suma = (mouse == "bottom" || mouse == "right") ? 5 : -5;

    if ((mouse == "bottom" && valorActual + suma > window.innerHeight - Math.round(parseFloat(divStyle.getPropertyValue("height")))) ||
        (mouse == "top" && valorActual + suma < 0) || (mouse == "right" && valorActual + suma > window.innerWidth - Math.round(parseFloat(divStyle.getPropertyValue("width")))) ||
        (mouse == "left" && valorActual + suma < 0)) {
        return;
    }
    div.style.setProperty(direccion, (valorActual + suma) + "px");
}