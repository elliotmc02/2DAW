<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artistas</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nombre artista</th>
                <th>Genero artista</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr>
                    <td>{{ $artista->nombre_artista }}</td>
                    <td>{{ $artista->genero_artista }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
