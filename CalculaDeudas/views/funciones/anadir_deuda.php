<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "anadir_deuda") {
    if (isset($_POST["receptor"])) {
        $temp_receptor = depurar($_POST["receptor"]);
        $temp_cantidad = depurar($_POST["cantidad"]);
        $temp_descripcion = depurar($_POST["descripcion"]);
        $correcto = false;
        $mensaje = "";
        $usuarios = [];
        $sql = $_conexion->prepare("SELECT usuario FROM usuarios WHERE usuario != ?");
        $sql->bind_param("s", $usuario);
        if ($sql->execute()) {
            $resultado = $sql->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                array_push($usuarios, $fila["usuario"]);
            }
        }

        if (strlen($temp_receptor) == 0) {
            $mensaje .= "\nEl receptor es obligatorio";
        } else {
            if (!in_array($temp_receptor, $usuarios)) {
                $mensaje .= "\nEl receptor no existe";
            } else {
                if ($temp_receptor == $usuario) {
                    $mensaje .= "\nNo puedes añadirte una deuda a ti mismo";
                } else {
                    $receptor = $temp_receptor;
                }
            }
        }

        if (strlen($temp_cantidad) == 0) {
            $mensaje .= "\nLa cantidad es obligatoria";
        } elseif (!is_numeric($temp_cantidad)) {
            $mensaje .= "\nLa cantidad debe ser un número";
        } elseif ($temp_cantidad < 0) {
            $mensaje .= "\nLa cantidad no puede ser negativa";
        } elseif ($temp_cantidad > 99999.99) {
            $mensaje .= "\nLa cantidad no puede ser mayor de 99999.99";
        } else {
            $cantidad = $temp_cantidad;
        }

        if (strlen($temp_descripcion) == 0) {
            $mensaje .= "\nLa descripcion es obligatoria";
        } elseif (strlen($temp_descripcion) > 255) {
            $mensaje .= "\nLa descripcion no puede tener mas de 255 caracteres";
        } else {
            // $patron = "/^[A-Za-z0-9\s.,;:()\"\'!¡?¿+-@#$€]{1,255}$/";
            // if (!preg_match($patron, $temp_descripcion)) {
            //     $mensaje .= "\nLa descripcion solo puede contener letras, numeros, espacios en blanco y algunos digitos especiales.";
            // } else {
            $descripcion = $temp_descripcion;
        }

        if (isset($receptor) && isset($cantidad) && isset($descripcion)) {
            $sql = $_conexion->prepare("INSERT INTO deudas (usuario, receptor, cantidad, descripcion, creador) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("ssdss", $usuario, $receptor, $cantidad, $descripcion, $usuario);
            if ($sql->execute()) {
                $correcto = true;
                $mensaje = "Deuda añadida con éxito";
            } else {
                $mensaje = "Ha ocurrido un error";
            }
        }
    } else {
        $mensaje = "El receptor es obligatorio";
    }
}
