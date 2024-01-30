<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random dog</title>
</head>

<body>
    <?php
    $apiUrl = "https://dog.ceo/api/breeds/image/random";

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);
    ?>
    <img src="<?php echo $array['message'] ?>" alt="">
</body>

</html>