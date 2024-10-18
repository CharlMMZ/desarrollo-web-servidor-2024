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
</head>
<body>
<table>
    <thead>
        <th>Origen</th>
        <th>Destino</th>
        <th>Duración(min)</th>
        <th>Precio</th>
        <th>Tipo</th>
    </thead>
    <tbody>
    <?php
    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"]
    ];

    $nuevo_alumno = ["Jorgeta", "Desarrollo web servidor"];
    array_push($notas,$nuevo_alumno);
    $nuevo_alumno2 = ["Iker", "Diseño de interfaces web"];
    array_push($notas,$nuevo_alumno2);
    $nuevo_alumno3 = ["Jose Antonio", "Inglés"];
    array_push($notas,$nuevo_alumno3);
    $nuevo_alumno4 = ["Juan Antonio", "Diseño de interfaces web"];
    array_push($notas,$nuevo_alumno4);

    unset($notas[2]);

    for ($i=0; $i < count($autobuses); $i++) { 
        $autobuses[$i][2] = rand(0,10);
        if ($autobuses[$i][2]<5) {
            $autobuses[$i][3] = "NO APTO";
        }else{
            $autobuses[$i][3] = "APTO";
        }
    }
    foreach ($autobuses as $busecitos) {
        list($origen, $destino, $duracion, $precio, $X) = $busecitos;
        echo "<tr>";
            echo "<td>$origen </td>";
            echo "<td>$destino </td>";
            echo "<td>$duracion </td>";
            echo "<td>$precio</td>";
            echo "<td>$X</td>";
        echo "</tr>";

        //echo "<td>$$nota[1]</td>";
        
    }


    ?>
    </tbody>
</body>
</html>