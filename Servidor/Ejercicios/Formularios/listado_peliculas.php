<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require "../Confidencial/db_peliculas.php" ?>
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
                $sql = "SELECT * from peliculas";
                $result = $conexion->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='table-info'>";
                        echo "<td>" . $row["id_pelicula"] . "</td>";
                        echo "<td>" . $row["titulo"] . "</td>";
                        echo "<td>" . $row["fecha_estreno"] . "</td>";
                        echo "<td>" . $row["edad_recomendada"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>