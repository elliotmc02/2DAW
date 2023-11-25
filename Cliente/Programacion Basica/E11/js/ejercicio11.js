function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}

function generarBandera() {
    let numero;
    do {
        numero = parseInt(prompt("numero entre 1 y 5"));
    } while (numero < 1 || numero > 5 || isNaN(numero));

    let colores = ["red", "yellow", "green", "white", "blue", "brown", "pink", "black"];
    let coloresElegidos = [];

    for (let i = 0; i < numero; i++) {
        let color;
        do {
            color = colores[random(0, colores.length - 1)];
        } while (coloresElegidos[i - 1] == color);

        coloresElegidos[i] = color;
    }

    let tabla = document.createElement("table");
    let tr = document.createElement("tr");

    for (let i = 0; i < coloresElegidos.length; i++) {
        let td = document.createElement("td");
        td.style.backgroundColor = coloresElegidos[i];
        tr.appendChild(td);
    }
    tabla.appendChild(tr);
    document.getElementById("div").appendChild(tabla);
} 