<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipo de ticket</title>
</head>
<body>
    <h1>Mi tipo de ticket</h1>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ticket_type->type }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>