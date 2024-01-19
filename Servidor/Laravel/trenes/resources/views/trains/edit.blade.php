<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar tren</title>
</head>

<body>
    <form action="{{ route('trains.update', ['train' => $train->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre del tren</label>
        <input type="text" name="name" value="{{ $train->name }}"><br>
        <label>Pasajeros</label>
        <input type="text" name="passengers" value="{{ $train->passengers }}"><br>
        <label>Año</label>
        <input type="text" name="year" value="{{ $train->year }}"><br>
        <label>Tipo de tren</label>
        <select name="train_type_id">
            <option selected hidden value="{{ $train->train_type_id }}">{{ $train->train_type->type }}</option>
            @foreach ($train_types as $type)
                <option value="{{ $type->id }}">{{ $type->type }}
                </option>
            @endforeach
        </select><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
