<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "anadir_deuda" || $_POST["action"] == "solicitar_deuda") {
        $correcto = false;
        $mensajes = [];
        if (isset($_POST["elegido"])) {

            $temp_elegido = depurar($_POST["elegido"]);
            $temp_cantidad = depurar($_POST["cantidad"]);
            $temp_descripcion = depurar($_POST["descripcion"]);

            $usuarios = [];
            $sql = $_conexion->prepare("SELECT usuario FROM usuarios WHERE usuario != ?");
            $sql->bind_param("s", $usuario);

            if ($sql->execute()) {
                $resultado = $sql->get_result();
                while ($fila = $resultado->fetch_assoc()) {
                    array_push($usuarios, $fila["usuario"]);
                }
            }

            if (strlen($temp_elegido) == 0) {
                array_push($mensajes, "El usuario es obligatorio");
            } elseif (!in_array($temp_elegido, $usuarios)) {
                array_push($mensajes, "El usuario no existe");
            } elseif ($temp_elegido == $usuario) {
                array_push($mensajes, "No puedes añadirte una deuda a ti mismo");
            } else {
                $elegido = $temp_elegido;
            }

            if (strlen($temp_cantidad) == 0) {
                array_push($mensajes, "La cantidad es obligatoria");
            } elseif (!is_numeric($temp_cantidad)) {
                array_push($mensajes, "La cantidad debe ser un número");
            } elseif ($temp_cantidad < 0 || $temp_cantidad > 99999.99) {
                array_push($mensajes, "La cantidad debe estar entre 0 y 99999.99");
            } else {
                $cantidad = $temp_cantidad;
            }

            if (strlen($temp_descripcion) == 0) {
                array_push($mensajes, "La descripción es obligatoria");
            } elseif (strlen($temp_descripcion) > 255) {
                array_push($mensajes, "La descripción no puede tener más de 255 caracteres");
            } else {
                $descripcion = $temp_descripcion;
            }

            if (empty($mensajes) && isset($elegido) && isset($cantidad) && isset($descripcion)) {
                $sql = $_conexion->prepare("INSERT INTO deudas (usuario, receptor, cantidad, descripcion, creador) VALUES (?, ?, ?, ?, ?)");
                $sql_notificacion = $_conexion->prepare("INSERT INTO notificaciones (emisor, receptor, mensaje) VALUES (?, ?, ?)");

                if ($_POST["action"] == "anadir_deuda") {
                    $sql->bind_param("ssdss", $usuario, $elegido, $cantidad, $descripcion, $usuario);
                    $mensaje_notificaciones = "Ha creado una deuda en la que te debe " . $cantidad . " € con la descripción: " . $descripcion . ".";
                } elseif ($_POST["action"] == "solicitar_deuda") {
                    $sql->bind_param("ssdss", $elegido, $usuario, $cantidad, $descripcion, $usuario);
                    $mensaje_notificaciones = "Te ha solicitado una deuda en la que le debes " . $cantidad . " € con la descripción: " . $descripcion . ".";
                }

                $sql_notificacion->bind_param("sss", $usuario, $elegido, $mensaje_notificaciones);
                if ($sql->execute()) {
                    $correcto = true;
                    $mensajes = ["Deuda añadida con éxito"];
                    $sql_notificacion->execute();
                } else {
                    $mensajes = ["Ha ocurrido un error"];
                }
            }
        } else {
            $mensajes = ["Debes elegir a un usuario"];
        }
    }
}
