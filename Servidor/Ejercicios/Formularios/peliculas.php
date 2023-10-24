<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "../Confidencial/db_peliculas.php" ?>
</head>

<body>
    <?php
    function depurar($entrada)
    {
        return trim(htmlspecialchars($entrada));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id_pelicula = depurar($_POST["id_pelicula"]);
        $temp_titulo = depurar($_POST["titulo"]);
        $temp_titulo = preg_replace("/[ ]{2,}/", ' ', $temp_titulo);
        $temp_fecha = depurar($_POST["fecha_estreno"]);
        $temp_edad = depurar($_POST["edad_recomendada"]);

        if (strlen($temp_id_pelicula) == 0) {
            $err_id = "El ID es obligatorio";
        } else {
            if (!is_numeric($temp_id_pelicula)) {
                $err_id = "El ID debe ser un numero";
            } else {
                if ($temp_id_pelicula < 0) {
                    $err_id = "No puede ser negativo";
                }
                if (strlen($temp_id_pelicula) > 8) {
                    $err_id = "El ID no puede tener mas de 8 caracteres";
                } else {
                    $id_pelicula = $temp_id_pelicula;
                }
            }
        }

        if (strlen($temp_titulo) == 0) {
            $err_titulo = "El titulo es obligatorio";
        } else {
            if (strlen($temp_titulo) > 80) {
                $err_titulo = "El titulo no puede tener mas de 80 caracteres";
            } else {
                $patron = "/^[A-Za-z0-9]*( [A-Za-z0-9]+)*$/";
                // $patron = "/^[a-zA-Z][z-zA-Z ]*[a-zA-Z]$/";
                if (!preg_match($patron, $temp_titulo)) {
                    $err_titulo = "El titulo solo pude contener letras, numeros o espacios en blanco";
                } else {
                    $titulo = $temp_titulo;
                }
            }
        }

        if (strlen($temp_fecha) == 0) {
            $err_fecha = "La fecha de estreno es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha);
            if ($anyo < 1895) {
                $err_fecha = "El año no puede ser menor de 1895";
            } else {
                $fecha_estreno = $temp_fecha;
            }
        }

        $edades = ["0", "3", "7", "12", "16", "18"];
        if (!in_array($temp_edad, $edades, true)) {
            $err_edad = "Seleccione una edad";
        } else {
            $edad_recomendada = $temp_edad;
        }
    }

    ?>
    <form action="" method="post">
        <fieldset>
            <label>ID pelicula:</label>
            <input type="number" name="id_pelicula">
            <?php if (isset($err_id)) echo "<label style='color: red;'>" . $err_id . "</label>" ?><br><br>
            <label>Titulo: </label>
            <input type="text" name="titulo">
            <?php if (isset($err_titulo)) echo "<label style='color: red;'>" . $err_titulo . "</label>" ?><br><br>
            <label>Fecha de estreno: </label>
            <input type="date" name="fecha_estreno">
            <?php if (isset($err_fecha)) echo "<label style='color: red;'>" . $err_fecha . "</label>" ?><br><br>
            <label>Edad recomendada: </label>
            <select name="edad_recomendada">
                <option value="">Seleccione una edad</option>
                <option value="0">0</option>
                <option value="3">3</option>
                <option value="7">7</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <?php if (isset($err_edad)) echo "<label style='color: red;'>" . $err_edad . "</label>" ?><br><br>
            <input type="submit" value="Enviar"><br><br>
        </fieldset>
    </form>
    <?php
    if (isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {
        echo "<h3>ID Pelicula: $id_pelicula</h3>";
        echo "<h3>Titulo: $titulo</h3>";
        echo "<h3>Fecha de estreno: $fecha_estreno</h3>";
        echo "<h3>Edad recomendada: $edad_recomendada</h3>";

        $sql = "INSERT INTO peliculas (id_pelicula, titulo, fecha_estreno, edad_recomendada) VALUES ('$id_pelicula', '$titulo', '$fecha_estreno', '$edad_recomendada')";

        $conexion->query($sql);
    }
    ?>
</body>

</html>