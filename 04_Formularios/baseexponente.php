<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
        <form action="" method="post">
            <input type="text" name="base">
            <input type="text" name="exponente">
            <input type="submit" value="Enviar">
        
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $base = $_POST["base"];
            $exponente = (int)$_POST["exponente"];
            $resultado = 1;
            for ($i=0; $i < $exponente; $i++) { 
                $resultado = $resultado * $base;

            }
            echo "<h2>El resultado de elevar $base a $exponente es $resultado</h2>";
        }
        
        ?> 
</body>
</html>