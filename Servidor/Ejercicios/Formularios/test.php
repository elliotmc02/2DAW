<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <input type="submit" value="Registrarse">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $sql = "INSERT INTO usuarios (usuario) VALUES ('$usuario')";
        $conexion->query($sql);
    }
    ?>
</body>

</html>