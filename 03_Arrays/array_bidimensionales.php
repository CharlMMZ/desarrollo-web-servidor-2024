<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 2024", "Deporte", 70],
        ["Dark Souls", "Sufrir", 50],
        ["Hollow Knight", "Metroidvania", 30]
    ];

    foreach ($videojuegos as $videojuegui) {
        list($titulillo, $categoria, $precio) = $videojuegui;
        echo "<p>$titulillo, $categoria, $precio</p>";
    }
    
    ?>
    <table>
        <thead>
            <th>Título</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>¿Qué es?</th>
        </thead>
        <tbody>
            <?php 
            $nuevo_videojuego = ["Throne of Liberty", "MMO", 0];
            array_push($videojuegos,$nuevo_videojuego);

            $nuevo_videojuego2 = ["Honkai Impact", "Mundo Abierto", 0];
            array_push($videojuegos,$nuevo_videojuego2);

            $nuevo_videojuego2 = ["Wuthering Waves", "Mundo Abierto", 0];
            array_push($videojuegos,$nuevo_videojuego2);
            //Con 1, 0 o 2 podemos decirle que columna
            $_precio = array_column($videojuegos, 2);
            array_multisort($_precio, SORT_ASC, $videojuegos);


            for ($i=0; $i < count($videojuegos); $i++) { 
                if ($videojuegos[$i][2]<=0) {
                    $videojuegos[$i][3] = "Gratis";
                }else{
                    $videojuegos[$i][3] = "De pago";
                }
            }



            foreach ($videojuegos as $videojuegui) {
                list($titulillo, $categoria, $precio, $es) = $videojuegui;
                echo "<tr>";
                echo "<td>$titulillo </td>";
                echo "<td>$categoria </td>";
                echo "<td>$precio </td>";
                echo "<td>$es</td>";
                echo "</tr>";
            }
            //para ordenar una matriz tenemos que descomponer en columnas

            ?>
        </tbody>
    </table>
</body>
</html>