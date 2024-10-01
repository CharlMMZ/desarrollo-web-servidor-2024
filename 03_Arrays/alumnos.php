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

                
    --> <h3>Tabla notas alumnos</h3>
        <?php
            $alumnos = [
                "Carlos" => 1,
                "Juan Antonio" => 6,
                "Manu" => 7,
                "Jorge" => 4,
                "Ayoub" => 8,
                "Paco" => -1
            ];
            
            foreach ($alumnos as $nombri=>$noti) {
                echo "<tr>";
                echo "<td>$nombri</td> <td>$noti
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>