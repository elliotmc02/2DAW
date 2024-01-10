<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo plato</title>
</head>

<body>
    <form action="{{ route('platos.store') }}" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label>Precio</label>
        <input type="text" name="precio">
        <label>Tipo</label>
        <select name="tipo">
            <option value="Racion">Racion</option>
            <option value="Media racion">Media racion</option>
            <option value="Tapa">Tapa</option>
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
