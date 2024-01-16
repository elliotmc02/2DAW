<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar cancion</title>
</head>

<body>
    <form action="{{ route('canciones.update', ['cancion' => $cancion->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Titulo cancion</label>
        <input type="text" name="titulo_cancion" value="{{ $cancion->titulo_cancion }}">
        <label>Genero cancion</label>
        <input type="text" name="genero_cancion" value="{{ $cancion->genero_cancion }}">
        <label>Duracion</label>
        <input type="text" name="duracion" value="{{ $cancion->duracion }}">
        <select name="artista">
            <option selected hidden value="{{ $cancion->artista_id }}">{{ $cancion->artista_cancion->nombre_artista }}
            </option>
            @foreach ($artistas as $artista)
                <option value="{{ $artista->id }}">{{ $artista->nombre_artista }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
