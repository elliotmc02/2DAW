document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("input").addEventListener("click", () => {
        generarTabla();
    });
});

function generarTabla() {
    const filas = pedirNumeros(1, 10, "filas");
    const celdas = pedirNumeros(1, 10, "celdas");

    const table = document.createElement("table");
    table.className = "tabla";
    for (let i = 0; i < filas; i++) {
        const tr = document.createElement("tr");
        for (let j = 0; j < celdas; j++) {
            const td = document.createElement("td");
            td.textContent = i + 1;
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
    document.querySelector(".solucion").appendChild(table);
}

function pedirNumeros(min, max, texto) {
    let n;
    do {
        n = parseInt(prompt(`Numero de ${texto} (debe ser positivo y menor que 10)`));
    } while (n < min || n > max || isNaN(n));
    return n;
}