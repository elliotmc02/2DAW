document.addEventListener("DOMContentLoaded", () => {
    crearTabla();

    const fila_aleatoria = random(0, 7);
    const columna_aleatoria = random(0, 7);

    document.querySelectorAll("tr")[fila_aleatoria].querySelectorAll("td")[columna_aleatoria].style.setProperty("background-image", "url(img/foto.png)");

    const tablero = document.querySelectorAll("tr");

    comprobarCasillas(tablero, fila_aleatoria, columna_aleatoria);

    document.querySelectorAll("td").forEach((element) => {
        element.addEventListener("click", () => moverse(tablero, element));
    });
});

function crearTabla() {
    const table = document.createElement("table");

    for (let i = 0; i < 8; i++) {
        const tr = document.createElement("tr");
        for (let j = 0; j < 8; j++) {
            const td = document.createElement("td");
            td.className = (i + j) % 2 == 0 ? "dark" : "light";
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
    document.querySelector("div").appendChild(table);
}

function moverse(tablero, casilla) {
    if (casilla.classList.contains("casilla-cerca")) {
        document.querySelectorAll("td").forEach((element) => {
            element.style.removeProperty("background-image");
            element.classList.remove("casilla-cerca");
        });
        casilla.style.setProperty("background-image", "url(img/foto.png)");
        let nueva_fila;
        let nueva_columna;
        for (let i = 0; i < tablero.length; i++) {
            for (let j = 0; j < tablero.length; j++) {
                if (tablero[i].querySelectorAll("td")[j] == casilla) {
                    nueva_fila = i;
                    nueva_columna = j;
                    break;
                }
            }
        }
        comprobarCasillas(document.querySelectorAll("tr"), nueva_fila, nueva_columna);
    }
}

function comprobarCasillas(tablero, fila, columna) {
    const filaInicio = Math.max(0, fila - 1);
    const filaFinal = Math.min(tablero.length - 1, fila + 1);
    const columnaInicio = Math.max(0, columna - 1);
    const columnaFinal = Math.min(tablero.length - 1, columna + 1);
    for (let i = filaInicio; i <= filaFinal; i++) {
        for (let j = columnaInicio; j <= columnaFinal; j++) {
            if (i != fila || j != columna) {
                tablero[i].querySelectorAll("td")[j].classList.add("casilla-cerca");
            }
        }
    }
}

function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}