<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "../Confidencial/db_peliculas.php" ?>
    <?php require "../Objetos/producto.php" ?>
</head>

<body>
    <?php
    $sql = "SELECT * from peliculas";
    $resultado = $conexion->query($sql);
    $peliculas = [];

    while ($fila = $resultado->fetch_assoc()) {
        $nueva_pelicula = new Pelicula(
            $fila["id_pelicula"],
            $fila["titulo"],
            $fila["fecha_estreno"],
            $fila["edad_recomendada"]
        );
        array_push($peliculas, $nueva_pelicula);
    }
    ?>
    <div class="container">
        <h1>Listado de peliculas</h1>
        <table class="table table-striped table-hover table-bordered border-danger">
            <thead class="table-dark">
                <tr class="">
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Fecha de estreno</th>
                    <th>Edad recomendada</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($peliculas as $pelicula) {
                    echo "<tr class='table-info'>";
                    echo "<td>" . $pelicula->id_pelicula . "</td>";
                    echo "<td>" . $pelicula->titulo . "</td>";
                    echo "<td>" . $pelicula->fecha_estreno . "</td>";
                    echo "<td>" . $pelicula->edad_recomendada . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>