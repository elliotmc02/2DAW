// Ejercicio 1

function ejercicio1() {
    let gramos;
    do {
        gramos = Number(prompt("Gramos: "));
        if (gramos <= 0 || isNaN(gramos)) {
            alert("Numeros mayor a 0");
        }
    } while (gramos <= 0 || isNaN(gramos));
    let kg = gramos / 1000;
    alert(`${gramos} gramo/s equivalen a ${kg} kilogramo/s`);
}

// Ejercicio 2

function ejercicio2() {
    let n1;
    do {
        n1 = Number(prompt("Valor 1"));
        if (n1 < 0 || isNaN(n1)) {
            alert("Numeros positivos");
        }
    } while (n1 < 0 || isNaN(n1));
    let n2;
    do {
        n2 = Number(prompt("Valor 2"));
        if (n2 < 0 || isNaN(n2)) {
            alert("Numeros positivos");
        }
    } while (n2 < 0 || isNaN(n2));
    let n3;
    do {
        n3 = Number(prompt("Valor 3"));
        if (n3 < 0 || isNaN(n3)) {
            alert("Numeros positivos");
        }
    } while (n3 < 0 || isNaN(n3));
    let n4;
    do {
        n4 = Number(prompt("Valor 4"));
        if (n4 < 0 || isNaN(n4)) {
            alert("Numeros positivos");
        }
    } while (n4 < 0 || isNaN(n4));
    let n5;
    do {
        n5 = Number(prompt("Valor 5"));
        if (n5 < 0 || isNaN(n5)) {
            alert("Numeros positivos");
        }
    } while (n5 < 0 || isNaN(n5));
    let n6;
    do {
        n6 = Number(prompt("Valor 6"));
        if (n6 < 0 || isNaN(n6)) {
            alert("Numeros positivos");
        }
    } while (n6 < 0 || isNaN(n6));
    let n7;
    do {
        n7 = Number(prompt("Valor 7"));
        if (n7 < 0 || isNaN(n7)) {
            alert("Numeros positivos");
        }
    } while (n7 < 0 || isNaN(n7));
    let n8;
    do {
        n8 = Number(prompt("Valor 8"));
        if (n8 < 0 || isNaN(n8)) {
            alert("Numeros positivos");
        }
    } while (n8 < 0 || isNaN(n8));
    let n9;
    do {
        n9 = Number(prompt("Valor 9"));
        if (n9 < 0 || isNaN(n9)) {
            alert("Numeros positivos");
        }
    } while (n9 < 0 || isNaN(n9));
    let n10;
    do {
        n10 = Number(prompt("Valor 10"));
        if (n10 < 0 || isNaN(n10)) {
            alert("Numeros positivos");
        }
    } while (n10 < 0 || isNaN(n10));

    let media = (n1 + n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9 + n10) / 10;
    let mediaDoble = media * 2;

    let superaMedia = "";
    let superMediaDoble = "";

    if (n1 > mediaDoble) {
        superMediaDoble += n1 + ",";
    } else if (n1 > media) {
        superaMedia += n1 + ",";
    }
    if (n2 > mediaDoble) {
        superMediaDoble += n2 + ",";
    } else if (n2 > media) {
        superaMedia += n2 + ",";
    }
    if (n3 > mediaDoble) {
        superMediaDoble += n3 + ",";
    } else if (n3 > media) {
        superaMedia += n3 + ",";
    }
    if (n4 > mediaDoble) {
        superMediaDoble += n4 + ",";
    } else if (n4 > media) {
        superaMedia += n4 + ",";
    }
    if (n5 > mediaDoble) {
        superMediaDoble += n5 + ",";
    } else if (n5 > media) {
        superaMedia += n5 + ",";
    }
    if (n6 > mediaDoble) {
        superMediaDoble += n6 + ",";
    } else if (n6 > media) {
        superaMedia += n6 + ",";
    }
    if (n7 > mediaDoble) {
        superMediaDoble += n7 + ",";
    } else if (n7 > media) {
        superaMedia += n7 + ",";
    }
    if (n8 > mediaDoble) {
        superMediaDoble += n8 + ",";
    } else if (n8 > media) {
        superaMedia += n8 + ",";
    }
    if (n9 > mediaDoble) {
        superMediaDoble += n9 + ",";
    } else if (n9 > media) {
        superaMedia += n9 + ",";
    }
    if (n10 > mediaDoble) {
        superMediaDoble += n10 + ",";
    } else if (n10 > media) {
        superaMedia += n10 + ",";
    }
    alert(`Super la media: ${superaMedia}. Super el doble de la media: ${superMediaDoble}`);
}

// Ejercicio 3

function ejercicio3() {
    let numero;
    do {
        numero = parseInt(prompt("Numero entre 5 y 10"));
        if (numero < 5 || numero > 10 || isNaN(numero)) {
            alert("Numeros entre 5 y 10");
        }
    } while (numero < 5 || numero > 10 || isNaN(numero));
    let numeros = [];
    let suma = 0;
    for (let i = 0; i < numero; i++) {
        numeros[i] = numero * Math.floor(Math.random() * 10);
        suma += numeros[i];
    }
    console.log(numeros.join(" "));
    let media = suma / numeros.length;
    console.log(`Media: ${media}`);
    console.log("Superan la media: ");
    for (let i = 0; i < numeros.length; i++) {
        if (numeros[i] > media) {
            console.log(numeros[i]);
        }
    }
}

// Ejercicio 4

function ejercicio4() {
    let n;
    do {
        n = parseInt(prompt("Numero entre 2 y 5"));
        if (n < 2 || n > 5 || isNaN(n)) {
            alert("Numeros entre 2 y 5");
        }
    } while (n < 2 || n > 5 || isNaN(n));

    let matriz = [];
    let suma = 0;

    for (let i = 0; i < n; i++) {
        matriz[i] = [];
        for (let j = 0; j < n; j++) {
            matriz[i][j] = parseInt(Math.random() * (99) + 1);
            suma += matriz[i][j];
        }
    }

    console.log("Matriz");
    for (let i = 0; i < matriz.length; i++) {
        for (let j = 0; j < matriz[i].length; j++) {
            if (matriz[i][j] < 10) {
                matriz[i][j] = "0" + matriz[i][j];
            }
        }
        console.log(matriz[i].join(" "));
    }

    let media = suma / (n * n);
    console.log(`Media: ${media}`);
    let resultado = [[], []];
    for (let i = 0; i < matriz.length; i++) {
        for (let j = 0; j < matriz[i].length; j++) {
            if (matriz[i][j] > media) {
                resultado[0].push(matriz[i][j]);
            } else {
                resultado[1].push(matriz[i][j]);
            }

        }
    }

    console.log("Array resultado");
    for (let i = 0; i < resultado.length; i++) {
        console.log(resultado[i].join(" "));
    }

    // Ordenar

    let orden;
    do {
        orden = parseInt(prompt("0 (ascendente) o 1 (descendente)"));
        if (orden < 0 || orden > 1 || isNaN(orden)) {
            alert("0 o 1");
        }
    } while (orden < 0 || orden > 1 || isNaN(orden));

    if (orden == 0) {
        resultado[0].sort(function (a, b) { return a - b });
        resultado[1].sort(function (a, b) { return a - b });
    } else {
        resultado[0].sort(function (a, b) { return b - a });
        resultado[1].sort(function (a, b) { return b - a });
    }
    console.log("Orden");
    for (let i = 0; i < resultado.length; i++) {
        console.log(resultado[i].join(" "));
    }
}