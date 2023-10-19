let imgs = [
    "1.jpg",
    "2.jpg",
    "3.jpg",
    "4.jpg",
    "5.jpg",
    "6.jpg",
    "7.jpg",
    "8.jpg"
];

function avanzar() {
    let img = document.querySelector("img");
    img.setAttribute("src", "fotos/" + imgs[parseInt((img.getAttribute("src").split(".")[0].split("/")[1] - 1) + 1)]);
    if (img.getAttribute("src") == "fotos/8.jpg") {
        document.querySelectorAll("button")[0].setAttribute("disabled", true);
        document.querySelectorAll("button")[1].removeAttribute("disabled");
    } else {
        document.querySelectorAll("button")[0].removeAttribute("disabled");
        document.querySelectorAll("button")[1].removeAttribute("disabled");
    }
}

function retroceder() {
    let img = document.querySelector("img");
    img.setAttribute("src", "fotos/" + imgs[(img.getAttribute("src").split(".")[0].split("/")[1] - 1) - 1]);
    if (img.getAttribute("src") == "fotos/1.jpg") {
        document.querySelectorAll("button")[1].setAttribute("disabled", true);
        document.querySelectorAll("button")[0].removeAttribute("disabled");
    } else {
        document.querySelectorAll("button")[0].removeAttribute("disabled");
        document.querySelectorAll("button")[1].removeAttribute("disabled");
    }
}
