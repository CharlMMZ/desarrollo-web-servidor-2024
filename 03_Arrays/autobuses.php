<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duración(min)</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            $autobuses = [
                ["Málaga", "Ronda", 90 , 10],
                ["Churriana", "Málaga", 20, 3],
                ["Málaga", "Granada", 120, 15],
                ["Torremolinos", "Málaga", 30, 3.5]
            ];
            //añadimos dos lineas de bus
            $bus1 = ["Paco pepe Alhaurín", "Alhaurín el Grande", 40, 4.5];
            $bus2 = ["Córdoba", "Puerta Blanca, Málaga", 120, 10];
            array_push($autobuses,$bus1);
            array_push($autobuses,$bus2);

            //ordenamos de más duración a menos 
            $_duracion = array_column($autobuses, 2);
            array_multisort($_duracion, SORT_DESC, $autobuses);

            //Mostramos el array
            foreach ($autobuses as $busecitos) {
                list($origen, $destino, $duracion, $precio) = $busecitos;
                echo "<tr>";
                echo "<td>$origen </td>";
                echo "<td>$destino </td>";
                echo "<td>$duracion </td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }





            ?>
        </tbody>
    </table>
</body>
</html>