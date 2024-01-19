<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar ticket</title>
</head>

<body>
    <a href="{{ route('trains.index') }}">Trenes</a>
    <a href="{{ route('train_types.index') }}">Tipos de trenes</a>
    <a href="{{ route('tickets.index') }}">Tickets</a>
    <a href="{{ route('ticket_types.index') }}">Tipos de tickets</a><br>
    <form action="{{ route('tickets.update', ['ticket' => $ticket->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Fecha</label>
        <input type="text" name="date" value="{{ $ticket->date }}"><br>
        <label>Precio</label>
        <input type="text" name="price" value="{{ $ticket->price }}"><br>
        <label>Nombre del tren</label>
        <select name="train_id">
            <option selected hidden value="{{ $ticket->train_id }}">{{ $ticket->train->name }}</option>
            @foreach ($trains as $train)
                <option value="{{ $train->id }}">{{ $train->name }}
                </option>
            @endforeach
        </select><br>
        <label>Tipo de ticket</label>
        <select name="ticket_type_id">
            <option selected hidden value="{{ $ticket->ticket_type_id }}">{{ $ticket->ticket_type->type }}</option>
            @foreach ($ticket_types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}
                </option>
            @endforeach
        </select><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
