<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "solicitar_deuda") {
    if (isset($_POST["moroso"])) {
        $temp_moroso = depurar($_POST["moroso"]);
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

        if (strlen($temp_moroso) == 0) {
            $mensaje += "\nEl moroso es obligatorio";
        } else {
            if (!in_array($temp_moroso, $usuarios)) {
                $mensaje += "\nEl moroso no existe";
            } else {
                if ($temp_moroso == $usuario) {
                    $mensaje += "\nNo puedes añadirte una deuda a ti mismo";
                } else {
                    $moroso = $temp_moroso;
                }
            }
        }

        if (strlen($temp_cantidad) == 0) {
            $mensaje += "\nLa cantidad es obligatoria";
        } elseif (!is_numeric($temp_cantidad)) {
            $mensaje += "\nLa cantidad debe ser un número";
        } elseif ($temp_cantidad < 0) {
            $mensaje += "\nLa cantidad no puede ser negativa";
        } elseif ($temp_cantidad > 99999.99) {
            $mensaje += "\nLa cantidad no puede ser mayor de 99999.99";
        } else {
            $cantidad = $temp_cantidad;
        }

        if (strlen($temp_descripcion) == 0) {
            $mensaje += "\nLa descripcion es obligatoria";
        } elseif (strlen($temp_descripcion) > 255) {
            $mensaje += "\nLa descripcion no puede tener mas de 255 caracteres";
        } else {
            $patron = "/^[A-Za-z0-9\s.,;:]{1,255}$/";
            if (!preg_match($patron, $temp_descripcion)) {
                $mensaje += "\nLa descripcion solo pude contener letras, numeros o espacios en blanco";
            } else {
                $descripcion = $temp_descripcion;
            }
        }

        if (isset($moroso) && isset($cantidad) && isset($descripcion)) {
            $sql = $_conexion->prepare("INSERT INTO deudas (usuario, receptor, cantidad, descripcion, creador) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("ssdss", $moroso, $usuario, $cantidad, $descripcion, $usuario);
            if ($sql->execute()) {
                $correcto = true;
                $mensaje = "Deuda añadida con éxito";
            } else {
                $mensaje = "Ha ocurrido un error";
            }
        }
    }
}
