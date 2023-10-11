<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "../Funciones/muchas_funciones.php"; ?>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Potencia</legend>
            <label>Base</label>
            <br>
            <input type="text" required name="base">
            <br><br>
            <label>Exponente</label>
            <br>
            <input type="text" required name="exp">
            <br><br>
            <input type="hidden" name="action" value="potencia">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "potencia") {
                    $base = (int)$_POST["base"];
                    $exp = (int)$_POST["exp"];
                    echo "<h4>" . potencia($base, $exp) . "</h4>";
                }
            }
            ?>
        </fieldset>
    </form>
    <form action="" method="post">
        <fieldset>
            <legend>IVA</legend>
            <label for="">Cantidad</label>
            <br>
            <input type="number" step="0.1" name="numero" require min=0>
            <br>
            <label for="">Tipo de IVA</label>
            <br>
            <select name="tipoIVA">
                <option value="GENERAL">General</option>
                <option value="REDUCIDO">Reducido</option>
                <option value="SUPERREDUCIDO">Superreducido</option>
                <option value="SIN_IVA">Sin iva</option>
            </select>
            <br>
            <input type="hidden" name="action" value="iva">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "iva") {
                    $numero = $_POST["numero"];
                    if (empty($numero)) {
                        echo "<h3>Rellena el numero</h3>";
                    } else {
                        $tipoIVA = $_POST["tipoIVA"];
                        echo "<h3>" . precioConIVA($numero, $tipoIVA) . "</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <form action="" method="post">
        <fieldset>
            <legend>IRPF</legend>
            <label for="">Salario</label>
            <input type="number" step="1000" name="salario"><br><br>
            <input type="hidden" name="action" value="irpf">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "irpf") {
                    $salario = (float) $_POST["salario"];
                    echo calcularIRPF($salario);
                }
            }
            ?>
        </fieldset>
    </form>
    <form action="" method="post">
        <fieldset>
            <legend>Maximo 3 numeros</legend>
            <label for="">Numero 1</label>
            <input type="number" name="num1">
            <br>
            <label for="">Numero 2</label>
            <input type="number" name="num2">
            <br>
            <label for="">Numero 3</label>
            <input type="number" name="num3">
            <br>
            <input type="hidden" name="action" value="maximo3">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "maximo3") {
                    $num1 = (int)$_POST["num1"];
                    $num2 = (int)$_POST["num2"];
                    $num3 = (int)$_POST["num3"];
                    echo "<h3>" . comparar($num1, $num2, $num3) . "</h3>";
                }
            }
            ?>
        </fieldset>
    </form>
    <form action="" method="post">
        <fieldset>
            <legend>Primos</legend>
            <input type="number" name="numero">
            <br>
            <input type="hidden" name="action" value="primos">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "primos") {
                    $numero = (int)$_POST["numero"];
                    $array = calcularPrimo($numero);
                    echo "<br>";
                    foreach ($array as $primos) {
                        echo $primos . " ";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <form action="" method="post">
        <fieldset>
            <legend>Temperatura</legend>
            <input type="number" name="numero" min="0">
            <br>
            <div id="contenedorTemperatura">
                <div id="u1">
                    <input type="radio" name="u1" value="F">
                    <label for="">Fahrenheit</label>
                    <br>
                    <input type="radio" name="u1" value="C">
                    <label for="">Celsius</label>
                    <br>
                    <input type="radio" name="u1" value="K">
                    <label for="">Kelvin</label>
                </div>
                <div id="u2">
                    <input type="radio" name="u2" value="F">
                    <label for="">Fahrenheit</label>
                    <br>
                    <input type="radio" name="u2" value="C">
                    <label for="">Celsius</label>
                    <br>
                    <input type="radio" name="u2" value="K">
                    <label for="">Kelvin</label>
                    <br>
                </div>
            </div>

            <input type="hidden" name="action" value="temperatura">
            <input type="submit" value="Transformar">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "temperatura") {
                    if (isset($_POST["u1"]) && isset($_POST["u2"])) {
                        $numero = (float)$_POST["numero"];
                        if (!empty($numero)) {
                            $u1 = $_POST["u1"];
                            $u2 = $_POST["u2"];
                            echo "<h3>" . cambioTemperatura($numero, $u1, $u2) . "</h3>";
                        } else {
                            echo "<h3>Pon numero</h3>";
                        }
                    } else {
                        echo "<h3>elige unidad</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
</body>

</html>