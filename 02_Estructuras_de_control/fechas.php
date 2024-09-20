<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    //echo date("l j");

    // $numero % 4

    $dia = date("j");

    if($dia % 2 ==0):
        echo "El día $dia de ". date ("l")." es par";
    else:
        echo "El día $dia de ". date ("l")." es impar";
    endif;


    ?>
</body>
</html>