<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>index bebidas</h1>
    <h2>{{ $mensaje }}</h2>
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
