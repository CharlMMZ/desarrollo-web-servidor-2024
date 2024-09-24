<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $edad = rand(-10,140);
        $resu=match (true) {
            $edad >= 0 && $edad < 5 => "Con $edad años eres un bebé.",
            $edad >= 5 && $edad <= 17 => "Con $edad años eres menor de edad.",
            $edad > 17 && $edad <= 65 => "Con $edad años eres adulto.",
            $edad > 66 && $edad <= 120 => "Con $edad años eres jubilado.",
            default => "Con $edad años no estabas ni pensao.",
       };
       echo $resu;

        if($edad >= 0 && $edad < 5):
            echo "Con $edad años eres un bebé.";
        elseif ($edad >= 5 && $edad <= 17):
            echo "Con $edad años eres menor de edad.";
        elseif ($edad > 17 && $edad <= 65):
            echo "Con $edad años eres adulto.";
        elseif ($edad > 66 && $edad <= 120):
            echo "Con $edad años eres jubilado.";
        else:
            echo "Con $edad años no estabas ni pensao.";
        endif;
    ?>
</body>
</html>