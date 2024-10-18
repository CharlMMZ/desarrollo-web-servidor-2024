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
    <!--EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.-->
    <h1>Calcular Mayor</h1>
    <form action="" method="post">
        <label for="num1">Primer num</label>
        <input type="number" name="num1" id="num1" placeholder="Introduce un número">
        <label for="num2">Segundo num</label>
        <input type="number" name="num2" id="num2" placeholder="Introduce un número">
        <label for="num3">Tercer num</label>
        <input type="number" name="num3" id="num3" placeholder="Introduce un número">
        <input type="submit" value="¿Cuál es el Mayor?">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        
        $mayor = 0;
        if ($num1>$num2 AND $num1>$num3) {
            $mayor = $num1;
        }

        if ($num2>$num1 AND $num2>$num3) {
            $mayor = $num2;
        }
        
        if ($num3>$num1 AND $num3>$num2) {
            $mayor = $num3;
        }

        if ($num1==$num2 AND $num2==$num3) {
            echo "<p>Los tres números son iguales</p>";
        }else {
            echo "<p>El mayor es $mayor</p>";
        }
    }
    ?>
</body>
</html>