<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "funciones.php"; ?>
</head>

<body>
    <form action="" method="post">
        <fieldset>
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
</body>

</html>