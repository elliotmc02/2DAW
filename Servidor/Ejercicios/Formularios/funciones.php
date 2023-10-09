<?php
function comparar(int $num1, int $num2, int $num3): string
{
    if (($num1 == $num2) == $num3) {
        return "Los 3 son iguales";
    }
    $mayor = $num1;
    if ($num2 > $num1) {
        $mayor = $mayor;
    }
    if ($num3 > $mayor) {
        $mayor = $num3;
    }
    return "El numero " . $mayor . " es el mayor";
}

function precioConIVA(int | float $precio, string $tipoIVA): float
{
    DEFINE("GENERAL", 21);
    DEFINE("REDUCIDO", 10);
    DEFINE("SUPERREDUCIDO", 4);
    DEFINE("SIN_IVA", 0);
    $precio_final = match ($tipoIVA) {
        "GENERAL" => $precio + ($precio * (GENERAL / 100)),
        "REDUCIDO" => $precio + ($precio * (REDUCIDO / 100)),
        "SUPERREDUCIDO" => $precio + ($precio * (SUPERREDUCIDO / 100)),
        "SIN_IVA" => $precio,
        default => -1000000
    };
    return $precio_final;
}

function calcularIRPF(float $salario): float
{
    $salarioIRPF = 0;
    $salarioAUX = 0;
    if ($salario <= 12450) {
        $salarioIRPF = $salario * 0.81;
    } else if ($salario > 12450 && $salario <= 20200) {
        $salarioIRPF = 12450 * 0.81;
        $salarioAUX = $salario - 12450;
        $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.76);
    } else if ($salario > 20200 && $salario <= 35200) {
        $salarioIRPF = 12450 * 0.81;
        $salarioIRPF = $salarioIRPF + (7750 * 0.76);
        $salarioAUX = $salario - 20200;
        $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.70);
    } else if ($salario > 35200 && $salario <= 60000) {
        $salarioIRPF = 12450 * 0.81;
        $salarioIRPF = $salarioIRPF + (7750 * 0.76);
        $salarioIRPF = $salarioIRPF + (15000 * 0.70);
        $salarioAUX = $salario - 35200;
        $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.63);
    } else if ($salario > 60000 && $salario <= 300000) {
        $salarioIRPF = 12450 * 0.81;
        $salarioIRPF = $salarioIRPF + (7750 * 0.76);
        $salarioIRPF = $salarioIRPF + (15000 * 0.70);
        $salarioIRPF = $salarioIRPF + (24800 * 0.63);
        $salarioAUX = $salario - 60000;
        $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.55);
    } else if ($salario > 300000) {
        $salarioIRPF = 12450 * 0.81;
        $salarioIRPF = $salarioIRPF + (7750 * 0.76);
        $salarioIRPF = $salarioIRPF + (15000 * 0.70);
        $salarioIRPF = $salarioIRPF + (24800 * 0.63);
        $salarioIRPF = $salarioIRPF + (240000 * 0.55);
        $salarioAUX = $salario - 300000;
        $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.53);
    }
    return $salarioIRPF;
}
