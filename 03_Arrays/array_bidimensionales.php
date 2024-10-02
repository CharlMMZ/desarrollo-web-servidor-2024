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
        </thead>
        <tbody>
            <?php 
            foreach ($videojuegos as $videojuegui) {
                list($titulillo, $categoria, $precio) = $videojuegui;
                echo "<tr>";
                echo "<td>$titulillo </td>";
                echo "<td>$categoria </td>";
                echo "<td>$precio </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>