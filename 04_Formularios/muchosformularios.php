<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demasiados Formularios</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require("../05_Funciones/Muchas_Funciones.php");
    ?>
</head>
<body>
    <h1> Formulario de IRPF </h1>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
        <input type="hidden" name="accion" value="formulario_IRPF">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_IRPF') {
                $salario = $_POST["salario"];
                
                calcularIrpf($salario);
            }
        }
    ?>

    <h1> Formulario de IVA </h1>
    <form action="" method="POST">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP"><br><br>
        <input type="hidden" name="accion" value="formulario_IVA">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_IVA') {
                $precio = $_POST["precio"];
                $iva = $_POST["iva"];

                calcularIva($precio, $iva);
            }
        }
    ?>
    <h1> Formulario de Numeros Primos </h1>
    <form action="" method="post">
        <input type="text" name="desde" placeholder="Desde"><br><br>
        <input type="text" name="hasta" placeholder="Hasta"><br><br>
        <input type="submit" value="Calcular">
        <input type="hidden" name="accion" value="formulario_Primos">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['accion'] == 'formulario_Primos') {
                $desde = $_POST["desde"];
                $hasta = $_POST["hasta"];
    
                CalcularPrimos($desde, $hasta);
            }
        }
    ?>
    <h1> Formulario de Temperatura </h1>
    <form action="" method="post">
        <input type="number" name="temperatura" placeholder="temperatura"><br><br>
        <label>Unidad inicial: </label>
        <select name="unidad_inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <label>Unidad final: </label>
        <select name="unidad_final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <input type="submit" value="Convertir">
        <input type="hidden" name="accion" value="formulario_TEMP">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['accion'] == 'formulario_TEMP') {
            $temperatura = $_POST["temperatura"];
            $unidad_inicial = $_POST["unidad_inicial"];
            $unidad_final = $_POST["unidad_final"];
            CalcularTemp($temperatura, $unidad_inicial, $unidad_final);
        }
    }
    ?>
</body>
</html>