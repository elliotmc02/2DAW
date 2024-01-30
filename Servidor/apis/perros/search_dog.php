<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random anime</title>
</head>

<body>
    <?php
    $apiUrl = "https://dog.ceo/api/breeds/list/all";
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);
    $razas = $array['message'];
    ?>
    <form action="" method="post">
        <label>raza</label>
        <select name="raza">
            <?php
            foreach ($razas as $raza => $subrazas) {
                if (!empty($subrazas)) {
                    foreach ($subrazas as $subraza) {
            ?>
                        <option value="<?php echo $raza . '/' . $subraza ?>"><?php echo $raza . ' ' . $subraza ?></option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="<?php echo $raza ?>"><?php echo $raza ?></option>
            <?php
                }
            }
            ?>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $raza = $_POST['raza'];
        $apiUrl = "https://dog.ceo/api/breed/$raza/images/random";
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);
    }
    ?>
    <img src="<?php echo $array['message'] ?>" alt="">
</body>

</html>