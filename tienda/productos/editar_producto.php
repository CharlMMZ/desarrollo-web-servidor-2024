<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
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
            
            $sql = "SELECT categoria FROM categorias ORDER BY categoria";
            $resultado = $_conexion->query($sql);
            $categorias = [];
            while ($fila = $resultado->fetch_assoc()) {
                $categorias[] = $fila["categoria"];
            }
        
            
            $id_producto = $_GET["id_producto"];
            $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $_conexion->query($sql);
            $producto = $resultado->fetch_assoc();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $tmp_nombre = $_POST["nombre"] ?? '';
                $tmp_precio = $_POST["precio"] ?? '';
                $tmp_categoria = $_POST["categoria"] ?? '';
                $tmp_stock = $_POST["stock"] ?? '';
                $tmp_descripcion = $_POST["descripcion"] ?? '';
        
                
                $direccion_temporal = $_FILES["imagen"]["tmp_name"] ?? '';
                $nombre_imagen = $_FILES["imagen"]["name"] ?? '';
                if ($direccion_temporal && $nombre_imagen) {
                    move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");
                }
        
                
                if ($tmp_nombre == "") {
                    $err_nombre = "El campo nombre es obligatorio";
                } elseif (!preg_match('/^[a-zA-Z0-9 ]+$/', $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras, números y espacios.";
                } elseif (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 50) {
                    $err_nombre = "El nombre debe tener al menos 2 caracteres y menos de 50.";
                } else {
                    $nombre = $tmp_nombre;
                }
        
                
                if($tmp_precio == "") {
                    $err_precio = "El precio es obligatorio";
                } elseif(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                    $err_precio = "El precio debe ser un número";
                } elseif ($tmp_precio < 0 || $tmp_precio > 9999.99) {
                    $err_precio = "El precio debe estar entre 0 y 9999.99.";
                } elseif (!preg_match('/^[0-9]{1,4}(\.[0-9]{1,2})?$/', $tmp_precio)) {
                    $err_precio = "El precio debe tener hasta 4 dígitos enteros y opcionalmente hasta 2 decimales.";
                } else {
                    $precio = $tmp_precio;
                }
        
                
                $sql = "SELECT categoria FROM categorias ORDER BY categoria";
                $resultado = $_conexion->query($sql);
                $categorias = [];
                while ($fila = $resultado->fetch_assoc()) {
                    array_push($categorias, $fila["categoria"]);
                }
        
                
                if ($tmp_categoria == "") {
                    $err_categoria = "La categoría es obligatoria.";
                } elseif (!in_array($tmp_categoria, $categorias)) {
                    $err_categoria = "Elige una categoría de la lista.";
                } else {
                    $categoria = $tmp_categoria;
                }
        
        
                
                if(filter_var($tmp_stock, FILTER_VALIDATE_INT) === FALSE) {
                    $err_stock = "El stock debe ser un número entero.";
                }elseif(strlen($tmp_stock) < 0 || strlen($tmp_stock) >= 1000) {
                    $err_stock = "El stock debe de ser 0 o superior, pero inferior a 1000.";
                } else {
                    $stock = $tmp_stock;
                }
        
                
                if($tmp_descripcion == ""){
                    $err_descripcion = "La descripción es obligatoria.";
                }elseif (strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres.";
                } else {
                    $descripcion = $tmp_descripcion;
                }
        
                
        
                
                if (!isset($err_nombre) && !isset($err_precio) && !isset($err_categoria) && !isset($err_stock) && !isset($err_descripcion)) {
                    $sql = "UPDATE productos SET
                                nombre = '$nombre',
                                precio = '$precio',
                                categoria = '$categoria',
                                stock = '$stock',
                                imagen = '../imagenes/$nombre_imagen',
                                descripcion = '$descripcion'
                            WHERE id_producto = '$id_producto'";
        
                    if ($_conexion->query($sql)) {
                        echo "<div class='alert alert-success'>Producto modificado.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error al modificar el producto: " . $_conexion->error . "</div>";
                    }
                }
            }
        

        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" name="nombre" type="text" value="<?php echo $producto["nombre"] ?>">
            <?php if(isset($err_nombre)) echo "<div class='alert alert-danger'>$err_nombre</div>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input class="form-control" name="precio" type="text" value="<?php echo $producto["precio"] ?>">
            <?php if(isset($err_precio)) echo "<div class='alert alert-danger'>$err_precio</div>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select class="form-select" name="categoria">
                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?php echo $categoria ?>"
                        <?php echo ($categoria == $producto["categoria"]) ? 'selected' : ''; ?>>
                        <?php echo $categoria ?>
                    </option>
                <?php } ?>
            </select>
            <?php if(isset($err_categoria)) echo "<div class='alert alert-danger'>$err_categoria</div>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input class="form-control" name="stock" type="text" value="<?php echo $producto["stock"] ?>">
            <?php if(isset($err_stock)) echo "<div class='alert alert-danger'>$err_stock</div>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input class="form-control" name="imagen" type="file">
            <?php if(isset($err_imagen)) echo "<div class='alert alert-danger'>$err_imagen</div>" ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input class="form-control" name="descripcion" type="text" value="<?php echo $producto["descripcion"] ?>">
            <?php if(isset($err_descripcion)) echo "<div class='alert alert-danger'>$err_descripcion</div>" ?>
        </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>

