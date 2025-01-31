<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <?php   
        error_reporting(E_ALL);
        ini_set("display_errors", 1);   
        
        require('../util/conexion.php');
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_categoria = $_POST["categoria"];
                $tmp_descripcion = $_POST["descripcion"];

                
                if ($tmp_categoria == "") {
                    $error_categoria = "La categoría es obligatoria";
                } else {
                    if (strlen($tmp_categoria) < 2 || strlen($tmp_categoria) > 30) {
                        $error_categoria = "La categoría debe tener entre 2 y 30 carácteres";
                    } else {
                        $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚÑñ]*$/";
                        if (!preg_match($patron, $tmp_categoria)) {
                            $error_categoria = "La categoría solo puede tener letras";
                        } else {
                            $sql_comprobar = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'";
                            $resultado = $_conexion->query($sql_comprobar);

                            if ($resultado->num_rows > 0) {
                                $error_categoria = "La categoría ya existe";
                            } else {
                                $categoria = $tmp_categoria;
                            }
                        }
                    }
                }

                
                if ($tmp_descripcion == "") {
                    $error_descripcion = "La descripción es obligatoria";
                } else {
                    if (strlen($tmp_descripcion) > 255) {
                        $error_descripcion = "La descripción no puede ser mayor a 255 carácteres";
                    } else {
                        $descripcion = $tmp_descripcion;
                    }
                }

                
                if (!isset($error_categoria) && !isset($error_descripcion)) {
                    $sql = "INSERT INTO categorias (categoria, descripcion) VALUES ('$categoria', '$descripcion')";
                    $_conexion->query($sql);
                    echo "<div class='alert alert-success'>Categoría creada exitosamente.</div>";
                }
            }
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" name="categoria" type="text" value="<?php echo isset($categoria) ? htmlspecialchars($categoria) : ''; ?>">
                <?php if (isset($error_categoria)) { ?>
                    <div class="text-danger"><?php echo $error_categoria; ?></div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"><?php echo isset($descripcion) ? htmlspecialchars($descripcion) : ''; ?></textarea>
                <?php if (isset($error_descripcion)) echo "<div class='text-danger'>$error_descripcion</div>" ?>
            </div>
            
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

