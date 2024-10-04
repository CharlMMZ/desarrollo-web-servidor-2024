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
            $bus2 = ["Córdoba", "Puerta Blanca, Málaga", 125, 10];
            array_push($autobuses,$bus1);
            array_push($autobuses,$bus2);

            /*ordenamos de más duración a menos 
            si queremos ordenar por varios campos, ponemos primero la prioridad 
            y si son iguales que vaya por el otro*/
            $_origen = array_column($autobuses, 0);
            $_destino = array_column($autobuses, 1);
            array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC, $autobuses);
            //no hacer dos multisort seguidos, meter el orden primero porque se lía


            //cuando borramos la fila, las claves no se cambian, si se borra la 1 el 5 tiene clave 5
            //por ello, con un segundo multisort las claves sí se resetean (es reomendable)

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
        </table>
        <table>
            <thead>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duración(min)</th>
                <th>Precio</th>
                <th>Tipo</th>
            </thead>
            <?php

            for ($i=0; $i < count($autobuses); $i++) { 
                if ($autobuses[$i][2]<=30) {
                    $autobuses[$i][4] = "Corta distancia";
                }elseif ($autobuses[$i][2]>30&&$autobuses[$i][2]<=120) {
                    $autobuses[$i][4] = "Media distancia";
                }else{
                    $autobuses[$i][4] = "Larga distancia";
                }
            }
            print_r($autobuses);

            foreach ($autobuses as $busecitos) {
                list($origen, $destino, $duracion, $precio, $X) = $busecitos;
                echo "<tr>";
                echo "<td>$origen </td>";
                echo "<td>$destino </td>";
                echo "<td>$duracion </td>";
                echo "<td>$precio</td>";
                echo "<td>$X</td>";
                echo "</tr>";
                
            }

            ?>
        </tbody>
    </table>
</body>
</html>