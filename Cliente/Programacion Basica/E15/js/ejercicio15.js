function random(min, max) {
    return parseInt(Math.random() * (max - min + 1) + min);
}

function preguntarMesas() {
    let cantidad_mesas;
    do {
        cantidad_mesas = parseInt(prompt("Cuantas mesas tiene el restaurante?"));
    } while (cantidad_mesas < 1 || isNaN(cantidad_mesas));
    return cantidad_mesas;
}

function generarMesas() {
    let cantidad_mesas = preguntarMesas();
    let mesas = [];
    for (let i = 0; i < cantidad_mesas; i++) {
        mesas[i] = random(0, 4);
    }
    console.log(mesas);
    return mesas;
}

function preguntarClientes() {
    let cantidad_clientes;
    do {
        cantidad_clientes = parseInt(prompt("Cuantos son? (introduce 0 o negativo para dejar de pedir)"));
        if (cantidad_clientes > 4) {
            alert("Lo siento, no admitimos grupos de 6, haga grupos de 4 personas como maximo e intente de nuevo");
        }
    } while (isNaN(cantidad_clientes) || cantidad_clientes > 4);
    return cantidad_clientes;
}

function asignarMesa() {
    const mesas = generarMesas();
    const maximo = 4;
    let cantidad_clientes;

    do {
        cantidad_clientes = preguntarClientes();

        if (cantidad_clientes > 0) {
            let mesaDisponible = buscarMesa(mesas, cantidad_clientes, maximo);

            if (mesaDisponible == -1) {
                console.log("No queda sitio");
                continue;
            }
            mesas[mesaDisponible] += cantidad_clientes;
            console.log(`Siente en la mesa ${mesaDisponible + 1}`);
            console.log(mesas);
        }
    } while (cantidad_clientes > 0);
}

function buscarMesa(mesas, cantidad_clientes, maximo) {
    for (let i = 0; i < mesas.length; i++) {
        if (mesas[i] == 0) {
            return i;
        }
    }

    for (let i = 0; i < mesas.length; i++) {
        if (mesas[i] + cantidad_clientes <= maximo) {
            return i;
        }
    }
    return -1;
}
