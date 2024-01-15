<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar plato</title>
</head>

<body>
    <form action="{{ route('platos.update', ['plato' => $plato->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $plato->nombre }}">
        <label>Precio</label>
        <input type="text" name="precio" value="{{ $plato->precio }}">
        <label>Tipo</label>
        <select name="tipo">
            <option selected hidden value="{{ $plato->tipo_plato_id }}">{{ $plato->tipo_plato->tipo }}</option>
            <option value="1">Racion</option>
            <option value="2">Media racion</option>
            <option value="3">Tapa</option>
        </select>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
