<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mi plato</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $plato->nombre }}</td>
                    <td>{{ $plato->precio }}</td>
                    <td>{{ $plato->tipo }}</td>
                </tr>
        </tbody>
    </table>
</body>

</html>
