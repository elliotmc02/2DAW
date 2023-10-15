<?php

// Ejercicio 1

function eurosDolares(int | float $n): int | float
{
    return $n * 1.06;
}

function dolaresEuros(int | float $n): int | float
{
    return $n * 0.94;
}

function eurosYenes(int | float $n): int | float
{
    return $n * 157.56;
}

function yenesEuros(int | float $n): int | float
{
    return $n * 0.0063;
}

function dolarsYenes(int | float $n): int | float
{
    return $n * 148.73;
}

function yenesDolares(int | float $n): int | float
{
    return $n * 0.0067;
}

function cambiarDivisa(int | float $cantidad, $D1, $D2): float
{
    $x = match (true) {
        $D1 == "euros" && $D2 == "dolares" => eurosDolares($cantidad),
        $D1 == "dolares" && $D2 == "euros" => dolaresEuros($cantidad),
        $D1 == "euros" && $D2 == "yenes" => eurosYenes($cantidad),
        $D1 == "yenes" && $D2 == "euros" => yenesEuros($cantidad),
        $D1 == "dolares" && $D2 == "yenes" => dolarsYenes($cantidad),
        $D1 == "yenes" && $D2 == "dolares" => yenesDolares($cantidad),
        $D1 == $D2 => $cantidad,
        default => -99999999999,
    };
    return $x;
}

// Ejercicio 2

function sumatorio($n): int | float
{
    $total = 0;
    for ($i = 0; $i <= $n; $i++) {
        $total += $i;
    }
    return $total;
}

function factorial($n): int | float
{
    $total = 1;
    for ($i = 1; $i <= $n; $i++) {
        $total *= $i;
    }
    return $total;
}

function tipoOperacion($n, $tipo)
{
    return ($tipo == "sum" ? sumatorio($n) : factorial($n));
}

// Ejercicio 3

function comprobarEstado(int $n): string
{
    $estado = match (true) {
        $n == 0 => "Extinto",
        $n > 0 && $n <= 500 => "En peligro critico",
        $n > 500 && $n <= 2000 => "En peligro",
        $n > 2000 => "Amenazado",
        default => "Error",
    };
    return $estado;
}

function generarTabla(array $animales)
{
    foreach ($animales as $animal) {
        list($especie, $clase, $ejemplares) = $animal;
        echo "<tr><td>" . $especie . "</td><td>" . $clase . "</td><td>" . $ejemplares . "</td><td>" . comprobarEstado($ejemplares) . "</td></tr>";
    }
}

function buscarEspecie(string $especie_buscar, array $animales): string
{
    foreach ($animales as $animal) {
        list($especie, $clase, $ejemplares) = $animal;
        if (strtoupper($especie_buscar) == strtoupper($especie)) {
            return $especie . " está " . comprobarEstado($ejemplares);
        }
    }
    return "Especie no encontrada";
}
