<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View comic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'database.php'; ?>
</head>

<body>
    <?php require 'nav.php' ?>
    <?php
    if (!isset($_GET["id"])) header('location: ./');
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = $_conexion->prepare("SELECT * from comics WHERE id_comic = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $resultado = $sql->get_result();
        $fila = $resultado->fetch_assoc();

        $_conexion->close();
        $titulo = $fila["titulo_comic"];
        $paginas = $fila["paginas"];
        $genero = $fila["genero"];
    }

    ?>
    <div class="container">
        <h1>View comic</h1>
        <h3><?php echo $titulo ?></h3>
        <h3><?php echo $paginas ?></h3>
        <h3><?php echo $genero ?></h3>
        <form action="edit_comic.php" method="get">
            <input type="hidden" name="id" value="<?php echo $fila['id_comic'] ?>">
            <input class="btn btn-success" type="submit" value="Editar">
        </form>
        <a class="btn btn-secondary" href="./">Volver</a>
    </div>
</body>

</html>