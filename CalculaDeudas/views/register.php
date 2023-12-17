<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Registrarse</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Mi CSS -->
    <link rel="stylesheet" href="styles/style.css" />

    <!-- Logo Pagina -->
    <link rel="shortcut icon" href="images/logo_tn.png" />

    <!-- PHP links -->
    <?php require "../util/database.php" ?>
    <?php require 'funciones/funciones.php'; ?>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_contrasena = depurar($_POST["contrasena"]);
        $temp_repetirContrasena = depurar($_POST["repetirContrasena"]);

        // Validar usuario
        if (strlen($temp_usuario) == 0) {
            $err_usuario = "El nombre es obligatorio";
        } else {
            if (strlen($temp_usuario) > 20 || strlen($temp_usuario) < 4) {
                $err_usuario = "El nombre de usuario debe de tener entre 4 y 20 caracteres";
            } else {
                $patron = "/^[A-Za-z0-9]{4,20}$/";
                if (!preg_match($patron, $temp_usuario)) {
                    $err_usuario = "El nombre solo puede tener letras y numeros";
                } else {
                    $usuario = $temp_usuario;
                }
            }
        }

        if ($temp_contrasena != $temp_repetirContrasena) {
            $err_contrasena = "Las contraseñas no coinciden";
        } else {
            if (strlen($temp_contrasena) == 0) {
                $err_contrasena = "La contraseña es obligatoria";
            } else {
                if (strlen($temp_contrasena) > 20 || strlen($temp_contrasena) < 4) {
                    $err_contrasena = "La contraseña debe tener entre 4 y 20 caracteres";
                } else {
                    $patron = "/^[A-Za-z0-9]{4,20}$/";
                    if (!preg_match($patron, $temp_contrasena)) {
                        $err_contrasena = "La contraseña solo puede tener letras y numeros";
                    } else {
                        $contrasena_cifrada = password_hash($temp_contrasena, PASSWORD_DEFAULT);
                    }
                }
            }
        }
    }

    if (isset($usuario) && isset($contrasena_cifrada)) {
        $sql = $_conexion->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $sql->bind_param("ss", $usuario, $contrasena_cifrada);

        $duplicado = $_conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $duplicado->bind_param("s", $usuario);
        if ($duplicado->execute()) {
            $duplicado->store_result();
            if ($duplicado->num_rows > 0) {
                $err_usuario = "El usuario ya existe";
            } else {
                if ($sql->execute()) {
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["rol"] = "basico";
                    header('location: ../');
                } else {
                    $err = "Error al registrar el usuario";
                }
            }
        }
        $_conexion->close();
    }
    ?>

    <div class="container-centro auth">
        <div class="container-hijo bg-dark">
            <h3 class="text-light text-center">Registrarse</h3>
            <div class="container-centro">
                <form class="text-light" action="" method="post">
                    <div class="grupo">
                        <label>Usuario</label>
                        <input class="control" type="text" name="usuario" />
                        <label class="text-danger"><?php if (isset($err_usuario)) echo $err_usuario ?></label>
                    </div>
                    <div class="grupo">
                        <label>Contraseña</label>
                        <input class="control" type="password" name="contrasena" />
                        <label class="text-danger"><?php if (isset($err_contrasena)) echo $err_contrasena ?></label>
                    </div>
                    <div class="grupo">
                        <label>Repita la contraseña</label>
                        <input class="control" type="password" name="repetirContrasena" />
                        <label class="text-danger"><?php if (isset($err_contrasena)) echo $err_contrasena ?></label>
                    </div>
                    <div class="text-center mt-3">
                        <input class="boton" type="submit" value="Registrarse" />
                        <p class="sign-up">
                            Ya tienes una cuenta?<a href="login.php"> Iniciar sesión</a>
                        </p>
                    </div>
                </form>
            </div>
            <label class="text-danger mb-4"><?php if (isset($err)) echo $err ?></label>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>