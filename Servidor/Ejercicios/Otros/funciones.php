<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>

<body>
    <?php
    function suma(int | float $n1, $n2): float
    {
        return $n1 + $n2;
    }

    echo "<h2>" . suma(5, 3) . "</h2>";

    function calcularPrimo(int $n): array
    {
        $primos = [];
        for ($i = 2; $i < $n; $i++) {
            $is_Primo = true;
            for ($j = 2; $j < $i - 1; $j++) {
                if ($i % $j == 0) {
                    $is_Primo = false;
                }
            }
            if ($is_Primo) {
                $primos[] = $i;
            }
        }
        return $primos;
    }
    print_r(calcularPrimo(30));
    echo "<br>";
    foreach (calcularPrimo(30) as $numero) {
        echo "$numero ";
    }

    function esPrimo(int $n): bool
    {
        $is_Primo = true;
        for ($j = 2; $j < $n - 1; $j++) {
            if ($n % $j == 0) {
                $is_Primo = false;
                break;
            }
        }
        return $is_Primo;
    }
    echo "<br>" . (esPrimo(5) ? "Es primo" : "No es primo");
    ?>

    <?php

    // ? Celsius a Fahrenheit
    function celsiusFahrenheit(int | float $n): int | float
    {
        return ($n * 9 / 5) + 32;
    }
    // ? Fahrenheit a Celsius
    function fahrenheitCelsius(int | float $n): int | float
    {
        return ($n - 32) * 5 / 9;
    }
    // ? Celsius a Kelvin
    function celsiusKelvin(int | float $n): int | float
    {
        return $n + 273.15;
    }
    // ? Kelvin a Celsius
    function kelvinCelsius(int | float $n): int | float
    {
        return $n - 273.15;
    }
    // ? Kelvin a Fahrenheit
    function kelvinFahrenheit(int | float $n): int | float
    {
        return ($n - 273.15) * 9 / 5 + 32;
    }
    // ? Fahrenheit a Kelvin
    function fahrenheitKelvin(int | float $n): int | float
    {
        return ($n - 32) * 5 / 9 + 273.15;
    }

    function cambioTemperatura(int|float $temp, $U1, $U2): float | string
    {
        $x = match (true) {
            $U1 == "C" && $U2 == "F" => celsiusFahrenheit($temp),
            $U1 == "F" && $U2 == "C" => fahrenheitCelsius($temp),
            $U1 == "C" && $U2 == "K" => celsiusKelvin($temp),
            $U1 == "K" && $U2 == "C" => kelvinCelsius($temp),
            $U1 == "K" && $U2 == "F" => kelvinFahrenheit($temp),
            $U1 == "F" && $U2 == "K" => fahrenheitKelvin($temp),
            default => "unidad erronea"
        };
        return $x;
    }
    echo "<h2>" . cambioTemperatura(23, "C", "F") . "</h2>";

    function potencia($n1, $n2)
    {
        $res = 1;
        try {
            for ($i = 0; $i < $n2; $i++) {
                $res *= $n1;
            }
        } catch (Exception $e) {
            echo "error";
        }
        return $res;
    }


    echo potencia(2, 3);
    ?>

    <?php

    DEFINE("GENERAL", 21);
    DEFINE("REDUCIDO", 10);
    DEFINE("SUPERREDUCIDO", 4);
    DEFINE("SIN_IVA", 0);

    function precioSinIVA(int | float $precio, string $tipoIVA): float
    {
        $precio_final = match ($tipoIVA) {
            "GENERAL" => $precio - ($precio * (GENERAL / 100)),
            "REDUCIDO" => $precio - ($precio * (REDUCIDO / 100)),
            "SUPERREDUCIDO" => $precio - ($precio * (SUPERREDUCIDO / 100)),
            "SIN_IVA" => $precio,
            default => -1000000
        };
        return $precio_final;
    }

    function precioConIVA(int | float $precio, string $tipoIVA): float
    {
        $precio_final = match ($tipoIVA) {
            "GENERAL" => $precio + ($precio * (GENERAL / 100)),
            "REDUCIDO" => $precio + ($precio * (REDUCIDO / 100)),
            "SUPERREDUCIDO" => $precio + ($precio * (SUPERREDUCIDO / 100)),
            "SIN_IVA" => $precio,
            default => -1000000
        };
        return $precio_final;
    }
    echo "<br>" . precioConIVA(100, "GENERAL");
    echo "<br>" . precioSinIVA(100, "GENERAL");
    echo "<br>" . precioConIVA(100, "REDUCIDO");
    echo "<br>" . precioSinIVA(100, "REDUCIDO");
    echo "<br>" . precioConIVA(100, "SUPERREDUCIDO");
    echo "<br>" . precioSinIVA(100, "SUPERREDUCIDO");
    echo "<br>" . precioConIVA(100, "SIN_IVA");
    echo "<br>" . precioSinIVA(100, "SIN_IVA");
    ?>

    <br>

    <?php
    function calcularIRPF(float $salario): float
    {
        $salarioIRPF = $salario * 0.81;
        $salarioAUX = 0;
        if ($salario > 12450 && $salario <= 20200) {
            $salarioAUX = $salario - 12450;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.76);
        } else if ($salario > 20200 && $salario <= 35200) {
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioAUX = $salario - 20200;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.70);
        } else if ($salario > 35200 && $salario <= 60000) {
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioAUX = $salario - 35200;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.63);
        } else if ($salario > 60000 && $salario <= 300000) {
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioIRPF = $salarioIRPF + (24800 * 0.63);
            $salarioAUX = $salario - 60000;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.55);
        } else if ($salario > 300000) {
            $salarioIRPF = $salarioIRPF + (7750 * 0.76);
            $salarioIRPF = $salarioIRPF + (15000 * 0.70);
            $salarioIRPF = $salarioIRPF + (24800 * 0.63);
            $salarioIRPF = $salarioIRPF + (240000 * 0.55);
            $salarioAUX = $salario - 300000;
            $salarioIRPF = $salarioIRPF + ($salarioAUX * 0.53);
        }
        return $salarioIRPF;
    }
    echo "<br>";
    echo calcularIRPF(48000);
    ?>

</body>

</html>