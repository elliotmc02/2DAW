function generarTablero(filas, columnas) {
    let tablero = [];
    for (let i = 0; i < filas; i++) {
        tablero[i] = [];
        for (let j = 0; j < columnas; j++) {
            tablero[i][j] = "*";
        }
    }
    pintarTablero(tablero);
    return tablero;
}

function generarTesoros(filas, columnas) {
    let tesoros = [random(0, filas - 1) + "," + random(0, columnas - 1)];
    return tesoros;
}

function generarMinas(filas, columnas, tesoros) {
    let minas = [];
    let contadorMinas = 0;
    do {
        let fila_y_columna = random(0, filas - 1) + "," + random(0, columnas - 1);
        if (minas.includes(fila_y_columna) || tesoros.includes(fila_y_columna)) {
            continue;
        }
        minas.push(fila_y_columna);
        contadorMinas++;

    } while (contadorMinas < 3);
    return minas;
}

function jugar() {
    const NUMERO_FILAS = 4;
    const NUMERO_COLUMNAS = 5;

    let tablero = generarTablero(NUMERO_FILAS, NUMERO_COLUMNAS);
    const TESOROS = generarTesoros(NUMERO_FILAS, NUMERO_COLUMNAS);
    const MINAS = generarMinas(NUMERO_FILAS, NUMERO_COLUMNAS, TESOROS);
    let terminar = false;

    let filaUsuario = pedirCoordenada(NUMERO_FILAS, "Fila");
    let columnaUsuario = pedirCoordenada(NUMERO_COLUMNAS, "Columna");
    if (tablero[filaUsuario][columnaUsuario] == "_") {
        alert("Casilla repetida");
    }
    // Comprobar si es una mina
    if (MINAS.includes(`${filaUsuario},${columnaUsuario}`)) {
        tablero[filaUsuario][columnaUsuario] = "X";
        alert("Has perdido");
        terminar = true;
    } else {
        // Comprobar si es un tesoro
        if (TESOROS.includes(`${filaUsuario},${columnaUsuario}`)) {
            tablero[filaUsuario][columnaUsuario] = "€";
            alert("Has ganado");
            terminar = true;
        } else {
            // Ni mina ni tesoro
            if (tablero[filaUsuario][columnaUsuario] == "*") {
                tablero[filaUsuario][columnaUsuario] = "_";
            }
        }
    }
    pintarTablero(tablero);
}


function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}

function comprobarValores(max, xy) {
    let fila = document.getElementsByName("fil").values[0];
    let columna = document.getElementsByName("col").values[0];

    let coord;
    do {
        coord = parseInt(prompt(xy));
        if (isNaN(coord) || coord > max || coord < 1) {
            alert("Coordenadas incorrectas");
        }
    } while (isNaN(coord) || coord > max || coord < 1);
    return coord - 1;
}

function pintarTablero(tablero) {
    let tbody = document.getElementById("tbody");
    tbody.innerHTML = "";

    for (let i = 0; i < tablero.length; i++) {
        let fila = document.createElement("tr");
        for (let j = 0; j < tablero[i].length; j++) {
            let celda = document.createElement("td");
            celda.textContent = tablero[i][j];
            fila.appendChild(celda);
        }
        tbody.appendChild(fila);
        console.log(tablero[i].join(" "));
    }
}