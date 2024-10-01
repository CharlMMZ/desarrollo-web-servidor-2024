<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <thead>
            <th>Asignatura</th>
            <th>Profesor</th>
        </thead>
        <tbody>
                <!--
    Desarrollo web servidor => Alejandra
    Desarrollo web usuario => Jaime
    Diseño de interfaces => José
    Despliegue de aplicaciones web => Alejandro
    Empresa e iniciativa emprendedora => Gloria
    Inglés => Virginia

    Mostrar en una tabla las asignaturas y sus respectivos profesores

    Luego:
    Mostrar una tabla adicional ordenada por la asignatura en orden alfabético

    Mostrar una tabla adicional ordenada por los profesores en orden alfabético inverso
    --> <h3>Tabla asignaturas y profesores</h3>
        <?php
            $profesores = [
                "Desarrollo web servidor" => "Alejandra",
                "Desarrollo web usuario" => "Jaime",
                "Diseño de interfaces" => "José",
                "Despliegue de aplicaciones web" => "Alejandro",
                "Empresa e iniciativa emprendedora" => "Gloria",
                "Inglés" => "Virginia"
            ];
            
            foreach ($profesores as $asi=>$profe) {
                echo "<tr>";
                echo "<td>$asi</td> <td>$profe</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
            <h3>Ordenada por asignaturas</h3>
    <table>
        <thead>
            <th>Asignatura</th>
            <th>Profesor</th>
        </thead>
        <tbody>
            <?php
            ksort($profesores);
            foreach ($profesores as $asi=>$profe) {
                echo "<tr>";
                echo "<td>$asi</td> <td>$profe</td>";
                echo "</tr>";
            }
            ?>
    </tbody>
</table>

            <h3>Ordenada inversa por profesores</h3>
<table>
    <thead>
        <th>Asignatura</th>
        <th>Profesor</th>
    </thead>
        <tbody>
            <?php
            arsort($profesores);
            foreach ($profesores as $asi=>$profe) {
                echo "<tr>";
                echo "<td>$asi</td> <td>$profe</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>