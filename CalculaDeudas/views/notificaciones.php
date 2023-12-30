<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/style.css">

    <?php require '../util/database.php'; ?>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])) {
        $usuario = $_SESSION["usuario"];
        $rol = $_SESSION["rol"];
    } else {
        header("Location: login.php");
        exit();
    }
    ?>
    <?php require 'nav.php'; ?>
    <main>
        <div class="container">
            <h2 class="mt-3">Notificaciones</h2>
            <div class="row">
                <div class="col-12">
                    <?php
                    $sql = $_conexion->prepare("SELECT * FROM notificaciones WHERE receptor = ?");
                    $sql->bind_param("s", $usuario);
                    $sql->execute();
                    $resultado = $sql->get_result();
                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                            <div class="card mt-4">
                                <div class="card-header">
                                    <p class="card-title"><?php echo $fila["emisor"]; ?></p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $fila["mensaje"]; ?></p>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-secondary" role="alert">
                            No tienes notificaciones
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>