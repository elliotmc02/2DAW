<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>index platos</h1>
    <h2>{{ $mensaje }}</h2>

    <p>
        <a href="{{ route('platos.create') }}">Crear plato</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platos as $plato)
                <tr>
                    <td>{{ $plato->nombre }}</td>
                    <td>{{ $plato->precio }}</td>
                    <td>{{ $plato->tipo_plato->tipo }}</td>
                    <td>
                        <form action="{{ route('platos.show', ['plato' => $plato->id]) }}" method="get">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('platos.edit', ['plato' => $plato->id]) }}" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('platos.destroy', ['plato' => $plato->id]) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
