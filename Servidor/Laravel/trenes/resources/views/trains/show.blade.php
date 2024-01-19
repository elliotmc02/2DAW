<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tren</title>
</head>
<body>
    <h1>Mi tren</h1>
    <a href="{{ route('trains.index') }}">Trenes</a>
    <a href="{{ route('train_types.index') }}">Tipos de trenes</a>
    <a href="{{ route('tickets.index') }}">Tickets</a>
    <a href="{{ route('ticket_types.index') }}">Tipos de tickets</a><br>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pasajeros</th>
                <th>Año</th>
                <th>Tipo de tren</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $train->name }}</td>
                <td>{{ $train->passengers }}</td>
                <td>{{ $train->year }}</td>
                <td>{{ $train->train_type->type }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>