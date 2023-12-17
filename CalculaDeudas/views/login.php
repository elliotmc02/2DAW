<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Iniciar Sesión</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Mi CSS -->
    <link rel="stylesheet" href="styles/style.css" />

    <!-- Logo Pagina -->
    <link rel="shortcut icon" href="images/logo_tn.png" />

    <!-- PHP links -->
    <?php require "../util/database.php" ?>
</head>

<body>
    <?php
    require "funciones/comprobar_login.php";
    ?>
    <div class="container-centro auth">
        <div class="container-hijo bg-dark">
            <h3 class="text-light text-center">Iniciar Sesión</h3>
            <div class="container-centro">
                <form class="text-light" action="" method="post">
                    <div class="grupo">
                        <label>Nombre de Usuario <span class="obligatorio">*</span></label>
                        <input class="control" type="text" name="usuario" />
                        <label class="text-danger"><?php if (isset($err_usuario)) echo $err_usuario ?></label>
                    </div>
                    <div class="grupo">
                        <label>Contraseña <span class="obligatorio">*</span></label>
                        <input class="control" type="password" name="contrasena" />
                        <label class="text-danger"><?php if (isset($err)) echo $err ?></label>
                    </div>
                    <div class="text-center mt-3">
                        <input type="hidden" name="action" value="iniciar_sesion">
                        <input class="boton" type="submit" value="Iniciar Sesión" />
                        <p class="sign-up">
                            No tienes cuenta?<a href="register.php"> Regístrate ya</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>