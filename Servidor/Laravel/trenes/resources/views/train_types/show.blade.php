<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipo de tren</title>
</head>
<body>
    <h1>Mi tipo de tren</h1>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $train_type->type }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>