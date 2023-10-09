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
        <label for="">Numero 1</label>
        <input type="number" name="num1">
        <br>
        <label for="">Numero 2</label>
        <input type="number" name="num2">
        <br>
        <label for="">Numero 3</label>
        <input type="number" name="num3">
        <br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = (int)$_POST["num1"];
        $num2 = (int)$_POST["num2"];
        $num3 = (int)$_POST["num3"];
        echo "<h3>" . comparar($num1, $num2, $num3) . "</h3>";
    }
    ?>
</body>

</html>