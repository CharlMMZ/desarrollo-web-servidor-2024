<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    
    <?php
    /*
    //declarar arrays
    $frutas = array(
        1=>"Manzana",
        2=>"Naranja",
        3=>"Cereza"
    );

    print_r($frutas);
    //forma 2
    $frutas2 = [
        "Clave1"=>"Sandía",
        "Clave2"=>"Pera",
        "Clave3"=>"Melón"
    ];
    //las claves son o un número o string, así que lo redondea o adapta al valor más cercano
    //mirar en un cajón
    echo $frutas[1];
    echo $frutas2["Clave1"];

    */
    ?>

    <?php
    //forma 3
    /*
    $frutas3 = [// si no ponemos las claves se asignan números
        "Sandía",
        "Pera",
        "Melón"
    ];
    array_push($frutas3, "Mango", "Melocotón");
    $frutas3[7] = "Uva";//Hay que tener cuidado porque machaca
    $frutas3[] = "Piña";//Si no ponemos nada, lo añade al final del array

    //Array values (Machaca todas la claves que hay y las vuelve a asignar desde cero)
    $frutas3 = array_values($frutas3);
    print_r($frutas3);
    unset($frutas3[4]);//me cargo una
    print_r($frutas3);
    */
    ?>
    <?php
    //Añadir elementos
        $personas = array(
            "77469363J"=>"Pepe",
            "87469363H"=>"Paco",
            "76469363E"=>"Jorge",
        );

        
        $personas["66469363W"] = "Miguel";
        array_push($personas, "Fermín","Ildefonso");
        print_r($personas);
        echo "<p>".$personas["76469363E"]."</p>";
    ?>
</body>
</html>