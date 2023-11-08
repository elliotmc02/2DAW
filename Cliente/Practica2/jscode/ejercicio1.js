document.addEventListener("DOMContentLoaded", () => {
    let timer;

    // evento al 1 input
    document.querySelectorAll("input")[0].addEventListener("click", (event) => {

        document.querySelector("#ladoIzq").textContent = random(1, 50);
        document.querySelector("#ladoDer").textContent = random(1, 50);

        event.target.setAttribute("disabled", true);

        document.querySelectorAll("input")[1].removeAttribute("disabled");

        timer = setInterval(() => {
            document.querySelector("#ladoIzq").textContent = random(1, 50);
            document.querySelector("#ladoDer").textContent = random(1, 50);
        }, 500);

        document.querySelector("#salida").textContent = "";
    });
    // evento al 2 input
    document.querySelectorAll("input")[1].addEventListener("click", () => comparar(timer))
});

function comparar(timer) {
    clearInterval(timer);
    document.querySelectorAll("input")[0].removeAttribute("disabled");
    document.querySelectorAll("input")[1].setAttribute("disabled", true);
    const n1 = document.querySelector("#ladoIzq").textContent;
    const n2 = document.querySelector("#ladoDer").textContent;
    document.querySelector("#salida").textContent = Math.max(n1, n2);
}

function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}