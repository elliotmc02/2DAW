<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "funciones.php"; ?>
</head>

<body>
    <form action="" method="post">
        <label for="">Producto: </label>
        <input type="text" name="nombre">
        <br>
        <label for="">Precio</label>
        <input type="number" name="precio">
        <br>
        <label for="">Cantidad</label>
        <input type="number" name="cantidad">
        <br>
        <input type="submit" value="Insertar">
    </form>
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $cantidad = $_POST["cantidad"];
            $array = [];
        }
        ?>
    </table>
</body>

</html>