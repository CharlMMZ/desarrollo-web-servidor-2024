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
        
        require('conexionanime.php');

        session_start();//para recuperar la sesion
        if (!isset($_SESSION["usuario"])) {
            header("location: iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
    <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
    <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
    <h1>Listado de animes</h1>
        <?php
            $sql= "SELECT * FROM animes";
            //Ejecuta en la conexión que hemos hecho el contenido de sql
            $resultado = $_conexion -> query($sql);
        
        ?>
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=$resultado -> fetch_assoc()) {
                        //["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>".$fila["titulo"]."</td>";
                        echo "<td>".$fila["nombre_estudio"]."</td>";
                        echo "<td>".$fila["anno_estreno"]."</td>";
                        echo "<td>".$fila["num_temporadas"]."</td>";
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