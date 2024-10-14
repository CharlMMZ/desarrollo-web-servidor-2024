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
    <!--EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, 
    y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.

    Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

    En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.-->
    <h1>Conversión de temperatura</h1>
    <form action="" method="post">
        <label for="temperatura">Número a convertir</label>
        <input type="number" name="temperatura" id="temperatura" placeholder="Introduce una temperatura">
        <br>
        <label for="listaTemperatura1">Temperatura a escoger</label>
        <select name="listaTemperatura1" id="listaTemperatura1">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <br>
        <label for="listaTemperatura2">Seleccionar a que queremos convertir</label>
        <select name="listaTemperatura2" id="listaTemperatura2">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <br>
        <input type="submit" value="Convertir temperatura">
    </form>
    
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $temperatura = $_POST["temperatura"];
        $listaTemperatura1 = $_POST["listaTemperatura1"];
        $listaTemperatura2 = $_POST["listaTemperatura2"];
        /* Conversor de grados
        
        Celsius a Farenheit (1 °C × 9 / 5) + 32 = 33,8 °F
        Celsius a Kelvin 1 °C + 273,15 = 274,15 K
        Kelvin a Celsius 1 K − 273,15 = -272,1 °C
        Kelvin a Fahrenheit (1 K − 273,15) × 9 / 5 + 32 = -457,9 °F
        Fahrenheit a Celsius (1 °F − 32) × 5 / 9 = -17,22 °C
        Fahrenheit a Kelvin (1 °F − 32) × 5 / 9 + 273,15 = 255,928 K
        
        */
        if($listaTemperatura1 == "celsius" AND $listaTemperatura2 == "fahrenheit"){
            $res = ($temperatura * 9/5) + 32;
        }elseif($listaTemperatura1 == "celsius" AND $listaTemperatura2 == "kelvin"){
            $res = $temperatura + 273.15;
        }elseif($listaTemperatura1 == "kelvin" AND $listaTemperatura2 == "celsius"){
            $res = $temperatura - 273.15;
        }elseif($listaTemperatura1 == "kelvin" AND $listaTemperatura2 == "fahrenheit"){
            $res = (($temperatura - 273.15) * 9/5) + 32;
        }elseif($listaTemperatura1 == "fahrenheit" AND $listaTemperatura2 == "celsius"){
            $res = ($temperatura - 32) * 5/9;
        }elseif($listaTemperatura1 == "fahrenheit" AND $listaTemperatura2 == "kelvin"){
            $res = (($temperatura - 32) * 5/9) + 273.15;
        }else{
            $res = $temperatura;
        }
        
        echo "<h3>Has pasado $temperatura $listaTemperatura1 a $res $listaTemperatura2.</h3>";
    }
    ?>
</body>
</html>