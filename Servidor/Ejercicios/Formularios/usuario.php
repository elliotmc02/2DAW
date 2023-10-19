<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function depurar($entrada)
    {
        return trim(htmlspecialchars($entrada));
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_edad = depurar($_POST["edad"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellido = depurar($_POST["apellido"]);
        $temp_fecha = depurar($_POST["fecha"]);

        if (!strlen($temp_usuario) > 0) {
            $err_usuario = "El usuario es obligatorio";
        } else {
            $patron = "/^[a-zA-Z0-9]{4,8}$/";
            if (!preg_match($patron, $temp_usuario)) {
                $err_usuario = "El usuario debe tener entre 4 y 8 caracteres y contener letras o numeros";
            } else {
                $usuario = $temp_usuario;
                echo $usuario;
            }
        }

        if (!strlen($temp_nombre) > 0) {
            $err_nombre = "El nombre de usuario es obligatorio";
        } else {
            $patron = "/^([A-Za-z]*( [A-Za-z]+)*){2,30}$/";
            if (!preg_match($patron, $temp_nombre)) {
                $err_nombre = "El nombre debe tener entre 2 y 30 caracteres y contener letras";
            } else {
                $nombre = $temp_nombre;
                echo $nombre;
            }
        }
    }
    ?>
    <form action="" method="post">
        <fieldset>
            <label>Usuario: </label>
            <input type="text" name="usuario">
            <?php if (isset($err_usuario)) echo "<label style='color: red;'>" . $err_usuario . "</label>" ?><br><br>
            <label>Edad: </label>
            <input type="text" name="edad">
            <?php if (isset($err_edad)) echo "<label style='color: red;'>" . $err_edad . "</label>" ?><br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <?php if (isset($err_nombre)) echo "<label style='color: red;'>" . $err_nombre . "</label>" ?><br><br>
            <label>Apellidos: </label>
            <input type="text" name="apellido">
            <?php if (isset($err_apellido)) echo "<label style='color: red;'>" . $err_apellido . "</label>" ?><br><br>
            <label>Fecha de nacimiento: </label>
            <input type="date" name="fecha">
            <?php if (isset($err_fecha)) echo "<label style='color: red;'>" . $err_fecha . "</label>" ?><br><br>
            <input type="submit" value="Registrarse"><br><br>
        </fieldset>
    </form>
</body>

</html>