<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $matriz = [[]];
    $array1 = [];
    $array2 = [];
    for ($i = 0; $i < 10; $i++) {
        $array1[$i] = rand(1, 10);
        $array2[$i] = rand(10, 100);
    }
    $matriz[0] = $array1;
    $matriz[1] = $array2;
    ?>
    <table>
        <?php
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>" . $matriz[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    $max;
    $min;
    $media;
    for ($i = 0; $i < count($matriz); $i++) {
        $media = 0;
        $max = PHP_INT_MIN;
        $min = PHP_INT_MAX;
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            if ($matriz[$i][$j] < $min) {
                $min = $matriz[$i][$j];
            }
            if ($matriz[$i][$j] > $max) {
                $max = $matriz[$i][$j];
            }
            $media += $matriz[$i][$j];
        }
        $media /= count($matriz[$i]);
        echo "<h4>Minimo array " . $i + 1 . ": " . $min . "</h4>";
        echo "<h4>Maximo array " . $i + 1 . ": " . $max . "</h4>";
        echo "<h4>Media array " . $i + 1 . ": " . $media . "</h4>";
    }
    ?>
</body>

</html>