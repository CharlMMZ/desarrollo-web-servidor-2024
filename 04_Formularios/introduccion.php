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
    <?php
    /*
    * Hay dos tipos de formularios
    * singlepage forms -> información procesada en una misma página
    * multipage forms -> nos manda a una página diferente
    */
    ?>

    <form action="" method="post"><!--cabecera del formulario-->
        <input type="text" name="numerin">
        <input type="text" name="nveces">
        <input type="submit" value="Enviar"><!--para enviar el formulario-->
    
    </form>


    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $numerin = $_POST["numerin"];
        $nveces = (int)$_POST["nveces"];
        for ($i=0; $i <= $nveces; $i++) { 
            echo "<h2>$numerin</h2>";
        }
    }
    
    ?>

</body>
</html>