<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    /*Ejercicio 1
    Calcula la suma de todos los números pares del 0 a l 20 */
    $suma = 0;

    for ($i=0; $i < 20; $i++) { 
        if ($i % 2 == 0) {
            $suma += $i;
        }
    }
    echo "<h3>La suma de los pares de 0 a 20 es $suma.</h3>";

    /*Ejercicio 2
    (Hay que investigar un poco)
    Muestra por pantalla la fecha actual con el siguiente formato:
        Miércoles 25 de Septiembre de 2024*/
        $nom = date("w");
        $dia = date("j");
        $mes = date("n");
        $ano = date("Y");
        $diaes="";
        $mesespa="";

        switch($nom){
            case 1:
                $diaes="Lunes";
                break;
            case 2:
                $diaes="Martes";
                break;
            case 3:
                $diaes="Miércoles";
                break;
            case 4:
                $diaes="Jueves";
                break;
            case 5:
                $diaes="Viernes";
                break;
            case 6:
                $diaes="Sábado";
                break;
            case 0:
                $diaes="Domingo";
                break;
        }
        switch($mes){
            case 1:
                $mesespa="Enero";
                break;
            case 2:
                $mesespa="Febrero";
                break;
            case 3:
                $mesespa="Marzo";
                break;
            case 4:
                $mesespa="Abril";
                break;
            case 5:
                $mesespa="Mayo";
                break;
            case 6:
                $mesespa="Junio";
                break;
            case 7:
                $mesespa="Julio";
                break;
            case 8:
                $mesespa="Agosto";
                break;
            case 9:
                $mesespa="Septiembre";
                break;
            case 10:
                $mesespa="Octubre";
                break;
            case 11:
                $mesespa="Noviembre";
                break;
            case 12:
                $mesespa="Diciembre";
                break;
        };
        

        echo ("<h4>$diaes $dia de $mesespa de $ano.</h4>");

        /*Bucle que comprueba si un número es primo*/

        $numerillo = 20;
        $primo == true;
        for ($i=2; $i < $numerillo; $i++) {
            
            if ($numerillo % $i == 0) {
                echo ("El número $numerillo no es primo.");
                $primo==false;
                break;
            }

        }
        if ($primo == true) {
            echo ("El número $numerillo es primo.");
        }

        /*$contador = 1;
        for ($i=1; $i <= 50; $i++) { 
            while ($contador<=$i) {
                if ($i % $contador == 0) {
                    echo ("<p>$i</p>");
                    $contador = 1;
                    
                }
                $contador++;
            }

        }*/
        //Ejemplo JORGIÑO GUAPO SEXY Y FUERTE
        echo "<ul>";

        for ($i=0; $i <= 50; $i++) {
            $primo = true; 
            for ($k=2; $k < $i; $k++) { 
                if ($i%$k==0) {
                    $primo=false;
                    break;
                }
            }
            if ($primo) {
                echo ("<li>$i</li>");
            }else{
                echo ("<li>$i</li>");
            }
        }
        echo "</ul>";

        //Ejemplo profesora
        echo "<h3>Ejemplo Alejandra</h3>";
        $numi = 2;
        $contador = 0;
        echo "<ol>";
        while ($contador < 50) {
            $esprimo = TRUE;
            for ($i = 2; $i < $numi; $i++) {
            
                if ($numerillo % $i == 0) {
                    $primo = FALSE;
                    break;
                }
    
            }
            if ($esprimo) {
                $contador++;
                echo ("<li>$numi</li>");
            }
            $numi++;
        }
        echo "</ol>";

    ?>

</body>
</html>