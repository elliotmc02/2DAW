<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = $_conexion->prepare("DELETE FROM comics WHERE id_comic = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $_conexion->close();
    header('location: ./');
}
