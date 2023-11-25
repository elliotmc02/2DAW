const imgs = [
  "foto1.jpg",
  "foto2.jpg",
  "foto3.jpg",
  "foto4.jpg",
  "foto5.jpg",
  "foto6.jpg",
  "foto7.jpg",
  "foto8.jpg",
];
let index = 0;

function actualizarBotones() {
  // document.querySelectorAll("button")[0].disabled = index == imgs.length - 1;
  // document.querySelectorAll("button")[1].disabled = index == 0;
  let buttons = document.querySelectorAll("button");
  buttons[0].setAttribute("disabled", index == imgs.length - 1);
  buttons[1].setAttribute("disabled", index == 0);



  switch (index) {
    case 0:
      buttons[0].removeAttribute("disabled");
      buttons[1].setAttribute("disabled", true);
      break;
    case imgs.length - 1:
      buttons[0].setAttribute("disabled", true);
      buttons[1].removeAttribute("disabled");
      break;
    default:
      buttons[0].removeAttribute("disabled");
      buttons[1].removeAttribute("disabled");
  }
}

function cambiarImagen(indice) {
  let img = document.querySelector("img");
  img.setAttribute("src", "fotos/" + imgs[indice]);
  index = indice;
  actualizarBotones();
}

function avanzar() {
  index = Math.min(index + 1, imgs.length - 1);
  cambiarImagen(index);
}

function retroceder() {
  index = Math.max(index - 1, 0);
  cambiarImagen(index);
}

actualizarBotones();
