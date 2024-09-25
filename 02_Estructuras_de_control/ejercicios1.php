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

    /*Ejercicio 2
    (Hay que investigar un poco)
    Muestra por pantalla la fecha actual con el siguiente formato:
        Miércoles 25 de Septiembre de 2024*/
        $nom = date("N");
        $dia = date("j");
        $mes = date("n");
        $ano = date("Y");
        $diaes="";

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
            case 7:
                $diaes="Domingo";
                break;
        }
        switch($mes){
            case 1:
                $diaes="Enero";
                break;
            case 2:
                $diaes="Febrero";
                break;
            case 3:
                $diaes="Marzo";
                break;
            case 4:
                $diaes="Abril";
                break;
            case 5:
                $diaes="Mayo";
                break;
            case 6:
                $diaes="Junio";
                break;
            case 7:
                $diaes="Julio";
                break;
            case 8:
                $diaes="Agosto";
                break;
            case 9:
                $diaes="Septiembre";
                break;
            case 10:
                $diaes="Octubre";
                break;
            case 11:
                $diaes="Noviembre";
                break;
            case 12:
                $diaes="Diciembre";
                break;
        };


        echo ("$nom.$dia de ");
    ?>
</body>
</html>