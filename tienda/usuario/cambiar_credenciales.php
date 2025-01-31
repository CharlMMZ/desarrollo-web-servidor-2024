<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Cambiar Credenciales</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1); 
        
        require('../util/conexion.php');

        session_start();
        if (!isset($_SESSION["usuario"])) {
            
            header("location: iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <?php
            
            $usuario = $_SESSION["usuario"];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_contrasena = $_POST["contrasena"];
                $contrasena = ""; 

                
                if ($tmp_contrasena == "") {
                    $err_contrasena = "El campo contraseña es obligatorio";
                } elseif (strlen($tmp_contrasena) < 8 || strlen($tmp_contrasena) > 15) {
                    $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres";
                } elseif (!preg_match("/[a-zA-Z0-9!-\/:-@-`-~]+$/", $tmp_contrasena)) {
                    $err_contrasena = "La contraseña solo puede contener letras (mayúsculas o minúsculas), números y caracteres especiales";
                } else {
                    $contrasena = $tmp_contrasena;
                }

                
                if (isset($contrasena) && !isset($err_contrasena)) {
                    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        
                    
                    $sql = "UPDATE usuarios SET contrasena = '$contrasena_cifrada' WHERE usuario = '$usuario'";
                    $_conexion->query($sql);

                    
                    session_start();
                    session_destroy();
                    header("location: iniciar_sesion.php");
                    exit;
                }
            }

            
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion->query($sql);
            $usuario = $resultado->fetch_assoc();
        ?>
    
        <h2>Restablecer Contraseña</h2>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="password" name="contrasena" required>
                
                <?php if (isset($err_contrasena)) echo "<span class='alert alert-danger'>$err_contrasena</span>"; ?>
            </div>
            
            <input type="hidden" name="usuario" value="<?php echo $usuario['usuario']; ?>">
            <div>
                <input class="btn btn-primary" type="submit" value="Cambiar Contraseña">
            </div>

        </form>
            <div>
                <a class='btn btn-primary' href='../index.php'>Volver</a>
            </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

