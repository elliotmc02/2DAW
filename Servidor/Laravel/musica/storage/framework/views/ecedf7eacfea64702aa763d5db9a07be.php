<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cancion</title>
</head>

<body>
    <h1>Mi cancion</h1>
    <table>
        <thead>
            <tr>
                <th>Titulo cancion</th>
                <th>Genero cancion</th>
                <th>Duracion</th>
                <th>Nombre artista</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($cancion->titulo_cancion); ?></td>
                <td><?php echo e($cancion->genero_cancion); ?></td>
                <td><?php echo e($cancion->duracion); ?></td>
                <td><?php echo e($cancion->artista_cancion->nombre_artista); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\musica\resources\views/canciones/show.blade.php ENDPATH**/ ?>