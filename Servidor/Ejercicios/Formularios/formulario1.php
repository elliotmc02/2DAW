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
        <label>Base</label>
        <br>
        <input type="text" required name="base">
        <br><br>
        <label>Exponente</label>
        <br>
        <input type="text" required name="exp">
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = (int)$_POST["base"];
        $exp = (int)$_POST["exp"];
        echo "<h4>" . potencia($base, $exp) . "</h4>";
    }
    ?>
</body>

</html>