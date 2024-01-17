<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de trenes</title>
</head>
<body>
    <h1>Todos los tipos de trenes</h1>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($train_types as $type)
                <tr>
                    <td>{{ $type->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>