<?php
$_servername = "localhost";
$_username = "root";
$_password = "m3d4c";
$_database = "db_usuarios";

$conexion = new mysqli($_servername, $_username, $_password, $_database) or die("Conexion fallida");
?>