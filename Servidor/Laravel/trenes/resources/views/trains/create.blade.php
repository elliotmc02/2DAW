<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tren</title>
</head>

<body>
    <a href="{{ route('trains.index') }}">Trenes</a>
    <a href="{{ route('train_types.index') }}">Tipos de trenes</a>
    <a href="{{ route('tickets.index') }}">Tickets</a>
    <a href="{{ route('ticket_types.index') }}">Tipos de tickets</a><br>
    <form action="{{ route('trains.store') }}" method="post">
        @csrf
        <label>Nombre del tren</label>
        <input type="text" name="name"><br>
        <label>Pasajeros</label>
        <input type="text" name="passengers"><br>
        <label>Año</label>
        <input type="text" name="year"><br>
        <label>Tipo de tren</label>
        <select name="train_type_id">
            @foreach ($train_types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}
                </option>
            @endforeach
        </select><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
