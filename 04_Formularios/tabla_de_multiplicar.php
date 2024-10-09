<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
</head>
<body>
    <form action="" method="post">
        <label for="multilpicar">Tabla de multiplicar</label>
        <input type="text" name="multiplicar" id="multiplicar" placeholder="Introduce un número">
        <input type="submit" value="Multiplicar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $multiplicar = $_POST["multiplicar"];
        for ($i=1; $i < 11; $i++) { 
            $res = $multiplicar * $i;
            echo "<p>$multiplicar x $i = $res</p>";
        }
    }
    ?>

</body>
</html>