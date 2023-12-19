<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'db_videojuegos.php'; ?>
</head>

<body>
    <?php require 'nav.php' ?>
    <?php
    if (isset($_GET["titulo"])) {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $titulo = $_GET["titulo"];
            $sql = $_conexion->prepare("SELECT * from videojuegos WHERE titulo = ?");
            $sql->bind_param("s", $titulo);
            $sql->execute();
            $resultado = $sql->get_result();
            $fila = $resultado->fetch_assoc();

            $_conexion->close();
            $distribuidora = $fila["distribuidora"];
            $precio = $fila["precio"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo_antiguo"];
        $titulo_nuevo = $_POST["titulo"];
        $distribuidora = $_POST["distribuidora"];
        $precio = (float) $_POST["precio"];

        $sql = $_conexion->prepare("UPDATE videojuegos SET titulo = ?, distribuidora = ?, precio = ? where titulo = ?");
        $sql->bind_param("ssds", $titulo_nuevo, $distribuidora, $precio, $titulo);
        $sql->execute();
        header('location ./');
        $_conexion->close();
    }
    ?>

    <div class="container">
        <h1>Nuevo Videjuego</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input class="form-control" type="text" name="titulo" value="<?php if ($_SERVER["REQUEST_METHOD"] == "GET") echo $titulo ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Distribuidora</label>
                <input class="form-control" type="text" name="distribuidora" value="<?php if ($_SERVER["REQUEST_METHOD"] == "GET") echo $distribuidora ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php if ($_SERVER["REQUEST_METHOD"] == "GET") echo $precio ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="titulo_antiguo" value="<?php echo $titulo ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
        </form>
    </div>
</body>

</html>