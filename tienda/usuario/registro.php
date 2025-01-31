<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 

        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        
        if ($usuario == "") {
            $err_usuario = "El campo usuario es obligatorio";
        } elseif (strlen($usuario) < 3 || strlen($usuario) > 15) {
            $err_usuario = "El usuario debe tener entre 3 y 15 caracteres";
        } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $usuario)) {
            $err_usuario = "El usuario solo puede contener letras y números";
        } else {
            
            $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion->query($sql);
            if ($resultado->num_rows > 0) {
                $err_usuario = "El usuario ya existe en la base de datos";
            }
        }

        
        if ($contrasena == "") {
            $err_contrasena = "El campo contraseña es obligatorio";
        } elseif (strlen($contrasena) < 8 || strlen($contrasena) > 15) {
            $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres";
        } elseif (!preg_match("/[a-zA-ZñÑ0-9!@#$%^&*()_+<>?]+/", $contrasena)) {
            $err_contrasena = "La contraseña debe contener letras, números o caracteres especiales";
        }

        
        if (!isset($err_usuario) && !isset($err_contrasena)) {
            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena_cifrada')";
            $_conexion->query($sql);
            echo "<div class='alert alert-success'>Registrado correctamente.</div>";
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("location: ../index.php");
        }
    }
    ?>

    <div class="container">
        <h1>Formulario de registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
                <?php if (isset($err_usuario)) echo "<div class='alert alert-danger'>$err_usuario</div>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($err_contrasena)) echo "<div class='alert alert-danger'>$err_contrasena</div>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
