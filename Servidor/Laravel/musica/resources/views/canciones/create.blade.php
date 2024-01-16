<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva cancion</title>
</head>

<body>
    <form action="{{ route('canciones.store') }}" method="post">
        @csrf
        <label>Titulo cancion</label>
        <input type="text" name="titulo_cancion">
        <label>Genero cancion</label>
        <input type="text" name="genero_cancion">
        <label>Duracion</label>
        <input type="text" name="duracion">
        <label>Artista</label>
        <select name="artista">
            @foreach ($artistas as $artista)
                <option value="{{ $artista->id }}">{{ $artista->nombre_artista }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
