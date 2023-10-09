<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<table><thead><tr><th>Tabla del " . $i . "</th></thead></tr><tbody>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<tr><td>" . $i . "x" . $j . " = " . $i * $j . "</td></tr>";
            }
            echo "</tbody></table>";
        }
        ?>
    </div>
</body>

</html>