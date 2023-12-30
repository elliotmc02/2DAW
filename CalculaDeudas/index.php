<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Deudas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="views/styles/style.css">

    <script src="views/scripts/form.js"></script>

    <?php require 'util/database.php'; ?>
    <?php require_once 'views/objetos/deuda.php' ?>
    <?php require_once 'views/funciones/funciones.php' ?>
</head>

<body>
    <?php
    // TODO: Ajustes de cuenta (Cambiar nombre, contraseña)
    session_start();

    if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])) {
        $usuario = $_SESSION["usuario"];
        $rol = $_SESSION["rol"];
    } else {
        header("Location: views/login.php");
        exit();
    }
    ?>
    <?php require 'views/funciones/realizar_deuda.php' ?>
    <?php require 'views/nav.php'; ?>
    <main>
        <h3 class="bienvenido">Bienvenido, moroso <?php echo $usuario; ?></h3>
        <?php if (isset($mensajes)) {
        ?>
            <div class="container alert <?php if ($correcto) {
                                            echo "alert-success";
                                        } else {
                                            echo "alert-danger";
                                        }   ?> alert-dismissible fade show" role="alert">
                <ul class="mensajes-error">
                    <?php
                    foreach ($mensajes as $mensaje) {
                    ?>
                        <li><?php echo $mensaje; ?></li>
                    <?php
                    }
                    ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <div class="contenedor">
            <div class="right-pos">
                <div class="formularios_deudas filtrar">
                    <h4>Filtrar resultados</h4>
                    <form action="" method="post">
                        <input class="control" type="text" name="usuario" placeholder="Buscar usuario">
                        <select class="control" name="campo">
                            <option value="receptor">Nombre</option>
                            <option value="cantidad">Cantidad</option>
                            <option value="fecha">Fecha</option>
                            <option value="pagado">Pagado</option>
                        </select>
                        <select class="control" name="orden">
                            <option value="ASC">A-Z</option>
                            <option value="DESC">Z-A</option>
                        </select>
                        <input type="hidden" name="action" value="filtrar">
                        <input class="boton filter" type="submit" value="Filtrar">
                    </form>
                </div>
            </div>
            <h2 class="titulo">Deudas a pagar</h2>
            <div class="contenedor-tabla">
                <div class="formularios_deudas">
                    <h4>Añadir deuda</h4>
                    <form action="" method="post">
                        <label>Receptor:</label>
                        <select class="control" name="elegido">
                            <option value="" selected disabled>Seleccione a un usuario</option>
                            <?php
                            $sql = $_conexion->prepare("SELECT usuario FROM usuarios WHERE usuario != ?");
                            $sql->bind_param("s", $usuario);
                            if ($sql->execute()) {
                                $resultado = $sql->get_result();
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $fila["usuario"] ?>"><?php echo $fila["usuario"] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <label>Cantidad:</label>
                        <input class="control" type="text" name="cantidad">
                        <label>Motivo:</label>
                        <input class="control" type="text" name="descripcion">
                        <input type="hidden" name="action" value="anadir_deuda">
                        <input class="boton warning" type="submit" value="Añadir">
                    </form>
                </div>
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Creado por</th>
                            <th>Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" ||  $_POST["action"] == "anadir_deuda" || $_POST["action"] == "solicitar_deuda") {
                            $sql = $_conexion->prepare("SELECT * from deudas WHERE usuario = ?");
                            $sql->bind_param("s", $usuario);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "filtrar") {
                            $busqueda = $_POST["usuario"];
                            $campo = $_POST["campo"];
                            $orden = $_POST["orden"];
                            $sql = $_conexion->prepare("SELECT * FROM deudas WHERE receptor LIKE CONCAT('%', ?, '%') and usuario = ? ORDER BY $campo $orden");
                            $sql->bind_param("ss", $busqueda, $usuario);
                        }
                        $sql->execute();
                        $deudas = [];
                        $resultado = $sql->get_result();
                        if ($resultado->num_rows === 0) {
                        ?>
                            <tr>
                                <td colspan="6">No tienes deudas pendientes</td>
                            </tr>
                            <?php
                        } else {
                            while ($fila = $resultado->fetch_assoc()) {
                                $nueva_deuda = new Deuda(
                                    $fila["idDeuda"],
                                    $fila["usuario"],
                                    $fila["receptor"],
                                    $fila["cantidad"],
                                    $fila["descripcion"],
                                    $fila["fecha"],
                                    $fila["pagado"],
                                    $fila["creador"]
                                );
                                array_push($deudas, $nueva_deuda);
                            }

                            foreach ($deudas as $deuda) {
                            ?>
                                <tr>
                                    <td><?php echo $deuda->receptor; ?></td>
                                    <td><?php echo $deuda->cantidad; ?> €</td>
                                    <td><?php echo $deuda->descripcion; ?></td>
                                    <td><?php echo $deuda->fecha; ?></td>
                                    <td><?php echo $deuda->creador; ?></td>
                                    <td class="<?php echo $deuda->pagado ? 'text-success fw-bold' : 'text-danger fw-bold' ?>"><?php echo $deuda->pagado ? "SI" : "NO"; ?></td>
                                    <td>
                                        <form action="views/funciones/marcar_pagado.php" method="post">
                                            <input type="hidden" name="idDeuda" value="<?php echo $deuda->idDeuda ?>">
                                            <input type="checkbox" name="checkboxPagado" class="checkboxPagado" <?php echo $deuda->pagado ? 'checked' : '' ?>>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <th colspan="2">Total</th>
                        </tr>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "GET" ||  $_POST["action"] == "anadir_deuda" || $_POST["action"] == "solicitar_deuda") {
                                $sql = $_conexion->prepare("SELECT receptor, sum(cantidad) as total FROM deudas where usuario = ? and pagado = 0 GROUP BY receptor");
                                $sql->bind_param("s", $usuario);
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "filtrar") {
                                $busqueda = $_POST["usuario"];
                                $campo = $_POST["campo"];
                                $orden = $_POST["orden"];
                                $campo = in_array($campo, ["receptor", "cantidad"]) ? $campo : "receptor";
                                $campo = $campo == 'cantidad' ? 'total' : $campo;
                                $sql = $_conexion->prepare("SELECT receptor, sum(cantidad) as total FROM deudas WHERE receptor LIKE CONCAT('%', ?, '%') and usuario = ? and pagado = 0 GROUP BY receptor ORDER BY $campo $orden");
                                $sql->bind_param("ss", $busqueda, $usuario);
                            }
                            $sql->execute();
                            $resultado = $sql->get_result();
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <th><?php echo $fila["receptor"]; ?></th>
                                <th><?php echo $fila["total"]; ?> €</th>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="contenedor">
            <h2 class="titulo">Deudas a recibir</h2>
            <div class="contenedor-tabla">
                <div class="formularios_deudas">
                    <h4>Solicitar deuda</h4>
                    <form action="" method="post">
                        <label>Moroso:</label>
                        <select class="control" name="elegido">
                            <option value="" selected disabled>Seleccione a un moroso</option>
                            <?php
                            $sql = $_conexion->prepare("SELECT usuario FROM usuarios WHERE usuario != ?");
                            $sql->bind_param("s", $usuario);
                            if ($sql->execute()) {
                                $resultado = $sql->get_result();
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $fila["usuario"] ?>"><?php echo $fila["usuario"] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <label>Cantidad:</label>
                        <input class="control" type="text" name="cantidad">
                        <label>Motivo:</label>
                        <input class="control" type="text" name="descripcion">
                        <input type="hidden" name="action" value="solicitar_deuda">
                        <input class="boton warning" type="submit" value="Añadir">
                    </form>
                </div>
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Creado por</th>
                            <th>Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "GET" || $_POST["action"] == "anadir_deuda" || $_POST["action"] == "solicitar_deuda") {
                            $sql = $_conexion->prepare("SELECT * from deudas WHERE receptor = ?");
                            $sql->bind_param("s", $usuario);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "filtrar") {
                            $busqueda = $_POST["usuario"];
                            $campo = $_POST["campo"];
                            $orden = $_POST["orden"];

                            $campo = ($campo == 'receptor') ? 'usuario' : $campo;

                            $sql = $_conexion->prepare("SELECT * FROM deudas WHERE receptor = ? and usuario LIKE CONCAT('%', ?, '%') ORDER BY $campo $orden");
                            $sql->bind_param("ss", $usuario, $busqueda);
                        }
                        $sql->execute();
                        $deudas = [];
                        $resultado = $sql->get_result();
                        if ($resultado->num_rows === 0) {
                        ?>
                            <tr>
                                <td colspan="6">No tienes deudas a recibir</td>
                            </tr>
                            <?php
                        } else {
                            while ($fila = $resultado->fetch_assoc()) {
                                $nueva_deuda = new Deuda(
                                    $fila["idDeuda"],
                                    $fila["usuario"],
                                    $fila["receptor"],
                                    $fila["cantidad"],
                                    $fila["descripcion"],
                                    $fila["fecha"],
                                    $fila["pagado"],
                                    $fila["creador"]
                                );
                                array_push($deudas, $nueva_deuda);
                            }
                            foreach ($deudas as $deuda) {
                            ?>
                                <tr>
                                    <td><?php echo $deuda->usuario; ?></td>
                                    <td><?php echo $deuda->cantidad; ?> €</td>
                                    <td><?php echo $deuda->descripcion; ?></td>
                                    <td><?php echo $deuda->fecha; ?></td>
                                    <td><?php echo $deuda->creador; ?></td>
                                    <td class="<?php echo $deuda->pagado ? 'text-success fw-bold' : 'text-danger fw-bold' ?>"><?php echo $deuda->pagado ? "SI" : "NO"; ?></td>
                                    <td>
                                        <form action="views/funciones/marcar_pagado.php" method="post">
                                            <input type="hidden" name="idDeuda" value="<?php echo $deuda->idDeuda ?>">
                                            <input type="checkbox" name="checkboxPagado" class="checkboxPagado" <?php echo $deuda->pagado ? 'checked' : '' ?>>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <th colspan="2">Total</th>
                        </tr>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "GET" ||  $_POST["action"] == "anadir_deuda" || $_POST["action"] == "solicitar_deuda") {
                                $sql = $_conexion->prepare("SELECT usuario, sum(cantidad) as total FROM deudas WHERE receptor = ? and pagado = 0 GROUP BY usuario");
                                $sql->bind_param("s", $usuario);
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "filtrar") {
                                $busqueda = $_POST["usuario"];
                                $campo = $_POST["campo"];
                                $orden = $_POST["orden"];
                                $campo = in_array($campo, ["receptor", "cantidad"]) ? $campo : "receptor";
                                $campo = ($campo == 'receptor') ? 'usuario' : (($campo == 'cantidad') ? 'total' : $campo);
                                $sql = $_conexion->prepare("SELECT usuario, sum(cantidad) as total FROM deudas WHERE receptor = ? and usuario LIKE CONCAT('%', ?, '%') and pagado = 0 GROUP BY usuario ORDER BY $campo $orden");
                                $sql->bind_param("ss", $usuario, $busqueda);
                            }
                            $sql->execute();
                            $resultado = $sql->get_result();
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <th><?php echo $fila["usuario"]; ?></th>
                                <th><?php echo $fila["total"]; ?> €</th>
                            </tr>
                    <?php
                            }
                        }
                        $_conexion->close();
                    ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>