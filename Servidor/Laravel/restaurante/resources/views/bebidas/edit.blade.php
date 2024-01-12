<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar bebida</title>
</head>

<body>
    <form action="{{ route('bebidas.update', ['bebida' => $bebida->id]) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $bebida->nombre }}">
        <label>Precio</label>
        <input type="text" name="precio" value="{{ $bebida->precio }}">
        <label>Tipo</label>
        <select name="tipo">
            <option value="{{ $bebida->tipo }}" selected hidden>{{ $bebida->tipo }}</option>
            <option value="Energetica">Energetica</option>
            <option value="Refresco">Refresco</option>
            <option value="Alcohol">Alcohol</option>
        </select>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
