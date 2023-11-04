document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("input")[0].addEventListener("click", () => generar());
  document.querySelectorAll("input")[1].addEventListener("click", () => borrarViejo());
  document.querySelectorAll("input")[2].addEventListener("click", () => borrarNuevos());
  document.querySelectorAll("input")[3].addEventListener("click", () => sustituir());
});

function generar() {
  const parrafo_inicial = document.querySelector(".parrafo-inicial");
  let p = document.createElement("p");
  p.textContent = parrafo_inicial.textContent;
  p.setAttribute("class", "parrafo-nuevo");
  parrafo_inicial.parentNode.insertBefore(p, parrafo_inicial.nextSibling);
  document.querySelectorAll("input")[2].removeAttribute("disabled");
}

function borrarViejo() {
  const parrafo_inicial = document.querySelector(".parrafo-inicial");
  parrafo_inicial.parentNode.removeChild(parrafo_inicial);
  document.querySelectorAll("input")[1].setAttribute("disabled", true);
  document.querySelectorAll("input")[3].setAttribute("disabled", true);
}

function borrarNuevos() {
  const padre = document.querySelector(".parrafo-nuevo").parentNode;
  while (padre.querySelector(".parrafo-nuevo")) {
    padre.removeChild(padre.querySelector(".parrafo-nuevo"));
  }
  document.querySelectorAll("input")[2].setAttribute("disabled", true);
}

function sustituir() {
  const parrafo_inicial = document.querySelector(".parrafo-inicial");
  const table = document.createElement("table");

  for (let i = 0; i < 2; i++) {
    const tr = document.createElement("tr");
    for (let j = 0; j < 2; j++) {
      const td = document.createElement("td");
      td.textContent = (i + 1) * (j + 1);
      tr.appendChild(td);
    }
    table.appendChild(tr);
  }
  table.classList.add("parrafo-inicial");
  parrafo_inicial.parentNode.replaceChild(table, parrafo_inicial);
}