<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05_Funciones/salarios.php');
    ?>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="hidden" name="accion" value="formulario_salario">
        <input type="submit" value="Calcular salario bruto">

    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["accion"] == "formulario_salario") {
            $tmp_salario = $_POST["salario"];

            if(filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) === FALSE) {/*Tiene que ser 3 igual */
                echo "<p>Debe ser un número entero</p>";
            } else {
                if($tmp_salario <= 0) {
                    echo "<p>Debe ser mayor o igual que 0</p>";
                } else {
                    $salario = $tmp_salario;
                    $res = calcularSalario($salario);
                    
                    echo "<p>El salario neto de $salario es $res</p>";
                }
            }
        }
    }
    ?>
</body>
</html>
