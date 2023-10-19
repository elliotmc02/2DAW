function operar(tipo) {
    let div = document.querySelector("div");
    div.textContent = (tipo == "sumar" ? parseInt(div.textContent) + 1 : parseInt(div.textContent) - 1);
}