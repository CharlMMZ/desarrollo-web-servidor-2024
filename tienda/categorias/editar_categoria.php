<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        if (isset($_GET["categoria"])) {
            $n_categoria = $_GET["categoria"];
            $sql = "SELECT * FROM categorias WHERE categoria = '$n_categoria'";
            $resultado = $_conexion->query($sql);

            if ($resultado->num_rows > 0) {
                $_categoria = $resultado->fetch_assoc();
            } else {
                echo "<div class='alert alert-danger'>Categoría no encontrada.</div>";
                exit;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoria = $_POST["categoria"];
            $tmp_descripcion = $_POST["descripcion"];

            
            if ($tmp_descripcion == '') {
                $error_descripcion = "El campo descripción es obligatorio.";
            } elseif (strlen($tmp_descripcion) > 255) {
                $error_descripcion = "El campo descripción no puede tener más de 255 caracteres.";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $tmp_descripcion)) {
                $error_descripcion = "El campo descripción solo puede contener letras, números y espacios en blanco.";
            } else {
                $descripcion = $tmp_descripcion;
            }


            
            if (!isset($error_descripcion) && !isset($error_categoria)) {
                $sql = "UPDATE categorias SET descripcion = '$descripcion' WHERE categoria = '$categoria'";
                if ($_conexion->query($sql)) {
                    echo "<div class='alert alert-success'>Categoría modificada exitosamente.</div>";
                    $_categoria["descripcion"] = $descripcion; 
                } else {
                    echo "<div class='alert alert-danger'>Error al actualizar la categoría.</div>";
                }
            }
        }
        ?>

        <h1>Editar categoría</h1>

        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" type="text" disabled value="<?php echo htmlspecialchars($_categoria["categoria"]); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"><?php echo htmlspecialchars($_categoria["descripcion"]); ?></textarea>
                <?php if (isset($error_descripcion)) echo "<div class='text-danger'>$error_descripcion</div>"; ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="categoria" value="<?php echo htmlspecialchars($_categoria["categoria"]); ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
