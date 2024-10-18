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
    <!--EJERCICIO 3: Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).-->
    <h1>Calcular Primos</h1>
    <form action="" method="post">
        <label for="num1">Primer num</label>
        <input type="number" name="num1" id="num1" placeholder="Introduce un número min">
        <label for="num2">Segundo num</label>
        <input type="number" name="num2" id="num2" placeholder="Introduce un número max">
        <input type="submit" value="Primos">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        
        for ($i=$num1; $i<= $num2; $i++) { /*Recorremos hasta llegar al max */
            $comprobar = 0;
            for ($j=1; $j <= $i; $j++) { 
                if ($i % $j == 0){
                    $comprobar=$comprobar+1;
                }
            }
            if ($comprobar==2) {/*Si es más que a 1 o si mismo no es primo*/
                echo "<p>$i</p>";
            }
            
        }
    }
    ?>


</body>
</html>