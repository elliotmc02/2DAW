<?php

$HOST="localhost";
$USER="root";
$PASS="";
$DB="academia";

$conexion = new mysqli($HOST,$USER,$PASS,$DB);

if($conexion->connect_errno){
    $salida = "Fallor: ".$conexion->connect_error;
    echo json_encode($salida);
    exit();
}
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$apel = $_POST['apel'];
$edad = $_POST['edad'];


$consulta = "INSERT INTO alumnos (dni, nombre, apellidos,edad,exp_curso) VALUES ('$dni','$nombre', '$apel', '$edad', 'F1911AA')";

$resultado=$conexion->query($consulta);

if(!$resultado){
    $salida = "ERROR insertando valores:";
    
}
else{
    $salida = "Valores insertados correctamente: $nombre , $dni";
}

echo json_encode($salida);

?>