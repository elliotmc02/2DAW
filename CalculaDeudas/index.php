<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Deudas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="views/styles/style.css">

    <?php require 'util/database.php'; ?>
    <?php require_once 'views/objetos/deuda.php' ?>
    <?php require_once 'views/funciones/funciones.php' ?>
</head>

<body>
    <?php
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
    <header>
        <nav class="mi-nav">
            <ul class="mi-nav-list mis-items">
                <li><a href="./">Ver Deudas</a></li>
                <li><a href="">Notificaciones</a></li>
            </ul>
            <ul class="mi-nav-list">
                <li><a class="texto-rojo" href="views/funciones/cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
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
            <h2 class="titulo">Deudas a pagar</h2>
            <div class="contenedor-tabla">
                <form action="" method="post">
                    <label>Receptor</label>
                    <select name="elegido">
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
                    <label>Cantidad</label>
                    <input class="control" type="text" name="cantidad">
                    <label>Motivo</label>
                    <input class="control" type="text" name="descripcion">
                    <input type="hidden" name="action" value="anadir_deuda">
                    <input class="boton" type="submit" value="Añadir">
                </form>
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
                        $sql = $_conexion->prepare("SELECT * from deudas WHERE usuario = ?");
                        $sql->bind_param("s", $usuario);
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
                                    <td><?php echo $deuda->pagado ? "Si" : "No"; ?></td>
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
                            $receptores_unicos = array_unique(array_column($deudas, "receptor"));
                            $total_por_receptor = [];
                            foreach ($receptores_unicos as $receptor) {
                                $sql = $_conexion->prepare("SELECT sum(cantidad) as total FROM deudas WHERE usuario = ? AND receptor = ?");
                                $sql->bind_param("ss", $usuario, $receptor);
                                $sql->execute();
                                $resultado = $sql->get_result();
                                $total = $resultado->fetch_assoc()["total"];
                                $total_por_receptor[$receptor] = $total;
                            }

                            foreach ($receptores_unicos as $receptor) {
                        ?>
                            <tr class="total">
                                <th><?php echo $receptor; ?></th>
                                <th><?php echo isset($total_por_receptor[$receptor]) ? $total_por_receptor[$receptor] . ' €' : '0 €'; ?></th>
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
                <form action="" method="post">
                    <label>Moroso</label>
                    <select name="elegido">
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
                    <label>Cantidad</label>
                    <input class="control" type="text" name="cantidad">
                    <label>Motivo</label>
                    <input class="control" type="text" name="descripcion">
                    <input type="hidden" name="action" value="solicitar_deuda">
                    <input class="boton" type="submit" value="Añadir">
                </form>
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
                        $sql = $_conexion->prepare("SELECT * from deudas WHERE receptor = ?");
                        $sql->bind_param("s", $usuario);
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
                                    <td><?php echo $deuda->pagado ? "Si" : "No"; ?></td>
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
                            $receptores_unicos = array_unique(array_column($deudas, "usuario"));
                            $total_por_receptor = [];
                            foreach ($receptores_unicos as $receptor) {
                                $sql = $_conexion->prepare("SELECT sum(cantidad) as total FROM deudas WHERE usuario = ? AND receptor = ?");
                                $sql->bind_param("ss", $receptor, $usuario);
                                $sql->execute();
                                $resultado = $sql->get_result();
                                $total = $resultado->fetch_assoc()["total"];
                                $total_por_receptor[$receptor] = $total;
                            }

                            foreach ($receptores_unicos as $receptor) {
                        ?>
                            <tr class="total">
                                <th><?php echo $receptor; ?></th>
                                <th><?php echo isset($total_por_receptor[$receptor]) ? $total_por_receptor[$receptor] . ' €' : '0 €'; ?></th>
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