<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $numeros = [1,5,3,9,20,15,22,11];

    for ($i=0; $i < count($numeros); $i++) { 
        echo "$numeros[$i] ";
    }
    ?>


    <h1>Ejercicio Máximo</h1>
        <form action="" method="post">
            <label for="maximo">Máximo</label>
            <input type="text" name="maximo" id="maximo" placeholder="Introduce el máximo">
            <input type="submit" value="Comprobar">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $numero = $_POST["numero"];
            $candidato = $numeros[0];

            for ($i=0; $i < count($numeros); $i++) { 
                if ($numeros[$i] > $candidato) $candidato = $numeros[$i];
            }
            $maximo = $candidato;
            if ($numero == $maximo) {
                echo "<h2>¡¡Has acertado!! El máximo es $maximo</h2>";
            }else{
                echo "<h2>¡¡Has fallado!! El máximo es $maximo</h2>";
            }
            
        }
        
        ?> 
</body>
</html>