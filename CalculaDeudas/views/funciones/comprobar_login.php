<?php
require_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["action"] == "iniciar_sesion") {
    $usuario = depurar($_POST["usuario"]);
    $contrasena = depurar($_POST["contrasena"]);

    $sql = $_conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $sql->bind_param("s", $usuario);

    if ($sql->execute()) {
      $resultado = $sql->get_result();

      if ($resultado->num_rows === 0) {
        $err_usuario = "El usuario no existe";
      } else {
        while ($fila = $resultado->fetch_assoc()) {
          $contrasena_cifrada = $fila["contrasena"];
          $rol = $fila["rol"];
        }
      }

      if (isset($contrasena_cifrada)) {
        $acceso_valido = password_verify($contrasena, $contrasena_cifrada);

        if ($acceso_valido) {

          $tiempo = time() + 60 * 60 * 24 * 7;
          setcookie("usuario", $usuario, $tiempo, "/");

          session_start();
          $_SESSION["usuario"] = $usuario;
          $_SESSION["rol"] = $rol;
          header('location: ../');
        } else {
          $err = "Usuario o contraseña incorrectos";
        }
      }
    }
  }
}
