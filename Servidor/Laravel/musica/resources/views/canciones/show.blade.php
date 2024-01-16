<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cancion</title>
</head>

<body>
    <h1>Mi cancion</h1>
    <table>
        <thead>
            <tr>
                <th>Titulo cancion</th>
                <th>Genero cancion</th>
                <th>Duracion</th>
                <th>Nombre artista</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $cancion->titulo_cancion }}</td>
                <td>{{ $cancion->genero_cancion }}</td>
                <td>{{ $cancion->duracion }}</td>
                <td>{{ $cancion->artista_cancion->nombre_artista }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
