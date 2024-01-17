<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Ticket</title>
</head>

<body>
    <form action="{{ route('tickets.store') }}" method="post">
        @csrf
        {{-- <label>Fecha</label>
        <input type="text" name="date"><br> --}}
        <label>Precio</label>
        <input type="text" name="price"><br>
        <label>Nombre del tren</label>
        <select name="train">
            @foreach ($trains as $train)
                <option value="{{ $train->id }}">{{ $train->name }}
                </option>
            @endforeach
        </select><br>
        <label>Tipo de ticket</label>
        <select name="type">
            @foreach ($ticket_types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}
                </option>
            @endforeach
        </select><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
