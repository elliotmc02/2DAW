<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random anime</title>
</head>

<body>
    <?php

    ?>
    <form action="" method="post">
        <input type="text" name="titulo">
        <select name="limite">
            <option value="">Todos</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label>Minimo</label>
        <select name="min">
            <option value="">Nada</option>
            <?php
            for ($i = 0; $i < 11; $i++) {
                ?>
                <option value="<?php echo $i ?>">
                    <?php echo $i ?>
                </option>
                <?php
            }
            ?>
        </select>
        <label>Maximo</label>
        <select name="max">
            <option value="">Nada</option>
            <?php
            for ($i = 0; $i < 11; $i++) {
                ?>
                <option value="<?php echo $i ?>">
                    <?php echo $i ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = urlencode($_POST["titulo"]);
        $limite = $_POST["limite"];
        $min = $_POST["min"];
        $max = $_POST["max"];
        $max = $max < $min ? $min : $max;
        echo $max;
        $apiUrl = "https://api.jikan.moe/v4/anime?q=$titulo&limit=$limite&min_score=$min&max_score=$max";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);
        $animes = $array['data'];

        foreach ($animes as $anime) {
            ?>
            <h1>
                <?php echo $anime['title']; ?>
            </h1>
            <h3>
                <?php echo $anime['score'] ?>
            </h3>
            <p>
                <a href="show_anime.php?id=<?php echo $anime['mal_id'] ?>">
                    Ver detalles
                </a>
            </p>
            <img src="<?php echo $anime['images']['jpg']['image_url'] ?>" alt="">
            <?php
        }
    }
    ?>
</body>

</html>