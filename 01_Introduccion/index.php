<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $var ="10.0";
    
    var_dump($var);

    $var =true;
    define("edad",25);
    var_dump($var);
    $saludito = "Me llamo Pepilin";
    $saludin = " y tengo ".edad." años.";

    echo "<h2 style='color:gold'>Sí, tiene ".edad." años</h2>";
    echo "<p style='color:silver'>$saludito"."$saludin</p>";

    ?>
</body>
</html>