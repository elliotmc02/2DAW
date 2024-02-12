<?php
$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "db_pruebajs";

$conexion = new mysqli($HOST, $USER, $PASS, $DB);

if ($conexion->connect_errno) {
    echo "Fallor: " . $conexion->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'])) {
        $nombre = strtoupper($_POST['nombre']);

        if ($nombre === "") {
            $valores = "Rellena todos los campos";
        } else {
            $sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";

            if ($conexion->query($sql)) {
                $valores = "Datos insertados correctamente";
            } else {
                $valores = "Error: " . $conexion->error;
            }
        }
    } else {
        $valores = "No vienes del sitio adecuado.";
    }
}

sleep(3);

$salida = json_encode($valores);

echo $salida;

$conexion->close();
