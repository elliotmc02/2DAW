<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>

<body>
    <?php
    $apiUrl = "http://localhost:8000/api/films";

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);

    $peliculas = $array['data'];

    foreach ($peliculas as $pelicula) {
        ?>
        <h1>
            <a href="show_pelicula.php?id=<?php echo $pelicula['id'] ?>">
                <?php echo $pelicula['title'] ?>
            </a>
        </h1>
        <?php
    }
    ?>
</body>

</html>