<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require 'database.php'; ?>
</head>

<body>
    <?php require 'nav.php' ?>
    <?php
    if (isset($_GET["id"])) {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            $sql = $_conexion->prepare("SELECT * from comics WHERE id_comic = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
            $resultado = $sql->get_result();
            $fila = $resultado->fetch_assoc();

            $titulo = $fila["titulo_comic"];
            $paginas = $fila["paginas"];
            $genero = $fila["genero"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $paginas = $_POST["paginas"];
        $genero = $_POST["genero"];

        $sql = $_conexion->prepare("UPDATE comics SET titulo_comic = ?, paginas = ?, genero = ? where id_comic = ?");
        $sql->bind_param("sisi", $titulo, $paginas, $genero, $id);
        $sql->execute();
        header('location: ./');
    }
    ?>

    <div class="container">
        <h1>Editar Comic</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo $titulo ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Paginas</label>
                <input class="form-control" type="text" name="paginas" value="<?php echo $paginas ?>">
            </div>
            <div class="mb-3">
                <label>Genero</label>
                <select class="form-control" name="genero">
                        <?php
                    $tipos_generos = ["Acción", "Aventuras", "Romance", "Comedia"];
                    foreach($tipos_generos as $tipo_genero) {
                        ?>
                        <option value="<?php echo $tipo_genero ?>"
                        <?php if ($genero == $tipo_genero) {
                            ?>
                            selected
                            <?php
                        }
                        ?>
                        ><?php echo $tipo_genero ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
                <a class="btn btn-secondary" href="./">Volver</a>
            </div>
        </form>
    </div>
</body>

</html>