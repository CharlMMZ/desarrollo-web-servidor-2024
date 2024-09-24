<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = rand(1,3);


        switch($numero){

            case 1:
                echo "<p>El numero aleatorio es $numero</p>";
                break;
            case 2:
                echo "<p>El numero aleatorio es $numero</p>";
                break;
            default:
                echo "<p>El numero aleatorio es $numero</p>";
                break;

        }

        $numerin = rand(1,10);
        $res=$numerin%2;
        switch($res){

            case 0:
                echo "<p>El numero aleatorio $numerin es par</p>";
                break;
            case 1:
                echo "<p>El numero aleatorio $numerin es impar</p>";
                break;
        }



    ?>
</body>
</html>