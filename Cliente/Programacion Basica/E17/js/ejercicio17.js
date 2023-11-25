function generarTablero(filas, columnas) {
  const tablero = [];
  for (let i = 0; i < filas; i++) {
    tablero[i] = Array(columnas).fill("*");
  }
  pintarTablero(tablero);
  return tablero;
}

function generarCoordenadaAleatoria(filas, columnas, repetido = []) {
  let coordenada;
  do {
    coordenada = `${random(0, filas - 1)},${random(0, columnas - 1)}`;
  } while (repetido.includes(coordenada));
  return coordenada;
}

function generarTesoros(filas, columnas) {
  return [generarCoordenadaAleatoria(filas, columnas)];
}

function generarMinas(filas, columnas, tesoros) {
  const minas = [];
  let contadorMinas = 0;
  do {
    const coordenada = generarCoordenadaAleatoria(filas, columnas, [
      ...minas,
      ...tesoros,
    ]);
    minas.push(coordenada);
    contadorMinas++;
  } while (contadorMinas < 3);
  console.log(`Minas: ${minas.join(" ")}`);
  return minas;
}

function actualizarVidas(vidas) {
  document.getElementById("vidas").innerHTML = `Vidas: ${vidas}`;
}

function jugar(coordenadas, tablero, tesoros, minas) {
  const [FILA_USUARIO, COLUMNA_USUARIO] = coordenadas.split(",");

  if (
    tablero[FILA_USUARIO][COLUMNA_USUARIO] == "_" ||
    tablero[FILA_USUARIO][COLUMNA_USUARIO] == "X"
  ) {
    alert("Casilla repetida");
  } else if (minas.includes(coordenadas)) {
    tablero[FILA_USUARIO][COLUMNA_USUARIO] = "X";
    vidas--;
    actualizarVidas(vidas);
    if (vidas == 0) {
      alert("Te has quedado sin vidas, has perdido");
    }
  } else if (tesoros.includes(coordenadas)) {
    tablero[FILA_USUARIO][COLUMNA_USUARIO] = "€";
    alert("Has ganado");
  } else if (tablero[FILA_USUARIO][COLUMNA_USUARIO] == "*") {
    tablero[FILA_USUARIO][COLUMNA_USUARIO] = "_";
    if (minaCerca(FILA_USUARIO, COLUMNA_USUARIO, minas)) {
      alert("Mina cerca");
    }
  }
  pintarTablero(tablero);
}

function minaCerca(fila, columna, minas) {
  for (let i = fila - 1; i <= fila + 1; i++) {
    for (let j = columna - 1; j <= columna + 1; j++) {
      if (minas.includes(`${i},${j}`)) {
        return true;
      }
    }
  }
  return false;
}

function obtenerCoordenadas(event) {
  const coordenada = event.target.id;
  jugar(coordenada, tablero, TESOROS, MINAS);
  console.log(coordenada);
}

function pintarTablero(tablero) {
  const table = document.getElementById("table");
  table.innerHTML = "";

  for (let i = 0; i < tablero.length; i++) {
    const fila = document.createElement("tr");
    for (let j = 0; j < tablero[i].length; j++) {
      const columna = document.createElement("td");
      columna.addEventListener("click", obtenerCoordenadas);
      columna.setAttribute("id", `${i},${j}`);
      columna.textContent = tablero[i][j];
      fila.appendChild(columna);
    }
    table.appendChild(fila);
    // console.log(tablero[i].join(" "));
  }
}

function random(min, max) {
  return parseInt(Math.random() * (max - min + 1) + min);
}

let vidas = 2;
actualizarVidas(vidas);
const NUMERO_FILAS = 4;
const NUMERO_COLUMNAS = 5;
const TESOROS = generarTesoros(NUMERO_FILAS, NUMERO_COLUMNAS);
const MINAS = generarMinas(NUMERO_FILAS, NUMERO_COLUMNAS, TESOROS);
let tablero = generarTablero(NUMERO_FILAS, NUMERO_COLUMNAS);
