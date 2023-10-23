<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
    ];

    for ($i = 0; $i < count($temperaturas); $i++) {
        $min = $temperaturas[$i][1];
        $max = $temperaturas[$i][2];
        $temperaturas[$i][] = ($min + $max) / 2;
    }   
    /* Con foreach
    foreach ($temperaturas as &$x) {
        $x[3] = ($x[1] + $x[2]) / 2;
    }
    */
    $temp_minima = array_column($temperaturas, 1);
    $nombre_ciudad = array_column($temperaturas, 0);

    array_multisort($temp_minima, SORT_ASC, $nombre_ciudad, SORT_ASC, $temperaturas);
    ?>
    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Temperatura minima</th>
                <th>Temperatura maxima</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($temperaturas as $ciudad) {
                list($nombre, $minima, $maxima, $media) = $ciudad;
                echo "<tr><td>" . $nombre . "</td><td>" . $minima . "</td><td>" . $maxima . "</td><td>" . $media . "</td></tr>";
            }
            $temp_media_min_total = intval(array_sum(array_column($temperaturas, 1)) / count($temperaturas));
            $temp_media_max_total = intval(array_sum(array_column($temperaturas, 2)) / count($temperaturas));

            echo "<caption>Temperatura minima media de todas las ciudades: " . $temp_media_min_total . "</caption>";
            echo "<caption>Temperatura maxima media de todas las ciudades: " . $temp_media_max_total . "</caption>";
            ?>

        </tbody>
    </table>
</body>

</html>