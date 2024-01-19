<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar tipo de tren</title>
</head>

<body>
    <a href="{{ route('trains.index') }}">Trenes</a>
    <a href="{{ route('train_types.index') }}">Tipos de trenes</a>
    <a href="{{ route('tickets.index') }}">Tickets</a>
    <a href="{{ route('ticket_types.index') }}">Tipos de tickets</a><br>
    <form action="{{ route('train_types.update', ['train_type' => $train_type->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Tipo de tren</label>
        <input type="text" name="type" value="{{ $train_type->type }}"><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
