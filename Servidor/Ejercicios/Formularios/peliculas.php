<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

        $temp_edad = isset($_POST["edad_recomendada"]) ? depurar($_POST["edad_recomendada"]) : "";

        // * Comprobar ID pelicula
        if (strlen($temp_id_pelicula) == 0) {
            $err_id = "El ID es obligatorio";
        } else {
            if (!is_numeric($temp_id_pelicula)) {
                $err_id = "El ID debe ser un numero";
            } else {
                if ($temp_id_pelicula < 0) {
                    $err_id = "No puede ser negativo";
                } else {
                    if (strlen($temp_id_pelicula) > 8) {
                        $err_id = "El ID no puede tener mas de 8 caracteres";
                    } else {
                        $id_pelicula = (int) $temp_id_pelicula;
                    }
                }
            }
        }

        // * Comprobar titulo
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

        // * Comprobar fecha
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

        // * Comprobar edad
        $edades = ["0", "3", "7", "12", "16", "18"];
        if (!in_array($temp_edad, $edades)) {
            $err_edad = "Seleccione una edad";
        } else {
            $edad_recomendada = $temp_edad;
        }
    }

    ?>
    <div class="container">
        <h1>Insertar pelicula</h1>
        <div class="col-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">ID pelicula:</label>
                    <input class="form-control" type="text" name="id_pelicula" placeholder="ID de la Pelicula">

                    <?php if (isset($err_id)) echo "<label style='color: red;'>" . $err_id . "</label>" ?>

                </div>
                <div class="mb-3">
                    <label class="form-label">Titulo: </label>
                    <input class="form-control" type="text" name="titulo" placeholder="Titulo">
                    <?php if (isset($err_titulo)) echo "<label style='color: red;'>" . $err_titulo . "</label>" ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de estreno: </label>
                    <input class="form-control" type="date" name="fecha_estreno">

                    <?php if (isset($err_fecha)) echo "<label style='color: red;'>" . $err_fecha . "</label>" ?>

                </div>
                <div class="mb-3">
                    <label class="form-label">Edad recomendada: </label>
                    <select class="form-select" name="edad_recomendada">
                        <option value="" disabled selected hidden>Seleccione una edad</option>
                        <option value="0">Todos los publicos</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>

                    <?php if (isset($err_edad)) echo "<label style='color: red;'>" . $err_edad . "</label>" ?>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {

        $duplicado = mysqli_query($conexion, "select * from peliculas where id_pelicula = '$id_pelicula'");
        if (mysqli_num_rows($duplicado) > 0) {
            echo "<h3>Error, el ID ya existe</h3>";
        } else {
            $sql = "INSERT INTO peliculas (id_pelicula, titulo, fecha_estreno, edad_recomendada) VALUES ('$id_pelicula', '$titulo', '$fecha_estreno', '$edad_recomendada')";
            $conexion->query($sql);
            echo "<h3>Datos enviados correctamente</h3>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>