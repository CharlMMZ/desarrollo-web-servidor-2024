<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
</head>
<body>
    <?php
        $numero =3;

        /*
        if($numero > 0)echo "<p>El numero es positivo</p>";
        elseif ($numero == 0) echo "<p>El numero es 0</p>";
        else echo "<p>El numero no es positivo</p>";

        if($numero > 0){
            echo "<p>El numero es positivo</p>";
        } elseif ($numero == 0){
            echo "<p>El numero es 0</p>";
        }
        else {
            echo "<p>El numero no es positivo</p>";
        }

        if($numero > 0):
            echo "<p>El numero es positivo</p>";
        elseif ($numero == 0):
            echo "<p>El numero es 0</p>";   
        else:
            echo "<p>El numero no es positivo</p>";
        endif;
        */

        #  Rangos: [-10,0),[0,10],(10,20] El paréntesis incluye al número, el corchete no
        /*
        if($numero <= -10 && $numero < 0){
            echo "El número $numero está en el rango [-10,0)";
        }elseif ($numero >= 0 and $numero <= 10){
            echo "El número $numero está en el rango [0,10]";
        }elseif ($numero > 10 and $numero <= 20){
            echo "El número $numero está en el rango (10,20]";
        }else{
            echo "El número $numero no está en ningún rango";
        }
        echo "<br>";
        if($numero <= -10 && $numero < 0):
            echo "El número $numero está en el rango [-10,0)";
        elseif ($numero >= 0 and $numero <= 10):
            echo "El número $numero está en el rango [0,10]";
        elseif ($numero > 10 and $numero <= 20):
            echo "El número $numero está en el rango (10,20]";
        else:
            echo "El número $numero no está en ningún rango";
        endif;
        */

        $numero1 = 4;
        $numero2 = 4;

        if($numero1 < $numero2){
            echo "El número $numero1 es mayor a $numero2.";
        }elseif ($numero1 > $numero2){
            echo "El número $numero1 es mayor a $numero2.";
        }else{
            echo "El número $numero1 y el $numero2 son iguales.";
        }
        echo "<br>";
        if($numero1 < $numero2):
            echo "El número $numero1 es mayor a $numero2.";
        elseif ($numero1 > $numero2):
            echo "El número $numero1 es mayor a $numero2.";
        else:
            echo "El número $numero1 y el $numero2 son iguales.";
        endif;
    ?>
</body>
</html>