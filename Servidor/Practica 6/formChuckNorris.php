<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck norris</title>
</head>
<body>
    <?php
       $apiUrl = "https://api.chucknorris.io/jokes/categories";
       $curl = curl_init($apiUrl);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $respuesta = curl_exec($curl);
       $categorias = json_decode($respuesta, true);
    ?>
    <form action="" method="post">
        <select name="categoria">
            <?php
            foreach($categorias as $categoria) {
                ?>
                <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categoria = $_POST["categoria"];
        $apiUrl = "https://api.chucknorris.io/jokes/random?category=$categoria";
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $chiste = json_decode($respuesta, true);

        ?>
        <p><?php echo $chiste['value'] ?></p>
        <?php

       }
    ?>
</body>
</html>