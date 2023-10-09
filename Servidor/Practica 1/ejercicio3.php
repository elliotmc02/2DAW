<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $cuadrados_perfectos = [];
    for ($i = 1; count($cuadrados_perfectos) < 50; $i++) {
        $raiz = intval(sqrt($i));
        if ($raiz ** 2 == $i) {
            $cuadrados_perfectos[] = $i;
        }
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Cuadrado Perfecto</th>
                <th>Raiz cuadrada</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cuadrados_perfectos as $num) {
                echo "<tr><td>" . $num . "</td><td>" . sqrt($num) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>