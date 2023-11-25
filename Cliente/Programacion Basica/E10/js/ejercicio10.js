function quitarRepetidos(array1, array2) {
    let array_unido = array1.concat(array2);
    let array_final = comprobarRepetidos(array_unido);

    console.log(array_final);
}

function comprobarRepetidos(array_unido) {

    let contador = 0;
    let array_final = [];
    do {
        let repetido = false;
        let numero = array_unido[contador];
        for (let i = array_unido.indexOf(numero) + 1; i < array_unido.length; i++) {
            if (numero == array_unido[i]) {
                repetido = true;
                break;
            }
        }
        if (!repetido) {
            array_final.push(numero);
        }
        contador++;
    } while (contador < array_unido.length);

    return array_final;
}

let array1 = [77, "ciao"];
let array2 = [78, 42, "ciao"];
quitarRepetidos(array1, array2);