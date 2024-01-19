<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>
    <h1>Mi ticket</h1>
    <a href="{{ route('trains.index') }}">Trenes</a>
    <a href="{{ route('train_types.index') }}">Tipos de trenes</a>
    <a href="{{ route('tickets.index') }}">Tickets</a>
    <a href="{{ route('ticket_types.index') }}">Tipos de tickets</a><br>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Nombre del tren</th>
                <th>Tipo de ticket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ticket->date }}</td>
                <td>{{ $ticket->price }}</td>
                <td>{{ $ticket->train->name }}</td>
                <td>{{ $ticket->ticket_type->type }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>