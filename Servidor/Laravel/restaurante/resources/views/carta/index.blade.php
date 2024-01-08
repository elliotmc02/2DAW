<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>index carta</h1>
    <h2>{{ $mensaje }}</h2>
    <h1>Platos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platos as $plato)
                <tr>
                    <td>{{ $plato[0] }}</td>
                    <td>{{ $plato[1] }}</td>
                    <td>{{ $plato[2] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Bebidas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bebidas as $bebida)
                <tr>
                    <td>{{ $bebida[0] }}</td>
                    <td>{{ $bebida[1] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
