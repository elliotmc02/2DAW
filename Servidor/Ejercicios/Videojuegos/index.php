<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'db_videojuegos.php'; ?>
</head>

<body>
    <?php require 'nav.php' ?>

    <div class="container mt-3">
        <form action="" method="post">
            <div class="row">
                <div class="col-4">
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-4">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <select class="form-select" name="campo">
                        <option value="titulo">Titulo</option>
                        <option value="distribuidora">Distribuidora</option>
                        <option value="precio">Precio</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select" name="orden">
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                </div>
                <div class="col-1">
                    <input class="form-control" type="text" name="r1">
                </div>
                <div class="col-1">
                    <input class="form-control" type="text" name="r2">
                </div>
                <div class="col-4">
                    <?php
                    $sql = $_conexion->prepare("SELECT DISTINCT distribuidora FROM videojuegos");
                    $sql->execute();
                    $resultado = $sql->get_result();
                    while ($fila = $resultado->fetch_assoc()) {
                    ?>
                        <label><?php echo $fila["distribuidora"] ?></label>
                        <input type="checkbox" name="distribuidoras[]" value="<?php echo $fila["distribuidora"] ?>">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Distribuidora</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $sql = $_conexion->prepare("SELECT * from videojuegos");
                } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nombre = $_POST["titulo"];
                    $campo = $_POST["campo"];
                    $orden = $_POST["orden"];
                    $busqueda = $campo == "distribuidora" ? "titulo" : "titulo";
                    $distribuidoras = $_POST["distribuidoras"] ?? false;
                    $seleccionadas = "";
                    if ($distribuidoras != "") {
                        $seleccionadas = "and distribuidora IN (" . rtrim(str_repeat("?,", count($distribuidoras)), ",") . ")";
                    }
                    $r1 = empty($_POST["r1"]) ? 0 : $_POST["r1"];
                    $r2 = empty($_POST["r2"]) ? PHP_FLOAT_MAX : $_POST["r2"];
                    $sql = $_conexion->prepare("SELECT * FROM videojuegos WHERE $busqueda LIKE CONCAT('%',?, '%') and precio BETWEEN ? and ? $seleccionadas ORDER BY $campo $orden");
                    !$distribuidoras ? $sql->bind_param("sdd", $nombre, $r1, $r2) : $sql->bind_param("sdd" . str_repeat("s", count($distribuidoras)), $nombre, $r1, $r2, ...$distribuidoras);
                }
                $sql->execute();
                $resultado = $sql->get_result();
                $_conexion->close();

                while ($fila = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $fila["titulo"] ?></td>
                        <td><?php echo $fila["distribuidora"] ?></td>
                        <td><?php echo $fila["precio"] ?></td>
                        <td>
                            <form action="view_videogame.php" method="get">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>