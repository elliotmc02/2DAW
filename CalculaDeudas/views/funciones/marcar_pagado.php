<?php
require "../../util/database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["idDeuda"];
    $sql = $_conexion->prepare("SELECT pagado FROM deudas WHERE idDeuda = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $checked = $sql->get_result()->fetch_assoc()["pagado"] == 0 ? 1 : 0;
    $sql = $_conexion->prepare("UPDATE deudas SET pagado = ? WHERE idDeuda = ?");
    $sql->bind_param("ii", $checked, $id);
    $sql->execute();
    $_conexion->close();
    header("location: ../../");
}
