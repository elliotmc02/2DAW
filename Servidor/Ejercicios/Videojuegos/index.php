<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require '../Confidencial/db_videojuegos.php'; ?>
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
                    $busqueda = $_POST["titulo"];
                    $campo = $_POST["campo"];
                    $orden = $_POST["orden"];

                    $sql = $_conexion->prepare("SELECT * FROM videojuegos  WHERE titulo LIKE CONCAT('%',?, '%') ORDER BY $campo $orden");
                    $sql->bind_param("s", $busqueda);
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
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>