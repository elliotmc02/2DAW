document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("input").forEach((element) => {
    element.addEventListener("click", () => mover(element));
  });
});

function mover(element) {
  element.setAttribute("disabled", true);
  let barra = element.previousElementSibling;
  barra.setAttribute("value", 0);
  progresar();
  function progresar() {
    barra.setAttribute("value", parseFloat(barra.getAttribute("value")) + Math.random() * 1);
    if (parseInt(barra.getAttribute("value")) < 100) {
      // setTimeout(() => {
      requestAnimationFrame(progresar);
      // }, 500);
    } else {
      element.removeAttribute("disabled");
    }
  }
}