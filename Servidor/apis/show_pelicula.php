<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show pelicula</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $apiUrl = "http://localhost:8000/api/films/$id";

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);
    $pelicula = $array['data'];
    ?>
    <h1>
        <?php echo $pelicula['title'] ?>
    </h1>
    <p>Duracion:
        <?php echo $pelicula['duration'] ?>
    </p>
    <p>Edad recomendada:
        <?php echo $pelicula['age_rating'] ?>
    </p>
</body>

</html>