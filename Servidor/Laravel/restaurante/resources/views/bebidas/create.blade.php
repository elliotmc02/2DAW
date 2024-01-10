<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva bebida</title>
</head>

<body>
    <form action="{{ route('bebidas.store') }}" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label>Precio</label>
        <input type="text" name="precio">
        <label>Tipo</label>
        <select name="tipo">
            <option value="Energetica">Energetica</option>
            <option value="Refresco">Refresco</option>
            <option value="Alcohol">Alcohol</option>
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
