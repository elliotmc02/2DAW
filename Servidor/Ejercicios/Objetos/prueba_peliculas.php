<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "pelicula.php" ?>
</head>

<body>
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
                $pelicula1 = new Pelicula(1, "Spiderman", "2020-01-01", "7");
                $pelicula2 = new Pelicula(2, "Batman", "2022-03-04", "12");
                $pelicula3 = new Pelicula(3, "Superman", "2015-09-12", "3");

                $peliculas = array($pelicula1, $pelicula2, $pelicula3);

                foreach ($peliculas as $pelicula) {
                    echo "<tr class='table-info'>";
                    echo "<td>" . $pelicula->id_pelicula . "</td>";
                    echo "<td>" . $pelicula->titulo . "</td>";
                    echo "<td>" . $pelicula->fecha_estreno . "</td>";
                    echo "<td>" . $pelicula->edad_recomendada . "</td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </div>

</body>

</html>