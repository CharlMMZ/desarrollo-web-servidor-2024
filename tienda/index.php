<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('util/conexion.php');
        session_start();//para recuperar la sesion
        if (!isset($_SESSION["usuario"])) {
            header("location: ./usuario/iniciar_sesion.php");
            exit;
        }
        ?>
        
    
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <h1>Inicio</h1>
        <?php
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = $_POST["id_producto"];
                
                $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql);
            }
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);

            
        ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                    
                    ?>
                    <td>
                        <img width="50" heigth="80" src="imagenes/<?php echo $fila["imagen"] ?>" alt="Sin imagen">
                    </td>
                    
                    <?php
                        echo "<td>" . $fila["descripcion"] . "</td>";
                    }
                    
                ?>
            </tbody>
            <?php 
                    echo "<a class='btn btn-primary' 
                        href='usuario/cerrar_sesion.php'>Cerrar sesión</a>";

                    echo "<a class='btn btn-secondary' 
                        href='usuario/cambiar_credenciales.php'>Cambiar contraseña</a>";

                    echo "<a class='btn btn-success' 
                        href='productos/index.php'>Productos</a>";
                    echo "<a class='btn btn-success' 
                        href='categorias/index.php'>Categorías</a>";
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>