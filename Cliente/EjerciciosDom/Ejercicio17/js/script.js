document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".btn").addEventListener("click", () => apostar());
});

function apostar() {
    let dinero = document.querySelector("#dinero").textContent.split(": ")[1];
    let caballo = document.querySelector("#caballo").value;
    let cantidad = document.querySelector("#cantidad").value;
    if (dinero <= 0 || dinero < cantidad) {
        alert("No tienes dinero");
        return;
    }
    if (caballo && cantidad) {
        setDinero(dinero - cantidad);
        correr(caballo, cantidad);
    }
}

function correr(caballo, cantidad) {
    document.querySelector(".btn").setAttribute("disabled", true);

    const caballos = document.querySelectorAll(".panel > div");
    let coords = [0, 0, 0, 0];
    mover();

    function mover() {
        for (let i = 0; i < caballos.length; i++) {
            coords[i] += random(0.1, 2);
            caballos[i].firstElementChild.style.setProperty("transform", `translateX(${coords[i]}px)`);

            if (coords[i] >= window.getComputedStyle(document.querySelector(".panel")).getPropertyValue("width").split("px")[0] - window.getComputedStyle(caballos[i].firstElementChild).getPropertyValue("width").split("px")[0]) {
                alert("Ha ganado el caballo " + (i + 1));
                if (caballo == i + 1) {
                    setDinero(parseInt(document.querySelector("#dinero").textContent.split(": ")[1]) + parseInt(cantidad * 2));
                }
                reiniciar();
                return;
            }
        }
        requestAnimationFrame(mover);
    }

    function reiniciar() {
        coords = [0, 0, 0, 0];
        document.querySelector(".btn").removeAttribute("disabled");
        caballos.forEach(caballo => {
            caballo.firstElementChild.style.setProperty("transform", "translateX(0px)");
        });
    }
}

function setDinero(dinero) {
    document.querySelector("#dinero").textContent = "Dinero: " + dinero;
}

function random(min, max) {
    return (Math.random() * (max - min + 1)) + min;
}