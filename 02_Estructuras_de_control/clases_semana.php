<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dia=date("l");
        //echo "<h1>Hoy es $dia</h1>";
        /*
        switch($dia){
            case "Monday":
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Tuesday":
                echo "<p>Tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Wednesday":
                echo "<p>Tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Thursday":
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Friday":
                echo "<p>Tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Saturday":
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;
            case "Sunday":
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;

        }
                

        switch($dia){
            case "Tuesday":
            case "Wednesday":
            case "Friday":
                echo "<p>Tenemos clase de Desarrollo web Servidor</p>";
                break;
            default:
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;
        }
        */



        $diaes="";
        switch($dia){
            case "Monday":
                $diaes="Lunes";
                break;
            case "Tuesday":
                $diaes="Martes";
                break;
            case "Wednesday":
                $diaes="Miércoles";
                break;
            case "Thursday":
                $diaes="Jueves";
                break;
            case "Friday":
                $diaes="Viernes";
                break;
            case "Saturday":
                $diaes="Sábado";
                break;
            case "Sunday":
                $diaes="Domingo";
                break;

        }
        echo "<h1>Hoy es $diaes</h1>";
        switch($diaes){
            case "Martes":
            case "Miércoles":
            case "Viernes":
                echo "<p>Tenemos clase de Desarrollo web Servidor</p>";
                break;
            default:
                echo "<p>No tenemos clase de Desarrollo web Servidor</p>";
                break;
        }

        //MATCH, el switch con esteroides
        $resultado = match ($diaes) {
            "Martes",
            "Miércoles",
            "Viernes" =>"<p>Tenemos clase de Desarrollo web Servidor</p>",
            default =>"<p>No tenemos clase de Desarrollo web Servidor</p>",
        };

        echo $resultado;
    ?>
</body>
</html>