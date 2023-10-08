function pedirNumero() {
    let numero;
    do {
        numero = parseInt(prompt("Introduce un numero entero mayor a 2: "));
    } while (isNaN(numero) || numero <= 2);
    return numero;
}

function crearMatriz() {
    let numero = pedirNumero();
    let matriz = [];
    let contador = 1;

    for (let i = 0; i < numero; i++) {
        matriz[i] = [];
        for (let j = 0; j < numero; j++) {
            matriz[i][j] = numero * (contador++);
        }
    }
    return matriz;
}

function mostrarMatriz() {
    let matriz = crearMatriz();
    let tbody = document.getElementById("tbody");

    // ? esto se puede poner directamente en el html lo que pasa que se verá una linea de la tabla
    let thead = document.getElementById("thead");
    let th = document.createElement("th");
    let tr = document.createElement("tr");

    // ? para limpiar el contenido
    thead.innerHTML = "";
    tbody.innerHTML = "";

    th.textContent = "Tabla del " + matriz.length;
    th.setAttribute("colspan", "100%");
    tr.appendChild(th);
    thead.appendChild(tr);

    for (let i = 0; i < matriz.length; i++) {
        // ? creo un tr
        let fila = document.createElement("tr");
        for (let j = 0; j < matriz[i].length; j++) {
            // ? creo un td
            let celda = document.createElement("td");
            // ? le cambio el texto
            celda.textContent = matriz[i][j];
            // ? para añadirlo
            // ! append = se puede añadir textos y objetos
            // ! appendchild = objetos solo
            fila.appendChild(celda);
        }
        tbody.appendChild(fila);
    }
}
