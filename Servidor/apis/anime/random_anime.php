<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random anime</title>
</head>

<body>
    <?php
    $apiUrl = "https://api.jikan.moe/v4/random/anime";

    $curl = curl_init($apiUrl);
    // curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);
    $anime = $array['data'];
    $titulo = $anime['title'];
    $titulo_jap = $anime['title_japanese'];
    $imagen = $anime['images']['jpg']['image_url'];
    ?>
    <h1>
        <?php echo $titulo_jap ?>
    </h1>
    <h2>
        <?php echo $titulo ?>
    </h2>
    <p>Edad recomendada:
        <?php echo $anime['rating'] ?>
    </p>
    <p>Tipo:
        <?php echo $anime['type'] ?>
    </p>
    <img src="<?php echo $imagen ?>" alt="">
</body>

</html>