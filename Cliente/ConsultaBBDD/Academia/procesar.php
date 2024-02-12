<?php
//header('Content-Type: application/json; charset=utf-8');

if (isset($_POST['nombre']) && isset($_POST['clave'])) {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    


    if ($nombre === "" || $clave === "") {
        $valores = "Rellena todos los campos";
    } else {
        $nombre = utf8_encode(strtoupper($nombre));
        $clave = utf8_encode(strtoupper($clave));

        $valores = array($nombre, $clave);
    }

} else {
    $valores = "No vienes del sitio adecuado.";
}


sleep(3);
$salida = json_encode($valores);

echo $salida;



?>