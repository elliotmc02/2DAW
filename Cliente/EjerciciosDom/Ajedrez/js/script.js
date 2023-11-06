document.addEventListener("DOMContentLoaded", () => {
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
    document.body.appendChild(table);

    const fila_aleatoria = random(0, 7);
    const columna_aleatoria = random(0, 7);

    document.querySelectorAll("tr")[fila_aleatoria].querySelectorAll("td")[columna_aleatoria].style.setProperty("background-image", "url(img/foto.png)");
    let tablero = document.querySelectorAll("tr");
    let rey = document.querySelectorAll("tr")[fila_aleatoria].querySelectorAll("td")[columna_aleatoria];
    pintarTablero(tablero, fila_aleatoria, columna_aleatoria, rey);
    document.querySelectorAll("td").forEach((element) => {
        element.addEventListener("click", () => moverse(tablero, element));
    });
});

function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
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
        pintarTablero(document.querySelectorAll("tr"), nueva_fila, nueva_columna, casilla);
    }
}

function pintarTablero(tablero, fila_aleatoria, columna_aleatoria) {
    for (let i = fila_aleatoria - 1; i <= fila_aleatoria + 1; i++) {
        for (let j = columna_aleatoria - 1; j <= columna_aleatoria + 1; j++) {
            if (tablero[i] != null) {
                let casilla = tablero[i].querySelectorAll("td")[j];
                if (casilla != null) {
                    if (i != fila_aleatoria || j != columna_aleatoria) {
                        casilla.classList.add("casilla-cerca");
                    }
                }
            }
        }
    }
}