<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
        require('conexionconsola.php');
    ?>
</head>
<body>
    <div>
        <?php
            $sql= "SELECT * FROM consolas";
            //Ejecuta en la conexión que hemos hecho el contenido de sql
            $resultado = $_conexion -> query($sql);
        
        ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generación</th>
                    <th>Unidades vendidas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=$resultado -> fetch_assoc()) {
                        //["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>".$fila["nombre"]."</td>";
                        echo "<td>".$fila["fabricante"]."</td>";
                        echo "<td>".$fila["generacion"]."</td>";
                        if ($fila["unidades_vendidas"]===NULL){
                            echo "<td>No hay datos</td>";
                        }else{
                            echo "<td>".$fila["unidades_vendidas"]."</td>";
                        }
                        echo "</tr>";

                    }

                ?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>