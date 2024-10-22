<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require("../04_Funciones/edades.php");
    ?>
</head>
<body>
    <form action="" method="post"><!--cabecera del formulario-->
        <input type="text" name="nombre">
        <input type="text" name="edad">
        <input type="submit" value="Enviar">
        <input type="hidden" name="accion" value="formulario_persona"><!--para enviar el formulario-->
</form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($_POST["accion"] == "formulario_persona") {
                $nombre = $_POST["nombre"];
                $edad = $_POST["edad"];
    

                comprobarEdad($nombre, $edad);
                /*
                if ($nombre != '' && $edad != '') {
                    echo "<p>El nombre es $nombre y su edad es $edad.</p>";
                }else{
                    echo "<p>Introduce el nombre y la edad</p>";
                }*/
            }
        }
    ?>
    <form action="" method="post"><!--cabecera del formulario-->
        <input type="text" name="base">
        <input type="text" name="exponente">
        <input type="submit" value="Calcular">
        <input type="hidden" name="accion" value="formulario_potencia"><!--para enviar el formulario-->
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if ($_POST["accion"] == "formulario_potencia") {
            $base = $_POST["base"];
            $exponente = $_POST["exponente"];
            
            if ($base != '' && $exponente != '') {
                $resultado=1;
                for ($i=0; $i < $exponente ; $i++) { 
                    $resultado = $resultado * $base;
                }
                echo"<p>El resultado de elevar $base por $exponente es $resultado</p>";
            }else{
                echo"<p>Por favor introduce la base ye l exponente.</p>";
            }
        }


    }
    ?>
</body>
</html>