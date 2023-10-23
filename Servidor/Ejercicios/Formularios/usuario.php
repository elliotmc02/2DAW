<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "../Confidencial/db_usuarios.php" ?>
</head>

<body>
    <?php
    function depurar($entrada)
    {
        return trim(htmlspecialchars($entrada));
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellidos = depurar($_POST["apellidos"]);
        $temp_apellidos = preg_replace("/[ ]{2,}/", ' ', $temp_apellidos);
        $temp_fecha = depurar($_POST["fecha"]);

        if (strlen($temp_usuario) == 0) {
            $err_usuario = "El usuario es obligatorio";
        } else {
            $patron = "/^[a-zA-Z0-9]{4,8}$/";
            if (!preg_match($patron, $temp_usuario)) {
                $err_usuario = "El usuario debe tener entre 4 y 8 caracteres y contener letras o numeros";
            } else {
                $usuario = $temp_usuario;
            }
        }

        if (strlen($temp_nombre) == 0) {
            $err_nombre = "El nombre es obligatorio";
        } else {
            if (strlen($temp_nombre) > 30 || strlen($temp_nombre) < 2) {
                $err_nombre = "El nombre no puede tener mas de 30 caracteres o menos de 2";
            } else {
                $patron = "/^[A-Za-z]*( [A-Za-z]+)*$/";
                // $patron = "/^[a-zA-Z][z-zA-Z ]*[a-zA-Z]$/";
                if (!preg_match($patron, $temp_nombre)) {
                    $err_nombre = "El nombre solo pude contener letras o espacios en blanco";
                } else {
                    $temp_nombre = strtolower($temp_nombre);
                    $temp_nombre = ucwords($temp_nombre);
                    $nombre = $temp_nombre;
                }
            }
        }

        if (strlen($temp_apellidos) == 0) {
            $err_apellidos = "El appellido es obligatorio";
        } else {
            if (strlen($temp_apellidos) > 30 || strlen($temp_apellidos) < 2) {
                $err_apellidos = "El apellido no puede tener mas de 30 caracteres o menos de 2";
            } else {
                $patron = "/^[A-Za-z]*( [A-Za-z]+)*$/";
                // $patron = "/^[a-zA-Z][z-zA-Z ]*[a-zA-Z]$/";
                if (!preg_match($patron, $temp_apellidos)) {
                    $err_apellidos = "El apellido solo pude contener letras o espacios en blanco";
                } else {
                    $temp_apellidos = strtolower($temp_apellidos);
                    $temp_apellidos = ucwords($temp_apellidos);
                    $apellidos = $temp_apellidos;
                }
            }
        }

        if (strlen($temp_fecha) == 0) {
            $err_fecha = "La fecha de nacimiento es obligatoria";
        } else {
            $fecha_actual = date("Y-m-d");
            list($anyo_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
            list($anyo, $mes, $dia) = explode('-', $temp_fecha);
            if ($anyo_actual - $anyo > 18) {
                $fecha = $temp_fecha;
            } else if ($anyo_actual - $anyo < 18) {
                $err_fecha = "No puedes ser menor de edad";
            } else {
                if ($mes_actual - $mes < 0) {
                    $fecha = $temp_fecha;
                } else if ($mes_actual - $mes < 0) {
                    $err_fecha = "No puedes ser menor de edad";
                } else {
                    if ($dia_actual - $dia >= 0) {
                        $fecha = $temp_fecha;
                    } else {
                        $err_fecha = "No puedes ser menor de edad";
                    }
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <fieldset>
            <label>Usuario: </label>
            <input type="text" name="usuario">
            <?php if (isset($err_usuario)) echo "<label style='color: red;'>" . $err_usuario . "</label>" ?><br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <?php if (isset($err_nombre)) echo "<label style='color: red;'>" . $err_nombre . "</label>" ?><br><br>
            <label>Apellidos: </label>
            <input type="text" name="apellidos">
            <?php if (isset($err_apellidos)) echo "<label style='color: red;'>" . $err_apellidos . "</label>" ?><br><br>
            <label>Fecha de nacimiento: </label>
            <input type="date" name="fecha">
            <?php if (isset($err_fecha)) echo "<label style='color: red;'>" . $err_fecha . "</label>" ?><br><br>
            <input type="submit" value="Registrarse"><br><br>
        </fieldset>
    </form>
    <?php
    if (isset($usuario) && isset($nombre) && isset($apellidos) && isset($fecha)) {
        echo "<h3>Usuario: $usuario</h3>";
        echo "<h3>Nombre: $nombre</h3>";
        echo "<h3>Apellidos: $apellidos</h3>";
        echo "<h3>Fecha: $fecha</h3>";

        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, fecha_nacimiento) VALUES ('$usuario', '$nombre', '$apellidos', '$fecha')";

        $conexion->query($sql);
    }
    ?>
</body>

</html>