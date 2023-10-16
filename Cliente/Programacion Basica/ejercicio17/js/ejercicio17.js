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

function jugar(COORDENADAS) {
  let terminar = false;

  const FILA_USUARIO = COORDENADAS.split(",")[0];
  const COLUMNA_USUARIO = COORDENADAS.split(",")[1];

  if (tablero[FILA_USUARIO][COLUMNA_USUARIO] == "_") {
    alert("Casilla repetida");
  }
  // Comprobar si es una mina
  if (MINAS.includes(COORDENADAS)) {
    tablero[FILA_USUARIO][COLUMNA_USUARIO] = "X";
    alert("Has perdido");
    terminar = true;
  } else {
    // Comprobar si es un tesoro
    if (TESOROS.includes(COORDENADAS)) {
      tablero[FILA_USUARIO][COLUMNA_USUARIO] = "€";
      alert("Has ganado");
      terminar = true;
    } else {
      // Ni mina ni tesoro
      if (tablero[FILA_USUARIO][COLUMNA_USUARIO] == "*") {
        tablero[FILA_USUARIO][COLUMNA_USUARIO] = "_";
      }
    }
  }
  pintarTablero(tablero);
}

function obtenerCoordenadas(event) {
  let coordenada = event.target.id;
  jugar(coordenada);
  console.log(coordenada);
}

function pintarTablero(tablero) {
  let table = document.getElementById("table");
  table.innerHTML = "";

  for (let i = 0; i < tablero.length; i++) {
    let fila = document.createElement("tr");
    for (let j = 0; j < tablero[i].length; j++) {
      let columna = document.createElement("td");
      columna.addEventListener("click", obtenerCoordenadas);
      columna.setAttribute("id", `${i},${j}`);
      columna.textContent = tablero[i][j];
      fila.appendChild(columna);
    }
    table.appendChild(fila);
    console.log(tablero[i].join(" "));
  }
}

function random(min, max) {
  return parseInt(Math.random() * (max - min + 1) + min);
}

const NUMERO_FILAS = 4;
const NUMERO_COLUMNAS = 5;
const TESOROS = generarTesoros(NUMERO_FILAS, NUMERO_COLUMNAS);
const MINAS = generarMinas(NUMERO_FILAS, NUMERO_COLUMNAS, TESOROS);
let tablero = generarTablero(NUMERO_FILAS, NUMERO_COLUMNAS);
