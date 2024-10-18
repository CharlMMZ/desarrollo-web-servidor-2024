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
    <!--EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

    Por ejemplo, si a = 3, b = 10, c = 2

    Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10-->
    <h1>Calcular Múltiplos</h1>
    <p>Se mostrará una lista de los múltiplos de c que se encuentren entre a y b.</p>
    <form action="" method="post">
        <label for="num_A">Número A</label>
        <input type="number" name="num_A" id="num_A" placeholder="Introduce un número A">
        <label for="num_B">Número B</label>
        <input type="number" name="num_B" id="num_B" placeholder="Introduce un número B">
        <label for="num_C">Número C</label>
        <input type="number" name="num_C" id="num_C" placeholder="Introduce un número C">
        <input type="submit" value="Mostrar lista de múltiplos">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $num_A = $_POST["num_A"];
        $num_B = $_POST["num_B"];
        $num_C = $_POST["num_C"];
        echo "<h3>Múltiplos de $num_C (entre $num_A y $num_B).</h3>";
    ?>
    <ul>
    <?php
        for ($i=$num_A; $i<= $num_B; $i++) { 
            if ($i % $num_C == 0) {/*Comprobamos que es multiplo de número C */
                echo "<li>$i</li>";
            }
        }
    }
    ?>
    </ul>
</body>
</html>