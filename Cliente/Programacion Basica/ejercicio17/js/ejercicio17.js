function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}

function generarTablero() {
    let tablero = new Array(4);
    let mina = "M";
    let tesoro = "T";
    let contadorMinas = 0;
    for (let i = 0; i < tablero.length; i++) {
        tablero[i] = new Array(5);
    }
    tablero[random(0,tablero.length - 1)][0,tablero[0].length - 1] == tesoro;
    do {
        let fila = random(0,tablero.length - 1);
        let columna = random(0,tablero[0].length - 1);

        if (tablero[fila][columna] != undefined) {
            continue;
        }
        
        contadorMinas++;
    } while(contadorMinas != 3);
}