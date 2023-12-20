<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'database.php'; ?>
</head>

<body>
    <?php require 'nav.php' ?>

    <div class="container mt-3">
        <form action="" method="post">
            <div class="row">
                <div class="col-4">
                    <input class="btn btn-primary" type="submit" value="Filtrar">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <input class="form-control" type="text" name="min" placeholder="Minimo paginas">
                </div>
                <div class="col-2">
                    <input class="form-control" type="text" name="max" placeholder="Maximo paginas">
                </div>
                <div class="col-4">
                <select class="form-control" name="genero">
                    <option value="">Todos</option>
                    <option value="Acción">Acción</option>
                    <option value="Aventuras">Aventuras</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedia">Comedia</option>
                </select>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Paginas</th>
                    <th>Genero</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $sql = $_conexion->prepare("SELECT * from comics");
                } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $genero = $_POST["genero"];
                    $min = empty($_POST["min"]) ? 0 : $_POST["min"];
                    $max = empty($_POST["max"]) ? PHP_INT_MAX : $_POST["max"];
                    $sql = $_conexion->prepare("SELECT * FROM comics WHERE genero LIKE CONCAT('%', ?, '%') and paginas BETWEEN ? and ?");

                    $sql->bind_param("sii", $genero, $min, $max);
                }
                $sql->execute();
                $resultado = $sql->get_result();
                $_conexion->close();

                while ($fila = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $fila["titulo_comic"] ?></td>
                        <td><?php echo $fila["paginas"] ?></td>
                        <td><?php echo $fila["genero"] ?></td>
                        <td>
                            <form action="view_comic.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $fila["id_comic"] ?>">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>
                        <td>
                            <form action="delete_comic.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $fila['id_comic'] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
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