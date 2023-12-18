<?php
require '../Confidencial/db_videojuegos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_GET["titulo"];
    $sql = $_conexion->prepare("DELETE FROM videojuegos WHERE titulo = ?");
    $sql->bind_param("s", $titulo);
    $sql->execute();
    $_conexion->close();
    header('location: ./');
}
