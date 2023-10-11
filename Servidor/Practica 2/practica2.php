<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
    <link rel="stylesheet" href="css/style.css">
    <?php require "funciones.php"; ?>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Cambio Divisas</legend>
            <input type="number" name="numero" step="0.01">
            <br>
            <div class="contenedorDivisa">
                <div>
                    <input type="radio" name="d1" value="euros">
                    <label for="">Euros</label>
                    <br>
                    <input type="radio" name="d1" value="dolares">
                    <label for="">Dolares</label>
                    <br>
                    <input type="radio" name="d1" value="yenes">
                    <label for="">Yenes</label>
                </div>
                <div>
                    <input type="radio" name="d2" value="euros">
                    <label for="">Euros</label>
                    <br>
                    <input type="radio" name="d2" value="dolares">
                    <label for="">Dolares</label>
                    <br>
                    <input type="radio" name="d2" value="yenes">
                    <label for="">Yenes</label>
                    <br>
                </div>
            </div>
            <input type="hidden" name="action" value="divisas">
            <input type="submit" value="Cambiar">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "divisas") {
                    if (isset($_POST["d1"]) && isset($_POST["d2"])) {
                        $numero = (float)$_POST["numero"];
                        if (!empty($numero)) {
                            $d1 = $_POST["d1"];
                            $d2 = $_POST["d2"];
                            echo "<h3>" . cambiarDivisa($numero, $d1, $d2) . " " . $d2 . "</h3>";
                        } else {
                            echo "<h3>Introduce numero</h3>";
                        }
                    } else {
                        echo "<h3>Elige unidad</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>

    <h2>Ejercicio 2</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Sumatorio y Factorial</legend>
            <input type="number" name="numero">
            <br><br>
            <label for="">Tipo de operacion: </label>
            <select name="operacion">
                <option value="sum">Sumatorio</option>
                <option value="fac">Factorial</option>
            </select>
            <br><br>
            <input type="hidden" name="action" value="operacion">
            <input type="submit" value="Calcular">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "operacion") {
                    $numero = $_POST["numero"];
                    $tipo = $_POST["operacion"];
                    if ($numero < 0 && $tipo == "sum") {
                        echo "<h3>Introduce valores positivos<h3>";
                    } else if ($numero < 1 && $tipo == "fac") {
                        echo "<h3>Introduce valores igual o mayor a 1</h3>";
                    } else {
                        echo "<h3>" . tipoOperacion($numero, $tipo) . "</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>

    <h2>Ejercicio 3</h2>
    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
    ];
    ?>
    <form action="" method="post">
        <fieldset>
            <legend>Animales</legend>
            <h3>Buscar especie</h3>
            <label for="">Especie: </label>
            <input type="text" name="especie">
            <br><br>
            <input type="hidden" name="action" value="animales">
            <input type="submit" value="Comprobar">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["action"] == "animales") {
                    $especie = $_POST["especie"];
                    if (!empty($especie)) {
                        echo "<h3>" . buscarEspecie($especie, $animales) . "<h3>";
                    } else {
                        echo "<h3>Introduce un animal</h3>";
                    }
                }
            }
            ?>
        </fieldset>
    </form>
    <table>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Clase</th>
                <th>Ejemplares</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            generarTabla($animales);
            ?>
        </tbody>
    </table>
</body>

</html>