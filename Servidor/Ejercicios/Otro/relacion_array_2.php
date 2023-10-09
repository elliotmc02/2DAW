<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Crea un array que almacene nombres de productos y sus respectivos precios. Muestra en una tabla los productos con sus precios, ordenados alfabeticamente por el nombre del producto. Muestra tambien el precio total de los productos y cuantos productos hay en el array."</h3>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php
        $productos = [
            ["Pollo", 5],
            ["Yogur", 2],
            ["Jamon", 4]
        ];

        $nombre = array_column($productos, 0);
        array_multisort($nombre, SORT_ASC, $productos);

        foreach ($productos as $producto) {
            list($nombre, $precio) = $producto;
            echo "<tr><td>" . $nombre . "</td><td>" . $precio . "</td></tr>";
        }
        echo "<tr><td>Total: </td><td>" . count($productos) . "</td><td>" . array_sum(array_column($productos, 1)) . "</td></tr>";
        ?>
    </table>

    <h3>Modifica el array anterior para que ademas de los productos y sus precios almacene la cantidad que se ha comprado de cada producto. Muestra en una columna adicional el precio total de cada producto (producto x cantidad) y al final de la tabla el precio total de todos los productos comprados y la cantidad de productos adquiridos</h3>

    <h3>Crea un array que cotenga los numeros del 1 al 50. Elimina meidante un bucle y la funcion unset los numeros que sean divisibles entre 3</h3>
</body>

</html>